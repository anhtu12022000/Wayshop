<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Session;
use Auth;

class CartController extends Controller
{
    public function addCart(Request $request)
    {
    	$dataProduct = Product::find($request->id);
    	if (!Auth::check()) {
    		$user_email = '';
    	}

    	$session_id = str_random(40);
    	Session::put('session_id',$session_id);
    	$cart = new Cart();
    	$cart->product_name = $dataProduct->name;
    	$cart->product_image = $dataProduct->image;
    	$cart->product_price = $dataProduct->price;
    	$cart->product_quantity = $dataProduct->quantity;
        $cart->user_email = $user_email;
        $cart->session_id = $session_id;
        $cart->product_id = $dataProduct->id;
        $cart->cate_id = $dataProduct->cate_id;
        $cart->save();
        return $cart->product_name;
    }
}
