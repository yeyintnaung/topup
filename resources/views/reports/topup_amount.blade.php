@extends('layouts.template')
@section('content')
    <!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\Main content Start\\\\\\\\\\\\\\\\\\\\\\\-->
    <main class="main-content">
        <div class="page-content">

            <div class="row margin-b-0">
                <div class="col s12">
                    <div class="card">
                        <div class="card-content">
                            <div class="row margin-b-0">
                                <div class="col s6 m6 6">
                                    <div class="card">
                                        <div class="card-content">
                                            <span class="card-title">Search Form</span>
                                            <span class="text-info"></span>
                                            <div class="row margin-b-0" style="">
                                                <form class="col s6" action="{{url('topup_amount')}}" method="get">
                                                    <div class="row">
                                                        <input type="date" name="date"/>



                                                        <div class="input-field col s4">
                                                            <button type="submit" class="waves-effect waves-light btn indigo btn-block top-8">Search</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <table id="datatable" class="bordered dt-responsive nowrap">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Total Amount</th>
                                    <th>Soldout Amount</th>
                                    <th>Remaining Amount</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($profit as $list)
                                    <?php
                                    $date = $list->date;

                                    $total    =  DB::table('topup')->WHERE('date','=',$date)->sum('amount');

                                    $soldout =  DB::table('topup')->WHERE('date','=',$date)->WHERE('status','=',0)->sum('amount');
                                    $re =  DB::table('topup')->WHERE('date','=',$date)->WHERE('status','=',1)->sum('amount');
                                    //$total =  DB::table('topup')->WHERE('date','=',$date)->SELECT('amount')->get();
                                    ?>
                                    <tr>
                                        <td>{{$date}}</td>
                                        <td>{{number_format($total)}} MMK</td>
                                        <td>{{number_format($soldout)}} MMK</td>
                                        <td>{{number_format($re)}} MMK</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!--end cards-->
                </div>
            </div><!--end row-->
        </div>
    </main>
    <!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\Main content end\\\\\\\\\\\\\\\\\\\\\\\-->
@stop