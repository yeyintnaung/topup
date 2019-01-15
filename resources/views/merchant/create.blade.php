@extends('layouts.template')
@section('content')

<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\Main content Start\\\\\\\\\\\\\\\\\\\\\\\-->
<main class="main-content">
    <div class="page-content">
        <div class="row margin-b-0">
            <div class="col s12 m12 l12">
                <div class="card no-shadow">
                    <div class="card-content">  
                        <span class="card-title">Create Merchant</span>
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
                        <span class="card-title">Merchant Create Form</span>
                        <span class="text-info">{{Session::get('message')}}</span>
                        <div class="row margin-b-0">
                            <form class="col s12" action="{{asset('merchant')}}" method="POST">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" id="" class="validate" name="name" required/>
                                        <label for="number" class="">Merchant Name *</label>
                                    </div>

                                    <div class="input-field col s12">
                                        <input type="email" id="" class="validate" name="email" required/>
                                        <label for="number" class="">Email *</label>
                                    </div>

                                    <div class="input-field col s12">
                                        <input type="password" id="" class="validate" name="password" required/>
                                        <label for="number" class="">Password *</label>
                                    </div>

                                    <div class="input-field col s12">
                                        <select name="role" required>
                                            <option disabled selected>Choose role *</option>
                                            <option value="1">Special</option>
                                            <option value="0">Normal</option>
                                        </select>
                                    </div>

                                    <div class="input-field col s12">
                                        <input type="number" id="" class="validate" name="balance">
                                        <label for="number" class="">Balance</label>
                                    </div>

                                    <div class="input-field col s12">
                                        <button type="submit" class="waves-effect waves-light btn indigo btn-block top-8">Create Merchant</button>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" name="user" value="{{Auth::user()->id}}">
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