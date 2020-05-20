<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cate;
use Illuminate\Support\Str;

class CateController extends Controller
{
    public function index()
    {
        $data = Cate::all();
    	return view('admin.cate.index')->with('data', $data);
    }

    public function addCate(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|max:120|unique:cate|string'
            ]);
            $slug = Str::slug($request->name, '-');

            $cate = new Cate;
            $cate->name = $request->name;
            $cate->slug = $slug;
            $cate->save();
            return redirect('admin/cate')->with('success','Add success');
        }
    	return view('admin.cate.add');
    }

    public function showEditCate($id)
    {
        $data = Cate::find($id);
        return view('admin.cate.edit')->with('data', $data);
    }

    public function EditCate($id, Request $request)
    {
        $request->validate([
            'name' => 'required|max:120|string',
        ]);
        $cate = Cate::find($id);
        $slug = Str::slug($request->title, '-');

        $cate->name = $request->name;
        $cate->slug = $slug;
        $cate->save();

        return redirect('/admin/cate')->with('success','Update Successfully.');
    }

    public function DeleteCate($id)
    {
        Cate::destroy($id);
        return redirect('admin/cate')->with('success','Delete Successfully');
    }


}
?>