<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupons;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Auth;

class CouponsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $data = Coupons::orderBy('created_at','desc')->get();
    	return view('admin.coupons.index')->with('data', $data);
    }

    public function addCoupons(Request $request)
    {
        
    	if ($request->isMethod('post')) {
            $request->validate([
                'coupon_code' => 'required|max:30|unique:coupons|string',
                'amount' => 'required',
                'expiry_date' => 'required'
            ]);
            $coupons = new Coupons;
            $coupons->coupon_code = $request->coupon_code;
            $coupons->amount = $request->amount;
            $coupons->amount_type = $request->amount_type;
            $coupons->expiry_date = $request->expiry_date;
            $coupons->save();
            return back()->with('success','Add Successfully.');
        }
    	return view('admin.coupons.add');
    }

    public function showEditCoupons($id)
    {
         
        $data = Coupons::find($id);
    	return view('admin.coupons.edit')->with('data', $data);
    }

    public function EditCoupons($id, Request $request)
    {
         
        $request->validate([
                'coupon_code' => 'required|max:30|string',
                'amount' => 'required',
                'expiry_date' => 'required'
            ]);

            $coupons = Coupons::find($id);
            $coupons->coupon_code = $request->coupon_code;
            $coupons->amount = $request->amount;
            $coupons->amount_type = $request->amount_type;
            $coupons->expiry_date = $request->expiry_date;
            $coupons->save();

        return redirect('admin/coupons')->with('success','Update Successfully.');
    }

    public function DeleteCoupons($id)
    {
         
        $Coupons = Coupons::find($id)->delete();
        return redirect('/admin/coupons')->with('success','Delete Successfully.');
    }

    public function updateStatusCoupons(Request $request)
    {
         
        $coupons = Coupons::find($request->id);
        $coupons->status = $request->status;
         $coupons->save();
        return $coupons;
    }
}
