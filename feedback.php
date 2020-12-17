<?php
include("db_con.php");
if(isset($_POST["btnsubmit"])=="submit")
{
	$res=$_GET["cust_eid"];
	$feedback=$_POST["txtfeedback"];
	$rate=$_POST["txtrate"];
	try {
		$connect->beginTransaction();
		$query = "insert into feedbacktb(cust_eid,review,rating) values ('$res','$feedback',$rate)";
		echo $query;
		$res1=$connect->exec($query);
		$connect->commit();
	}
	catch (PDOException $e) {
		echo $e->getMessage();
		$connect->rollback();
	}
	if($res)
	{
		header("location:show_customer.php");
	}
	$connect=null;
}
?>

<html>
<head>	
	<title>	feedback page</title>
	<style type="text/css">
		body{
			background-image: url("img/4.png");
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
			<?php
			$res=$_GET["cust_eid"];
			?>
			<li><a href="menu.php?cust_eid=<?php echo $res?>"><h2>Home</h2></a></li>
			<li><h2>Account</h2>
				<ul>
					<li><a href="update_customer.php?cust_eid=<?php echo $res?>"><h2>Account update</h2></a></li>
					<li><a href="delete_customer.php?cust_eid=<?php echo $res?>"><h2>Account delete</h2></a></li>
				</ul>
			</li>
			<li><a href="Appointment.php?cust_eid=<?php echo $res?>"><h2>Appointment</h2></a></li>
			<li><a href="feedback.php?cust_eid=<?php echo $res?>"><h2>Feedback</h2></a></li>
			<li><a href="about.php?cust_eid=<?php echo $res?>"><h2>About Us</h2></a></li>
		</ul>
	</ul>	
</nav>
	<h1 style="color:white;font-size: 50px;margin-left: 150px">Beauty Salon </h1>
	<center>
<form method="post" enctype="multipart/form-data">
	<h2>please give ur kind review/suggestion</h2>
	<textarea rows="15" cols="80" name="txtfeedback" style="margin-left: 100px"></textarea>
	<br>
	<h2>
	<label>rate (between 0 to 10 )</label>
	<input type="number" name="txtrate" max="10" min="1">
	<br></h2>
	<input type="submit" name="btnsubmit" value="submit">
	</form>
	</center>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
</body>
</html>