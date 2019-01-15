<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\History;
use App\Topup;
use App\Invoice;
use App\Bonus;
use DB;
class ReportsController extends Controller
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
        $topups = History::orderBy('updated_at','DESC')->get();
        return view('reports.topup',['topups'=>$topups]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mytopup()
    {
        //
        $user = Auth::user()->id;
        $topups = History::orderBy('updated_at','DESC')->where('user','=',$user)->get();
        return view('reports.topup',['topups'=>$topups]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function invoices()
    {
        //
        $invoices = Invoice::orderBy('updated_at','DESC')->get();
        return view('reports.invoice',['invoices'=>$invoices]);
    }
    
    	public function search_month(Request $request)
	{
		$month = $request->month;
		$year    = $request->year;
		$date = $year.'-'.$month.'-%';
		$month= $year.'-'.$month;
		

		$result= DB::table('topup')->WHERE('date','LIKE',$date)->sum('amount');
		$soldout= DB::table('topup')->WHERE('date','LIKE',$date)->WHERE('status','=',0)->sum('amount');
		$remaining= ($result-$soldout);
		
  		return  view('reports.result',['result'=>$result,'soldout'=>$soldout,'remaining'=>$remaining,'month'=>$month]);
	}

}
