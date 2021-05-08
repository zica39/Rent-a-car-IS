<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationAccessory extends Model
{
    use HasFactory;

    protected  $table = 'reservations_accessories';
    protected $guarded = [];

    public function accessory(){
        return $this->belongsTo(Accessory::class);
    }
}
