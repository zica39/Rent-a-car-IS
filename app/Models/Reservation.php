<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function retLocation(){
        return Location::find($this->return_location);
        //return $this->belongsTo(Location::class,'return_location');
    }

    public function puLocation(){
        return Location::find($this->pick_up_location);
        //return $this->belongsTo(Location::class,'pick_up_location');
    }

    public function accessories(){
        return $this->hasMany(ReservationAccessory::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function car(){
        return $this->belongsTo(Car::class);
    }

    public  function getAccessories(){
        $arr = [];
        foreach($this->accessories as $accessory){
            $arr[] = $accessory->accessory->name;
        }
        return json_encode($arr);
    }

    public function isActive():bool{
        return (strtotime($this->return_date)-strtotime(date('y-m-d')))> 0;
    }
    public function getStatus(){
        if((strtotime($this->return_date)-strtotime(date('y-m-d')))> 0){
            if((strtotime($this->pick_up_date)-strtotime(date('y-m-d')))<= 0)
                return 'Active';
            else
                return 'Incoming';
        }else
            return 'Past';
    }
}
