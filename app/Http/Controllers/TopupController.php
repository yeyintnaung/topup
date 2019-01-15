<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Topup;
use App\Price;
use App\History;
use App\Invoice;
use App\Merchant;
use App\Bonus;
use Illuminate\Support\Facades\DB;

class TopupController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>'buying_topup']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$topups = Topup::orderBy('updated_at','DESC')->get();
        //return view('topup.topup',['topups'=>$topups]);
return view('topup.topup');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('topup.create');
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
            'price'      => 'required',
        ]);

        /*$card = $request->card;

        if($card=='1'){
            $code = $request->mpt;
        }elseif($card=='2'){
            $code = $request->ooredoo;
        }elseif($card=='3'){
            $code = $request->telenor;
        }else{
            $code = $request->telenor2;
        }*/
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
        $topup->note         = 'hello';
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
            return redirect('topup')->with('message','Topup have been created');
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
        $topup = Topup::find($id);
        if(!$topup){
            return view('404');
        }
        return view('topup.view',['topup'=>$topup]);
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
        //
        $this->validate($request,[
            'code'       => 'required',
        ]);

        //find unique merchant
        $code     = $request->code;
        $user     = $request->user;
        
        /*merchant record placed to save*/

        $topup = Topup::find($id);
        $topup->topup_code = $code;
        $topup->updated_by = $user;



        if($topup->save()){
            $has=\Illuminate\Support\Facades\DB::table('topup')->where('status',7)->count();
            if($has > 0){
                \Illuminate\Support\Facades\DB::table('topup')->where('status',7)->update(['status'=>1]);
            }
            /*redirected url to topup if record saved successful*/
            return redirect('topup')->with('message','Topup have been updated');
        }
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
        $topup= Topup::find($id);
       if($topup->delete()){
            /*redirected url to topup if record saved successful*/
            return redirect('topup')->with('message','Topup have been deleted');
        }
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
    public function search_code()
    {
        //
        $topups = Topup::where('status','=',1)->orderBy('updated_at','DESC')->get();
        return view('topup.search_code',['topups'=>$topups]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search_staff()
    {
        //
        $topups = Topup::where('status','=',1)->orderBy('updated_at','DESC')->get();
        return view('topup.search_staff',['topups'=>$topups]);
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function topup()
    {
        //
        return view('topup.test');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buying_topup(Request $request)
    {
        //
        /*Get MerchantID and Secret*/
        $merchantID  = $request->merchantID;
        $secret      = $request->secret;

        $merchant = Merchant::where('merchant_id','=',$merchantID)
            ->where('secret','=',$secret)
            ->first();

        //Validate MerchantID and Secret
        if(count($merchant)>0){
            $role    = $merchant->role;
            //get merchant's balance
            $balance = $merchant->balance;
            $rand = str_pad(time().rand(),16,'0',STR_PAD_RIGHT);


            //get card type and price
            $card   = $request->card;
            $price  = $request->price;

            if(empty($card) && empty($card)){
                return response()->json([
                'status'  => '0',
                'message' => 'Could not process'
            ]);
            }
            $id   = $request->price;
            $amount = Price::find($id);
            $price = $amount->price;

            if($balance >= $price){
                //get first only topup in stock topup
                $topup = Topup::where('status','=','1')
                ->where('card','=',$card)
                ->where('amount','=',$price)
                ->first();

                if(!$topup){
                    return response()->json([
                        'status'  => '0',
                        'message' => 'Topup Sold out'
                    ]);
                }else{
                    $code = $topup->topup_code;

                    $invoice = new Invoice;
                    $invoice->invoice_no = $rand;
                    $invoice->topup_id = $topup->id;
                    $invoice->merchant =$merchant->id;
                    $invoice->buying_date = date('Y-m-d h:m:i');
                    /*echo "<pre>";
                    //print_r($invoice);
                    var_dump($invoice);
                    echo "</pre>";*/

                    if($invoice->save()){
                        //updated card status to sold_out
                        $id  = $topup->id;
                        $topupId = Topup::find($id);
                        $topupId->status   = '0';
                        $topupId->merchant = $merchant->id;
                        $topupId->save();

                        //get bonus
                        $_card    = $topup->card;
                        $_price   = $topup->amount;
                        $getprice = Bonus::where('card','=',$_card)
                            ->where('price','=',$_price)
                            ->where('role','=',$role)
                            ->first();
                        $bonus  = $getprice->bonus;



                        //updated merchant balance
                        $id  = $merchant->id;
                        $merchantId = Merchant::find($id);
                        $merchantId->balance   = $balance-$price+$bonus;
                        $merchantId->save();

                        return response()->json([
                            'status'  => '1',
                            'invoice' => $rand,
                            'topup_code' => $code,
                            'card'    => $card,
                            'price'   => $price,
                            'message' => 'Topup successful'
                        ]);
                    }

                }
            }else{
              return response()->json([
                'status'  => '0',
                'message' => 'Balance not enough'
            ]);
            }


        }else{
            return response()->json([
                'status'  => '0',
                'message' => 'Could not process'
            ]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        //
        $code = $request->code;
        $topup = Topup::where('topup_code','=',$code)->first();
        if(!$topup){
            return view('404');
        }
        return view('topup.result',['topup'=>$topup]);
    }
}
