@extends('layouts.template')
@section('content')
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\Main content Start\\\\\\\\\\\\\\\\\\\\\\\-->
<main class="main-content">
    <div class="page-content">
        <div class="row margin-b-0">
            <div class="col s12 m12 l12">
                <div class="card no-shadow">
                    <div class="card-content">  
                        <span class="card-title">Merchant Info</span>
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
                        <table class="striped">
                            <tbody>
                                <tr>
                                    <td>Merchant Name</td>
                                    <td>:</td>
                                    <td>{{$merchant->merchant_name}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{$merchant->email}}</td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td>:</td>
                                    <td>{{$merchant->password}}</td>
                                </tr>
                                <tr>
                                    <td>Merchnat ID</td>
                                    <td>:</td>
                                    <td>{{$merchant->merchant_id}}</td>
                                </tr>
                                <tr>
                                    <td>Secret</td>
                                    <td>:</td>
                                    <td>{{$merchant->secret}}</td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td>:</td>
                                    <td>{{($merchant->role==1)? 'special':'normal'}}</td>
                                </tr>
                                <tr>
                                    <td>Balance</td>
                                    <td>:</td>
                                    <td>{{number_format($merchant->balance)}} Ks</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td>{{($merchant->status==1)? 'active':'inactive'}}</td>
                                </tr>
                                <tr>
                                    <td>Created Date</td>
                                    <td>:</td>
                                    <td>{{$merchant->created_at}}</td>
                                </tr>
                                <tr>
                                    <td>Updated Date</td>
                                    <td>:</td>
                                    <td>{{$merchant->updated_at}}</td>
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