@extends('layouts.template')
@section('content')
    <style type="text/css">
        #mpt,#ooredoo,#telenor,#telenor2{
            display: none;
        }
    </style>
    <!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\Main content Start\\\\\\\\\\\\\\\\\\\\\\\-->
    <main class="main-content">

        <div class="page-content">
            <div class="row margin-b-0">
                <div class="col s12 m12 l12">
                    <div class="card no-shadow">
                        <div class="card-content">
                            <span class="card-title">Edit User</span>
                            <p>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            <div class="col-md-12">
                                <span class="text text-info">{{Session::get('message')}}</span>
                            </div>
                                </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row margin-b-0">
                <div class="col s12 m12 l9">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">User Edit Form</span>

                            <div class="row margin-b-0">
                                <form class="col s12" action="{{asset('user/edit')}}" method="POST">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input type="text" id="" class="validate" name="name" value="{{$user->name}}">
                                            <label for="number" class="">Username</label>
                                        </div>
                                        <input type="hidden" value="{{$user->id}}" name="id"/>

                                        <div class="input-field col s12">
                                            <input type="email" id="" class="validate" name="email" value="{{$user->email}}">
                                            <label for="number" class="">Email</label>
                                        </div>

                                        <div class="input-field col s12">
                                            <input type="text" id="" class="validate" name="show_pass" value="{{$user->show_pass}}">
                                            <label for="number" class="">Password</label>
                                        </div>

                                        <div class="input-field col s12">
                                            <select id="filterCountry" name="role">
                                                <option value="{{$user->role}}" selected>{{($user->role=='1')? 'admin':'staff'}}</option>
                                                <option value="1">admin</option>
                                                <option value="2">staff</option>
                                            </select>
                                        </div>

                                        <div class="input-field col s12">
                                            <button type="submit" class="waves-effect waves-light btn indigo btn-block top-8">Update User</button>
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </main>
    <!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\Main content end\\\\\\\\\\\\\\\\\\\\\\\-->
@stop