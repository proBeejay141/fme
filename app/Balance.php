<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    //
    protected $fillable = ['confirmed_ph','ready_gh', 'bonus'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
