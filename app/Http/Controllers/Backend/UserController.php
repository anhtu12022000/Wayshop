<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class UserController extends Controller
{
	use HasRoles;

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function check()
    {
        if (Auth::user()->hasRole('Administrator')) {
            return redirect('404');
        }
    }

    public function index()
    {
        $this->check();
        $data = User::with('roles')->get();
        $role = Role::all();
    	return view('admin.users.index',compact('data','role'));
    }

    public function showEditUser($id)
    {
        $this->check();
        $obj = new Role;
        $data = User::with('roles')->find($id);
        $roles = $obj->getAllRoles();
    	return view('admin.users.edit')->with('data', $data)->with('roles', $roles);
    }

    public function EditUser($id, Request $request)
    {
        $this->check();
        $request->validate([
                'name' => 'required|max:50|string',
                'email' => 'required|string|email',
                'image' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
                'phone' => 'required|numeric',
                'address' => 'required|string',
        ]);
        $user = User::with('roles')->find($id);
        $slug = Str::slug($request->name, '-');
            if ($request->hasFile('image')) {
                if($user->image != '' && file_exists(public_path('front_assets/img/user/'.$user->image)))
                {
                    unlink(public_path('front_assets/img/user/'.$user->image));
                }
                $file = $request->image;
                //Lấy Tên files 
                $image =  $slug.'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/front_assets/img/user', $image);   
                $user->image = $image;         
            }


            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->status = $request->status;

            if (isset($request->roles)) {
                $user->removeRole($user->roles[0]->name);
                $user->assignRole($request->roles);
            }
            
            $user->save();

        return redirect('/admin/user')->with('success','Update Successfully.');
    }

    public function DeleteUser($id)
    {
        $this->check();
    	$user = User::with('roles')->find($id);
    	$user->removeRole($user['roles'][0]->name);
    	$user->delete();
        return redirect('/admin/user')->with('success','Delete Successfully.');
    }

    public function updateStatusUser(Request $request)
    {
        $this->check();
        $user = User::find($request->id);
        $user->status = $request->status;
         $user->save();
        return $user;
    }

    public function addRole(Request $request)
    {
        $this->check();
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|max:120|unique:roles|string',
            ]);
            $role = Role::create(['name' => $request->name]);
            if ($role) {
                return view('admin.role.add')->with('success', 'Add role Successfully!');
            } else {
                return view('admin.role.add')->with('danger', 'Add role not Success, Please try again!');
            }
        }
        return view('admin.role.add');
    }

    public function editRole(Request $request)
    {
        $this->check();
        $user = User::find($request->id);
        $remove = $user->removeRole($request->oldRole);
        $user->assignRole($request->newRole);
        return $user;
    }

}
