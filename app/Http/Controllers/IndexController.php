<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Frontend\DataController;
use App\Models\Contact;

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
    	return view('wayshop.home')->with('dataPosts',$this->dataPosts)->with('dataSlider',$this->dataSlider);
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
