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
use App\Models\PostComment;
use App\Models\ProductComment;
use Session;

class DataController extends Controller
{

 	public function getPost()
 	{
 		$dataPosts = Posts::orderBy('created_at','desc')->limit(3)->get();
 		return $dataPosts;
 	}

 	public function getPro()
 	{
 		$dataPro = Product::orderBy('created_at','desc')->where('quantity', '>',  0)->where('status', 1)->limit(3)->get();
 		return $dataPro;
 	}

 	public function getSlider()
 	{
 		$dataSlider = Slides::orderBy('created_at','desc')->limit(5)->get();
 		return $dataSlider;
 	}

 	public function getProductMen()
 	{
 		$dataProductMen = Cate::with('product')->orderBy('created_at','desc')->where('slug', 'men-fashion')->limit(8)->get();
 		return $dataProductMen;
 	}

 	public function getProductWomen()
 	{
 		$dataProductMen = Cate::with('product')->orderBy('created_at','desc')->where('slug', 'women-fashion')->limit(8)->get();
 		return $dataProductMen;
 	}

 	public function getProductKids()
 	{
 		$dataProductMen = Cate::with('product')->orderBy('created_at','desc')->where('slug', 'for-kids')->limit(8)->get();
 		return $dataProductMen;
 	}

 	public function getProductBags()
 	{
 		$dataProductBags = Cate::with('product')->orderBy('created_at','desc')->where('slug', 'for-bags')->limit(8)->get();
 		return $dataProductBags;
 	}

 	public function getpopularProducts()
 	{
 		$dataProducts = Product::inRandomOrder()->orderBy('created_at','desc')->limit(4)->get();
 		return $dataProducts;
 	}

 	public function getfeaturedProducts()
 	{
 		$dataProducts = Product::inRandomOrder()->orderBy('created_at','desc')->limit(4)->get();
 		return $dataProducts;
 	}

 	public function getLatestProducts()
 	{
 		$dataProducts = Product::orderBy('created_at','desc')->limit(4)->get();
 		return $dataProducts;
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

 	public function productComments($id)
 	{
 		$ProductComments = ProductComment::where('product_id', $id)->paginate(5);
 		return $ProductComments;
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

 	public function PostComments($id)
 	{
 		$PostComments = PostComment::where('post_id', $id)->paginate(5);
 		return $PostComments;
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

 	public function getProductSlide($slug)
 	{
 		$productSlides = Slides::with('product')->where('slug','like',$slug)->paginate(9);
 		return $productSlides;
 	}
}
