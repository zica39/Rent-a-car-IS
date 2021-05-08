<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Country;
use App\Models\Reservation;
use App\Models\ReservationAccessory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('users',['users'=>User::all(),'content'=>'index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users',['countries'=>Country::all(),'content'=>'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

       User::query()->create([
           'name'=>$request->name,
           'email'=>$request->email,
           'password'=>Hash::make( Str::random(8)),
           'country_id' => $request->country,
           'phone_number' => $request->phone,
           'notes' => $request->notes
       ]);


       return  redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Request $request)
    {
        if($request->nid)auth()->user()->unreadNotifications()->where('id',$request->nid)->delete();

        return view('users',['user'=>$user,'content'=>'show']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users',['user'=>$user,'countries'=>Country::all(),'content'=>'edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {

        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'country_id' => $request->country,
            'phone_number' => $request->phone,
            'notes' => $request->notes
        ]);


        return  redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->is_admin)abort(403);


            foreach($user->reservations as $reservation){
                $reservation->accessories()->delete();
            }

            $user->reservations()->delete();
            $user->chats()->delete();

            auth()->user()->unreadNotifications()
            ->where('type', 'App\Notifications\UserNotification')
            ->where('id',$user->id)
            ->delete();

            $user->delete();



        return redirect('/user');
    }
}
