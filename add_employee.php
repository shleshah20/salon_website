<?php
include("db_con.php");
if(isset($_POST["btnsubmit"])=="submit")
{
	$eid=$_POST["txtcid"];
	$ename=$_POST["txtcname"];
	$pass=$_POST["txtpass"];
	$epass=$_POST["txtcpass"];
	$eph=$_POST["txtcph"];
	$edob=$_POST["txtdob"];
	$egender=$_POST["cgender"];
	$ejoindate=$_POST["joindate"];
	$eskill=$_POST["skill"];
	$filetmp_path=$_FILES['txtcpic']['tmp_name'];
	$dest_path="upload/".$_FILES['txtcpic']['name'];
	if(move_uploaded_file($filetmp_path, $dest_path))
	{
		echo "file uploaded successfully";
	}
	else
	{
		echo "upload fail";
	}
	if(strcmp($pass,$epass)!=0)
	{
		echo "password doesnot match";
	}
	try {
		$connect->beginTransaction();
		$query = "insert into employeetb(emp_eid,emp_name,emp_pass,emp_phno,emp_dob,emp_gender,emp_pic,emp_joindate,emp_eduction) values('$eid','$ename','$epass',$eph,'$edob','$egender','$dest_path','$ejoindate','$eskill')";
		$res=$connect->exec($query);
		$connect->commit();
	}
	catch (PDOException $e) {
		echo $e->getMessage();
		$connect->rollback();
	}
	if($res)
	{
		header("location:show_employee.php");
	}
$connect=null;
}
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
		input,a{
		border-radius:100px;	
		background-color: rgba(192,192,192,0.2);
		color:black;
		font-size: 20px;
		}
		label {
			display: inline-block;
			min-width: 150px;
			text-transform: capitalize;
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
	email:<input type="text" name="txtcid"><br>
	name:<input type="text" name="txtcname"><br>
	password:<input type="password" name="txtpass"><br>
	password:<input type="password" name="txtcpass"><br>
	phone number:<input type="number" name="txtcph"><br>
	birth date:<input type="date" name="txtdob"><br>
	gender:
	male <input type="radio" name="cgender" value="male">
	female <input type="radio" name="cgender" value="female"><br>
	picture:<input type="file" name="txtcpic"><br>
	join date:<input type="date" name="joindate"><br>
	skill:
	<select  name="skill">
		<option value="makeup special list" >makeup special list</option>
		<option value="hair special list" >hair special list</option>
		<option value="nails special list" >nails special list</option>
		<option value="masus special list" >masus special list</option>
	</select >
	<br>
	<input type="submit" name=" btnsubmit" value="submit">
</form>
</body>
</html>