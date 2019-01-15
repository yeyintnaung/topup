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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Role</th>
                                    <th>Balance</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($merchants as $key=>$merchant)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$merchant->merchant_name}}</td>
                                    <td>{{$merchant->email}}</td>
                                    <td>{{$merchant->password}}</td>
                                    <td>{{($merchant->role==1)? 'special':'normal'}}</td>
                                    <td>{{number_format($merchant->balance)}} Ks</td>
                                    <td>
                                        <a class="waves-effect waves-light tag-about green" href="{{asset('merchant/'.$merchant->id)}}">View</a>
                                        <a class="waves-effect waves-light tag-about indigo" href="{{asset('merchant/'.$merchant->id.'/edit')}}">Edit</a>
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