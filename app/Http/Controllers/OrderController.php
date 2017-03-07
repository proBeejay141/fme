<?php

namespace App\Http\Controllers;

use App\Match;
use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;

class OrderController extends Controller
{
    //
    public function postPhOrder(Request $request)
    {
        //$message = 'Order successfully placed';
        $order = new Order();
        switch ($request['package']){
            case 'classic' : {
                $order->amount = 10000;
                $order->balance = 10000;
                break;
            }
            case 'premium' : {
                $order->amount = 20000;
                $order->balance = 20000;
                break;
            }

            case 'ultimate' : {
                $order->amount = 50000;
                $order->balance = 50000;
                break;
            }
            case 'booster' : {
                $order->amount = 100000;
                $order->balance = 100000;
                break;
            }
            default:{
                return redirect()->route('dash_index')
                    ->with(['message'=>'Invalid Package']);
            }
        }
        $order->priority = 'normal';
        $order->order_type = 'ph';
        $order->status = "In progress";
        auth()->user()->orders()->save($order);
//        auth()->user()->level+= 1;
//        auth()->user()->update();
        //$order->save();
        return redirect()->route('dash_index');
    }

    public function postGhOrder(Request $request)
    {
        $this->validate($request,[
            'gh_amount'=>'required'
        ]);

         $balance = auth()->user()->balance->ready_gh;
        if ($balance>=$request['gh_amount']){
            $order = new Order();
            $remains = auth()->user()->balance->ready_gh - $request['gh_amount'];
            $order->amount = $request['gh_amount'];
            $order->balance = $request['gh_amount'];
            $order->order_type = 'gh';
            $order->priority='normal';
            $order->status = "In progress";
            auth()->user()->orders()->save($order);
            auth()->user()->balance()->update(['ready_gh'=>$remains]);
            return redirect()->route('dash_index');
        }
        return redirect()->back();
    }


}
