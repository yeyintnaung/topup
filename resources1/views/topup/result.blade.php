@extends('layouts.template')
@section('content')
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\Main content Start\\\\\\\\\\\\\\\\\\\\\\\-->
<main class="main-content">
    <div class="page-content">
        <div class="row margin-b-0">
            <div class="col s12 l6">
                <div class="card">                       
                    <div class="card-content">
                        <span class="card-title">Topup Info</span>
                        <table class="striped">
                            <tbody>
                                <tr>
                                    <td>Code</td>
                                    <td>:</td>
                                    <td>{{$topup->topup_code}}</td>
                                </tr>
                                <tr>
                                    <td>Card</td>
                                    <td>:</td>
                                    <td>
                                        <?php 
                                            $id = $topup->card;
                                            $card = App\Card::find($id);
                                            echo $card->card;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td>:</td>
                                    <td>{{number_format($topup->amount)}} Ks</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td>
                                        <?php 
                                        if($topup->status=='1'){ ?>
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
                                <tr>
                                    <td>Created By</td>
                                    <td>:</td>
                                    <td>
                                        <?php 
                                            $id = $topup->created_by;
                                            $user = App\User::find($id);
                                            echo $user->name;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Updated By</td>
                                    <td>:</td>
                                    <td>
                                        <?php 
                                            $id = $topup->updated_by;
                                            $user = App\User::find($id);
                                            echo $user->name;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Created Date</td>
                                    <td>:</td>
                                    <td>{{$topup->created_at}}</td>
                                </tr>
                                <tr>
                                    <td>Updated Date</td>
                                    <td>:</td>
                                    <td>{{$topup->updated_at}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div><!--end cards-->
            </div>
                    
            <!-- Hidden status for in stock -->        
            <?php if($topup->status=='0'){; ?>
            <div class="col s12 l6">
                <div class="card">                       
                    <div class="card-content">
                        <span class="card-title">Merchant Info</span>
                        <table class="striped">
                            <?php 
                                $id = $topup->merchant;
                                $merchant = App\Merchant::find($id);
                            ?>
                            <tbody>
                                <tr>
                                    <td>Merchant Name</td>
                                    <td>:</td>
                                    <td>{{$merchant->merchant_name}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{$merchant->email}}</td>
                                </tr>
                                <tr>
                                    <td>Merchant ID</td>
                                    <td>:</td>
                                    <td>{{$merchant->merchant_id}}</td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td>:</td>
                                    <td>{{($merchant->role==1)? 'special':'normal'}}</td>
                                </tr>
                                <tr>
                                    <td>Balance</td>
                                    <td>:</td>
                                    <td>{{number_format($merchant->balance)}} Ks</td>
                                </tr>
                                <tr>
                                    <td>Invoice No</td>
                                    <td>:</td>
                                    <td>
                                    <?php 
                                        $id = $topup->id;
                                        $invoice = App\Invoice::find($id);
                                    ?>
                                    {{$invoice->invoice_no}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Buying Date</td>
                                    <td>:</td>
                                    <td>
                                        {{$invoice->buying_date}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div><!--end cards-->
            </div>
            <?php } ?>
        </div><!--end row-->
    </div>
</main>
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\Main content end\\\\\\\\\\\\\\\\\\\\\\\-->   
@stop