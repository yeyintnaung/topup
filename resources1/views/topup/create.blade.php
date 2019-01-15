@extends('layouts.template')
@section('content')
<style type="text/css">
    #mpt,#ooredoo,#telenor,#telenor2{
        display: none;
    }
</style>
	<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\Main content Start\\\\\\\\\\\\\\\\\\\\\\\-->
        <main class="main-content">

            <div class="page-content">
                <div class="row margin-b-0">
                    <div class="col s12 m12 l12">
                        <div class="card no-shadow">
                            <div class="card-content">  
                                <span class="card-title">Create Topup</span>
                                <p>
                                    Forms are the standard way to receive user inputted data. The transitions and smoothness of these elements are very important because of the inherent user interaction associated with forms.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row margin-b-0">
                    <div class="col s12 m12 l9">
                        <div class="card">
                            <div class="card-content">  
                                <span class="card-title">Topup Create Form</span>
                                
                                <div class="row margin-b-0">
                                    <form class="col s12" name="form_search" action="{{asset('topup')}}" method="POST">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <select id="filterCountry" name="card">
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
                                                <span id="mpt" >
                                                <input type="text" id="mptcard" class="validate" name="mpt" length="12">
                                                <label for="number" class="" >Topup Code [MPT]</label>
                                                </span>

                                                <span id="ooredoo" >
                                                <input type="text" id="ooredoocard" class="validate" name="ooredoo">
                                                <label for="number" class="">Topup Code [Ooredoo]</label>
                                                </span>

                                                <span id="telenor" >
                                                <input  type="text" id="telenorcard" class="validate" name="telenor">
                                                <label for="number" class="">Topup Code [Telenor]</label>
                                                </span>

                                                <span id="telenor2" >
                                                <input type="text" id="telenorcard2" class="validate" name="telenor2">
                                                <label for="number" class="">Topup Code [Telenor (magic)]</label>
                                                </span>
                                            </div>

                                            <div class="input-field col s12">
                                                <button type="submit" class="waves-effect waves-light btn indigo btn-block top-8">Create Topup</button>
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