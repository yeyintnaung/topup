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
    
    $allmerchants = "SELECT * FROM merchants WHERE id='$mid'"; 
    $merchants = $db->query($allmerchants);
    
?>    
    <div id="wrapper">

        <!-- Navigation -->
        <?php include('pages/nav.php'); ?>
        

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Account Info</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Account Info:
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- /.table-responsive -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="">
                                        <table width="100%" class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Content</th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                        <?php while ($merchant = $merchants->fetch()) {
                                        ?>  
                                            <tr class="odd gradeX">
                                                <td>Name</td>
                                                <td><?php echo $merchant['merchant_name']; ?></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>Email</td>
                                                <td><?php echo $merchant['email']; ?></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>Password</td>
                                                <td><?php echo $merchant['password']; ?></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>Merchant ID</td>
                                                <td><?php echo $merchant['merchant_id']; ?></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>Secret</td>
                                                <td><?php echo $merchant['secret']; ?></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>Role</td>
                                                <td><?php echo ($merchant['role']=='1')? 'special':'normal'; ?></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>Balance</td>
                                                <td><?php echo number_format($merchant['balance']); ?> Ks</td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>Status</td>
                                                <td><?php echo ($merchant['status']=='1')? 'active':'inactive'; ?></td>
                                            </tr>
                                        <?php }; ?>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="well">
                                        something here!
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
