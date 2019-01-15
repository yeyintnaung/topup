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
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">  
                        <span class="card-title">Search Form</span>
                        <span class="text-info"></span>
                        <div class="row margin-b-0">
                            <form class="col s12" action="{{url('search_month')}}" method="POST">
                                <div class="row">
                                    <div class="input-field col s4">
                                        <select name="year" required>
                                            <option disabled selected>Choose Year *</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                        </select>
                                    </div>

                                    <div class="input-field col s4">
                                        <select name="month" required>
                                            <option disabled selected>Choose Month *</option>
                                            <option value="01">Jan</option>
                                            <option value="02">Feb</option>
                                            <option value="03">Mar</option>
                                            <option value="04">Apr</option>
                                            <option value="05">May</option>
                                            <option value="06">Jun</option>
                                            <option value="07">July</option>
                                            <option value="08">Aug</option>
                                            <option value="09">Sept</option>
                                            <option value="10">Oct</option>
                                            <option value="11">Nov</option>
                                            <option value="12">Dec</option>
                                        </select>
                                    </div>

                                    <div class="input-field col s4">
                                        <button type="submit" class="waves-effect waves-light btn indigo btn-block top-8">Create Merchant</button>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
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
				//$total =  DB::table('topup')->WHERE('date','=',$date)->SELECT('amount')->get();
			?>
                                <tr>
                                    <td>{{$date}}</td>
                                    <td>{{number_format($total)}} MMK</td>
                                    <td>{{number_format($soldout)}} MMK</td>
                                    <td>{{number_format($total-$soldout)}} MMK</td>
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