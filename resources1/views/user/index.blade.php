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
                                <span class="card-title">All Users <a href="{{url('user/create')}}" class="waves-effect waves-light btn indigo right">Create User</a></span> 

                                   <table id="datatable" class="bordered dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($users as $key=>$user)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{($user->role=='1')? 'admin':'staff'}}</td>
                                                    <th>
                                                        <a class="waves-effect waves-light tag-about green" href="{{asset('user/'.$user->id)}}">View</a>
                                                        <a class="waves-effect waves-light tag-about indigo" href="#">Edit</a>
                                                        <a class="waves-effect waves-light tag-about red" href="#">Delete</a>
                                                    </th>
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