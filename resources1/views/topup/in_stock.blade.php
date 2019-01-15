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
                                <span class="card-title">In Stock Topups
                                    <span class="tag-about red">Total- 
                                        <?php $total = App\topup::where('status','=',1)->sum('amount');?>
                                        {{(!empty($total) ? number_format($total) : '0')}} Ks
                                    </span> 
                                    <span class="tag-about blue">MPT- 
                                        <?php $mpt = App\topup::where('status','=',1)->where('card','=',1)->sum('amount');?>
                                        {{(!empty($mpt) ? number_format($mpt) : '0')}} Ks
                                    </span>
                                    <span class="tag-about teal">
                                        Ooredoo- 
                                        <?php $ooredoo = App\topup::where('status','=',1)->where('card','=',2)->sum('amount');?>
                                        {{(!empty($ooredoo) ? number_format($ooredoo) : '0')}} Ks
                                    </span>
                                    <span class="tag-about green">
                                        Telenor- 
                                        <?php $telenor = App\topup::where('status','=',1)->where('card','=',3)->sum('amount'); ?>
                                        {{(!empty($telenor) ? number_format($telenor) : '0')}} Ks
                                    </span>
                                    <span class="tag-about indigo">
                                        Telenor[Magic]- 
                                        <?php $telenor2 = App\topup::where('status','=',1)->where('card','=',4)->sum('amount'); ?>
                                        {{(!empty($telenor2) ? number_format($telenor2) : '0')}} Ks
                                    </span>
                                    <a href="{{url('topup/create')}}" class="waves-effect waves-light btn indigo right">Create Topup</a>
                                </span> 

                                   <table id="datatable" class="bordered dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Id</th>
                                                    <th>Topup Code</th>
                                                    <th>Card</th>
                                                    <th>Price</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($topups as $key=>$topup)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>{{str_pad($topup->id,10,'0',STR_PAD_LEFT)}}</td>
                                                    <td>{{$topup->topup_code}}</td>
                                                    <td>
                                                        <?php 
                                                            $id = $topup->card;
                                                            $card = App\Card::find($id);
                                                            echo $card->card;
                                                        ?>
                                                    </td>
                                                    <td>{{number_format($topup->amount)}} Ks</td>
                                                    <td><?php if($topup->status=='1'){ ?>
                                                        <span class="tag-about green">
                                                            In Stock
                                                        </span>
                                                        <?php }else{ ?>
                                                        <span class="tag-about red">
                                                            Sold Out
                                                        </span>
                                                        <?php } ?>
                                                    </td>
                                                    <td><!-- Modal Trigger -->
                                                    <a class="modal-trigger waves-effect waves-light tag-about green" href="#modal{{$topup->id}}">View</a>
                                                    <a class="waves-effect waves-light tag-about indigo" href="#">Edit</a>
                                                    <?php if(Auth::user()->role=='1'){; ?>
                                                    <a class="waves-effect waves-light tag-about red" href="#">Delete</a>
                                                    <?php } ?>
                                                    </td>
                                                </tr>
                                                <!-- Modal Structure -->
                                          <div id="modal{{$topup->id}}" class="modal modal-fixed-footer">
                                            <div class="modal-content">
                                                <h2>{{$card->card}}</h2>
                                                <ul class="activity-list margin-v-0">
                                                <li class="blue-color">
                                                    <a href="#">
                                                        <span class="grey-text small-text">Card ID</span>
                                                        <h6 class=" blue-grey-text font-500">{{str_pad($topup->id,10,'0',STR_PAD_LEFT)}}</h6>                                                
                                                    </a>
                                                </li><!--/li-->
                                                <li class="green-color">
                                                    <a href="#">
                                                        <span class="grey-text small-text">Price</span>
                                                        <h6 class=" blue-grey-text font-500">{{$topup->amount}} Ks</h6>                                         
                                                    </a>
                                                </li><!--/li-->
                                                <li class="indigo-color">
                                                    <a href="#">
                                                        <span class="grey-text small-text">Topup Code</span>
                                                        <h6 class=" blue-grey-text font-500">{{$topup->topup_code}}</h6>                                                
                                                    </a>
                                                </li><!--/li-->
                                                <li class="teal-color">
                                                    <a href="#">
                                                        <span class="grey-text small-text">Status</span>
                                                        <h6 class=" blue-grey-text font-500">
                                                            <?php if($topup->status=='1'){ ?>
                                                            <span class="status tag-about green">
                                                                In Stock
                                                            </span>
                                                            <?php }else{ ?>
                                                            <span class="status tag-about red">
                                                                Sold Out
                                                            </span>
                                                            <?php } ?>
                                                        </h6>                                                
                                                    </a>
                                                </li><!--/li-->
                                                <li class="red-color">
                                                    <a href="#">
                                                        <span class="grey-text small-text">Created By/Updated By</span>
                                                        <h6 class=" blue-grey-text font-500">
                                                            <?php 
                                                                $id = $topup->created_by;
                                                                $user = App\User::find($id);
                                                                echo $user->name;
                                                            ?> /
                                                            <?php 
                                                                $id = $topup->updated_by;
                                                                $user = App\User::find($id);
                                                                echo $user->name;
                                                            ?>
                                                        </h6>     
                                                    </a>
                                                </li><!--/li-->
                                                <li class="yellow-color">
                                                    <a href="#">
                                                        <span class="grey-text small-text">Created Date/Updated Date</span>
                                                        <h6 class=" blue-grey-text font-500">{{$topup->created_at}} / {{$topup->updated_at}}</h6>
                                                        <br>      
                                                    </a>
                                                </li><!--/li-->
                                                
                                            </ul>
                                            </div>
                                            <div class="modal-footer">
                                              <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
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