<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chat;
use App\User;
use Carbon\Carbon;

class ChatController extends Controller
{
    // public function usersList (Request $request)
    // {
    //     $users = User::WhereNotIn('id', [$request->user_id])->get();
    //     return response()->json($users);
    // }

    public function usersList (Request $request)
    {
        $users = User::where('status_on', 1)->get();

        foreach ($users as $item) {
            $countadmin = Chat::where('sender_id', 1)->where('receiver_id', $item->id)->orderBy('created_at', 'desc')->limit(1)->get();
            $countuser = Chat::where('sender_id', $item->id)->orderBy('created_at', 'desc')->limit(1)->get();

            if (count($countadmin) > 0) {
                if ($countuser[0]->created_at > $countadmin[0]->created_at) {
                    $item->mess = $countuser[0]->message;
                    $item->key = 'user';
                    $item->time = Carbon::parse($countuser[0]->created_at)->format('Y-m-d H:i:s');
                } else {
                    $item->mess = $countadmin[0]->message;
                    $item->time = Carbon::parse($countadmin[0]->created_at)->format('Y-m-d H:i:s');
                }
            } 
        }

        return response()->json( $users );
    }

    public function userAuth (Request $request)
    {
    	$user = User::findOrfail($request->auth_id);
    	return response()->json($user);
    }

    public function adminChatList(Request $request)
    {
    	$chat_list = Chat::where(['sender_id' => $request->receiver_id, 'receiver_id' => $request->sender_id])->OrWhere('sender_id', $request->sender_id)->where('receiver_id', $request->receiver_id)->get();

    	return response()->json($chat_list);
    }

    public function userChatList(Request $request)
    {
        $chat_list = Chat::where('sender_id', $request->sender_id)->OrWhere('receiver_id', $request->sender_id)->get();

        return response()->json($chat_list);
    }

    public function sendMessage(Request $request)
    {

        $message = Chat::create([
            'sender_id' => $request->sender_id,
            'receiver_id' => $request->receiver_id,
            'send_from' => $request->send_from,
            'message' => $request->message
        ]);

        return response()->json($message);
    }
}
