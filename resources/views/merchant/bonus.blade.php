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
                                    <th>Card</th>
                                    <th>Price</th>
                                    <th>Role</th>
                                    <th>Bonus</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($bonus as $key=>$topup)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td><?php 
                                            $id = $topup->card ;
                                            $card = App\Card::find($id);
                                        ?>
                                        {{$card->card}}
                                    </td>
                                    <td>{{number_format($topup->price)}}</td>
                                    <td>{{($topup->role==1)? 'special':'normal'}}</td>
                                    <td>{{$topup->bonus}} Ks</td>
                                    <td>
                                        <a class="waves-effect waves-light tag-about green" href="#">View</a>
                                        <a class="waves-effect waves-light tag-about indigo" href="#">Edit</a>
                                        <a class="waves-effect waves-light tag-about red" href="#">Delete</a>
                                    </td>
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