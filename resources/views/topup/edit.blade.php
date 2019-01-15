

<?php
$has=\Illuminate\Support\Facades\DB::table('topup')->where('status',7)->count();
if($has > 0){
    \Illuminate\Support\Facades\DB::table('topup')->where('status',7)->update(['status'=>1]);
}

echo header("Cache-Control:no-store,no-cache,must-revalidate,max-age=0");header("Cache-Control:post-check=0,pre-check=0", false);header("Pragma:no-cache");header('Content-Type:text/html');

?><!DOCTYPE html>
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
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\Main content Start\\\\\\\\\\\\\\\\\\\\\\\-->

<main class="main-content">
    <?php
    use Illuminate\Support\Facades\Session;
    $getid=\Illuminate\Support\Facades\DB::table('topup')->where('id',$topup->id)->first();

    if ($getid->status == '1')
    {
        \Illuminate\Support\Facades\DB::table('topup')->where('id',$topup->id)->update(['status'=>'7']);
    }
    ?>
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