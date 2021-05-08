<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function getMessages(Request $request){

        $data = Chat::query()->where('user_id',auth()->user()->id)->get();
        return $data->toJson();
    }

    public function getMessagesAdmin(Request $request){

        $data = Chat::query()->where('user_id',$request->user_id)->get();
        return $data->toJson();
    }

    public function getMessagesNotifications(Request $request){

        $data = Chat::query()->where('admin',false)->where('seen',false)->with('user')->get();
        return $data->toJson();
    }

    public function getMessagesNotificationsUser(Request $request){

        $data = Chat::query()
            ->where('user_id',$request->user_id)
            ->where('admin',true)
            ->where('seen',false);
        return $data->count();
    }

    public function getConversations(){
        /*$data = Chat::query()
            ->distinct('user_id')
            ->select('user_id','message','admin','seen','id')
            ->where('admin',false)
            ->with('user')->get();*/

        $data = [];
        $data1 = [];

        foreach(User::all() as $user){
            $user_first = Chat::query()->where('user_id',$user->id)->orderBy('created_at','desc')->with('user')->first();

            if(!$user_first)continue;
            $data[strtotime($user_first->created_at)] = $user_first;
        }
        krsort($data);

        foreach ($data as $el){
            $data1[]=$el;
        }

        return response()->json($data1);
    }

    public function setSeenMessages(Request $request){

        Chat::query()
            ->where('id','<=',$request->chat_id)
            ->where('admin',request('admin',1))
            ->where('user_id',$request->user_id)
        ->update(['seen'=>true]);

        return true;
    }

    public function sendMessage(Request $request){

        /*$request->validate([
            'user_id' => 'require|integer',
            'message' => 'require',
            'admin' => 'boolean'
        ]);*/

        $chat = new Chat();
        $chat->user_id = $request->user_id;
        $chat->message = $request->message;
        $chat->admin = $request->admin;

        $chat->save();

        return true;
    }
}
