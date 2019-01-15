@extends('layouts.template')
@section('content')

	<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\Main content Start\\\\\\\\\\\\\\\\\\\\\\\-->
        <main class="main-content">
	
            <div class="page-content">
                <div class="row margin-b-0">
                    <div class="col s12 m12 l12">
                        <div class="card no-shadow">
                            <div class="card-content">  
                                <span class="card-title">Search Result</span>
                                <p>
                  
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row margin-b-0">
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">  
                                <table class="striped">
                                    <tbody>
                                        <tr>
                                            <td>Month</td>
                                            <td>:</td>
                                            <td>{{$month}}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Amount</td>
                                            <td>:</td>
                                            <td>{{number_format($result)}} MMK</td>
                                        </tr>
                                        <tr>
                                            <td>Sold Out Amount</td>
                                            <td>:</td>
                                            <td>{{number_format($soldout)}} MMK</td>
                                        </tr>
                                        <tr>
                                            <td>Remaining Amount</td>
                                            <td>:</td>
                                            <td>{{number_format($remaining)}} MMK</td>
                                        </tr>
                                    </tbody>
                                </table>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\Main content end\\\\\\\\\\\\\\\\\\\\\\\-->
@stop