<?php
include("db_con.php");
$connect->beginTransaction();
$result=$connect->exec("delete from employeetb where emp_eid = '".$_GET["emp_eid"]. "'");
$connect->commit();
if($result)
{
	header("LOCATION:show_employee.php");
}
$connect = NULL;
?>