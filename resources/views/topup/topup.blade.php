@extends('layouts.template')
@section('content')
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\Main content Start\\\\\\\\\\\\\\\\\\\\\\\-->
<main class="main-content">
    <div class="page-content">
        <div class="row margin-b-0">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <strong>{{Session::get('message')}}</strong>
                        <span class="card-title no-margin">All Topups
                                    <span class="tag-about red">Total- 
                                        <?php $total = App\Topup::sum('amount');?>
                                        {{(!empty($total) ? number_format($total) : '0')}} Ks
                                    </span> 
                                    <span class="tag-about blue">MPT- 
                                        <?php $mpt = App\Topup::where('card','=',1)->sum('amount');?>
                                        {{(!empty($mpt) ? number_format($mpt) : '0')}} Ks
                                    </span>
                                    <span class="tag-about teal">
                                        Ooredoo- 
                                        <?php $ooredoo = App\Topup::where('card','=',2)->sum('amount');?>
                                        {{(!empty($ooredoo) ? number_format($ooredoo) : '0')}} Ks
                                    </span>
                                    <span class="tag-about green">
                                        Telenor- 
                                        <?php $telenor = App\Topup::where('card','=',3)->sum('amount'); ?>
                                        {{(!empty($telenor) ? number_format($telenor) : '0')}} Ks
                                    </span>
                                    
                        </span> 
                    </div>
                </div>
            </div>
        </div>

        <div class="row margin-b-0">
            <div class="col s12">
                <div class="card">                       
                    <div class="card-content">
                        

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
                             <?php $topups = DB::table('topup')->limit(100)->get(); ?>
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
                                    <form method="post" action="{{asset('topup/'.$topup->id)}}">
                                        <a class="btn waves-effect waves-light tag-about green" href="{{asset('topup/'.$topup->id)}}">View</a>
                                        <a class="btn waves-effect waves-light tag-about indigo" href="{{asset('topup/'.$topup->id.'/edit')}}">Edit</a>
                                        <?php if(Auth::user()->role=='1'){; ?>
                                        
					    <input type="hidden" name="id" value="{{ $topup->id }}">
					    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					    <input type="hidden" name="_method" value="DELETE">
					       <button type="submit" class="btn waves-effect waves-light tag-about red">Delete</button>
					    
                                        <?php } ?>
                                        </form>
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