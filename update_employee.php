<?php
include("db_con.php");
$connect->beginTransaction();
$stm = $connect->query("select * from employeetb where emp_eid = '".$_GET["emp_eid"]."' ");
$res1=$_GET["emp_eid"];
$res=$stm->fetchAll(PDO::FETCH_NUM);
if(isset($_POST["btnupdate"])=="update")
{
	$ename=$_POST["txtcname"];
	$eph=$_POST["txtcph"];
	$edob=$_POST["txtdob"];
	$egender=$_POST["cgender"];
	$ejoindate=$_POST["joindate"];
	$eskill=$_POST["skill"];
	$query = "update employeetb set emp_name='$ename',emp_phno='$eph',emp_dob='$edob',emp_gender='$egender',emp_joindate='$ejoindate',emp_eduction='$eskill' where emp_eid='$res1'";
	$res=$connect->exec($query);
	$connect->commit();
	if($res)
	{
		header("location:show_employee.php");
	}
	$connect = NULL;
}
foreach ($res as $row)
{
?>
<html>
<head>		
	<title>	employee details </title>
	<style type="text/css">
		table{
			margin-top: 50px;
			margin-left: 290px;
			width: 90px;
			color: white;
			border-color: white;
			border-style: double;
			font-size: 16px;
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
		input,label{
			font-size: 20px;
			border-radius: 30px;	
			background-color: rgba(192,192,192,0.2);
			color:black;
			color:#ffffff;
		}
		form{
			margin-top: 60px;
			margin-left: 450px;
			margin-right: 500px; 
			background-position: center;
			color:white;	
			font-size: 30px;		
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
<form method="post" enctype="multipart/form-data">
	email<input type="text" name="txtcid" disabled="true" value="<?php echo $row[0] ?>"><br>
	name<input type="text" name="txtcname"  value="<?php echo $row[1] ?>"><br>
	password:<input type="password" name="txtpass" value="<?php echo $row[2] ?>"><br>
	password:<input type="password" name="txtcpass" value="<?php echo $row[2] ?>"><br>
	phone number<input type="text" name="txtcph"  value="<?php echo $row[3] ?>"><br>
	birth date<input type="date" name="txtdob"  value="<?php echo $row[4] ?>"><br>
	gender:
	male <input type="radio" name="cgender" value="male" <?php if($row[5]=='male') echo "checked"?> >
	female <input type="radio" name="cgender" value="female" <?php if($row[5]=='female') echo "checked"?>><br>
	join date:<input type="date" name="joindate" value="<?php echo $row[7] ?>"><br>
	skill:
	<select  name="skill" >
		<option value="makeup special list" <?php if($row[8]=='makeup special list') echo "checked"?>>makeup special list</option>
		<option value="hair special list" <?php if($row[8]=='hair special list') echo "checked"?> >hair special list</option>
		<option value="nails special list" <?php if($row[8]=='nails special list') echo "checked"?> >nails special list</option>
		<option value="masus special list" <?php if($row[8]=='masseuse special list') echo "checked"?> >masus special list</option>
	</select >
	<br>
	<input type="submit" name=" btnupdate" value="update">
</form>
<?php 
}
 ?>
 </div>
</center>
</body>
</html>