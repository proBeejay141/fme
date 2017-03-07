<?php

namespace App\Console\Commands;

use App\Balance;
use App\Mafro;
use Illuminate\Console\Command;

class MoveMafro extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'move:mafro';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to move mature mafro to the user"s ready_gh account';

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
        $mafros = Mafro::where('status','0')->get();
        foreach ($mafros as $mafro){
            if($mafro->time() == true) {
                $mafro_userBalance = Balance::where('user_id',$mafro->user_id)->first();
                $mafro_userBalance->confirmed_ph -= $mafro->amount;
                $mafro_userBalance->ready_gh += ($mafro->amount*2);
                $mafro_userBalance->save();
                $mafro->status = 1;
                $mafro->save();
                $this->info($mafro_userBalance->id);
            }
        }
    }
}
