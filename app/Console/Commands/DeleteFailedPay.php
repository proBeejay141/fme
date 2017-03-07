<?php

namespace App\Console\Commands;

use App\Match;
use App\Order;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeleteFailedPay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:failPay';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to delete member that refuses to pay';

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
        //
        $matches = Match::where('status','unconfirmed')->get();
        foreach ($matches as $match){
            if($match->timeOut() == false){
                $ph_user_order = Order::findOrFail($match->phOrder_id);
                $ph_user_order->balance+= $match->amount;
                $ph_user_order->save();
                $ph_user_order->delete();
                User::findOrFail($match->phUser_id)->delete();
                $gh_user_order = Order::findOrFail($match->ghOrder_id);
                $gh_user_order->balance+= $match->amount;
                $gh_user_order->save();
                $match->delete();
                $this->info('failed user deleted');
            }
        }
        //$this->info('none was deleted');
    }
}
