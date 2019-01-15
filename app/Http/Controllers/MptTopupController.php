<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Topup;
use App\Price;
use App\History;
use Illuminate\Support\Facades\Validator;


class MptTopupController extends Controller
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
    public function index()
    {
        //
        return view('topup.mpttopup');
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
        $rules = array(
            'topup_code' => 'unique:topup|required',
            'price'      => 'required'

        );
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
            return 'error';
        }


        $card = $request->card;
        $id   = $request->price;
        $amount = Price::find($id);
        $price = $amount->price;
        $code  = $request->topup_code;

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
            return redirect('mpttopup')->with('message','Topup have been created');
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
        $topup = Topup::find($id);
        if(!$topup){
            return view('404');
        }
        return view('topup.edit',['topup'=>$topup]);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function quick_topup(Request $request)
    {
        //

        $card = $request->card;
        $id   = $request->price;

        $amount = Price::find($id);
        $price = $amount->price;

        $topup = Topup::where('status','=','1')->where('card','=',$card)->where('amount','=',$price)->first();
        /*if(!$blog){
            return view('blog.error');
        }*/
        return view('topup.quick_topup',['topup'=>$topup]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function soldout_topup()
    {
        //
        $topups = Topup::where('status','=',0)->orderBy('updated_at','DESC')->get();
        return view('topup.sold_out',['topups'=>$topups]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function instock_topup()
    {
        //
        $topups = Topup::where('status','=',1)->orderBy('updated_at','DESC')->get();
        return view('topup.in_stock',['topups'=>$topups]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function topupboard()
    {
        //
        return view('topup.topupboard');
    }
}