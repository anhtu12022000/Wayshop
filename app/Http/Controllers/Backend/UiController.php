<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UiController extends Controller
{
    public function bannerAds()
    {
    	return view('admin.ui.banner-ads');
    }
}
