<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
<<<<<<< HEAD

class ContactController extends Controller
{
    //
}
=======
use App\Models\Contact;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function index()
    {
        $data = Contact::all();
    	return view('admin.contacts.index')->with('data', $data);
    }
    public function delete($id)
    {
        $contact = Contact::find($id)->delete();
        return redirect('admin/contacts')->with('success','Delete Successfully');
    }


}
?>
>>>>>>> e59803acfe42f79fc19d6243b2576c61c70c41ab
