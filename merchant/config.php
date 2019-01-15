<?php

$DB_host = "localhost";
$DB_user = "cp329131_topup";
$DB_pass = "topup2016";
$DB_name = "cp329131_topup";


try
	{
	 	$db = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
	 	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
	 	echo $e->getMessage();
	}
?>