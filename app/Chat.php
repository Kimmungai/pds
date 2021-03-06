<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
  public function User()
  {
    return $this->belongsTo('App\User');
  }
  public function chatMessages()
  {
    return $this->hasMany('App\chatMessage');
  }
}
