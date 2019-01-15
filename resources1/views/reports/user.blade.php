
<link rel="stylesheet" type="text/css" href="{{asset('css/buttons.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/jquery.dataTables.min.css')}}
">
<!--Import materialize.css-->
<link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}"  media="screen"/>

<!--Template style-->
<link href="{{asset('css/style.css')}}" rel="stylesheet">
<table id="example" class="display nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Topup Code</th>
                <th>Card</th>
                <th>Price</th>
                <th>Status</th>
                <th>User</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Topup Code</th>
                <th>Card</th>
                <th>Price</th>
                <th>Status</th>
                <th>User</th>
            </tr>
        </tfoot>
        <tbody>
        @foreach($topups as $key=>$topup)
            <tr>
                <td>{{str_pad($topup->id,10,'0',STR_PAD_LEFT)}}</td>
                <td>{{$topup->format}}</td>
                <td>{{$topup->code}}{{$topup->created_by}}</td>
                <td><?php 
                        $id = $topup->card;
                        $card = App\Card::find($id);
                        echo $card->card;
                    ?>
                </td>
                <td>{{number_format($topup->amount)}} Ks</td>
                <td>{{($topup->status=='1')? 'in stock':'sold out'}}</td>
                <td>
                    <?php 
                        $id = $topup->user;
                        $user = App\User::find($id);
                        echo $user->name;
                    ?>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


    <script type="text/javascript" src="{{asset('js/jquery-1.12.4.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/dataTables.buttons.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/buttons.flash.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jszip.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/pdfmake.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/vfs_fonts.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/buttons.html5.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/buttons.print.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );
    </script>
