<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;

class Mafro extends Model
{
    //
    protected $fillable =[ 'user_id', 'match_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function match(){
        return $this->belongsTo('App\Match');
    }

    public function time()
    {

        $startTime = Carbon::parse($this->created_at);
        $endTime = Carbon::now();
        $time = $endTime->diffInSeconds($startTime);
        if ($time>=Voyager::setting('phMatureTime')){
            return true;
        }

        return false;

    }
}
