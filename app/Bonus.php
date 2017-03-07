<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    protected $fillable = ['amount','for'];
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
