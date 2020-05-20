<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slides;
use Illuminate\Support\Str;

class SlidesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = Slides::orderBy('created_at','desc')->get();
    	return view('admin.slides.index')->with('data', $data);
    }

    public function addSlides(Request $request)
    {
    	if ($request->isMethod('post')) {
            $request->validate([
                'title' => 'required|max:120|unique:slides|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            ]);
            $slides = new Slides;
            $slug = Str::slug($request->title, '-');
            if ($request->hasFile('image')) {
	            $file = $request->image;
	            //Lấy Tên files 
            	$image =  $slug.'.'.$file->getClientOriginalExtension();
            	$file->move(public_path().'/front_assets/img/slides', $image);     
            	$slides->image = $image;   	
        	}

            $slides->title = $request->title;
            $slides->slug = $slug;
            $slides->save();
            return back()->with('success','Add Successfully.');
        }
    	return view('admin.slides.add');
    }

    public function showEditSlides($id)
    {
        $data = Slides::find($id);
    	return view('admin.slides.edit')->with('data', $data);
    }

    public function EditSlides($id, Request $request)
    {
        $request->validate([
                'title' => 'required|max:120|string',
                'image' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        $slides = Slides::find($id);
        $slug = Str::slug($request->title, '-');
            if ($request->hasFile('image')) {
                if($slides->image != '' && file_exists(public_path('front_assets/img/slides/'.$slides->image)))
                {
                    unlink(public_path('front_assets/img/slides/'.$slides->image));
                } 
                $file = $request->image;
                //Lấy Tên files 
                $image =  $slug.'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/front_assets/img/slides', $image);   
                $slides->image = $image;        
        }

            $slides->title = $request->title;
            $slides->slug = $slug;
            $slides->save();

        return redirect('admin/slides')->with('success','Update Successfully.');
    }

    public function DeleteSlides($id)
    {
        $slides = Slides::find($id)->delete();
        if($slides->image != '' && file_exists(public_path('front_assets/img/slides/'.$slides->image)))
        {
            unlink(public_path('front_assets/img/slides/'.$slides->image));
        } 
        return redirect('/admin/slides')->with('success','Delete Successfully.');
    }
}
