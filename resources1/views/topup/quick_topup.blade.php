@extends('layouts.template')
@section('content')
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\Main content Start\\\\\\\\\\\\\\\\\\\\\\\-->
<main class="main-content">
            <div class="page-content">
                <div class="row margin-b-0">
                    <div class="col s6">
                        <div class="card">                       
                            <div class="card-content">
                                <span class="card-title">Quick Topup </span>
                                <div class="row margin-b-0">
                                <?php if(empty($topup)){ ;?>
                                    <div class="widget_1 z-depth-1 clearfix">
                                    <i class="material-icons blue-grey-text">not_interested</i>
                                    <div class="content">
                                        <h1 class="margin-v-0">Topup Sold Out</h1>
                                    </div>
                                    <a href="{{asset('/')}}" class="waves-effect waves-light btn indigo btn-block top-8">Back Dashboard</a>
                                    </div>
                                </div>
                                <?php }else{; ?>
                                <div class="widget_1 z-depth-1 clearfix">
                                    <i class="material-icons green-text">add_shopping_cart</i>
                                    <div class="content">
                                        <h1 class="margin-v-0">{{$topup->topup_code}}</h1>
                                        
                                        <?php $card = App\Card::find($topup->card); ?>
                                            <span class="tag-about green">{{$card->card}}</span>
                                            <span class="tag-about teal">{{$topup->amount}} Ks</span>
                                    </div>
                                
                                    <form class="" name="form_search" action="{{asset('topup/soldout')}}" method="POST">
                                        <button type="submit" class="waves-effect waves-light btn green btn-block top-8">Sold Out</button>
                                        <a href="{{asset('/')}}" class="waves-effect waves-light btn indigo btn-block top-8">Back Dashboard</a>
                                        <input type="hidden" name="id" value="{{$topup->id}}">
                                        <input type="hidden" name="card" value="{{$topup->card}}">
                                        <input type="hidden" name="amount" value="{{$topup->amount}}">
                                        <input type="hidden" name="code" value="{{$topup->topup_code}}">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" name="user" value="{{Auth::user()->id}}">
                                    </form>
                                </div>
                                <?php } ?>
                                </div>
                            </div>
                            
                        </div><!--end cards-->
                    </div>
                </div><!--end row-->
            </div>
        </main>
        <!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\Main content end\\\\\\\\\\\\\\\\\\\\\\\--> 
@stop