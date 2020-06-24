<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Jobs\SendMailJob;
use Carbon\Carbon;
use App\User;
use App\Mail\NewAds;
use App\Mail\Contact;
use Illuminate\Support\Str;
use App\Models\Coupons;

class MessageController extends Controller
{
	public function getUsers(){

		return User::all();
	}

	public function getMessages(){

		return Message::orderBy('created_at', 'desc')->get();
	}

	public function sendMail(Request $request)
	{
		$message = new Message();
		$message->title = $request->title;
		$message->body = $request->body;
		$slug = Str::slug($request->title, '-');
            if ($request->hasFile('photo')) {
	            $file = $request->photo;
            	$photo =  $slug.'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/admin_assets/dist/img/', $photo); 
                $message->photo = $photo;       	
        	}
		$message->save();

		if($request->item == "now") {
			$coupons = Coupons::where('status', 1)->limit(20)->get();
			$message->delivered = 'YES';
			$message->send_date = Carbon::now();
			$message->save();   

			$users = User::where('id', 23)->get();

			foreach($users as $user) {
				dispatch(new SendMailJob($user->email, new NewAds($user, $message, $coupons)));
			}

			return response()->json('Mail sent.', 201);

		} else { 

			$message->date_string = date("Y-m-d H:i", strtotime($request->send_date));

			$message->save();   

			return response()->json('Notification will be sent later.', 201);
		}
	}

	public function delMessages($id)
	{
		$mess = Message::find($id);	
		if($mess->photo != '' && file_exists(public_path('admin_assets/dist/img/'.$mess->photo)))
        {
            unlink(public_path('admin_assets/dist/img/'.$mess->photo));
        } 
        $mess->delete();
		return response()->json('Delete Success.', 200);
	}

	public function resendMail(Request $request)
	{
		$user = User::where('email', $request->email)->first();
		dispatch(new SendMailJob($request->email, new Contact($user, $request->email, $request->content)));

		return response()->json('Mail Sending Successfully.', 200); 
	}

}
