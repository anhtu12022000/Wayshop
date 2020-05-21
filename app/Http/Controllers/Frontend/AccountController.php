<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class AccountController extends Controller
{

    public function register(Request $request)
    {
    	$request->validate([
    		'email' => 'required|max:255|string|email',
    		'address' => 'string',
    		'phone' => 'min:11|numeric',
    		'password' => 'required|confirmed'
    	]);

    	$user = new User;
        $user->name = $request->name;
    	$user->email = $request->email;
    	$user->address = $request->address;
    	$user->phone = $request->phone;
        $user->gender = $request->gender;
    	$user->password = bcrypt($request->password);
    	if ($user->save()) {
    		if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
	            return redirect('/');
	        }	
    	}
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|max:255|string|email',
            'password' => 'required'
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        $remember_token = $request->input('remember_token');
        if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => 1], $remember_token)) {
                return redirect('/');
        } else {
            return redirect('/my-account')->with('danger', 'Invalid Email or Password')->withInput();
        }
    }

    public function changePassword($id, Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed'
        ]);
        $user = User::find($id);
        $user->password = bcrypt($request->password);
        $user->save();
        return back()->with('changePassword', 'Change Password Successfully');
    }

    public function changeInformation($id, Request $request)
    {
        $request->validate([
            'email' => 'required|max:255|string|email',
            'address' => 'string',
            'phone' => 'min:10|max:10|numeric',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->save();
        return back()->with('changeInformation', 'Change Information Successfully');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');   
    }
}