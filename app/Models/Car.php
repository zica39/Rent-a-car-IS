<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function class(){
        return $this->belongsTo(CarClass::class);
    }

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

    public function getPhoto($index = 0){
        $photos = explode(',',$this->photos);
        return  $photos[$index];
    }

    public function getPhotoCount():int{
        $photos = explode(',',$this->photos);
        return count($photos);
    }

    public function getPhotos(){
        return explode(',',$this->photos);
    }

    public function removePhotos(){
        $photos = $this->getPhotos();
        foreach($photos as $photo){
            unlink($photo);
        }
    }

    public function getRandomPhoto(){
        $rnd = rand(0,getPhotoCount());
        return $this->getPhoto($rnd);
    }
}
