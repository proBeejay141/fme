<?php

namespace App\Http\Controllers;

use App\Balance;
use App\Mafro;
use App\Match;
use App\Order;
use App\Testimony;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use TCG\Voyager\Facades\Voyager;

class MatchController extends Controller
{
    //

    public function getImage($filename)
    {
        if (Storage::disk('local')->has($filename)){
            $photo = Storage::disk('local')->get($filename);
            return new Response($photo);
//            return 'true';
        }

    }

    public function postConfirmPhoto(Request $request)
    {
        $this->validate($request, [
            'match'=>'required',
            'pic'=>'required'
        ]);

        if ($request->file('pic')){
            $match = Match::findOrFail($request['match']);
            $dir = 'teller'.DIRECTORY_SEPARATOR.Auth::user()->name. Auth::user()->id.DIRECTORY_SEPARATOR.'confirmations' ;
            $thumbnaildir= $dir. DIRECTORY_SEPARATOR. 'thumbs';
            Storage::makeDirectory($thumbnaildir);
            $dir.=DIRECTORY_SEPARATOR. md5(time()).'.'.$request->file('pic')->getClientOriginalExtension();
            $thumbnaildir.= DIRECTORY_SEPARATOR. md5(time()).'.'.$request->file('pic')->getClientOriginalExtension();
            $imgThumb = Image::make($request->file('pic'))->fit(60,60);
            $path = Storage::disk('local')->put($dir,File::get($request->file('pic')));
            $paththumb = Storage::disk('local')->put($thumbnaildir,(string)$imgThumb->encode());
            $match->confirm = $dir;
            $match->confirm_thumb = $thumbnaildir;
            $match->update();
        }
        return redirect()->route('dash_index');

    }

    public function postGhConfirm(Request $request)
    {
        $this->validate($request,[
            'match'=>'required'
        ]);
        if ($request['testinomy'] != ''){
            Testimony::create([
                'username'=> auth()->user()->name,
                'message'=>$request['message']
            ]);
        }

//        confirm match
        $match = Match::findOrFail($request['match']);
        $match->update(['status'=>'confirmed']);

        //        update ph user order
        $ph_user = User::find($match->phUser_id);
        $ph_user->balance()->update(['confirmed_ph'=>($ph_user->balance->confirmed_ph + $match->amount)]);
        $matro = new Mafro();
            $matro->user_id= $ph_user->id;
            $matro->amount =$match->amount;
            $matro->match_id= $match->id;
            $matro->status=0;
            $matro->save();

        $ph_user->level+=1;
        $ph_user->save();

        $gh_order = Order::find($match->ghOrder_id);
        $gh_complete = false;
        foreach($gh_order->matches() as $mat){
            if ($mat->status == 'confirmed'){
                $gh_complete = true;
            }
            else{
                $gh_complete = false;
            }
        }
        if ($gh_complete == true && $gh_order->balance == 0){
            $gh_order->status='Completed';
            $gh_order->save();
        }

//        confirm ph order
        $ph_order = Order::find($match->phOrder_id);
        $ph_complete = false;
        foreach ($ph_order->matches() as $pMat){
            if ($pMat->status == 'confirmed'){
                $ph_complete = true;
            }else{
                $ph_complete = false;
            }
        }
        if ($ph_complete == true && $ph_order->balance == 0){

            $cnt = count(Order::where('user_id',$ph_user->id)->get());
            if ($cnt == 1){
                $per = $this->percent($ph_order->amount);
                $referral = User::where('email','=',$ph_user->referral)->first();
                if($referral){
                    $refBal = Balance::where('user_id',$referral->id)->first();
                    $refBal->bonus+=$per;
                    $refBal->save();
                    $referral->bonuses()->updateOrCreate([
                        'amount'=> $per,
                        'for'=>'Referral Bonus'
                    ]);
                }


            }


            $ph_order->status='Completed';
            $ph_order->save();
        }



        return redirect()->route('dash_index');

    }

    private function percent($amount){
        $per = Voyager::setting('refPercent')/100;
        return $per*$amount;
    }
}
