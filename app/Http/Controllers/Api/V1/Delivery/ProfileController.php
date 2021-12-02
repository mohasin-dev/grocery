<?php

namespace App\Http\Controllers\Api\V1\Delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Return json response of loggedin user
     */
    public function getProfile() {
        return ok( 'Profile retrived successfully', auth()->user() );
    }

    /**
     * @param Request $request
     */
    public function updateProfile( Request $request ) {

        $validation = validateData( [
            'name' => 'required',
        ] );

        if ( $validation->fails() ) {
            return api()->validation( null, $validation->errors() );
        }

        $user = auth()->user()->updateProfile( $request );

        return ok( 'Profile updated successfully', $user );
    }
}