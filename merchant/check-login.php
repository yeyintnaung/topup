<?php
    //set session and connect database
    session_start();
    include("config.php");
    //check required fields
    if( !empty($_POST['email']) && 
        !empty($_POST['password'])
    ){
        //set form value with variable
        $email     = trim($_POST['email']);
        $password  = trim($_POST['password']);
        //select query to validate correct username and password
        $query   = "SELECT * FROM merchants WHERE email='$email' AND password='$password'";
        $stmt    = $db->prepare( $query );
        $stmt    ->execute();
        $exists  = $stmt->rowcount();

        if($exists >0)
        {
            while ($row =$stmt->fetch())
            {
                $email = $row['email'];
                $name  = $row['merchant_name'];
                $id    = $row['id'];
            }
            $_SESSION['_email']  = $email;
            $_SESSION['_name']   = $name;
            $_SESSION['_mid']    = $id;
            header("location:index.php");
        }else{
            //invalid username and password
            echo '<script>window.location.assign("login.php?1");</script>';
        }
    }else{
        //required field(s) error
        echo '<script>window.location.assign("login.php?2");</script>';
    }   
?>