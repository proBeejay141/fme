<?php

namespace App\Http\Controllers;

use App\Balance;
use App\Bank;
use App\Bonus;
use App\Match;
use App\Message;
use App\Neww;
use App\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class FmeoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth','admin.user']);
    }

    public function getShowUser($id)
    {
        $user = User::withTrashed()->findOrFail($id);

        return view('fmeo.showUser')->with(['user'=>$user,'id'=>$id]);
    }

    public function getPhOrder($id)
    {
        $ph_orders = Order::withTrashed()->where('order_type','ph')->where('user_id',$id)->orderBy('created_at','desc')->get();
        return view('fmeo.showPh')->with(['ph_orders'=>$ph_orders,'id'=>$id]);
    }
    public function getGhOrder($id)
    {
        $gh_orders = Order::where('order_type','gh')->where('user_id',$id)->orderBy('created_at','desc')->get();
        return view('fmeo.showGh')->with(['gh_orders'=>$gh_orders,'id'=>$id]);
    }

    public function getBalance($id)
    {
        $balance = Balance::where('user_id',$id)->first();
        return view('fmeo.showBalance')->with(['balance'=>$balance,'id'=>$id]);
    }
    public function getBonus($id)
    {
        $bonuses = Bonus::where('user_id',$id)->orderBy('created_at','desc')->get();
        return view('fmeo.bonus')->with(['bonuses'=>$bonuses,'id'=>$id]);
    }
    public function getRefferal($id)
    {
        $user = User::findOrFail($id);
        $refferal = User::where('referral',$user->email)->orderBy('created_at','desc')->get();
        return view('fmeo.refferal')->with(['refferal'=>$refferal,'id'=>$id]);
    }

    public function getTrashed()
    {
        $users = User::onlyTrashed()->get();
//            $users = User::all();
        return view('fmeo.trashUser',compact('users'));
    }

    public function postTrashOpt(Request $request){
        $this->validate($request,[
            'id'=>'required',
            'opt'=>'required'
        ]);
        if ($request['opt'] == 'delete'){
            $user = User::onlyTrashed()->findOrFail($request['id']);
            foreach ($user->orders() as $order){
               $order->forceDelete();
            }
            foreach ($user->bonuses() as $bonus){
               $bonus->forceDelete();
            }
            $user->balance()->delete();

            $user->forceDelete();
        }
        elseif($request['opt'] == 'restore')
        {
            $user = User::onlyTrashed()->findOrFail($request['id']);
            $user->restore();
            $orders = Order::onlyTrashed()->where('order_type','ph')->where('user_id',$request['id'])->get();
            if(count($orders)> 0){
                foreach ($orders as $order){
                   $order->restore();
                }
            }

        }
        return redirect()->route('admin.show-trashed-user');
    }

    public function postPhOpt(Request $request){
        $this->validate($request,[
            'id'=>'required',
            'opt'=>'required'
        ]);
        if ($request['opt'] == 'delete'){
            $order = Order::findOrFail($request['id']);
            $order->forceDelete();
        }
        elseif($request['opt'] == 'restore')
        {
            $order = Order::onlyTrashed()->findOrFail($request['id']);
            $order->restore();

        }
        elseif($request['opt'] == 'switch')
        {
            $order = Order::findOrFail($request['id']);
            if ($order->priority == 'normal'){
                $order->priority = 'high';
                $order->save();
            }

            elseif($order->priority == 'high'){
                $order->priority = 'normal';
                $order->save();
            }

        }

        return redirect()->route('admin.show-ph',$order->user->id);
    }

    public function postGhOpt(Request $request){
        $this->validate($request,[
            'id'=>'required',
            'opt'=>'required'
        ]);
        if ($request['opt'] == 'delete'){
            $order = Order::findOrFail($request['id']);
            $user = $order->user;
            $balance = Balance::find($user->balance->id);
            $balance->ready_gh= $balance->ready_gh + $order->balance;
            $balance->save();
            $order->forceDelete();
        }
        elseif($request['opt'] == 'restore')
        {
            $order = Order::onlyTrashed()->findOrFail($request['id']);
            $order->restore();

        }
        elseif($request['opt'] == 'switch')
        {
            $order = Order::findOrFail($request['id']);
            if ($order->priority == 'normal'){
                $order->priority = 'high';
                $order->save();
            }

            elseif($order->priority == 'high'){
                $order->priority = 'normal';
                $order->save();
            }


        }

        return redirect()->route('admin.show-gh',$order->user->id);
    }

    public function postBalance(Request $request)
    {
        $this->validate($request,[
           'confirmed_ph'=>'required',
            'ready_gh'=>'required',
            'bonus'=>'required'
        ]);
        $balance = Balance::findOrFail($request['id']);
        $balance->confirmed_ph = $request['confirmed_ph'];
        $balance->ready_gh = $request['ready_gh'];
        $balance->bonus = $request['bonus'];
        $balance->save();
        return redirect()->route('admin.show-balance',$balance->user_id);
    }

    public function postEditDetail(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'gender' => 'required',
            'phone' => 'required',
            'state' => 'required',
            'city' => 'required',
        ]);
        $user = User::withTrashed()->findOrFail($request['user_id']);
        $user->name = $request['name'];
        $user->gender = $request['gender'];
        $user->phone = $request['phone'];
        $user->state = $request['state'];
        $user->city = $request['city'];
        $user->email = $request['email'];

        $user->save();
        return redirect()->route('admin.show-user',$request['user_id']);
    }

    public function postEditBank(Request $request)
    {
        $this->validate($request,[
            'acct_name' => 'required',
            'acct_number' => 'required',
            'bank_name' => 'required'
        ]);
        $bank = Bank::findOrFail($request['user_id']);
        $bank->acct_name = $request['acct_name'];
        $bank->acct_number = $request['acct_number'];
        $bank->bank_name = $request['bank_name'];
        $bank->save();
        return redirect()->route('admin.show-user',$bank->user_id);
    }

    public function getSupport()
    {
        $users= collect([]);
        $messages = Message::where('status',0)->where('receive_id',auth()->user()->id)->get();

        foreach ($messages as $message)
        {
            if (!$users->contains('id',$message->user->id)){
                $users[] = $message->user;
            }
        }
        return view('fmeo.support',compact('users'));
    }

    public function getMessage($id)
    {
        $mess = Message::where('user_id',$id)->orderBy('created_at','asc')->get();
        foreach ($mess as $mes){
            $mes->status = 1;
            $mes->save();
        }
        return view('partial.message')->with(['mess'=>$mess,'id'=>$id]);
    }

    public function PostMessage(Request $request)
    {
        $this->validate($request,[
            'id'=>'required',
            'message'=>'required'
        ]);
        $mess = new Message();
        $mess->receive_id =$request['id'];
        $mess->user_id = $request['id'];
        $mess->message = $request['message'];
        $mess->status = 1;
        $mess->save();
        return redirect()->route('admin.show-support');
    }

    public function getPhMatch($id)
    {

        $matches = Match::where('phOrder_id',$id)->get();

        return view('fmeo.showPhMatch',compact('matches'));
    }
    public function getGhMatch($id)
    {

        $matches = Match::where('ghOrder_id',$id)->get();

        return view('fmeo.showGhMatch',compact('matches'));
    }

    public function getPhStat()
    {
        $orders = Order::where('order_type','ph')->where('created_at','^',Carbon::today())->get();
        return view('fmeo.phStat',compact('orders'));
    }
    public function getGhStat()
    {
        $orders = Order::where('order_type','gh')->where('created_at','^',Carbon::today())->get();
        return view('fmeo.ghStat',compact('orders'));
    }

    public function getNews()
    {
        $news = Neww::orderBy('created_at','desc')->get();
        return view('fmeo.news',compact('news'));
    }

    public function postNews(Request $request)
    {
        $this->validate($request,[
           'title'=>'required',
            'message'=>'required'
        ]);
        $news = new Neww();
        $news->title = $request['title'];
        $news->message = $request['message'];
        $news->save();
        return redirect()->route('admin.get-news');
    }
    public function deleteNews($id)
    {
        $new = Neww::find('id');
        $new->delete();
        return redirect()->route('admin.get-news');
    }
}
