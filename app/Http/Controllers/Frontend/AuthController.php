<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Socialite;
use Auth;

class AuthController extends Controller
{

	  /**
	  * Redirect the user to the Google authentication page.
	  *
	  * @return \Illuminate\Http\Response
	  */
	public function redirectToProvider()
	{
	    return Socialite::driver('google')->redirect();
	}

    public function handleProviderCallback()
    {
    	try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/my-account');
        }
        // only allow people with @company.com to login
        if(explode("@", $user->email)[1] !== 'gmail.com'){
            return redirect()->to('/');
        }
        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();
        if($existingUser){
            // log them in
            auth()->login($existingUser, true);
        } else {
            // create a new user
            $newUser                  = new User;
            $newUser->name            = $user->name;
            $newUser->email           = $user->email;
            $newUser->google_id       = $user->id;
            $newUser->image          = $user->avatar;
            $newUser->avatar_original = $user->avatar_original;
            $newUser->save();
            auth()->login($newUser, true);
        }
        return redirect()->to('/');
    }

    public function login(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('appToken')->accessToken;

            return response()->json([
                'status' => true,
                'token' => $success,
                'user' => $user
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Email or Password'
            ]);
        }
    }

    
}
