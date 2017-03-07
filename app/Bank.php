<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    //
    protected $fillable= [ 'user_id', 'acct_name', 'acct_number', 'bank_name'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
