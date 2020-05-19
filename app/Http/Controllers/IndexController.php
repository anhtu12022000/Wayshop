<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Http\Controllers\Frontend\DataController;
use App\Models\Contact;

=======
use App\Http\Controllers\Frontend\PostsController;
use App\Models\Product;
>>>>>>> e59803acfe42f79fc19d6243b2576c61c70c41ab
class IndexController extends Controller
{

    private $dataPosts;
    private $dataSlider;

    public function __construct()
    {
        $Data = new DataController;
        $this->dataPosts = $Data->getAllPost();
        $this->dataSlider = $Data->getAllSlider();
    }

    public function index()
    {
<<<<<<< HEAD
    	return view('wayshop.home')->with('dataPosts',$this->dataPosts)->with('dataSlider',$this->dataSlider);
=======
        $PostsController = new PostsController;
        $data = Array(
            'Slides' => "empty",
            'MenProducts' => Product::orderBy('id','desc')->take(8)->get(),
            'Posts' => $PostsController->getAllPost()
        );
    	return view('wayshop.home')->with('data',$data);
>>>>>>> e59803acfe42f79fc19d6243b2576c61c70c41ab
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
        return view('wayshop.my-account')->with('dataSlider',$this->dataSlider);
    }

    public function wishlist()
    {
        return view('wayshop.wishlist');
    }

    public function shop()
    {
        return view('wayshop.shop');
    }

    public function contact(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|max:50|string',
                'email' => 'required|string|email',
                'subject' => 'required|string',
                'message' => 'required|string'
            ]);

            $contact = new Contact;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->company = $request->company;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            $contact->save();
            return back()->with('success','Send contact Successfully.');
        }
        return view('wayshop.contact')->with('dataSlider',$this->dataSlider);
    }
}
