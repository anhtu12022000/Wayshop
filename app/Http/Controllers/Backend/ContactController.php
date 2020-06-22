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

    public function sendContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:6',
            'email' => 'required|email',
            'title' => 'required|string|min:6',
            'body' => 'required|min:6'
        ]);

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->title = $request->title;
        $contact->body = $request->body;
        $contact->save();
        return redirect()->with('success','Gửi thành công.');
    }

    public function emailAds()
    {
        return view('admin.contacts.emailads');
    }

}
?>
