<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Facades\Voyager;

class Match extends Model
{
    //
    use SoftDeletes;

    

    protected $fillable = ['status'];
    protected $dates = ['deleted_at'];

    public function mafro()
    {
        return $this->hasOne('App\Mafro');
    }

    public function timeOut()
    {
        $startTime = Carbon::parse($this->created_at);
        $endTime = Carbon::now();
        $time = Voyager::setting('phTimeOut') - $endTime->diffInSeconds($startTime);
        if ($time>0){
            return $time;
        }
        return false;
        //return 20;
    }

    public function getUser($id)
    {
        return User::find($id);
    }

}
