<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topup;
use App\Price;
use App\History;
class TelenorMagicTopupController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('topup.telenormagictopup');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'card'       => 'required',
            'price'      => 'required'
        ]);

        $card = $request->card;
        $id   = $request->price;
        $amount = Price::find($id);
        $price = $amount->price;
        $code  = $request->code;

        /*topup record placed to save*/
        $topup = new Topup;
        $topup->topup_code   = $code;
        $topup->card         = $card;
        $topup->amount       = $price;
        $topup->status       = '1';
        $topup->merchant     = '';
        $topup->date         = date('Y-m-d');
        $topup->month        = date('Y-m');
        $topup->created_by   = $request->user;
        $topup->updated_by   = $request->user;

        if($topup->save()){
            /* saved record in history table if topup record saved. */
            $history = new History;
            $history->user        = $request->user;
            $history->card        = $request->card;
            $history->amount      = $price;
            $history->code        = $code;
            $history->status      = 'create';
            $history->format      = date('Y-m-d');
            $history->description = ' have been created ';
            $history->save();

            /*redirected url to topup if record saved successful*/
            return redirect('telenormagictopup')->with('message','Topup have been created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
