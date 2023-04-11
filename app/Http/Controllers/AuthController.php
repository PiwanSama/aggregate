<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UserLogin;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller{

    public function initiateGoogleLogin(){
        return Socialite::driver('google')->redirect();
    }
    
    //Update function to cater for email, password logins
    public function googleLoginCallback(){
        date_default_timezone_set('Africa/Kampala');

        $googleUser = Socialite::driver('google')->stateless()->user();

        if(UserLogin::where('email_address', $googleUser->email)->exists()){
            //Login user
            $loginUser = UserLogin::where('email_address', $googleUser->email)->first();
            $loginUser->external_provider_token = $googleUser->token;
            $loginUser->last_login_time = now();
            $loginUser->updated_at = now();
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
            $createUser->created_at = now();
            $createUser->updated_at = now();
            $createUser->last_login_time = now();
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

    function registerUser(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'surname' => 'required',
            'email' => 'required|email:rfc,dns|unique:user_login_data,email_address',
            'password' => 'required|min:8'
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>"Failed",
                'message'=>"Invalid Data",
                'errors'=> $validator->errors()
            ]);
        }
    }
}

?>