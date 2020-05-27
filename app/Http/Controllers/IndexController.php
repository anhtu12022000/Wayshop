<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Frontend\DataController;
use App\Models\Contact;
use App\Models\Cart;
use Auth;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Coupons;
use App\Models\DeliveryAddress;
use App\User;
use Session;

class IndexController extends Controller
{

    private $dataPosts;
    private $dataSlider;
    private $dataCate;
    private $dataProduct;
    private $dataProducts;
    private $userCart;

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
            'Posts' => $this->dataPosts,
            'userCart' => $this->getCarts()
        );
    	return view('wayshop.home')->with('data',$data);
    }

    public function getCarts()
    {
        $session_id = Session::get('session_id');
        $userCart = Cart::where('session_id',$session_id)->get();
        $totalCart = Cart::where('session_id',$session_id)->count();
        Session::put('totalcart', $totalCart);
        return $userCart;
    }

    public function aboutus()
    {
    	return view('wayshop.aboutus');
    }

    public function cart()
    {
        $data = Array(
            'Cate' => $this->dataCate,
            'Slides' => $this->dataSlider,
            'userCart' => $this->getCarts()
        );
    	return view('wayshop.cart')->with('data',$data);
    }

    public function applyCoupons(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string',
        ]);
        $coupon = Coupons::where(['coupon_code' => $request->coupon_code, 'status' => 1])->count();
        if ($coupon == 0) {
            return back()->with('mess','Coupon does not exit or Coupon has not been activated!');
        } else {
            $couponDetail = Coupons::where('coupon_code',$request->coupon_code)->first();
            if ($couponDetail->status == 0) {
                return back()->with('mess','Coupon code is not active!');
            }

            $expiry_date = $couponDetail->expiry_date;
            $current = date('Y-m-d');
            if ($expiry_date < $current) {
                return back()->with('mess','Coupon code is Expiryed!');
            }

            $session_id = Session::get('session_id');
            $userCart = Cart::where('session_id',$session_id)->get();
            $total_amount = 0;

            foreach ($userCart as $value) {
                $total_amount += $value->product_price * $value->product_quantity;
            }
       
            if ($couponDetail->amount_type == 'fixed' ) {
                $couponAmount = $couponDetail->amount;
            } else {
                $couponAmount = $total_amount * ($couponDetail->amount/100);
            }

            Session::put('couponAmount', $couponAmount);
            Session::put('couponCode', $request->coupon_code);
            return back()->with('mess','Coupon code is Successfully Applied. You are Availing Discount');
        }
    }

    public function checkout(Request $request)
    {

        $data = Array(
            'Cate' => $this->dataCate,
            'Slides' => $this->dataSlider,
            'userCart' => $this->getCarts(),
        ); 

        if (Auth::user()) {
            $session_id = Session::get('session_id');
            Cart::where('session_id',$session_id)->update([
                'user_email' => Auth::user()->email
            ]);
        }

        if ($request->isMethod('post')) {
            if (!Auth::user()) {
                return view('wayshop.checkout')->with('data',$data)->width('mess', 'You need to login to pay');
            } else {
                $user_id = Auth::user()->id;
                $shippingDetail = DeliveryAddress::where('user_id', $user_id)->first();
                $shippingCount = DeliveryAddress::where('user_id', $user_id)->count();
                $shippingDetail = array();

                if ($shippingCount > 0) {
                    $shippingDetail = DeliveryAddress::where('user_id', $user_id)->first();
                }
                if ($shippingCount > 0) {
                    $deliveryAddress = DeliveryAddress::where('user_id', $user_id);
                    if ($request->billtoship != null) {
                        $deliveryAddress->user_email = $request->shipemail;
                        $deliveryAddress->name = $request->shipname;
                        $deliveryAddress->address = $request->shipaddress;
                        $deliveryAddress->city = $request->shipcity;
                        $deliveryAddress->country = $request->shipcountry;
                        $deliveryAddress->pincode = $request->shippincode;
                        $deliveryAddress->phone = $request->shipphone;
                        $deliveryAddress->note = $request->shipnote;
                        $deliveryAddress->save();
                    } else {
                        $deliveryAddress->user_email = $request->email;
                        $deliveryAddress->name = $request->name;
                        $deliveryAddress->address = $request->address;
                        $deliveryAddress->city = $request->city;
                        $deliveryAddress->country = $request->country;
                        $deliveryAddress->pincode = $request->pincode;
                        $deliveryAddress->phone = $request->phone;
                        $deliveryAddress->note = '';
                        $deliveryAddress->save();
                    }
                } else {
                    $deliveryAddress = new DeliveryAddress;
                    if ($request->billtoship != null) {
                    $deliveryAddress->user_id = $user_id;
                    $deliveryAddress->user_email = $request->shipemail;
                    $deliveryAddress->name = $request->shipname;
                    $deliveryAddress->address = $request->shipaddress;
                    $deliveryAddress->city = $request->shipcity;
                    $deliveryAddress->country = $request->shipcountry;
                    $deliveryAddress->pincode = $request->shippincode;
                    $deliveryAddress->phone = $request->shipphone;
                    $deliveryAddress->note = $request->shipnote;
                    $deliveryAddress->save();
                } else {
                    $deliveryAddress->user_id = $user_id;
                    $deliveryAddress->user_email = $request->email;
                    $deliveryAddress->name = $request->name;
                    $deliveryAddress->address = $request->address;
                    $deliveryAddress->city = $request->city;
                    $deliveryAddress->country = $request->country;
                    $deliveryAddress->pincode = $request->pincode;
                    $deliveryAddress->phone = $request->phone;
                    $deliveryAddress->note = '';
                    $deliveryAddress->save();
                }
            }
            return redirect()->action('/order-review');
        }    
    }
        return view('wayshop.checkout')->with('data',$data);
    }

    public function orderReview()
    {
        $user_id = Auth::user()->id;
        $shipping = DeliveryAddress::where('user_id', $user_id)->first();
        if (!isset($shipping) || !Auth::user()) {
            return route('home');
        }
        $data = Array(
            'Cate' => $this->dataCate,
            'userCart' => $this->getCarts(),
            'Slides' => $this->dataSlider,
            'shipping' => $shipping
        );
        return view('wayshop.order-review')->with('data',$data);
    }

    public function productDetail(Request $request)
    {
        $Data = new DataController;
        $data = Array(
            'Cate' => $this->dataCate,
            'userCart' => $this->getCarts(),
            'Slides' => $this->dataSlider,
            'Product' => $Data->productDetail($request->slug),
            'productRelated' => $Data->productRelated($request->slug)
        );

        return view('wayshop.product-detail')->with('data',$data);
    }

    public function postDetail($slug)
    {
        $Data = new DataController;
        $data = Array(
            'Cate' => $this->dataCate,
            'Slides' => $this->dataSlider,
            'userCart' => $this->getCarts(),
            'Post' => $Data->postDetail($slug),
            'PostComment' => $Data->postDetail($slug),
            'postRelated' => $this->dataPosts
        );
        return view('wayshop.blog-detail')->with('data',$data);
    }

    public function account()
    {
        $data = Array(
            'Cate' => $this->dataCate,
            'Slides' => $this->dataSlider,
            'userCart' => $this->getCarts()
        );
        return view('wayshop.my-account')->with('data',$data);
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
            'Products' =>  $this->dataProducts,
            'userCart' => $this->getCarts()
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
        $data = Array(
            'Slides' => $this->dataSlider,
            'Cate' => $this->dataCate,
            'userCart' => $this->getCarts()
        );
        return view('wayshop.contact')->with('data',$data);
    }

    public function notFound()
    {
        $data = Array(
            'Cate' => $this->dataCate,
            'Slides' => $this->dataSlider,
            'userCart' => $this->getCarts()
        );
        return view('wayshop.404')->with('data',$data);
    }
}
