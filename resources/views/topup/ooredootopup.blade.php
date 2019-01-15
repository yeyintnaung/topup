@extends('layouts.template')
@section('content')
<?php $user = Auth::user()->id; ?>
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\Main content Start\\\\\\\\\\\\\\\\\\\\\\\-->
<main class="main-content">
    <div class="page-content">
        <div class="row margin-b-0">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content"> 
                        <strong>{{Session::get('message')}}</strong> 
                        <span class="card-title no-margin">Topup Status
                            <span class="tag-about red">Today - 
                                <?php $total = App\Topup::where('date','=',date('Y-m-d'))
                                ->where('card','=',2)
                                ->where('created_by','=',$user)
                                ->get();?>
                                {{count($total)}}
                            </span> 
                            <span class="tag-about blue">1,000 Ks - 
                                <?php $_1000 = App\Topup::where('date','=',date('Y-m-d'))
                                ->where('card','=',2)
                                ->where('created_by','=',$user)
                                ->where('amount','=',1000)
                                ->get();?>
                                {{count($_1000)}}
                            </span>
                            <span class="tag-about teal">3,000 Ks - 
                                <?php $_3000 = App\Topup::where('date','=',date('Y-m-d'))
                                ->where('card','=',2)
                                ->where('created_by','=',$user)
                                ->where('amount','=',3000)
                                ->get();?>
                                {{count($_3000)}}
                            </span>
                            <span class="tag-about green">5,000 Ks - 
                                <?php $_5000 = App\Topup::where('date','=',date('Y-m-d'))
                                ->where('card','=',2)
                                ->where('created_by','=',$user)
                                ->where('amount','=',5000)
                                ->get();?>
                                {{count($_5000)}}
                            </span>
                            <span class="tag-about indigo">10,000 Ks - 
                                <?php $_10000 = App\Topup::where('date','=',date('Y-m-d'))
                                ->where('card','=',2)
                                ->where('created_by','=',$user)
                                ->where('amount','=',10000)
                                ->get();?>
                                {{count($_10000)}}
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row margin-b-0">
            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-content">  
                        <span class="card-title about-tag teal type custom-title">Ooredoo 1,000 Ks</span>
                                
                        <div class="row margin-b-0">
                            <form class="col s12" action="{{asset('ooredootopup')}}" method="POST">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="number" id="" length="5" class="validate" name="topup_code" required/>
                                        <label for="number" class="">Topup Code</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <button type="submit" class="waves-effect waves-light btn indigo btn-block top-8">Create</button>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" name="card" value="2">
                                        <input type="hidden" name="price" value="1">
                                        <input type="hidden" name="user" value="{{Auth::user()->id}}">
                                    </div>
                                </div>
                            </form>
                        </div>    
                    </div>
                </div>
            </div>

            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-content">  
                        <span class="card-title about-tag teal type custom-title">Ooredoo 3,000 Ks</span>
                        <div class="row margin-b-0">
                            <form class="col s12" action="{{asset('ooredootopup')}}" method="POST">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="number" id="" class="validate" name="topup_code" required/>
                                        <label for="number" class="">Topup Code</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <button type="submit" class="waves-effect waves-light btn indigo btn-block top-8">Create</button>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" name="card" value="2">
                                        <input type="hidden" name="price" value="2">
                                        <input type="hidden" name="user" value="{{Auth::user()->id}}">
                                    </div>
                                </div>
                            </form>
                        </div>    
                    </div>
                </div>
            </div>

            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-content">  
                        <span class="card-title about-tag teal type custom-title">Ooredoo 5,000 Ks</span>
                        <div class="row margin-b-0">
                            <form class="col s12" action="{{asset('ooredootopup')}}" method="POST">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="number" id="" class="validate" name="topup_code" required/>
                                        <label for="number" class="">Topup Code</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <button type="submit" class="waves-effect waves-light btn indigo btn-block top-8">Create</button>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" name="card" value="2">
                                        <input type="hidden" name="price" value="3">
                                        <input type="hidden" name="user" value="{{Auth::user()->id}}">
                                    </div>
                                </div>
                            </form>
                        </div>    
                    </div>
                </div>
            </div>

            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-content">  
                        <span class="card-title about-tag teal type custom-title">Ooredoo 10,000 Ks</span>
                        <div class="row margin-b-0">
                            <form class="col s12" action="{{asset('ooredootopup')}}" method="POST">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="number" id="" class="validate" name="topup_code" required/>
                                        <label for="number" class="">Topup Code</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <button type="submit" class="waves-effect waves-light btn indigo btn-block top-8">Create</button>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" name="card" value="2">
                                        <input type="hidden" name="price" value="4">
                                        <input type="hidden" name="user" value="{{Auth::user()->id}}">
                                    </div>
                                </div>
                            </form>
                        </div>    
                    </div>
                </div>
            </div>

            <!-- Show today status -->
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">  
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
                                <?php 
                                    $topups = App\Topup::where('date','=',date('Y-m-d'))
                                    ->where('card','=',2)
                                    ->where('created_by','=',$user)
                                    ->orderBy('updated_at','DESC')
                                    ->get();
                                ?>
                                @foreach($topups as $key => $topup)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{str_pad($topup->id,10,'0',STR_PAD_LEFT)}}</td>
                                    <td>
                                    	<?php 
                                            $var = $topup->topup_code; 
                                            $code = substr_replace($var, str_repeat("*",4),0,4);
                                            echo $code;
                                        ?>
                                    </td>
                                    <td><?php 
                                            $id = $topup->card;
                                            $card = App\Card::find($id);
                                        ?>
                                        {{$card->card}}
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
                                    <td>
                                        <a class="waves-effect waves-light tag-about green" href="{{url('topup/'.$topup->id)}}">View</a>
                                        <a class="waves-effect waves-light tag-about indigo" href="{{url('topup/'.$topup->id.'/edit')}}">Edit</a>
                                    </td>
                                </tr>
                                @endforeach
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