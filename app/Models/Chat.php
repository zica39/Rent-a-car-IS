<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

  protected $guarded = ['id'];

  public static $message = 'Welcome, thank you for using our help services and any additional information is available 24/7';

  public function user(){
      return $this->belongsTo(User::class);
  }

}
