@extends('layouts.template')
@section('content')
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\Main content Start\\\\\\\\\\\\\\\\\\\\\\\-->
<main class="main-content">
    <div class="page-content">
        <div class="row margin-b-0">
            <div class="col s12">
                <div class="card">                       
                    <div class="card-content">
                        <div class="col-md-12">
                            <span class="text-info">{{Session::get('message')}}</span>
                        </div>
                        <span class="card-title">All Merchants <a href="{{url('merchant/create')}}" class="waves-effect waves-light btn indigo right">Create Merchant</a></span> 

                        <table id="datatable" class="bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Invoice No</th>
                                    <th>Merchant</th>
                                    <th>Card</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($merchants as $key=>$merchant)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$merchant->invoice_no}}</td>
                                    <td>
                                        <?php 
                                            $id = $merchant->merchant;
                                            $name = App\Merchant::find($id);
                                        ?>
                                        {{$name->merchant_name}}
                                    </td>
                                    <td>
                                        <?php 
                                            $id = $merchant->topup_id;
                                            $topup = App\Topup::find($id);

                                            $id = $topup['card'];
                                            $card = App\Card::find($id);
                                        ?>
                                        {{$card['card']}}
                                    </td>
                                    <td>{{number_format($topup['amount'])}} Ks</td>
                                    <td>
                                        <a class="waves-effect waves-light tag-about red" href="{{url('topup/'.$merchant->topup_id)}}">View</a>
                                    </td>
                                </tr>

                                <!-- Modal Structure -->
                                <div id="modal{{$merchant->id}}" class="modal modal-fixed-footer">
                                    <div class="modal-content">
                                        <ul class="striped">
                                           <li>hh</li> 
                                        </ul>  
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
                                    </div>
                                </div>
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