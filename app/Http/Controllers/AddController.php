<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddController extends Controller
{
    //
    public function search_date(Request $request){
       $mpt= DB::connection('mysql1')->table('incomes')->where('card','101')->whereDate('created_at',Carbon::parse($request->date)->toDateString())->sum('amount');
       $ooredoo= DB::connection('mysql1')->table('incomes')->where('card','121')->whereDate('created_at',Carbon::parse($request->date)->toDateString())->sum('amount');
       $tel= DB::connection('mysql1')->table('incomes')->where('card','111')->whereDate('created_at',Carbon::parse($request->date)->toDateString())->sum('amount');
       $total=$mpt + $tel + $ooredoo;
        return 'mpt='.$mpt.'&nbspTel='.$tel.'&nbspOoredoo='.$ooredoo.'&nbspTotal='.$total;
    }
    public function search_code(Request $request){
        $solds= DB::connection('mysql1')->table('incomes')->where('topup_code','=',$request->code);
           if($solds->count()== 0){
            return  'This topup code is not in our database';

        }
        $data= DB::connection('mysql1')->table('incomes')->where('topup_code','=',$request->code);
        $buyer='';
        $active=DB::table('topup')->where('topup_code','=',$request->code);
        $adder=DB::table('users')->where('id','=',$active->first()->created_by);


        foreach($data->get() as $d){
            $buyer .='<br>TB'.$d->member_id."&nbsp;"."Date&nbsp;".$d->created_at.'  '.'TB';

        }

        if($solds->count() != 0)
        {
            if($solds->count() > 1){
                $sold='Double Sold&nbsp'.$solds->count().'&nbsp;Times'.$buyer.' --  '.'Created by'.$adder->first()->name.'--'.$active->first()->created_at.'--'.$active->first()->card.'--'.$active->first()->amount;
            }else {;
                $sold = 'Sold Out'.' --  '.'Created by'.$adder->first()->name.'--'.$active->first()->created_at.'--'.$active->first()->card.'--'.$active->first()->amount.'  '.$buyer;
            }

        }
        else{
         if($active->count() !=0)
         {
             $sold='active';
             if($active->count() >1)
             {
                 $sold ='Double Active&nbsp;'.$active->count().'Times'.' -- '.$adder->first()->name.'--'.$active->first()->created_at.'--'.$active->first()->card.'--'.$active->first()->amount;
             }
         }
         else {
             $sold = 'This Code is not in our database';
         }
        }
        return $sold;

    }


}
