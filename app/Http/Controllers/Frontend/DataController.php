<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Posts;
use App\Models\Slides;
use App\Models\Product;
use App\Models\Cate;
use App\Models\Cart;
use Session;

class DataController extends Controller
{

 	public function getPost()
 	{
 		$dataPosts = Posts::orderBy('created_at','desc')->limit(3)->get();
 		return $dataPosts;
 	}

 	public function getSlider()
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
 		$dataProducts = Product::paginate(9);
 		return $dataProducts;
 	}

 	public function getAllCategory()
 	{
 		$dataCate = Cate::all();
 		return $dataCate;
 	}

 	public function productDetail($slug)
 	{
 		$proDtail = Product::where('slug','like',$slug)->first();
 		return $proDtail;
 	}

 	public function productRelated($id)
 	{
 		$productRelated = Product::where('id','>',$id)->get();
 		return $productRelated;
 	}

 	public function postDetail($slug)
 	{
 		$postDetail = Posts::where('slug','like',$slug)->first();
 		return $postDetail;
 	}

 	public function getAllPost()
 	{
 		$dataPosts = Posts::orderBy('created_at', 'desc')->paginate(6);
 		return $dataPosts;
 	}

 	public function getProductCate($slug)
 	{
 		$productCate = Cate::with('product')->where('slug','like',$slug)->paginate(9);
 		return $productCate;
 	}
}
