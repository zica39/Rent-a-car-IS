<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    static function run()
    {
        foreach(User::all() as $user){

            if($user->is_admin)continue;

            $chat = new Chat();
            $chat->admin = true;
            $chat->message = Chat::$message;
            $chat->user_id = $user->id;
            $chat->save();
        }
    }
}
