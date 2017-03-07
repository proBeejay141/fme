<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Traits\VoyagerUser;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use VoyagerUser;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name', 'email', 'password',
        'gender', 'phone', 'state', 'city', 'referral'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function bonuses()
    {
       return $this->hasMany('App\Bonus');
    }

    public function mafros()
    {
        return $this->hasMany('App\Mafro');
    }

    public function bank()
    {
       return $this->hasOne('App\Bank');
    }

    public function balance()
    {
        return $this->hasOne('App\Balance');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function refferalAct($id)
    {
        $order = Order::where('user_id',$id)->where('order_type','ph')->get();
        if(count($order)>0)
            return 'Active';
        else
            return 'Not Active';
    }

    public function messages()
    {
       return $this->hasMany('App\Message');
    }

    public function setNameAttribute($value){
        $this->attributes['name'] = ucfirst($value);
    }
}
