<?php
include("db_con.php");
$connect->beginTransaction();
$res=$_GET["cust_eid"];
$stm = $connect->query("select * from customertb where cust_eid = '".$_GET["cust_eid"]."' ");
$res1=$stm->fetchAll(PDO::FETCH_NUM);
$fnameerr=$lnameerr=$unameerr=$pswerr=$conpswerr=$generr=$connoerr=$mailerr="";
$c=0;
if(isset($_POST["btnupdate"])=="update")
{
	$cname=$_POST["txtcname"];
	$cph=$_POST["txtcph"];
	$cdob=$_POST["txtdob"];
	$cgender=$_POST["cgender"];

	if(empty($cname))
	{
		$lnameerr= "name is require";
		$c++;
	}
	if(empty($cgender))
	{
		$generr= "Gender not selected";
		$c++;
	}
	if(empty($cph))
	{
		$connoerr= "Contact is require";
		$c++;
	}
	if(!preg_match('/^[a-zA-Z]*$/',$cname))
	{
		$lnameerr='Alphabets Only';
		$c++;
	}
	if(!preg_match('/^[0-9]{10}$/',$cph))
	{
		$connoerr='10 digit only';
		$c++;
	}
	if($c==0)
	{
		try{
			$query = "update customertb set cust_name='$cname',cust_phno='$cph',cust_dob='$cdob',cust_gender='$cgender',cust_pass='$pass' where cust_eid = '$res'";
			$res1=$connect->exec($query);
			$connect->commit();
		}
		catch (PDOException $e) {
			echo $e->getMessage();
			$connect->rollback();
		}
		if($res1)
		{
			header("location:show_customer");
		}
	}
	$connect = NULL;
}
foreach ($res1 as $row)
{
?>
<html>
<head>		
	<title>	home page</title>
	<style type="text/css">
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

<form method="post" enctype="multipart/form-data">
	<label>Email</label>
	<input type="text" name="txtcid" disabled="true" value="<?php echo $row[0] ?>"><br>
	<label>Name:</label><input type="text" name="txtcname"  value="<?php echo $row[1] ?>"><br>
	<label>Password:</label><input disabled="true" type="password" name="txtpass" value="<?php echo $row[2] ?>"><br>
	<label>Confirm Password:</label><input disabled="true" type="password" name="txtcpass" value="<?php echo $row[2] ?>"><br>
	<label>Phone Number:</label><input type="text" name="txtcph"  value="<?php echo $row[3] ?>"><br>
	<label>Birth Date</label><input type="date" name="txtdob"  value="<?php echo $row[4] ?>"><br>
	<label>Gender:</label>
	<label>Male </label><input type="radio" name="cgender" value="male" <?php if($row[5]=='male') echo "checked"?> >
	<label>Female </label><input type="radio" name="cgender" value="female" <?php if($row[5]=='female') echo "checked"?>><br>
	<input type="submit" name=" btnupdate" value="update">
</form>
<?php 
}
 ?>
</table>
</body>
</html>