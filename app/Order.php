<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    //
    protected $fillable = ['amount'];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function matches()
    {

        if ($this->order_type == 'ph') {
            return  Match::where('phOrder_id', $this->id)->orderBy('created_at', 'desc')->get();
        }
        elseif ($this->order_type == 'gh') {
            return Match::where('ghOrder_id', $this->id)->orderBy('created_at', 'desc')->get();
        }
        return false;

    }


}
