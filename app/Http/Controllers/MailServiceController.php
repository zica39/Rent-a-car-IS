<?php

namespace App\Http\Controllers;

use App\Models\MailService;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current = null;
        $type = request('type','inbox');

        if(request('nid')){
            $notification =  auth()->user()->unreadNotifications()->where('id', request('nid'));
            if($notification)$notification->delete();

        }
        if(request('show')) {
            $current = MailService::findOrFail(request('show'));
            if($current->read == false) {
                $current->read = true;
                $current->save();

                foreach(auth()->user()->unreadNotifications()->where('type', 'App\Notifications\MailServiceNotification')->take(10)->get() as $notification){
                    if($notification->data['id'] == $current->id){
                        $notification->delete();
                        break;
                    }
                }
            }

            if($type=='drafts'){
                return  redirect('/email/create')->withInput([
                    'to' =>$current->email,
                    'subject'=>$current->subject,
                    'message'=>$current->message,
                    'create' => true,
                    'id'=>$current->id
                ]);
            }
        }

        if($type=='important'){
            $mails = MailService::query()->where('is_important',true)->when(request('q'),function ($query){
                $query->whereRaw("email like '%?%' OR subject like'%?%' OR message like'%?%'",
                    [request('q'),request('q'),request('q')]);

            })->orderBy('created_at','desc')->paginate(MailService::PER_PAGE)->withQueryString();
        }else{
            $mails = MailService::query()->where('type',$type)->orderBy('created_at','desc')->when(request('q'),function ($query){
                $query->whereRaw("email like ? OR subject like ? OR message like ?",
                    ['%'.strtolower(request('q')).'%','%'.strtolower(request('q')).'%','%'.strtolower(request('q')).'%']);

            })->paginate(MailService::PER_PAGE)->withQueryString();
        }

        $unread  = MailService::query()->where('type','inbox')->where('read',false)->count();
        $content = 'index';

        return view('email',compact('type','mails','unread','content','current'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unread  = MailService::query()->where('type','inbox')->where('read',false)->count();
        $content = 'create';

        return view('email',compact('unread','content'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'to'=>'required|email',
            'subject' =>'required',
            'message' => 'required'
        ]);

        if($request->drafts){

            MailService::create([
                'email'=>$request->to,
                'name' => substr($request->to,0,strpos($request->to,'@')),
                'phone'=>$request->phone,
                'subject'=>$request->subject,
                'message'=>$request->message,
                'type' => 'drafts',
                'is_from' => false,
                'read' => true
            ]);

            return redirect('/email?type=drafts');

        }

       /* Mail::to($request->to)->send(new ContactMail([
            'email'=>$request->email,
            'name' => $request->first_name . $request->last_name,
            'phone'=>$request->phone,
            'message'=>$request->message
        ]));*/

        MailService::create([
            'email'=>$request->to,
            'name' => substr($request->to,0,strpos($request->to,'@')),
            'phone'=>$request->phone,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'type' => 'sent',
            'is_from' => false,
            'read' => true
        ]);

        return redirect('/email?type=sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MailService  $mailService
     * @return \Illuminate\Http\Response
     */
    public function show(MailService $mailService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MailService  $mailService
     * @return \Illuminate\Http\Response
     */
    public function edit(MailService $mailService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MailService  $mailService
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $mailService = MailService::find($id);

        if(request('delete')) {
            if($mailService->type != 'trash') {
                $mailService->last_type = $mailService->type;
                $mailService->type = 'trash';
                $mailService->is_important = false;
                $mailService->save();
            }
            else{
                $mailService->delete();
            }
        }

        if(request('restore')){
            $mailService->type = $mailService->last_type;
            $mailService->last_type = '';
            $mailService->save();
        }

        if(request('important')){
            $mailService->is_important = !$mailService->is_important;
            $mailService->save();

            return redirect()->back();
        }

        return redirect('/email?type='.request('type'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MailService  $mailService
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MailService::findOrfail($id)->delete();
        return redirect('/email?type=drafts');
    }
}
