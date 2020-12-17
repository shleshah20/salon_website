<?php
try{
	$dsn="mysql:host=localhost;dbname=salondb";
	$user="root";
	$pass="";
	$connect=new PDO($dsn,$user,$pass);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo "error".$e->getMessage()."<br>";
}
?>	