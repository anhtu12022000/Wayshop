<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Frontend\DataController;
use App\Models\Contact;
use App\Models\Cart;
use Auth;
use DB;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Coupons;
use App\Models\Order;
use App\Models\OrdersProduct;
use App\Models\Cate;
use App\Models\Product;
use App\Models\DeliveryAddress;
use App\Models\PostComment;
use App\Models\ProductComment;
use App\User;
use Session;
use Log;
use Carbon\Carbon;

class IndexController extends Controller
{

    private $dataPosts;
    private $dataSlider;
    private $dataCate;
    private $MenProducts;
    private $WomenProducts;
    private $KidProducts;
    private $dataProducts;
    private $dataPro;
    private $userCart;
    private $dataPost;

    public function __construct()
    {
        $Data = new DataController;
        $this->dataPosts = $Data->getPost();
        $this->dataSlider = $Data->getSlider();
        $this->MenProducts = $Data->getProductMen();
        $this->WomenProducts = $Data->getProductWomen();
        $this->KidProducts = $Data->getProductKids();
        $this->BagsProducts = $Data->getProductBags();
        $this->latestProducts = $Data->getLatestProducts();
        $this->popularProducts = $Data->getpopularProducts();
        $this->featuredProducts = $Data->getfeaturedProducts();
        $this->dataPro = $Data->getPro();
        $this->dataCate = $Data->getAllCategory();
        $this->dataProducts = $Data->getAllProduct();
        $this->dataPost = $Data->getAllPost();
    }

    // public function index()
    // {
    //     return view('index');
    // }

    public function index()
    {

        $cate = Cate::orderBy('created_at')->take(5)->get();
        $arr = [];
        for ($i = 0; $i < count($cate); $i++) {

            $arr[$i] = [
                'name' => $cate[$i]->name,
                'image' => Product::where('cate_id', $cate[$i]->id)->where('sale', '>', 0)->orderBy('created_at', 'desc')->limit(1)->get()
            ];
        };

        $data = Array(
            'Cate' => $this->dataCate,
            'Slides' => $this->dataSlider,
            'MenProducts' => $this->MenProducts,
            'WomenProducts' => $this->WomenProducts,
            'KidProducts' => $this->KidProducts,
            'BagsProducts' => $this->BagsProducts,
            'latestProducts' => $this->latestProducts,
            'popularProducts' => $this->popularProducts,
            'featuredProducts' => $this->featuredProducts,
            'Posts' => $this->dataPosts,
            'cate' => $arr,
            'userCart' => $this->getCarts()
        );
    	return view('wayshop.home')->with('data',$data);
    }

    public function getCarts()
    {
        if (!Auth::check()) {
            $session_id = Session::get('session_id');
            $userCart = Cart::where('session_id',$session_id)->get();
            $totalCart = Cart::where('session_id',$session_id)->count();
        } else {
            $userCart = Cart::where('user_email', Auth::user()->email)->get();
            $totalCart = Cart::where('user_email', Auth::user()->email)->count();
        }
        Session::put('totalcart', $totalCart);
        return $userCart;
    }

