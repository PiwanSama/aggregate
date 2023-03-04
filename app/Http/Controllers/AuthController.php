<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\UserLogin;
use App\Models\User;

class AuthController extends Controller{

    public function initiateGoogleLogin(){
        return Socialite::driver('google')->redirect();
    }

    public function googleLoginCallback(){
        $googleUser = Socialite::driver('google')->stateless()->user();

        if(UserLogin::where('email_address', $googleUser->email)->exists()){
            //Login user
            $loginUser = UserLogin::where('email_address', $googleUser->email)->first();
            $loginUser->external_provider_token = $googleUser->token;
            $loginUser->last_login_time = now();
            $loginUser->save();
            
            Auth::login($loginUser);
            
            //Redirect user to homepage
        }else{
            //Create new user
            $createUser = new UserLogin; 
            $createUser->email_address = $googleUser->email;
            $createUser->external_id = $googleUser->id;
            $createUser->external_provider = 'Google';
            $createUser->external_provider_token = $googleUser->token;

            $userCreated = $createUser->save();

            if($userCreated){
                //Create user profile
                $createUserProfile = new User;
                $createUserProfile->first_name = $googleUser->user['given_name'];
                $createUserProfile->last_name = $googleUser->user['family_name'];
                $createUserProfile->avatar_url = $googleUser->user['picture'];
                $createUserProfile->fk_userlogin_id = $createUser->id;
                $createUserProfile->save();
                
                Auth::login($createUserProfile);
            
                //Redirect user to homepage
                
            }
            
        }
    }
}

?>