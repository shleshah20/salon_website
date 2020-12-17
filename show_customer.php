<?php
include("db_con.php");
$stm = $connect->query("select * from customertb");
$res=$stm->fetchAll(PDO::FETCH_NUM);
?>
<html>
<head>		
	<title>	customer detaiils</title>
	<style type="text/css">
		table{
			margin-top: 50px;
			margin-left: 300px;
			color: white;
			border-color: white;
			border-style: double;
			font-size: 17px;
		}
		body{
			background-image: url("img/6.jpg");
			background-size: cover;
		}
		a:link,a:visited,a:active{
			color:black;
			text-decoration: none;
		}
		div{
			text-align: center;
			text-transform: capitalize;	
			margin: 0 auto;			
		}
		nav ul{
			margin: 0;
			padding: 0;
			margin-left: 150px;
			text-align: center;	
			align-self: center;
			top:10px;
		}
		nav ul li{
			background:white;
			width: 200px;
			opacity: 0.8;
			line-height: 40px;
			text-align: center;	
			font-size: 20px;
			margin: 1px;
			position: 	relative;	
			list-style: none;	
			display: inline-block;
		}
		nav ul li ul a{
			text-decoration: none;
			display: block;	
			padding: 	0 15px;
			color:white;
			line-height: 80px;
			font-size: 20px;
		}
		nav ul li ul a:hover{
			background-color:#24342;
		}
		nav ul ul{
			position: absolute;
			top: 10px;
			display: none;	
		}
		nav ul li:hover >ul{
			display: block;	
		}
		nav ul ul li{
			width: 150px;
			display: list-item;	
			position: relative;	
		}
		nav ul ul ul li{
			position: relative;
			top: -60px;
			left: 150px;
		}
	</style>
</head>
<body>
	<center>
	<div>	
	<nav>
		<ul>
			<li><a href="menu1.php"><h2>Home</h2></a></li>
			<li><h2>details</h2>
				<ul>
					<li><a href="show_customer.php"><h2>Customer details</h2></a></li>
					<li><a href="show_employee.php"><h2>Employee details</h2></a></li>
					<li><a href="show_appointment.php"><h2>Appointment details</h2></a></li>
					<li><a href="show_feedback.php"><h2>Feedback details</h2></a></li>
				</ul>
			</li>
			<li><h2><a href="login.php">log out </a></h2></li>

		</ul>
	</ul>	
</nav>
<br><br><br><br>

<a style="color:black;" href="add_customer.php">add customer</a>
<table border="1">
	<tr>
		<td>name</td>
		<td>email</td>
		<td>birthdate</td>
		<td>phone number</td>
		<td>gender</td>
		<td>picture</td>
		<td>update</td>
		<td>delete</td>
	</tr>
<?php
foreach($res as $row)
{
?>
	<tr>
		<td><?php echo $row[1];?></td>
		<td><?php echo $row[0];?></td>
		<td><?php echo $row[4];?></td>
		<td><?php echo $row[3];?></td>
		<td><?php echo $row[5];?></td>
		<td><?php echo "<img src='$row[6]' width='100' height='100'>" ?></td>
		<td><a href="update_customer1.php?cust_eid=<?= $row[0];?>"> update </a></td>
		<td><a href="delete_customer1.php?cust_eid=<?= $row[0];?>"> delete </a></td>
	</tr>
<?php
}
$connect = NULL;
?>
</table>

</body>
</html>