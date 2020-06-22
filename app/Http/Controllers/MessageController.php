<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Jobs\SendMailJob;
use Carbon\Carbon;
use App\User;
use App\Mail\NewAds;
use Illuminate\Support\Str;

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

			$message->delivered = 'YES';
			$message->send_date = Carbon::now();
			$message->save();   

			$users = User::where('id', 23)->get();

			foreach($users as $user) {
				dispatch(new SendMailJob($user->email, new NewAds($user, $message)));
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

}
