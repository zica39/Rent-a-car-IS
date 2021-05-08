<?php

namespace App\Listeners;

use App\Mail\WelcomeMail;
use App\Models\Chat;
use App\Models\User;
use App\Notifications\UserNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcome
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $admins = User::query()->where('is_admin',true)->get();
        foreach($admins as $admin){
            $admin->notify(new UserNotification($event->user->id,$event->user->name,'Registered new user'));
        }

        //Send welcome mail...
        //Mail::to($event->user->email)->send(new WelcomeMail($event->user->name));

        $chat = new Chat();
        $chat->admin = true;
        $chat->message = Chat::$message;
        $chat->user_id = $event->user->id;
        $chat->save();

    }
}
