<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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