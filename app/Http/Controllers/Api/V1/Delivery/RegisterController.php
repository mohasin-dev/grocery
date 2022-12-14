<?php

namespace App\Http\Controllers\Api\V1\Delivery;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    /**
     * Register a user via API
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function register( Request $request ) {

        $validation = validateData( [
            'email'    => 'required|email|unique:users,email',
            'password' => [
                'required',
                'confirmed',
                Password::min( 8 )
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols(),
            ],
        ] );

        if ( $validation->fails() ) {
            return api()->validation( null, $validation->errors() );
        }

        $user                 = new User();
        $user->email          = $request->email;
        $user->type           = 4;
        $user->password       = Hash::make( $request->password );
        $user->referral_token = Str::random(20);
        $user->save();

        $token = $user->createToken( 'Bearer' );

        $data = [
            'token_type' => 'Bearer',
            'token'      => $token->plainTextToken,
        ];

        return ok( 'User auth token generated successfully', $data );
    }
}
