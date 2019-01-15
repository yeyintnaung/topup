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
                                                    <a class="modal-trigger waves-effect waves-light tag-about red" href="#modal{{$data->id}}">View</a></td>
                                                </tr>
                                                <!-- Modal Structure -->
                                          <div id="modal{{$data->id}}" class="modal modal-fixed-footer">
                                            <div class="modal-content">
                                              	<blockquote>History Detail</blockquote>
                                              	<ul class="activity-list margin-v-0">
			                                    <li class="blue-color">
			                                        <a href="#">
			                                            <span class="grey-text small-text">Status</span>
			                                            <h6 class=" blue-grey-text font-500">{{$data->status}}</h6>                                                
			                                        </a>
			                                    </li><!--/li-->
			                                    <li class="green-color">
			                                        <a href="#">
			                                            <span class="grey-text small-text">Card/ Price [code]</span>
			                                            <h6 class=" blue-grey-text font-500">{{$card->card}} / {{$data->amount}} Ks [<em>{{$data->code}}</em>]</h6>                                         
			                                        </a>
			                                    </li><!--/li-->
			                                    <li class="indigo-color">
			                                        <a href="#">
			                                            <span class="grey-text small-text">User</span>
			                                            <h6 class=" blue-grey-text font-500">{{$user->name}}</h6>                                                
			                                        </a>
			                                    </li><!--/li-->
			                                    <li class="teal-color">
			                                        <a href="#">
			                                            <span class="grey-text small-text">Date</span>
			                                            <h6 class=" blue-grey-text font-500">{{$data->format}}</h6>                                                
			                                        </a>
			                                    </li><!--/li-->
			                                    <li class="yellow-color">
			                                        <a href="#">
			                                            <span class="grey-text small-text">Description</span>
			                                            <h6 class=" blue-grey-text font-500">{{$user->name." ".$data->description." ".$card->card." [".$data->amount."Ks]  at ".$data->format}}.</h6>
			                                            <br>	  
			                                        </a>
			                                    </li><!--/li-->
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