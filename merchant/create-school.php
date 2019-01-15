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

    <title>EDU - ADMIN</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="js/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxtownships.php',
                data:'id='+stateID,
                success:function(html){
                    $('#township').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#township').html('<option value="">Select state first</option>');
            $('#city').html('<option value="">Select  first</option>'); 
        }
    });
    
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
});
</script>
    
</head>

<body>
<?php 
    include ('../inc/config.php'); 
    //Get all country data
    $query = $db->query("SELECT * FROM states_and_regions WHERE status=1 ORDER BY name ASC");
    
    //Count total number of rows
    $rowCount = $query->rowcount();    
    //echo "count ".$rowCount;                         
?>


<div id="wrapper">

        <!-- Navigation -->
        <?php include('pages/nav.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Create School</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            School Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="created-school.php" method="post">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                    &nbsp;
                                                </div>
                                                <div class="col-lg-2">
                                                    <label>School Name</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input class="form-control" placeholder="Enter School" name="school">
                                                </div>
                                                <div class="col-lg-1">
                                                    &nbsp;
                                                </div>
                                            </div>   
                                        </div>


                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                    &nbsp;
                                                </div>
                                                <div class="col-lg-2">
                                                    <label>States &amp; Regions</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <select class="form-control" name="rs_id" id="state" >
                                                    <?php
                                                        if($rowCount > 0){
                                                            foreach ($query as $key => $row) {
                                                                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                                            }
                                                        }else{
                                                            echo '<option value="">States and regions not available</option>';
                                                        }
                                                    ?>
                                                    </select>
                                                </div>
                                                <div class="col-lg-1">
                                                    &nbsp;
                                                </div>
                                            </div>   
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                    &nbsp;
                                                </div>
                                                <div class="col-lg-2">
                                                    <label>Townships</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <select class="form-control" name="township" id="township">
                                                        <option value="">Select state or region first</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-1">
                                                    &nbsp;
                                                </div>
                                            </div>   
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                    &nbsp;
                                                </div>
                                                <div class="col-lg-2">
                                                    <label>Status</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <select class="form-control" name="status">
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-1">
                                                    &nbsp;
                                                </div>
                                            </div>   
                                        </div>


                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                &nbsp;
                                                </div>
                                                <div class="col-lg-8">
                                                    <button type="submit" class="btn btn-default">Create</button>
                                                    <button type="reset" class="btn btn-default">Reset</button>
                                                </div>
                                                <div class="col-lg-1">
                                                &nbsp;
                                                </div>
                                            </div>   
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
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

</body>

</html>
