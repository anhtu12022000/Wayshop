<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LanguageController extends Controller
{
    public function index(Request $request,$language)
    {
    	$lang = $request->language;
		$language = config('app.locale');
		if ($lang == 'en') {
		    $language = 'en';
		}
		if ($lang == 'vi') {
		    $language = 'vi';
		}
		Session::put('language', $language);
		return redirect()->back();
    }
}
