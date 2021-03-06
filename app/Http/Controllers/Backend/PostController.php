<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\PostComment;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = Posts::orderBy('created_at', 'desc')->get();
    	return view('admin.posts.index')->with('data', $data);
    }

    public function addPost(Request $request)
    {
    	if ($request->isMethod('post')) {
            $request->validate([
                'title' => 'required|max:120|unique:posts|string',
                'description' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
                'body' => 'required'
            ]);
            $slug = Str::slug($request->title, '-');
            if ($request->hasFile('image')) {
	            $file = $request->image;
	            //Lấy Tên files 
            	$image =  $slug.'.'.$file->getClientOriginalExtension();
            	$file->move(public_path().'/front_assets/img/post', $image);        	
        	}

            $post = new Posts;
            $post->title = $request->title;
            $post->slug = $slug;
            $post->description = $request->description;
            $post->image = $image;
            $post->body = $request->body;
            $post->save();
            return back()->with('success','Add Successfully.');
        }
    	return view('admin.posts.add');
    }

    public function showEditPost($id)
    {
        $data = Posts::find($id);
    	return view('admin.posts.edit')->with('data', $data);
    }

    public function EditPost($id, Request $request)
    {
        $request->validate([
                'title' => 'required|max:120|string',
                'description' => 'required|string',
                'image' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
                'body' => 'required'
        ]);
        $post = Posts::find($id);
        $slug = Str::slug($request->title, '-');
            if ($request->hasFile('image')) {
                if($post->image != '' && file_exists(public_path('front_assets/img/post/'.$post->image)))
                {
                    unlink(public_path('front_assets/img/post/'.$post->image));
                }
                $file = $request->image;
                //Lấy Tên files 
                $image =  $slug.'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/front_assets/img/post', $image);   
                $post->image = $image;         
            }
            $post->title = $request->title;
            $post->slug = $slug;
            $post->description = $request->description;
            $post->body = $request->body;
            $post->save();

        return redirect('/admin/post')->with('success','Update Successfully.');
    }

    public function DeletePost($id)
    {
        Posts::find($id)->delete();
        return redirect('/admin/post')->with('success','Delete Successfully.');
    }

    public function viewComment($id)
    {
       $data = PostComment::where('post_id', $id)->paginate(15);
       return view('admin.posts.comment')->with('data', $data);
    }

    public function delComment($id)
    {
        PostComment::find($id)->delete();
        return back()->with('success', 'Delete Comment Successfully.');
    }
}
