<?php

namespace App\Http\Controllers\Auth;

use App\Bank;
use App\User;
//use TCG\Voyager\Voyager;
use TCG\Voyager\Facades\Voyager;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'gender' => 'required',
            'phone' => 'required',
            'state' => 'required',
            'city' => 'required',
            'acct_name' => 'required',
            'referral'  => 'exists:users,email',
            'acct_number' => 'required|unique:banks',
            'bank_name' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
         $user = User::create([
            'name' => $data['name'],
            'gender' => $data['gender'],
            'phone' => $data['phone'],
            'state' => $data['state'],
            'city' => $data['city'],
            'referral'=> $data['referral'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
        $user->bank()->updateOrCreate([
            'acct_name'=>$data['acct_name'],
            'acct_number'=>$data['acct_number'],
            'bank_name'=>$data['bank_name']]);

        $user->balance()->updateOrCreate([
            'confirmed_ph'=>'0',
            'ready_gh'=>'0',
            'bonus'=>'500'
        ]);
        
        $user->bonuses()->updateOrCreate([
            'amount'=> Voyager::setting('signupBonus'),
            'for'=>'Signup Bonus'
        ]);

        return $user;

    }
}
