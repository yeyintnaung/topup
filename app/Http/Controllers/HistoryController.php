<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\History;
use App\Topup;
use App\Invoice;
use App\Bonus;
class HistoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
                $this->middleware('lock');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function topup()
    {
        //
        $history = History::orderBy('updated_at','DESC')->get();
        return view('topup.history',['history'=>$history]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function merchant()
    {
        //
        $merchants = Invoice::orderBy('updated_at','DESC')->get();
        return view('merchant.history',['merchants'=>$merchants]);
    }

    public function soldout_topup(Request $request)
    {
        //
        $id = $request->id;

        $card = Topup::find($id);
        $card->status = '0';
        if($card->save()){
            /* saved record in history table if topup record saved. */
            $history = new History;
            $history->user        = $request->user;
            $history->card        = $request->card;
            $history->amount      = $request->amount;
            $history->code        = $request->code;
            $history->status      = 'sold out';
            $history->format      = date('Y-m-d');
            $history->description = ' have been sold out ';
            $history->save();


            return redirect('/')->with('message','Sold out topup');
        }
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bonus()
    {
        //
        $bonus = Bonus::all();
        return view('merchant.bonus',['bonus'=>$bonus]);
    }



}
