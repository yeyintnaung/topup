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
                                        <a class="modal-trigger waves-effect waves-light tag-about blue" href="#modal{{$merchant->id}}">Add Balance</a>
                                    </td>
                                </tr>
                                <!-- Modal Structure -->
				  <div id="modal{{$merchant->id}}" class="modal">
				    <div class="modal-content">
				      <h4>{{$merchant->merchant_name}}</h4>
				      <form action="added-balance" method="post">
				      <div class="row margin-b-0">
            				<div class="col s4">
            				<h2>{{number_format($merchant->balance)}} Ks </h2>
            				</div>
            				<div class="col s4">
            					<input type="number" id="" class="validate" name="balance" required="">
            				</div>
            				<div class="col s4">
            					<input type="hidden" name="_token" value="{{csrf_token()}}" >
            					<input type="hidden" name="id" value="{{$merchant->id}}">
            					<button type="submit" class="waves-effect waves-grey btn green margin-b-10">Add Balance</button>
            				</div>
            				</div>
				    </div>
				    </form>
				    <div class="modal-footer">
				      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
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