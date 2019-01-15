@extends('layouts.template')
@section('content')
    <?php
    ?>
    <!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\Main content Start\\\\\\\\\\\\\\\\\\\\\\\-->
    <main class="main-content">


        <div class="page-content">
            <div class="row margin-b-0">
                <div class="col s12 m12 l12">
                    <div class="card no-shadow">
                        <div class="card-content">
                            <span class="card-title">{{\App\User::where('id',$id)->first()->name}}</span>
                            <p>
                                <form action="{{url('count_by_date')}}" method="post">
                                <input type="month" name="date"/>
                                <input type="hidden" name="id" value="{{$id}}"/>
                                <input type="submit" value="search"/>
                               </form>


                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <table id="datatable" class="bordered dt-responsive nowrap">
                            <thead>
                            <tr>
                                <th style="width:33px;">id</th>

                                <th style="width:300px;">Total</th>
                                <th style="width:300px;" >Mpt</th>
                                <th style="width:300px;">Tel</th>
                                <th style="width:222px;">Ooredoo</th>
                                <th>DATE</th>
                            </tr>
                            </thead>
                            <?php
                            $topups =DB::table('topup')->select('date')->where('created_by',$id)->whereMonth('created_at',$m)->whereYear('created_at',$y)->groupBy('date')->orderBy('date','desc')->limit(30)->get();
                            ?>
                            <tbody>
                            @php
                                $count=0;
                            @endphp

                            @foreach($topups as $topup)
                                <tr>
                                    <td>@php
                                            $count++;
                                        @endphp
                                        {{$count}}
                                    </td>
                                    <td style="padding-right:0px;">
                                        <div class="row" style="width:80%;margin-left:0px;">

                                            <button type="button" class="btn btn-primary" style="width:20%;background-color:#c431ff;">{{App\Topup::where([['created_by','=',$id],['date','=',$topup->date],['amount','=',1000]])->count()}} <span class="badge"></span></button>
                                            <button type="button" class="btn btn-danger" style="width:20%;background-color:#ff1253;">{{App\Topup::where([['created_by','=',$id],['date','=',$topup->date],['amount','=',3000]])->count()}} <span class="badge"></span>
                                            </button>

                                        </div>
                                        <div class="row" style="width:80%;margin-left:0px;">
                                            <button type="button" class="btn btn-primary" style="width:20%;background-color:#1e83ff;">{{App\Topup::where([['created_by','=',$id],['date','=',$topup->date],['amount','=',5000]])->count()}} <span class="badge"></span></button>
                                            <button type="button" class="btn btn-danger" style="width:20%;background-color:#6223ff;">{{App\Topup::where([['created_by','=',$id],['date','=',$topup->date],['amount','=',10000]])->count()}} <span class="badge"></span>
                                            </button>

                                        </div>
                                    </td>
                                    <td>
                                        <div class="row" style="width:80%;margin-left:0px;">
                                            <button type="button" class="btn btn-primary" style="width:20%;background-color:#c431ff;">{{App\Topup::where([['created_by','=',$id],['date','=',$topup->date],['amount','=',1000],['card','=',1]])->count()}} <span class="badge"></span></button>
                                            <button type="button" class="btn btn-danger" style="width:20%;background-color:#ff1253;">{{App\Topup::where([['created_by','=',$id],['date','=',$topup->date],['amount','=',3000],['card','=',1]])->count()}} <span class="badge"></span>
                                            </button>

                                        </div>
                                        <div class="row" style="width:80%;margin-left:0px;">
                                            <button type="button" class="btn btn-primary" style="width:20%;background-color:#1e83ff;">{{App\Topup::where([['created_by','=',$id],['card','=',1],['date','=',$topup->date],['amount','=',5000]])->count()}} <span class="badge"></span></button>
                                            <button type="button" class="btn btn-danger" style="width:20%;background-color:#6223ff;">{{App\Topup::where([['created_by','=',$id],['date','=',$topup->date],['amount','=',10000],['card','=',1]])->count()}} <span class="badge"></span>
                                            </button>

                                        </div>
                                    </td>
                                    <td>
                                        <div class="row" style="width:80%;margin-left:0px;">
                                            <button type="button" class="btn btn-primary" style="width:20%;background-color:#c431ff;">{{App\Topup::where([['created_by','=',$id],['date','=',$topup->date],['amount','=',1000],['card','=',3]])->count()}} <span class="badge"></span></button>
                                            <button type="button" class="btn btn-danger" style="width:20%;background-color:#ff1253;">{{App\Topup::where([['created_by','=',$id],['date','=',$topup->date],['amount','=',3000],['card','=',3]])->count()}} <span class="badge"></span>
                                            </button>

                                        </div>
                                        <div class="row" style="width:80%;margin-left:0px;">
                                            <button type="button" class="btn btn-primary" style="width:20%;background-color:#1e83ff;">{{App\Topup::where([['created_by','=',$id],['card','=',3],['date','=',$topup->date],['amount','=',5000]])->count()}} <span class="badge"></span></button>
                                            <button type="button" class="btn btn-danger" style="width:20%;background-color:#6223ff;">{{App\Topup::where([['created_by','=',$id],['date','=',$topup->date],['amount','=',10000],['card','=',3]])->count()}} <span class="badge"></span>
                                            </button>

                                        </div></td>

                                    <td> <div class="row" style="width:80%;margin-left:0px;">
                                            <button type="button" class="btn btn-primary" style="width:20%;background-color:#c431ff;">{{App\Topup::where([['created_by','=',$id],['date','=',$topup->date],['amount','=',1000],['card','=',2]])->count()}} <span class="badge"></span></button>
                                            <button type="button" class="btn btn-danger" style="width:20%;background-color:#ff1253;">{{App\Topup::where([['created_by','=',$id],['date','=',$topup->date],['amount','=',3000],['card','=',2]])->count()}} <span class="badge"></span>
                                            </button>

                                        </div>
                                        <div class="row" style="width:80%;margin-left:0px;">
                                            <button type="button" class="btn btn-primary" style="width:20%;background-color:#1e83ff;">{{App\Topup::where([['created_by','=',$id],['card','=',2],['date','=',$topup->date],['amount','=',5000]])->count()}} <span class="badge"></span></button>
                                            <button type="button" class="btn btn-danger" style="width:20%;background-color:#6223ff;">{{App\Topup::where([['created_by','=',$id],['date','=',$topup->date],['amount','=',10000],['card','=',2]])->count()}} <span class="badge"></span>
                                            </button>

                                        </div></td>

                                    <td>{{$topup->date}}</td>

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