<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
    	return view('admin.posts.index');
    }
    public function add(Request $request)
    {

    	return view('admin.posts.add');
    }
    public function edit(Request $request)
    {

    	return view('admin.posts.edit');
    }

}
