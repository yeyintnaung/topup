@extends('layouts.template')
@section('content')

	<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\Main content Start\\\\\\\\\\\\\\\\\\\\\\\-->
        <main class="main-content">

            <div class="page-content">
                <div class="row margin-b-0">
                    <div class="col s12 m12 l12">
                        <div class="card no-shadow">
                            <div class="card-content">  
                                <span class="card-title">User Info</span>
                                <p>
                                   
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
                                                    {{count(App\Topup::where('created_by','=',$uid)->get())}}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag-about green lb-sm">
                                                    {{count(App\Topup::where('created_by','=',$uid)->where('date','=',$date)->get())}}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>MPT Topups (count)</td>
                                            <td>
                                                <span class="tag-about indigo lb-sm">
                                                    {{count(App\Topup::where('created_by','=',$uid)->where('card','=',1)->get())}}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag-about green lb-sm">
                                                    {{count(App\Topup::where('created_by','=',$uid)->where('card','=',1)->where('date','=',$date)->get())}}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Orredoo Topups (count)</td>
                                            <td>
                                                <span class="tag-about indigo lb-sm">
                                                    {{count(App\Topup::where('created_by','=',$uid)->where('card','=',2)->get())}}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag-about green lb-sm">
                                                    {{count(App\Topup::where('created_by','=',$uid)->where('card','=',2)->where('date','=',$date)->get())}}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Telenor Topups (count)</td>
                                            <td>
                                                <span class="tag-about indigo lb-sm">
                                                    {{count(App\Topup::where('created_by','=',$uid)->where('card','=',3)->get())}}
                                                </span>
                                           </td>
                                            <td>
                                                <span class="tag-about green lb-sm">
                                                    {{count(App\Topup::where('created_by','=',$uid)->where('card','=',3)->where('date','=',$date)->get())}}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Telenor Magic Topups (count)</td>
                                            <td>
                                                <span class="tag-about indigo lb-sm">
                                                    {{count(App\Topup::where('created_by','=',$uid)->where('card','=',4)->get())}}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag-about green lb-sm">
                                                    {{count(App\Topup::where('created_by','=',$uid)->where('card','=',4)->where('date','=',$date)->get())}}
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
                                $topups = App\Topup::orderBy('id', 'desc')->where('created_by','=',$id)->where('date','=',$date)->get();
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