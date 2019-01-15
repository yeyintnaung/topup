@extends('layouts.template')
@section('content')

	<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\Main content Start\\\\\\\\\\\\\\\\\\\\\\\-->
        <main class="main-content">

            <div class="page-content">
                <div class="row margin-b-0">
                    <div class="col s12 m12 l12">
                        <div class="card no-shadow">
                            <div class="card-content">  
                                <span class="card-title">Buying Topup</span>
                                <p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row margin-b-0">
                    <div class="col s12 m12 l9">
                        <div class="card">
                            <div class="card-content">  
                                <span class="card-title">Topup Buying Form</span>
                                
                                <div class="row margin-b-0">
                                    <form class="col s12" name="form_search" action="{{asset('buying-topup')}}" method="POST">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <select name="card">
                                                    <option value="" disabled selected>Choose Card *</option>
                                                    <?php $cards = App\Card::all();
                                                        foreach ($cards as $card): 
                                                    ?>
                                                        <option value="{{$card->id}}">{{$card->card}}</option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="input-field col s12">
                                                <select name="price">
                                                    <option value="" disabled selected>Choose Price *</option>
                                                    <?php $prices = App\Price::all();
                                                        foreach ($prices as $price): 
                                                    ?>
                                                        <option value="{{$price->id}}">{{number_format($price->price)}} Ks</option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="input-field col s12">
                                                <input type="text"  class="validate" name="merchantID" value="2233125308382324">
                                                <label for="number" class="">Merchant ID</label>
                                            </div>

                                            <div class="input-field col s12">
                                                <input type="text"  class="validate" name="secret" value="JJOSC3O9QGOCZE2S">
                                                <label for="number" class="">Secret</label>
                                            </div>

                                            <div class="input-field col s12">
                                                <button type="submit" class="waves-effect waves-light btn indigo btn-block top-8">Buying Topup</button>
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <input type="hidden" name="user" value="{{Auth::user()->id}}">
                                            </div>

                                        </div>
                                    </form>
                                </div>    
                            </div>
                        </div>
                       

                    </div>
                </div>
            </div>
        </main>
        <!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\Main content end\\\\\\\\\\\\\\\\\\\\\\\-->
@stop