    public function aboutus()
    {
         $data = Array(
            'Cate' => $this->dataCate,
            'Slides' => $this->dataSlider,
            'userCart' => $this->getCarts()
        );
    	return view('wayshop.aboutus')->with('data',$data);
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

            if ( count($userCart) == 0 && $couponDetail->amount_type == 'percentage' ) {
                return back()->with('mess','Coupon calculated by % of total order! Please purchase the product first!');
            }

            $total_amount = 0;

            foreach ($userCart as $value) {
                $total_amount += $value->product_price * $value->product_quantity;
            }

            if ($couponDetail->amount_type == 'fixed' ) {
                $couponAmount = $couponDetail->amount;
            } else {
                $couponAmount = $total_amount * ($couponDetail->amount/100);
            }

            Coupons::where('coupon_code',$couponDetail->coupon_code)->update([
                'status' => 0   
            ]);

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
                return back()->with('data',$data)->with('mess', 'You need to login to pay');
            } else {
                $user_id = Auth::user()->id;
                $shippingCount = DeliveryAddress::where('user_id', $user_id)->count();

                if ($shippingCount > 0) {
                    $deliveryAddress = DeliveryAddress::where('user_id', $user_id)->first();
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
            return redirect('/order-review');
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

    public function placeOrder(Request $request)
    {
        $shipDetails = DeliveryAddress::where('user_email', Auth::user()->email)->first();
        if (Session::get('couponCode')) {
           $couponCode = Session::get('couponCode');
           $couponAmount = Session::get('couponAmount');
        } else {
           $couponCode = '';
           $couponAmount = 0;
        }

        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->user_email = Auth::user()->email;
        $order->name = $shipDetails->name;
        $order->address = $shipDetails->address;
        $order->city = $shipDetails->city;
        $order->country = $shipDetails->country;
        $order->pincode = $shipDetails->pincode;
        $order->phone = $shipDetails->phone;
        $order->coupou_code = $couponCode;
        $order->coupou_amount = $couponAmount;
        $order->order_status = "New";
        $order->payment_method = $request->payment_method;
        $order->grand_total = $request->grand_total;
        $order->save();

        $order_id = DB::getPdo()->lastinsertID();
         
        Session::put('grand_total', $request->grand_total);
        if ($request->payment_method == 'paypal') {
            return redirect()->route('paypal.checkout', $order_id);
        }

        $catProduct = Cart::where('user_email', Auth::user()->email)->get();

        foreach ($catProduct as $pro) {
            $catPro = new OrdersProduct;
            $catPro->order_id = $order_id;
            $catPro->user_id = Auth::user()->id;
            $catPro->product_name = $pro->product_name;
            $catPro->product_price = $pro->product_price;
            $catPro->product_quantity = $pro->product_quantity;
            $catPro->total = $pro->product_price * $pro->product_quantity;
            $catPro->save();
        }
        Session::put('thanks', 'Thanks you!');
        Session::put('total', $request->grand_total);
        return redirect('/thanks');
    }

    public function thanks()
    {
        if (Session::get('thanks')) {
            Cart::where('session_id', Session::get('session_id'))->delete();
            $data = Array(
                'Cate' => $this->dataCate,
                'userCart' => $this->getCarts(),
                'Slides' => $this->dataSlider
            );
             return view('wayshop.thanks')->with('data',$data);
        }
        return route('home');
    }

    public function getOrdersCarts()
    {
        $yourOrder = Order::with('ordersPro')->where(['user_id' => Auth::user()->id, 'order_status' => 'New'])->get();
        $data = Array(
            'Cate' => $this->dataCate,
            'userCart' => $this->getCarts(),
            'yourOrder' => $yourOrder,
            'Slides' => $this->dataSlider,
        );
        return view('wayshop.orders-cart')->with('data',$data);
    }

    public function productDetail(Request $request)
    {
        $Data = new DataController;
        $Product = $Data->productDetail($request->slug);
        $data = Array(
            'Cate' => $this->dataCate,
            'userCart' => $this->getCarts(),
            'Slides' => $this->dataSlider,
            'Product' => $Product,
            'ProductComment' => $Data->productComments($Product->id),
            'productRelated' => $Data->productRelated($request->slug)
        );

        return view('wayshop.product-detail')->with('data',$data);
    }

    public function productComment(Request $request)
    {
        if($request->ajax()){
            $comment = new ProductComment;
            $comment->author = $request->author;
            $comment->email = $request->email;
            $comment->body = $request->body;
            $comment->product_id = $request->product_id;
            $comment->save();
        }
        return response()->json($comment, 200);
    }

    public function postDetail($slug)
    {
        $Data = new DataController;
        $Post = $Data->postDetail($slug);
        $data = Array(
            'Cate' => $this->dataCate,
            'Slides' => $this->dataSlider,
            'userCart' => $this->getCarts(),
            'Post' => $Post,
            'PostComment' => $Data->PostComments($Post->id),
            'postRelated' => $this->dataPosts
        );
        return view('wayshop.blog-detail')->with('data',$data);
    }

    public function postComment(Request $request)
    {
        if($request->ajax()){
            $comment = new PostComment;
            $comment->author = $request->author;
            $comment->email = $request->email;
            $comment->body = $request->body;
            $comment->post_id = $request->post_id;
            $comment->save();
        }
        return response()->json($comment, 200);
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
        $data = Array(
            'Cate' => $this->dataCate,
            'Slides' => $this->dataSlider,
            'userCart' => $this->getCarts()
        );
        return view('wayshop.wishlist')->with('data',$data);
    }

    public function shop()
    {
        $data = Array(
            'Cate' => $this->dataCate,
            'Slides' => $this->dataSlider,
            'Products' =>  $this->dataProducts,
            'userCart' => $this->getCarts(),
            'dataPro' =>  $this->dataPro
        );
        return view('wayshop.shop')->with('data',$data);
    }

    public function productCate($slug)
    {
        $Data = new DataController;
        $data = Array(
            'Cate' => $this->dataCate,
            'Slides' => $this->dataSlider,
            'dataProCate' => $Data->getProductCate($slug),
            'userCart' => $this->getCarts(),
            'dataPro' =>  $this->dataPro
        );
        return view('wayshop.shop')->with('data',$data);
    }

    public function productSlide($slug)
    {
        $Data = new DataController;
        $data = Array(
            'Cate' => $this->dataCate,
            'Slides' => $this->dataSlider,
            'dataProSlide' => $Data->getProductSlide($slug),
            'userCart' => $this->getCarts(),
            'dataPro' =>  $this->dataPro
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

    public function blog()
    {
        $data = Array(
            'Slides' => $this->dataSlider,
            'Cate' => $this->dataCate,
            'dataPost' => $this->dataPost,
            'dataPosts' => $this->dataPosts,
            'userCart' => $this->getCarts()
        );
        return view('wayshop.blog-archive')->with('data',$data);
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

    public function search(Request $request)
    {
        $keyword = Product::where('name','like', '%'.$request->keyword.'%')->paginate(20);
        $data = Array(
            'Cate' => $this->dataCate,
            'Slides' => $this->dataSlider,
            'userCart' => $this->getCarts(),
            'keyword' => $keyword,
        );
        return view('wayshop.search')->with('data',$data);
    }

    public function searchAjax($keyword)
    {
        $data = Product::where('name','like', '%'.$keyword.'%')->take(10)->get();
        return response()->json($data);
    }

}
