
<!DOCTYPE html>
<html lang="en">
    <head>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="{{asset('css/ionicons.min.css')}}" rel="stylesheet">
        <title>The Banyan Topup</title>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}"  media="screen"/>
        <link href="{{asset('css/fullcalendar.css')}}" rel="stylesheet"> 
        <!--Template style-->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
    </head>
    <body>

 <div id="preloader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>               
            </div>
        </div>
        <!-- end preloader-->
        <div class="display-table">
            <div class="vertical-middle">
                <div class="container">
                    <div class="row margin-b-0">
                        <div class="col s12 l6 offset-l3">
                            <div class="card margin-b-0">
                                <div class="card-content">
                                    <span class="card-title center-align"><h2>Login To The Banyan Topup</h2></span>
                                    <div class="row">

                                           <form class="col s12 margin-b-0" method="POST" action="{{url('/login')}}">
                                           {{ csrf_field() }}
                                                @if ($errors->has('email'))
                                                   <div class="input-field col s12">
                                                        <span class="tag-about red btn-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    </div>
                                                @endif
                                                @if ($errors->has('password'))
                                                    <div class="input-field col s12">
                                                        <span class="tag-about red btn-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    </div>
                                                @endif

                                               <div class="input-field col s12">
                                                   <input id="email" type="email" name="email" class="validate" required/>
                                                   <label for="email" data-error="email format invalid" data-success="email format valid">Email</label>
                                               </div>
                                                   
                                                
                                                <div class="input-field col s12 margin-b-20">
                                                   <input id="password" type="password" name="password" class="validate">
                                                   <label for="password" data-error="wrong" data-success="right">Password</label>
                                                </div>
                                                
                                               <div class="col s12 right-align margin-b-20">
                                                   <button type="submit" class="waves-effect waves-light btn indigo btn-block">sign in</button>
                                               </div>
                                           </form>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
    </body>
</html>