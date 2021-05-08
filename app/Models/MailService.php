<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MailService extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const PER_PAGE = 10;

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
