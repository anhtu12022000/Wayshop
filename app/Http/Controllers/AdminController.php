<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|max:255|string|email',
                'password' => 'required'
            ]);
            $email = $request->input('email');
            $password = $request->input('password');
            $remember_token = $request->input('remember_token');
                if (Auth::attempt(['email' => $email, 'password' => $password], $remember_token)) {
                        if (Auth::user()->hasAnyRole('Administrator','Author','Editor','SEO')) {
                            return redirect('admin/dashboard');
                        } else {
                            return view('wayshop.404'); 
                        }                  
                } else {
                    return redirect('/admin')->with('status', 'Invalid Email or Password')->withInput();
                }
            } else if (Auth::check()) {
                return redirect('admin/dashboard');
            }
        
        return view('admin.admin_login');
    }

    public function dashboard()
    {
        if (Auth::check()) {
            if (Auth::user()->hasAnyRole('Administrator','Author','Editor','SEO')) {
                return view('admin.dashboard');
            }
        } else {
            return view('wayshop.404');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin');   
    }
}
