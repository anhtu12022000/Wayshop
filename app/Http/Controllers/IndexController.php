<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Frontend\DataController;
use App\Models\Contact;

class IndexController extends Controller
{

    private $dataPosts;
    private $dataSlider;
    private $dataCate;
    private $dataProduct;
    private $dataProducts;

    public function __construct()
    {
        $Data = new DataController;
        $this->dataPosts = $Data->getPost();
        $this->dataSlider = $Data->getSlider();
        $this->dataProduct = $Data->getProduct();
        $this->dataCate = $Data->getAllCategory();
        $this->dataProducts = $Data->getAllProduct();
    }

    public function index()
    {
        $data = Array(
            'Cate' => $this->dataCate,
            'Slides' => $this->dataSlider,
            'MenProducts' => $this->dataProduct,
            'Posts' => $this->dataPosts
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
            'Cate' => $this->dataCate,
            'Slides' => $this->dataSlider,
            'Product' => $Data->productDetail($id),
            'productRelated' => $Data->productRelated($id)
        );
        return view('wayshop.product-detail')->with('data',$data);
    }

    public function postDetail($slug)
    {
        $data = Array(
            'Cate' => $this->dataCate,
            'Slides' => $this->dataSlider,
            'Post' => $Data->postDetail($slug),
            'PostComment' => $Data->postDetail($slug),
            'postRelated' => $this->dataPosts
        );
        return view('wayshop.blog-detail')->with('data',$data);
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
        $data = Array(
            'Cate' => $this->dataCate,
            'Slides' => $this->dataSlider,
            'Products' =>  $this->dataProducts
        );
        return view('wayshop.shop')->with('data',$data);
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

    public function notFound()
    {
        return view('wayshop.404')->with('dataSlider',$this->dataSlider);
    }
}
