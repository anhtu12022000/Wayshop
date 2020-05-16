<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
    	return view('wayshop.home');
    }

    public function aboutus()
    {
    	return view('wayshop.aboutus');
    }

    public function cart()
    {
    	return view('wayshop.cart');
    }

    public function checkout()
    {
        return view('wayshop.checkout');
    }

    public function detail()
    {
        return view('wayshop.product-detail');
    }

    public function account()
    {
        return view('wayshop.my-account');
    }

    public function wishlist()
    {
        return view('wayshop.wishlist');
    }

    public function shop()
    {
        return view('wayshop.shop');
    }

    public function contact()
    {
        return view('wayshop.contact-us');
    }
}
