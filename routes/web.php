<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function () {
    return view('invoice.create');
});*/
use Illuminate\Support\Facades\Input;


Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/dashboard', 'HomeController@index');
Route::resource('/topup', 'TopupController');
Route::resource('/user', 'UserController');
Route::get('/user/delete/{id}', 'UserController@delete');
Route::get('/user/edit/{id}', 'UserController@edit');
Route::post('/user/edit', 'UserController@updated');
Route::resource('/merchant', 'MerchantController');
Route::get('/gettopup', 'TopupController@quick_topup');

Route::get('/history/topup', 'HistoryController@topup');
Route::get('/history/merchant', 'HistoryController@merchant');
Route::post('/topup/soldout', 'HistoryController@soldout_topup');
Route::get('/topups/sold_out', 'TopupController@soldout_topup');
Route::get('/topups/in_stock', 'TopupController@instock_topup');
Route::get('/topups/search_code', 'TopupController@search_code');
Route::get('/topups/search_staff', 'TopupController@search_staff');
Route::get('/merchants/bonus', 'HistoryController@bonus');
Route::post('/topup/result', 'TopupController@search');

/* Topup Route */
Route::resource('/mpttopup', 'MptTopupController');
Route::resource('/ooredootopup', 'OoredooTopupController');
Route::resource('/telenortopup', 'TelenorTopupController');
Route::resource('/telenormagictopup', 'TelenorMagicTopupController');

//testing buying topup
Route::get('/buying-topup', 'TopupController@topup');
Route::post('/buying-topup', 'TopupController@buying_topup');
Route::post('/added-balance', 'MerchantController@added_balance');

//Reports routes
Route::get('/reports/topups', 'ReportsController@topup');
Route::get('/reports/mytopup', 'ReportsController@mytopup');
Route::get('/reports/invoices', 'ReportsController@invoices');
Route::get('search_date',function(){
    return view('addation');
});
Route::post('search_date','AddController@search_date');
Route::post('check-code','AddController@search_code');

Route::post('search','UserController@search');
Route::get('dd',function() {

  return  \Carbon\Carbon::now();
});

Route::get('profit',function() {
	$profit = DB::table('topup')->distinct()->OrderBy('id','DESC')->get(['date']);;
  	return  view('reports.profit',['profit'=>$profit]);
});
Route::post('/search_month', 'ReportsController@search_month');

Route::get('dup',function(){
   $dup= DB::table('topup')->select(DB::raw("COUNT(topup_code) count"),'topup_code')->groupBy('topup_code')->havingRaw('count(topup_code) > 1')->get();
    foreach($dup as $dp)
    {
     \Illuminate\Support\Facades\DB::table('topup')->where('topup_code',$dp->topup_code)->delete();
    }

});
Route::get('count_by_date/{id}',function($id){

        $M=\Carbon\Carbon::now()->month;
        $Y=\Carbon\Carbon::now()->year;

    return view('reports.count_by_date',['id'=>$id,'m'=>$M,'y'=>$Y]);
});
Route::post('count_by_date',function(\Illuminate\Http\Request $request){
        $M=\Carbon\Carbon::parse($request->date)->month;
        $Y=\Carbon\Carbon::parse($request->date)->year;

    return view('reports.count_by_date',['id'=>$request->id,'m'=>$M,'y'=>$Y]);
});
Route::post('count_by_all',function(\Illuminate\Http\Request $request){
    $M=\Carbon\Carbon::parse($request->date)->month;
    $Y=\Carbon\Carbon::parse($request->date)->year;

    return view('reports.count_by_all',['m'=>$M,'y'=>$Y]);
});
Route::get('count_by_all',function(){
        $M=\Carbon\Carbon::now()->month;
        $Y=\Carbon\Carbon::now()->year;

    return view('reports.count_by_all',['m'=>$M,'y'=>$Y]);
});

Route::get('topup_amount/{date?}',function(\Illuminate\Http\Request $request){

    if(Input::get('date') == '')
    {
        $M=\Carbon\Carbon::now()->month;
        $Y=\Carbon\Carbon::now()->year;
    }
    else{
        $M=\Carbon\Carbon::parse(Input::get('date'))->month;
        $Y=\Carbon\Carbon::parse(Input::get('date'))->year;

    }
    $profit = DB::table('topup')->distinct()->whereMonth('created_at',$M)->whereYear('created_at',$Y)->OrderBy('id','DESC')->get(['date']);;

    return view('reports.topup_amount',['profit'=>$profit,'date'=>Input::get('date')]);
});
Route::get('sst/{code}',function($code){
    $re=$active=DB::table('topup')->where('topup_code','=',$code)->first();
    return dd($re);

});


