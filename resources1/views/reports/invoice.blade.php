
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
                <th>Invoice No</th>
                <th>Date</th>
                <th>Topup Code</th>
                <th>Merchant</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Invoice No</th>
                <th>Date</th>
                <th>Topup Code</th>
                <th>Merchant</th>
            </tr>
        </tfoot>
        <tbody>
        @foreach($invoices as $key=>$invoice)
            <tr>
                <td>{{$invoice->invoice_no}}</td>
                <td>
                    {{$invoice->buying_date}}
                </td>
                <td>
                    <?php 
                        $id = $invoice->topup_id;
                        $topup = App\Topup::find($id);
                        echo $topup->topup_code;
                    ?>
                </td>
                <td>
                    <?php 
                        $id = $invoice->merchant;
                        $merchant = App\Merchant::find($id);
                        echo $merchant->merchant_name;
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
