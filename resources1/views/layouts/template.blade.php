
<!DOCTYPE html>
<html lang="en">
<head>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="{{asset('css/ionicons.min.css')}}" rel="stylesheet">
    <title>The Banyan Topup</title>
        
    <!--Import Google Icon Font-->
    <link href="{{asset('css/materialIcons.css')}}" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}"  media="screen"/>
    <!-- dataTables -->
    <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/responsive.bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    
    <!--Template style-->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="preloader">
        <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>               
        </div>
    </div>
    <!-- end preloader-->
    @include('layouts.header')
        
    @include('layouts.sidebar')

    @yield('content')

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
       
    <script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>

    <!-- Datatables-->
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.responsive.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#datatable').dataTable();
        });
    </script>
    <script src="{{asset('js/jquery.formatter.min.js')}}"></script>
    <script src="{{asset('js/input-mask-custom.js')}}"></script>
        
    <!--page script-->
    <script src="{{asset('js/raphael-2.1.0.min.js')}}"></script>
    <script src="{{asset('js/morris.js')}}"></script>
    <script src="{{asset('js/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('js/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('js/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('js/jquery-jvectormap-in-mill.js')}}"></script>
    <script src="{{asset('js/jquery-jvectormap-us-aea-en.js')}}"></script>
    <script src="{{asset('js/jquery-jvectormap-uk-mill-en.js')}}"></script>
    <script src="{{asset('js/jquery-jvectormap-au-mill.js')}}"></script>
    <script src="{{asset('js/dashboard-2.js')}}"></script>
</body>
</html>

<!--https://dribbble.com/shots/2280300-Free-Set-Of-Material-design-avatars-->