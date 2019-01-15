<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>The Banyan | Merchant Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php 
    include ('config.php'); 
    $mid = $_SESSION['_mid'];
    
    $topups = "SELECT * FROM invoices WHERE merchant='$mid'"; 
    $rows = $db->query($topups);
    
?>    
    <div id="wrapper">

        <!-- Navigation -->
        <?php include('pages/nav.php'); ?>
        

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">All Invoices</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Invoices Lists
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Invoice No</th>
                                        <th>Topup Code</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Buying Date</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                <?php foreach ($rows as $key => $row) {
                                    # code...
                                ?>  
                                    <tr class="odd gradeX">
                                        <td><?php echo ++$key; ?></td>
                                        <td><?php echo $row['invoice_no']; ?></td>
                                        <td>
                                            <?php 
                                                $cid   = $row['topup_id'];
                                                $topups = "SELECT * FROM topup WHERE id='$cid'"; 
                                                $topup = $db->query($topups);
                                                while ($topupcode = $topup->fetch()) {
                                                    # code...
                                                    echo $topupcode['topup_code'];
                                                };
                                                ?>
                                        </td>
                                        <td>
                                            <?php 
                                                $cid   = $row['topup_id'];
                                                $topups = "SELECT * FROM topup WHERE id='$cid'"; 
                                                $topup = $db->query($topups);
                                                while ($topupcode = $topup->fetch()) {
                                                            # code...
                                                                $cards = $topupcode['card'];

                                                                 $types = "SELECT * FROM cards WHERE id='$cards'"; 
                                                                $type = $db->query($types);
                                                                while ($cardtype = $type->fetch()) {
                                                                    # code...
                                                                        echo $cardtype['card'];
                                                                    };
                                                            };
                                                ?>
                                        </td>
                                        <td>
                                            <?php 
                                                        $cid   = $row['topup_id'];
                                                        $topups = "SELECT * FROM topup WHERE id='$cid'"; 
                                                        $topup = $db->query($topups);
                                                        while ($topupcode = $topup->fetch()) {
                                                            # code...
                                                                echo number_format($topupcode['amount']); 
                                                            };
                                                        ?> Ks
                                        </td>
                                        <td><?php echo $row['buying_date']; ?></td>
                                    </tr>
                                <?php }; ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <div class="well">
                                <h4>Message</h4>
                                <p> Thank you for using the banyan topup.</p>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- /#wrapper -->
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/metisMenu/metisMenu.min.js"></script>
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morrisjs/morris.min.js"></script>
    <script src="data/morris-data.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
</body>

</html>
