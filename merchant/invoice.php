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

    if(isset($_GET['invoice'])){
        $inid = $_GET['invoice'];

        $codes = "SELECT * FROM invoices WHERE merchant='$mid' AND invoice_no='$inid'"; 
        $code = $db->query($codes);
        $count = $code->rowcount();
    }else{
        $count = 0;
    }
    
    
    
?>    
    <div id="wrapper">

        <!-- Navigation -->
        <?php include('pages/nav.php'); ?>
        

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Invoice Info</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Invoice Info:
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- /.table-responsive -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="invoice.php" method="get">
                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-lg-2">
                                                                    <label>Search Topup Code</label>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <input class="form-control" placeholder="Enter topup code" name="invoice">
                                                                </div>
                                                                <div class="col-lg-2">
                                                                    <button type="submit" class="btn btn-default">Search</button>
                                                                </div>
                                                            </div>   
                                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-12">
                                    <div class="">

                                        <h3>Invoice Result:</h3>
                                        <?php if($count >0){; ?>

                                        <table width="100%" class="table table-striped table-bordered table-hover" >
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Content</th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                            <?php while ($row = $code->fetch()) {
                                            ?>  
                                                <tr class="odd gradeX">
                                                    <td>Invoice No</td>
                                                    <td><?php echo $row['invoice_no']; ?></td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td>Topup Code</td>
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
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td>Type</td>
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
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td>Price</td>
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
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td>Status</td>
                                                    <td>
                                                        <?php 
                                                        $cid   = $row['topup_id'];
                                                        $topups = "SELECT * FROM topup WHERE id='$cid'"; 
                                                        $topup = $db->query($topups);
                                                        while ($topupcode = $topup->fetch()) {
                                                            # code...
                                                                echo ($topupcode['status']=='1')? 'In Stock':'Sold Out'; 
                                                            };
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td>Created By</td>
                                                    <td>
                                                        <?php 
                                                        $cid   = $row['topup_id'];
                                                        $topups = "SELECT * FROM topup WHERE id='$cid'"; 
                                                        $topup = $db->query($topups);
                                                        while ($topupcode = $topup->fetch()) {
                                                            # code...
                                                                $uid = $topupcode['created_by'];
                                                                $user1 = $db->query("SELECT * FROM users WHERE id='$uid'");
                                                                while ($cuser = $user1->fetch()) {
                                                                # code...
                                                                    echo $cuser['name'];
                                                                };  
                                                            };
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td>Updated By</td>
                                                    <td>
                                                        <?php 
                                                        $cid   = $row['topup_id'];
                                                        $topups = "SELECT * FROM topup WHERE id='$cid'"; 
                                                        $topup = $db->query($topups);
                                                        while ($topupcode = $topup->fetch()) {
                                                            # code...
                                                                $uid = $topupcode['updated_by'];
                                                                $user1 = $db->query("SELECT * FROM users WHERE id='$uid'");
                                                                while ($cuser = $user1->fetch()) {
                                                                # code...
                                                                    echo $cuser['name'];
                                                                };  
                                                            };
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td>Merchant</td>
                                                    <td>
                                                        <?php 
                                                        $mid   = $row['merchant'];
                                                        if(!empty($mid)){ 
                                                            $merchant = $db->query("SELECT * FROM merchants WHERE id='$mid'");
                                                            while ($mer = $merchant->fetch()) {
                                                            # code...
                                                                echo $mer['merchant_name'];
                                                            };  
                                                        }else{
                                                            echo "-";
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td>Buying Date</td>
                                                    <td>
                                                        <?php echo $row['buying_date']; ?>
                                                    </td>
                                                </tr>
                                            <?php }; ?>
                                            </tbody>
                                        </table>
                                        <?php }else{; ?>
                                            <h3>Topup code not found!</h3>
                                        <?php }; ?>
                                    </div>
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
