<?php

namespace App\Console\Commands;

use App\Balance;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class clearUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to clear not active users';

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
        $users = User::onlyTrashed()->get();
        foreach ($users as $user){
            if ($this->check($user)){
               $balance = Balance::where('user_id','=',$user->id)->first();
                $balance->delete();
                $user->forceDelete();
                $this->info($user->email.' deleted');
            }
        }
    }

    private function check($user){
        $startTime = Carbon::parse($user->deleted_at);
        if (Carbon::now()->diffInDays($startTime)>=30){
            return true;
        }
        return false;

    }
}
