<?php

namespace App\Console\Commands;

use App\Balance;
use App\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class clearRunner extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:runner';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to romove runners';

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
        $users = User::all();
        foreach ($users as $user){
            $gh_order = $user->orders()->where('order_type','gh')->where('status','Completed')->orderBy('updated_at','desc')->first();
            if ($gh_order) {
            $ph_order = $user->orders()->where('order_type','ph')->where('status','In progress')->get();

            if ($this->check($gh_order)== true && count($ph_order)== 0){
                $bal = Balance::where('user_id',$user->id)->first();
                $bal->delete();
                foreach ($user->orders as $order){
                    $order->forceDelete();
                }
                $user->forceDelete();
                $this->info('user clear');
            }
            }
        }
    }

    private function check($order){
        $startTime = Carbon::parse($order->updated_at);
        if (Carbon::now()->diffInHours($startTime)>=Voyager::setting('runTimer')){
            return true;
        }
        return false;

    }
}
