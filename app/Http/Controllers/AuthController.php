<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller{

    public function initiateGoogleLogin(){
        return Socialite::driver('google')->redirect();
    }

    public function googleLoginCallback(){
        $user = Socialite::driver('google')->user();
        dd($user);
    }
}

?>