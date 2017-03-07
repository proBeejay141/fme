<?php

namespace App\Http\Controllers;

use App\Balance;
use App\Bonus;
use App\Match;
use App\Order;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;

class DashboardController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $news = \App\Neww::orderBy('created_at','desc')->take(4)->get();

        $bal = Balance::where('user_id',auth()->user()->id)->first();
        if ($bal->bonus>=5000 && $bal->bonus<10000){
            $bal->ready_gh+= 5000;
            $bal->bonus-= 5000;
            $bal->save();

        }elseif ($bal->bonus>=10000 && $bal->bonus<20000){
            $bal->ready_gh+= 10000;
            $bal->bonus-= 10000;
            $bal->save();
        }elseif ($bal->bonus>=20000 && $bal->bonus<50000){
            $bal->ready_gh+= 20000;
            $bal->bonus-= 20000;
            $bal->save();
        }elseif ($bal->bonus>=50000){
            $bal->ready_gh+= 50000;
            $bal->bonus-= 50000;
            $bal->save();
        }

        $orders = Order::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->get();

        return view('dashboard')->with(['orders'=>$orders,'news'=>$news]);
    }

    public function getMatch(Request $request){
        $user = User::find($request['id']);
        $order_type = $request['order'];
        return view('partial.match_details',compact(['user','order_type']));
    }

    public function getMatchName($id)
    {
        $name = User::find($id)->name;
         return new Response($name);
    }

    public function getUserProfile()
    {
        return view('user.profile');
    }

    public function postProfileEdit(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'password' => 'min:6|confirmed',
            'gender' => 'required',
            'phone' => 'required',
            'state' => 'required',
            'city' => 'required',
        ]);
        $user = auth()->user();
        $user->name = $request['name'];
        $user->gender = $request['gender'];
        $user->phone = $request['phone'];
        $user->state = $request['state'];
        $user->city = $request['city'];
        if ($request['password'] != ''){
            $user->password = bcrypt($request['password']);
        }
        $user->save();
        return redirect()->route('profile');
    }

    public function getPhHistory()
    {
        $orders = Order::where('user_id',auth()->user()->id)->where('order_type','ph')->where('status','Completed')->orderBy('created_at','desc')->get();
        return view('user.ph-history',compact('orders'));
    }
    public function getGhHistory()
    {
        $orders = Order::where('user_id',auth()->user()->id)->where('order_type','gh')->where('status','Completed')->orderBy('created_at','desc')->get();
        return view('user.gh-history',compact('orders'));
    }

    public function getBonus()
    {
        $bonuses = Bonus::where('user_id',auth()->user()->id)->get();
        return view('user.bonus',compact('bonuses'));
    }

    public function getReferral()
    {
        $refferal = User::where('referral',auth()->user()->email)->orderBy('created_at','desc')->get();
        return view('user.referral',compact('refferal'));
    }

}
