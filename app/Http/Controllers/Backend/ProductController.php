<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cate;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
    	return view('admin.products.index')->with('data', $data);
    }

    public function addProduct(Request $request)
    {
        $data = Array(
            'Cate' => Cate::all()
        );
    	if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|max:120|unique:products|string',
                'description' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
                'price' => 'required|min:1',
                'detail' => 'required|string',
                'quantity' => 'required|min:1' 
            ]);
            $slug = Str::slug($request->name, '-');
            if ($request->hasFile('image')) {
	            $file = $request->image;
	            //Lấy Tên files 
            	$image =  $slug.'.'.$file->getClientOriginalExtension();
            	$file->move(public_path().'/front_assets/img/product', $image);        	
        	}

            $product = new Products;
            $product->name = $request->name;
            $product->slug = $slug;
            $product->description = $request->description;
            $product->image = $image;
            $product->imageDetail = "";
            $product->price = $request->price;
            $product->sale = $request->sale;
            $product->detail = $request->detail;
            $product->quantity = $request->quantity;
            $product->status = 1;
            $product->slide_id = "";
            $product->cate_id = $request->cate_id;
            $product->save();
            return redirect('admin/products')->with('success','Created Successfully.');
        }
    	return view('admin.products.add')->with('data',$data);
    }

    public function showEditProduct($id)
    {
        $data = Array(
            'Cate' => Cate::all(),
            'Product' => Product::find($id)
        );
    	return view('admin.products.edit')->with('data', $data);
    }

    public function EditProduct($id, Request $request)
    {
        $request->validate([
            'name' => 'required|max:120|unique:products|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'price' => 'required|min:1',
            'detail' => 'required|string',
            'quantity' => 'required|min:1' 
        ]);
        $product = Product::find($id);
        $slug = Str::slug($request->title, '-');
            if ($request->hasFile('image')) {
                if($product->image != '' && file_exists(public_path('front_assets/img/product/'.$product->image)))
                {
                    unlink(public_path('front_assets/img/product/'.$product->image));
                }
                $file = $request->image;
                //Lấy Tên files 
                $image =  $slug.'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/front_assets/img/product', $image);   
                $product->image = $image;         
        }
            $product->slug = $slug;
            $product->description = $request->description;
            $product->imageDetail = "";
            $product->price = $request->price;
            $product->sale = $request->sale;
            $product->detail = $request->detail;
            $product->quantity = $request->quantity;
            $product->status = 1;
            $product->slide_id = "";
            $product->cate_id = $request->cate_id;
            $product->save();

        return redirect('admin/products')->with('success','Update Successfully.');
    }

    public function DeleteProduct($id)
    {
        $product = Product::find($id)->delete();
        if($product->image != '' && file_exists(public_path('front_assets/img/product/'.$product->image)))
        {
            unlink(public_path('front_assets/img/product/'.$product->image));
        }
        return redirect('admin/products')->with('success','Delete Successfully.');
    }

    public function updateStatusProduct(Request $request)
    {
        $data = $request->all();
        $mess = Product::where('id','=',$data['id'])->update(['status' => $data['status']]);
        return $mess;
    }
}