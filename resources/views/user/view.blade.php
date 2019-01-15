@extends('layouts.template')
@section('content')
<?php 
    $current = date('Y-m-d'); 
    $uid    = $user->id;
?>
	<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\Main content Start\\\\\\\\\\\\\\\\\\\\\\\-->
        <main class="main-content">

            <div class="page-content">
                <div class="row margin-b-0">
                    <div class="col s12 m12 l12">
                        <div class="card no-shadow">
                            <div class="card-content">  
                                <span class="card-title">User Info</span>
                                <p>
                   <form action="{{url('search')}}" method="post">             
                                   <div class="row">
    <div class="input-field col s3">
        <input type="text" name="date" required="" placeholder="2017-01-28">
        <label for="number" class="">Search date</label>
    </div>
    <div class="input-field col s3">
        <button type="submit" class="waves-effect waves-light btn indigo btn-block top-8">Search</button>
        <input type="hidden" name="id" value="{{$user->id}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    </div>
</div>
</form>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row margin-b-0">
                    <div class="col s12 m12 l6">
                        <div class="card">
                            <div class="card-content">  
                                <table class="striped">
                                    <tbody>
                                        <tr>
                                            <td>Username</td>
                                            <td>:</td>
                                            <td>{{$user->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>:</td>
                                            <td>{{$user->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>Password</td>
                                            <td>:</td>
                                            <td>{{$user->show_pass}}</td>
                                        </tr>
                                        <tr>
                                            <td>Role</td>
                                            <td>:</td>
                                            <td>{{($user->role==1)? 'admin':'staff'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Created Date</td>
                                            <td>:</td>
                                            <td>{{$user->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <td>Updated Date</td>
                                            <td>:</td>
                                            <td>{{$user->updated_at}}</td>
                                        </tr>
                                    </tbody>
                                </table>    
                            </div>
                        </div>
                    </div>

                    <div class="col s12 m12 l6">
                        <div class="card">
                            <div class="card-content">  
                                <table class="striped">
                                    <tbody>
                                        <tr>
                                            <td>Topups Status</td>
                                            <td>Total</td>
                                            <td>Today</td>
                                        </tr>
                                        <tr>
                                            <td>All Topups (count)</td>
                                            <td>
                                                <span class="tag-about indigo lb-sm">
                                                    {{App\Topup::where('created_by','=',$uid)->count()}}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag-about green lb-sm">
                                                    {{App\Topup::where('created_by','=',$uid)->where('date','=',$current)->count()}}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>MPT Topups (count)</td>
                                            <td>
                                                <span class="tag-about indigo lb-sm">
                                                    {{App\Topup::where('created_by','=',$uid)->where('card','=',1)->count()}}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag-about green lb-sm">
                                                    {{App\Topup::where('created_by','=',$uid)->where('card','=',1)->where('date','=',$current)->count()}}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Orredoo Topups (count)</td>
                                            <td>
                                                <span class="tag-about indigo lb-sm">
                                                    {{App\Topup::where('created_by','=',$uid)->where('card','=',2)->count()}}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag-about green lb-sm">
                                                    {{App\Topup::where('created_by','=',$uid)->where('card','=',2)->where('date','=',$current)->count()}}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Telenor Topups (count)</td>
                                            <td>
                                                <span class="tag-about indigo lb-sm">
                                                    {{App\Topup::where('created_by','=',$uid)->where('card','=',3)->count()}}
                                                </span>
                                           </td>
                                            <td>
                                                <span class="tag-about green lb-sm">
                                                    {{App\Topup::where('created_by','=',$uid)->where('card','=',3)->where('date','=',$current)->count()}}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Telenor Magic Topups (count)</td>
                                            <td>
                                                <span class="tag-about indigo lb-sm">
                                                    {{App\Topup::where('created_by','=',$uid)->where('card','=',4)->count()}}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag-about green lb-sm">
                                                    {{App\Topup::where('created_by','=',$uid)->where('card','=',4)->where('date','=',$current)->count()}}
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>    
                            </div>
                        </div>
                    </div>

                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">  
                                <table id="datatable" class="bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Date</th>
                                    <th>Topup Code</th>
                                    <th>Card</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <?php 
                                $id = $user->id; 
                                $topups = App\Topup::orderBy('id', 'desc')->where('created_by','=',$id)->limit('1000')->get();
                            ?>
                            <tbody>
                            @foreach($topups as $topup)
                                <tr>
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
                                    <td>
                                        <?php if($topup->status=='1'){ ?>
                                            <span class="tag-about green">
                                                In Stock
                                            </span>
                                            <?php }else{ ?>
                                            <span class="tag-about red">
                                                Sold Out
                                            </span>
                                        <?php } ?>
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