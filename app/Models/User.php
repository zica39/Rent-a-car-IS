<?php

namespace App\Models;

use DateTime;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'country_id',
        'notes',
        'phone_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function  getCountryNameAttribute(){
            return $this->country->name;
    }
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
    public function chats(){
        return $this->hasMany(Chat::class);
    }
    function getFirstReservationAttribute(){
        return Reservation::query()->where('user_id',$this->id)->orderBy('pick_up_date', 'asc')->get()->first()->pick_up_date??'-';
    }
    function getLastReservationAttribute(){
        return Reservation::query()->where('user_id',$this->id)->orderBy('pick_up_date', 'desc')->get()->first()->pick_up_date??'-';
    }
    function getTotalReservationsCount(){
        return $this->reservations()->count();
    }
    function getActiveReservationsCount(){
        return $this->reservations()->where('return_date','>',date('y-m-d'))->count();
    }
    function getPastReservationsCount(){
        return $this->getTotalReservationsCount() - $this->getActiveReservationsCount();
    }
    function getIncomingReservationsCount(){
        return $this->reservations()->where('pick_up_date','>',date('y-m-d'))->count();
    }

    public function getPastTime(){

        $time1 = new DateTime($this->created_at);
        $time2 = new DateTime('NOW');
        $timediff = $time1->diff($time2);

        $sec = $timediff->s;
        $min = $timediff->i;
        $hours =  $timediff->h;
        $days =  $timediff->d;
        $month =  $timediff->m;
        $year =  $timediff->y;

        if($sec && !$min && !$hours && !$days && !$month && !$year) return $sec.' seconds';
        if($sec && $min && !$hours && !$days && !$month && !$year) return $min.' minutes';
        if($sec && $min && $hours && !$days && !$month && !$year) return $hours.' hours';
        if($sec && $min && $hours && $days && !$month && !$year) return $days.' days';
        if($sec && $min && $hours && $days && $month && !$year) return $month.' months';
        if($sec && $min && $hours && $days && $month && $year) return $sec.' years';

    }

}
