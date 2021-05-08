<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class apiController extends Controller
{
    public function testReservation(Request $request){
        $result = Reservation::query()
            ->where('car_id',$request->car)
             ->whereRaw(
                     '(pick_up_date <= ? and return_date >= ?)',
                     [$request->return_date,$request->pickup_date]
             );

        if($result->count()){
            return true;
        }

        return false;
    }
}
