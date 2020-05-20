<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Slides;
use App\Models\Product;

class DataController extends Controller
{

 	public function getAllPost()
 	{
 		$dataPosts = Posts::orderBy('created_at','desc')->limit(3)->get();
 		return $dataPosts;
 	}

 	public function getAllSlider()
 	{
 		$dataSlider = Slides::orderBy('created_at','desc')->limit(5)->get();
 		return $dataSlider;
 	}

 	public function getAllProduct()
 	{
 		$dataProduct = Product::orderBy('id','desc')->take(8)->get();
 		return $dataProduct;
 	}
}
