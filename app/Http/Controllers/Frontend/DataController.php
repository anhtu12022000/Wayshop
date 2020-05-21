<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Slides;
use App\Models\Product;
use App\Models\Cate;


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

 	public function getProduct()
 	{
 		$dataProduct = Product::orderBy('id','desc')->take(8)->get();
 		return $dataProduct;
 	}

 	public function getAllProduct()
 	{
 		$dataProducts = Product::all();
 		return $dataProducts;
 	}

 	public function getAllCategory()
 	{
 		$dataCate = Cate::all();
 		return $dataCate;
 	}

 	public function productDetail($id)
 	{
 		$proDtail = Product::find($id);
 		return $proDtail;
 	}

 	public function productRelated($id)
 	{
 		$productRelated = Product::where('id','>',$id)->get();
 		return $productRelated;
 	}

 	public function postDetail($slug)
 	{
 		$postDetail = Posts::where('slug',$slug)->first();
 		return $postDetail;
 	}
}
