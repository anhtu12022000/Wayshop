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
    	} else {
            $user_email = Auth::user()->email;
        }
 
        $check = Cart::where('product_name',$dataProduct->name)->first();

        if ($check) {
            $check->product_quantity = $check->product_quantity + 1;
            $check->save();
            return $check->product_name;
        } else {
            if (!Session::get('session_id')) {
                $session_id = str_random(40);
                Session::put('session_id',$session_id);
            } else {
                $cart = new Cart();
                $cart->product_name = $dataProduct->name;
                $cart->product_image = $dataProduct->image;
                $cart->product_price = $dataProduct->price;
                $cart->product_quantity = 1;
                $cart->user_email = $user_email;
                $cart->session_id = Session::get('session_id');
                $cart->product_id = $dataProduct->id;
                $cart->cate_id = $dataProduct->cate_id;
                $cart->save();
                return $cart->product_name;
            }
        }
    }

    public function updateCart($id,Request $request)
    {
        $cart = Cart::find($id);
        $cart->product_quantity = $request->quantity;
        $cart->save();
        return $cart;
    }

    public function deleteCart($id)
    {
        $deleteProduct = Cart::find($id)->delete();
        return;
    }
}
