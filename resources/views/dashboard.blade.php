@extends('layouts.template')
@section('content')    
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\Main content Start\\\\\\\\\\\\\\\\\\\\\\\-->
<main class="main-content">
    <div class="page-content">
    <!-- MPT Status -->
        <div class="row margin-b-0">
            <div class="col s12 m6 l3 margin-b-30">
                <div class="widget_1 z-depth-1 blue clearfix">
                    <i class="material-icons white-text">credit_card</i>
                    <div class="content">
                        <h1 class="margin-v-0 white-text">
                            <?php $_1000 = App\Topup::where('amount','=',1000)->where('status','=',1)->where('card','=',1)->get();?>
                            {{count($_1000)}}
                        </h1>
                        <span class="white-text">MPT 1,000Ks</span>
                    </div>
                </div><!--/widget-->
            </div><!--/col-->
            <div class="col s12 m6 l3 margin-b-30">
                <div class="widget_1 z-depth-1 red clearfix">
                    <i class="material-icons white-text">credit_card</i>
                    <div class="content">
                        <h1 class="margin-v-0 white-text">
                            <?php $_3000 = App\Topup::where('amount','=',3000)->where('status','=',1)->where('card','=',1)->get();?>
                            {{count($_3000)}}
                        </h1>
                        <span class="white-text">MPT 3,000Ks</span>
                    </div>
                </div><!--/widget-->
            </div><!--/col-->
            <div class="col s12 m6 l3 margin-b-30">
                <div class="widget_1 z-depth-1 teal clearfix">
                    <i class="material-icons white-text">credit_card</i>
                    <div class="content">
                        <h1 class="margin-v-0 white-text">
                            <?php $_5000 = App\Topup::where('amount','=',5000)->where('status','=',1)->where('card','=',1)->get();?>
                            {{count($_5000)}}
                        </h1>
                        <span class="white-text">MPT 5,000Ks</span>
                    </div>
                </div><!--/widget-->
            </div><!--/col-->
            <div class="col s12 m6 l3 margin-b-30">
                <div class="widget_1 z-depth-1 green clearfix">
                    <i class="material-icons white-text">credit_card</i>
                    <div class="content">
                        <h1 class="margin-v-0 white-text">
                            <?php $_10000 = App\Topup::where('amount','=',10000)->where('status','=',1)->where('card','=',1)->get();?>
                            {{count($_10000)}}
                        </h1>
                        <span class="white-text">MPT 10,000Ks</span>
                    </div>
                </div><!--/widget-->
            </div><!--/col-->
        </div><!--/row-->
    <!-- MPT Status -->

    <!-- Ooredoo Status -->
        <div class="row margin-b-0">
            <div class="col s12 m6 l3 margin-b-30">
                <div class="widget_1 z-depth-1 blue clearfix">
                    <i class="material-icons white-text">web</i>
                    <div class="content">
                        <h1 class="margin-v-0 white-text">
                        <?php $O_1000 = App\Topup::where('amount','=',1000)->where('status','=',1)->where('card','=',2)->get();?>
                        {{count($O_1000)}}
                        </h1>
                        <span class="white-text">Ooredoo 1,000Ks</span>
                    </div>
                </div><!--/widget-->
            </div><!--/col-->
            <div class="col s12 m6 l3 margin-b-30">
                <div class="widget_1 z-depth-1 red clearfix">
                    <i class="material-icons white-text">web</i>
                    <div class="content">
                        <h1 class="margin-v-0 white-text">
                        <?php $O_3000 = App\Topup::where('amount','=',3000)->where('status','=',1)->where('card','=',2)->get();?>
                        {{count($O_3000)}}
                        </h1>
                        <span class="white-text">Ooredoo 3,000Ks</span>
                    </div>
                </div><!--/widget-->
            </div><!--/col-->
            <div class="col s12 m6 l3 margin-b-30">
                <div class="widget_1 z-depth-1 teal clearfix">
                    <i class="material-icons white-text">web</i>
                    <div class="content">
                        <h1 class="margin-v-0 white-text">
                        <?php $O_5000 = App\Topup::where('amount','=',5000)->where('status','=',1)->where('card','=',2)->get();?>
                        {{count($O_5000)}}
                        </h1>
                        <span class="white-text">Ooredoo 5,000Ks</span>
                    </div>
                </div><!--/widget-->
            </div><!--/col-->
            <div class="col s12 m6 l3 margin-b-30">
                <div class="widget_1 z-depth-1 green clearfix">
                    <i class="material-icons white-text">web</i>
                    <div class="content">
                        <h1 class="margin-v-0 white-text">
                        <?php $O_10000 = App\Topup::where('amount','=',10000)->where('status','=',1)->where('card','=',2)->get();?>
                        {{count($O_10000)}}
                        </h1>
                        <span class="white-text">Ooredoo 10,000Ks</span>
                    </div>
                </div><!--/widget-->
            </div><!--/col-->
        </div><!--/row-->
    <!-- Ooredoo Status -->

    <!-- Ooredoo Status -->
        <div class="row margin-b-0">
            <div class="col s12 m6 l3 margin-b-30">
                <div class="widget_1 z-depth-1 blue clearfix">
                    <i class="material-icons white-text">subtitles</i>
                    <div class="content">
                        <h1 class="margin-v-0 white-text">
                        <?php $T_1000 = App\Topup::where('amount','=',1000)->where('status','=',1)->where('card','=',3)->get();?>
                        {{count($T_1000)}}
                        </h1>
                        <span class="white-text">Telenor 1,000Ks</span>
                    </div>
                </div><!--/widget-->
            </div><!--/col-->
            <div class="col s12 m6 l3 margin-b-30">
                <div class="widget_1 z-depth-1 red clearfix">
                    <i class="material-icons white-text">subtitles</i>
                    <div class="content">
                        <h1 class="margin-v-0 white-text">
                        <?php $T_3000 = App\Topup::where('amount','=',3000)->where('status','=',1)->where('card','=',3)->get();?>
                        {{count($T_3000)}}
                        </h1>
                        <span class="white-text">Telenor 3,000Ks</span>
                    </div>
                </div><!--/widget-->
            </div><!--/col-->
            <div class="col s12 m6 l3 margin-b-30">
                <div class="widget_1 z-depth-1 teal clearfix">
                    <i class="material-icons white-text">subtitles</i>
                    <div class="content">
                        <h1 class="margin-v-0 white-text">
                        <?php $T_5000 = App\Topup::where('amount','=',5000)->where('status','=',1)->where('card','=',3)->get();?>
                        {{count($T_5000)}}
                        </h1>
                        <span class="white-text">Telenor 5,000Ks</span>
                    </div>
                </div><!--/widget-->
            </div><!--/col-->
            <div class="col s12 m6 l3 margin-b-30">
                <div class="widget_1 z-depth-1 green clearfix">
                    <i class="material-icons white-text">subtitles</i>
                    <div class="content">
                        <h1 class="margin-v-0 white-text">
                        <?php $T_10000 = App\Topup::where('amount','=',10000)->where('status','=',1)->where('card','=',3)->get();?>
                        {{count($T_10000)}}
                        </h1>
                        <span class="white-text">Telenor 10,000Ks</span>
                    </div>
                </div><!--/widget-->
            </div><!--/col-->
        </div><!--/row-->
    <!-- Ooredoo Status -->

    <!-- Ooredoo Status -->
        <div class="row margin-b-0">
            <div class="col s12 m6 l3 margin-b-30">
                <div class="widget_1 z-depth-1 blue clearfix">
                    <i class="material-icons white-text">tab</i>
                    <div class="content">
                        <h1 class="margin-v-0 white-text">
                        <?php $t_6000 = App\Topup::where('amount','=',6000)->where('status','=',1)->where('card','=',4)->get();?>
                        {{count($t_6000)}}
                        </h1>
                        <span class="white-text">Telenor[Magic] 6,000Ks</span>
                    </div>
                </div><!--/widget-->
            </div><!--/col-->
        </div><!--/row-->
    <!-- Ooredoo Status -->
    </div>
</main>
        <!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\Main content end\\\\\\\\\\\\\\\\\\\\\\\-->
@stop