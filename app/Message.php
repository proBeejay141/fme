<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $fillable  = ['user_id', 'receiver_id', 'message','upload','status'];

    public function user()
    {
      return  $this->belongsTo('App\User');
    }
}
