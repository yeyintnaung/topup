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
                                <span class="card-title">Create User</span>
                                <p>
                                    
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row margin-b-0">
                    <div class="col s12 m12 l9">
                        <div class="card">
                            <div class="card-content">  
                                <span class="card-title">User Create Form</span>
                                
                                <div class="row margin-b-0">
                                    <form class="col s12" action="{{asset('user')}}" method="POST">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input type="text" id="" class="validate" name="name">
                                                <label for="number" class="">Username</label>
                                            </div>

                                            <div class="input-field col s12">
                                                <input type="email" id="" class="validate" name="email">
                                                <label for="number" class="">Email</label>
                                            </div>

                                            <div class="input-field col s12">
                                                <input type="password" id="" class="validate" name="password">
                                                <label for="number" class="">Password</label>
                                            </div>

                                            <div class="input-field col s12">
                                                <select id="filterCountry" name="role">
                                                    <option value="" disabled selected>Choose Role</option>
                                                    <option value="1">admin</option>
                                                    <option value="2">staff</option>
                                                </select>
                                            </div>

                                            <div class="input-field col s12">
                                                <button type="submit" class="waves-effect waves-light btn indigo btn-block top-8">Create User</button>
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