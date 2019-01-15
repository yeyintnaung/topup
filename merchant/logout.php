<?php
    session_start();
    unset($_SESSION['_email']);
    unset($_SESSION['_name']);
    unset($_SESSION['_mid']);
    header("location:index.php");
?>