<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bill;
use Illuminate\Support\Str;

class BillController extends Controller
{
    public function index()
    {
        $data = Bill::all();
    	return view('admin.bills.index')->with('data', $data);
    }
    public function delete($id)
    {
        $bill = Bill::find($id)->delete();
        return redirect('admin/bills')->with('success','Delete Successfully');
    }


}
?>