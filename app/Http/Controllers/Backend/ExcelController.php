<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Excel;

class ExcelController extends Controller
{
    public function export(Request $request){
     	return Excel::download(new ExportController($request->from, $request->to), 'orders.xlsx');
	}
}
