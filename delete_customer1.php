<?php
include("db_con.php");
$connect->beginTransaction();
$result=$connect->exec("delete from customertb where cust_eid = '".$_GET["cust_eid"]. "'");
$connect->commit();
if($result)
{
	header("LOCATION:show_customer.php");
}
$connect = NULL;
?>