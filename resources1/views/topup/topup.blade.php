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
                        <span class="card-title">All Topups
                                    <span class="tag-about red">Total- 
                                        <?php $total = App\topup::sum('amount');?>
                                        {{(!empty($total) ? number_format($total) : '0')}} Ks
                                    </span> 
                                    <span class="tag-about blue">MPT- 
                                        <?php $mpt = App\topup::where('card','=',1)->sum('amount');?>
                                        {{(!empty($mpt) ? number_format($mpt) : '0')}} Ks
                                    </span>
                                    <span class="tag-about teal">
                                        Ooredoo- 
                                        <?php $ooredoo = App\topup::where('card','=',2)->sum('amount');?>
                                        {{(!empty($ooredoo) ? number_format($ooredoo) : '0')}} Ks
                                    </span>
                                    <span class="tag-about green">
                                        Telenor- 
                                        <?php $telenor = App\topup::where('card','=',3)->sum('amount'); ?>
                                        {{(!empty($telenor) ? number_format($telenor) : '0')}} Ks
                                    </span>
                                    <span class="tag-about indigo">
                                        Telenor[Magic]- 
                                        <?php $telenor2 = App\topup::where('card','=',4)->sum('amount'); ?>
                                        {{(!empty($telenor2) ? number_format($telenor2) : '0')}} Ks
                                    </span>
                        </span> 

                        <table id="datatable" class="bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Id</th>
                                    <th>Date</th>
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
                                    <td>{{$topup->date}}</td>
                                    <td>
                                    <?php 
                                        $var = $topup->topup_code; 
                                        $code = substr_replace($var, str_repeat("*",4),0,4);
                                        echo $code;
                                    ?>
                                    </td>
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
                                        <a class="waves-effect waves-light tag-about green" href="{{asset('topup/'.$topup->id)}}">View</a>
                                        <a class="waves-effect waves-light tag-about indigo" href="#">Edit</a>
                                        <?php if(Auth::user()->role=='1'){; ?>
                                        <a class="waves-effect waves-light tag-about red" href="#">Delete</a>
                                        <?php } ?>
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