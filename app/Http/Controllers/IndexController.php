<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Frontend\PostsController;
use App\Models\Product;
class IndexController extends Controller
{
    public function index()
    {
        $PostsController = new PostsController;
        $data = Array(
            'Slides' => "empty",
            'MenProducts' => Product::orderBy('id','desc')->take(8)->get(),
            'Posts' => $PostsController->getAllPost()
        );
    	return view('wayshop.home')->with('data',$data);
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
