<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrdersProduct;
use Illuminate\Support\Str;

class BillController extends Controller
{
    public function index()
    {
        $data = Order::orderBy('created_at', 'desc')->get();
    	return view('admin.bills.index')->with('data', $data);
    }

    public function viewDetailOrders($id)
    {
        $detailOrder = OrdersProduct::where('order_id', $id)->get();
        return view('admin.bills.view-details')->with('detailOrder', $detailOrder);
    }

    public function changeStatusOrder(Request $request, $id)
    {
        $order = Order::find($id);
        $order->order_status = $request->status;
        $order->save();
        if ($order->save()) {
            return response()->json($order);
        } else {
            return response()->json(['500' => 'Error!Please try again :)']);
        }
    }

    public function confirmOrder($id)
    {
        $order = Order::find($id);
        $order->order_status = 'Delivered';
        $order->save();
        if ($order->save()) {
            return response()->json($order);
        } else {
            return response()->json(['500' => 'Error!Please try again :)']);
        }
    }

    public function delDetailOrders($id)
    {
        $bill = Order::find($id)->delete();
        return redirect('admin/bills')->with('success','Delete Successfully');
    }

}
?>