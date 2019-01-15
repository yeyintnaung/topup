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
                                <span class="card-title">All History </span> 

                                   <table id="datatable" class="bordered dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Card</th>
                                                    <th>Price</th>
                                                    <th>User</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($history as $key=>$data)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>{{$data->format}}</td>
                                                    <td>{{$data->status}}</td>
                                                    <td>
                                                    	<?php 
                                                            $id = $data->card;
                                                            $card = App\Card::find($id);
                                                            echo $card->card;
                                                        ?>
                                                    </td>
                                                    <td>{{$data->amount}} Ks</td>
                                                    <td>
                                                    	<?php 
                                                            $id = $data->user;
                                                            $user = App\User::find($id);
                                                            echo $user->name;
                                                        ?>
                                                    </td>
                                                    <td><!-- Modal Trigger -->
                                                    <a class="waves-effect waves-light tag-about red" href="{{url('topup/'.$data->id)}}">View</a></td>
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