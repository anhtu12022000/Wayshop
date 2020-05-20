<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Frontend\PostsController;
use App\Models\Cate;
use App\Models\Product;
use App\Models\Posts;
class IndexController extends Controller
{
    public function index()
    {
        $PostsController = new PostsController;
        $data = Array(
            'Cate' => Cate::all(),
            'Slides' => Product::orderBy('id','desc')->take(2)->get(),
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

    public function productDetail($id)
    {
        $data = Array(
            'Cate' => Cate::all(),
            'Slides' => Product::orderBy('id','desc')->take(2)->get(),
            'Product' => Product::find($id),
            'productRelated' => Product::where('id','>',$id)->get()
        );
        return view('wayshop.product-detail')->with('data',$data);
    }

    public function postDetail($slug)
    {
        $data = Array(
            'Cate' => Cate::all(),
            'Slides' => Product::orderBy('id','desc')->take(2)->get(),
            'Post' => Posts::where('slug',$slug)->first(),
            'PostComment' => Posts::where('slug',$slug)->first(),
            'postRelated' => Product::all(),
        );
        return view('wayshop.blog-detail')->with('data',$data);
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
        $data = Array(
            'Cate' => Cate::all(),
            'Slides' => Product::orderBy('id','desc')->take(2)->get(),
            'Products' => Product::all(),
        );
        return view('wayshop.shop')->with('data',$data);
    }

    public function contact()
    {
        $data = Array(
            'Cate' => Cate::all(),
            'Slides' => Product::orderBy('id','desc')->take(2)->get(),
        );
        return view('wayshop.contact-us')->with('data',$data);
    }
}
