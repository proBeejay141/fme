<?php

namespace App\Console\Commands;

use App\Order;
use App\Match;
use App\User;
use Illuminate\Console\Command;
use TCG\Voyager\Facades\Voyager;

class matchUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'match:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to match user"s order';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if(Voyager::setting('matching')==1)
        {
        //
        //$ph_orders  = Order::where('balance','>', 0)->orderBy('created_at','asc')->get();
        $gh_orders = Order::where('order_type','gh')->where('balance','>', 0)->where('priority','high')->get();
        if (count($gh_orders)==0){
            $gh_orders = Order::where('order_type','gh')->where('balance','>', 0)->orderBy('created_at','asc')->get();
        }
        $ph_orders = Order::where('order_type','ph')->where('balance','>', 0)->orderBy('created_at','asc')->get();
        if(count($gh_orders)>0 && count($ph_orders)>0){
                $this->info('find');
            foreach ($gh_orders as $order_gh){


                while($order_gh->balance > 0){

                    $ph = Order::where('order_type','ph')->where('balance','>', 0)->orderBy('created_at','asc')->first();
                    if ($ph){
                        $ph_user = User::find($ph->user_id);
                        $gh_user = User::find($order_gh->user_id);
                        if($order_gh->balance >= $ph->balance){
                            $order_gh->balance = $order_gh->balance - $ph->balance;
                            $order_gh->save();
                            $match = new Match();
                            $match->phOrder_id = $ph->id;
                            $match->ghOrder_id = $order_gh->id;
                            $match->ph_username = $ph_user->name;
                            $match->phUser_id = $ph_user->id;
                            $match->gh_username=$gh_user->name;
                            $match->ghUser_id=$gh_user->id;
                            $match->amount=$ph->balance;
                            $match->status='unconfirmed';
                            $match->save();
                            $ph->balance = 0;
                            $ph->save();
                            $this->info('gh');
                            break;
                        }
                        elseif($ph->balance > $order_gh->balance){
                            $ph->balance -= $order_gh->balance;
                            $ph->save();
                            $match = new Match();
                            $match->phOrder_id = $ph->id;
                            $match->ghOrder_id = $order_gh->id;
                            $match->ph_username = $ph_user->name;
                            $match->phUser_id = $ph_user->id;
                            $match->gh_username=$gh_user->name;
                            $match->ghUser_id=$gh_user->id;
                            $match->amount=$order_gh->balance;
                            $match->status='unconfirmed';
                            $match->save();
                            $order_gh->balance = 0;
                            $order_gh->save();
                            $this->info('ph');
                            break;
                        }
                    }else{
                      break;
                    }

                }


           }

        }
    }
        
    }
}
