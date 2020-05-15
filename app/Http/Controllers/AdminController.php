<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;
use Auth;

class AdminController extends Controller
{
    use HasRoles;   
    public function index(Request $request)
    {
    	if ($request->isMethod('post')) {
    		$data = $request->input();
    		if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
    			return redirect('admin/dashboard');
    		} else {
    			return redirect('/admin')->with('mess', 'Invalid Email or Password');
    		}
    	}
    	return view('admin.admin_login');
    }

    public function dashboard()
    {
    	return view('admin.dashboard');
    }
}
