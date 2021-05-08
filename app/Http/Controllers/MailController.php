<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\WelcomeMail;
use App\Models\MailService;
use App\Models\User;
use App\Notifications\MailServiceNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public function sendContactMail(Request $request){

        $request->validate([
            'email'=> 'required|email',
            'full_name'=>'required|string',
            'subject'=>'required|string',
            'message' => 'required'
        ]);

        /*Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail([
            'email'=>$request->email,
            'name' => $request->first_name . $request->last_name,
            'phone'=>$request->phone,
            'message'=>$request->message
        ]));*/

       $mail = MailService::create([
            'email'=>$request->email,
            'name' => $request->full_name,
            'phone'=>$request->phone,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'type' => 'inbox',
            'is_from' => true
        ]);

       $admins = User::query()->where('is_admin',true)->get();
       foreach ($admins as $admin){
           $admin->notify(new MailServiceNotification($mail));
       }

        return redirect()->back()->with('status','Your message has been sent successfully');
    }
}
