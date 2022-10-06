<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller{

    public function initiateGoogleLogin(){
        return Socialite::driver('google')->redirect();
    }

    public function googleLoginCallback(){
        $client = new \GuzzleHttp\Client(['verify' => false ]);
        $user = Socialite::driver('google')->stateless()->user();
        dd($user);
    }
}

?>