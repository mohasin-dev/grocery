<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Components\Email\EmailFactory;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Validation\Rules\Password;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('frontend.forget');
    }

    public function resetPasswordView()
    {
        return view('frontend.forget-password');
    }

    /**
     * Delivery Man Forgot Password Authentication.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email'        => 'required',
        ]);

        $user = User::where('email', $request->email)->whereType(3)->first();

        if (!$user) {
            return back()->with('error', 'Invalid Email');
        }

        $user->verify_otp = rand(100000, 599999);

        $user->save();

        $this->sendConfirmationEmail($user);

        Cache::put('forget_user', $user, 60);

        return back()->with('success', 'Email send successfully with confirmation OTP');
    }


    /**
     * Reset the user's OTP checked.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function resetPasswordOtp(Request $request)
    {
        // return $request->all();

        $validation = validateData([
            'email'    => 'required|email',
            'otp'      => 'required|numeric',
        ]);

        if ($validation->fails()) {
            return back()->with('error', 'Validation failed..!');
        }


        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'We  find a user with that e-mail address.');
        }

        if ($user->verify_otp != $request->otp) {

            return back()->with('error', 'OTP is not valid.');
        } elseif ($user->verify_otp === intval($request->otp)) {

            return redirect()->route('user.reset.view');
        } else {
            return redirect()->route('login');
        }

        return back()->with('error', 'Failed ..!');
    }

    /**
     * Reset the user's password.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function resetPassword(Request $request)
    {
        // return $request->all();

        $validation = validateData([
            'email'    => 'required|email',
            'otp'      => 'required|numeric',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols(),
            ],
        ]);


        if ($validation->fails()) {
            return back()->with('error', 'Validation failed..!');
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'We  find a user with that e-mail address.');
        }

        $user->password   = bcrypt($request->password);
        $user->verify_otp = null;
        $user->save();
        Artisan::call('cache:clear');
        return redirect()->route('login')->with('success', 'Password has been reset!');
    }

    /**
     * User forgot confirmation email with OTP.
     *
     * @param object $user
     * @return JsonResponse
     */
    public function sendConfirmationEmail($user)
    {
        $emailTemplate = EmailTemplate::whereType('user_Forgot_Password')->first();

        $changeFrom = ["{name}", "{verify_otp}"];
        $changeTo = [$user->name, $user->verify_otp];

        $body = str_replace($changeFrom, $changeTo, $emailTemplate->body);

        $emailDetails = [
            'email'   => $user->email,
            'subject' => $emailTemplate->subject,
            'body'    => $body
        ];


        (new EmailFactory())->initializeEmail($emailDetails);

        return $emailDetails;
    }
}
