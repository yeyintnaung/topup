@extends('layouts.template')
@section('content')
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\Main content Start\\\\\\\\\\\\\\\\\\\\\\\-->
<main class="main-content">
    <div class="page-content">
        <div class="row margin-b-0">
            <div class="col s6">
                <div class="card">                       
                    <div class="card-content">
                        <div class="col-md-6">
                            <span class="text-info">{{Session::get('message')}}</span>
                        </div>
                        <div class="row margin-b-0">
                            <span class="card-title about-tag teal type">Topup Edit Form</span>
                            <form class="col s12" action="{{asset('topup/'.$topup->id)}}" method="post">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="number" id="" length="5" class="validate" name="code" required="" value="{{$topup->topup_code}}">
                                        <label for="number" class="">Topup Code</label>
                                    <span class="character-counter" style="float: right; font-size: 12px; height: 1px;"></span></div>
                                    <div class="input-field col s12">
                                        <button type="submit" class="waves-effect waves-light btn indigo btn-block top-8">Edit</button>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" name="_method" value="put">
                                        <input type="hidden" name="user" value="{{Auth::user()->id}}">
                                    </div>
                                </div>
                            </form>
                        </div>                                     
                    </div>  
                </div><!--end cards-->
            </div>
        </div><!--end row-->
    </div>
</main>
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\Main content end\\\\\\\\\\\\\\\\\\\\\\\-->   
@stop