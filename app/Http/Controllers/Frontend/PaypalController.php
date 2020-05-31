<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use NunoMaduro\Collision\Provider;
use Srmklive\PayPal\Services\ExpressCheckout;
use Session;
use Auth;
use App\Mail\WelcomeMail;

class PaypalController extends Controller
{

	private function checkoutData($order_id)
	{
		$cart = \Cart::where('session_id', Session::get('session_id'));

    	$cartItems = array_map(function ($item)
    	{
    		return [
    			'product_name' => $item['product_name'],
    			'product_price' => $item['product_price'],
    			'product_quantity' => $item['product_quantity'],
    			'user_email' => $item['user_email'],
    			'product_id' => $item['product_id'],
    		];	
    	},$cart->getContent()->toarray());

    	$checkoutData = [
    		'items' => $cartItems,
    		'return_url' => route('paypal.success', $order_id),
    		'cancel_url' => route('paypal.cancel'),
    		'invoice_id' => uniqid(),
    		'invoice_description' => "Order description",
    		'total' => $cart->getTotal()
    	];

    	return $checkoutData;
	}

    public function getExpressCheckout($order_id)
    {
    	$checkoutData = $this->checkoutData($order_id);   	

    	$provider = new ExpressCheckout();
    	$res = $provider->setExpressCheckout($checkoutData);

    	return redirect($res['paypal_link']);
    }

    public function paypalCheckoutSuccess(Request $request, $order_id)
    {
    	$token = $request->get('token');
    	$PayerID = $request->get('PayerID');
    	$provider = new ExpressCheckout();
    	$checkoutData = $this->checkoutData($order_id);
    	$res = $provider->getExpressCheckoutDetails($token);

    	if (in_array(strtoupper($res['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
    		$payment_status = $provider->doExpressCheckoutPayment($checkoutData, $token, $PayerID);
    		$status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];

    		if (in_array($status, ['Completed', 'Processed'])) {
    			$order = Order::find($order_id);
	    		$order->status = 'Success';
	    		$order->save();

	    		//Gửi mail xác nhận
	    		$details = [
                    'title' => "Payment success!Thanks you.",
                    'body' => "Your Order Number is 1 and total payable about is $".$checkoutData['total']
                ];
                \Mail::to(Auth::user()->email)->send(new WelcomeMail($details));

                return redirect('/thanks');
    		}

    	}
    	return redirect('/order-review')->with('error', 'Payment unsuccessful! Something went wrong!');
    }

    public function cancelPage()
    {
    	
    }
}
