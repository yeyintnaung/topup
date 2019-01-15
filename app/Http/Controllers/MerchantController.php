<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Merchant;
use DB;
class MerchantController extends Controller
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
        $merchants = Merchant::all();
        return view('merchant.index',['merchants'=>$merchants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('merchant.create');
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
            'name'       => 'required',
            'email'      => 'required',
            'password'   => 'required',
        ]);

        //find unique merchant
        $email    = $request->email;
        $unique   = Merchant::where('email','=',$email)->get();
        if(count($unique)>0){
            return back()->with('message','Merchant have already exists');
        }else{
            $name     = $request->name;
            $password = $request->password;
            $user     = $request->user;
            $role     = $request->role;
        
            if(empty($request->balance)){
                $balance = '0';
            }else{
                $balance = $request->balance;
            }
            //generated merchant_id and key
            $idstr     = '0123456789';
            $secretstr = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

            // Minimum/Maximum times to repeat character List to seed from
            $chrRepeatMin = 1; // Minimum times to repeat the seed string
            $chrRepeatMax = 20; // Maximum times to repeat the seed string

            // Length of Random String returned
            $idRandomLength     = 16;
            $secretRandomLength = 16;

            // The ONE LINE random command with the above variables.
            $merchatID = substr(str_shuffle(str_repeat($idstr, mt_rand($chrRepeatMin,$chrRepeatMax))),1,$idRandomLength);
            $secret    = substr(str_shuffle(str_repeat($secretstr, mt_rand($chrRepeatMin,$chrRepeatMax))),1,$secretRandomLength);



            /*topup record placed to save*/
            $merchant = new Merchant;
            $merchant->merchant_name = $name;
            $merchant->email         = $email;
            $merchant->password      = $password;
            $merchant->merchant_id   = $merchatID;
            $merchant->secret        = $secret;
            $merchant->role          = $role;
            $merchant->balance       = $balance;
            $merchant->status        = '1';

            if($merchant->save()){
                /*redirected url to topup if record saved successful*/
                return redirect('merchant')->with('message','Merchant have been created');
            }
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
        $merchant = Merchant::find($id);
        if(!$merchant){
            return view('404');
        }
        return view('merchant.view',['merchant'=>$merchant]);
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
        $merchant = Merchant::find($id);
        if(!$merchant){
            return view('404');
        }
        return view('merchant.edit',['merchant'=>$merchant]);
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
        $this->validate($request,[
            'name'       => 'required',
            'password'   => 'required',
        ]);

        //find unique merchant
        $name     = $request->name;
        $password = $request->password;
        $user     = $request->user;
        $role     = $request->role;
        $balance = $request->balance;
        
            

        /*merchant record placed to save*/

        $merchant = Merchant::find($id);
        $merchant->merchant_name = $name;
        $merchant->password      = $password;
        $merchant->role          = $role;
        $merchant->balance       = $balance;

        if($merchant->save()){
            /*redirected url to topup if record saved successful*/
            return redirect('merchant')->with('message','Merchant have been updated');
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
    }
    public function added_balance(Request $request)
    {
        //
        $this->validate($request,[
            'balance'       => 'required',
        ]);
	$id = $request->id;
	$balance = $request->balance;
        /*merchant record placed to save*/

        $merchant = Merchant::where('id','=',$id)->first();
        $old = $merchant->balance;
        
        $new = $balance+$old;
        
        DB::table('merchants')
            ->where('id', $id)
            ->update(['balance'=>$new]);


            /*redirected url to topup if record saved successful*/
            return redirect('merchant')->with('message','Merchant have been updated');

    }
}
