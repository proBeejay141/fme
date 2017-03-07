<?php

namespace App\Console\Commands;

use App\Balance;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class clearNonActive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:nonActive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to clear users that does create ph order';

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
            if (count($user->orders)==0 && $this->check($user)== true){
                $bal = Balance::where('user_id',$user->id)->first();
                $bal->delete();
                $user->forceDelete();
                $this->info('user clear');
            }
        }
    }

    private function check($user){
        $startTime = Carbon::parse($user->created_at);
        if (Carbon::now()->diffInDays($startTime)>=1){
            return true;
        }
        return false;

    }
}
