<!DOCTYPE html>
<html>
<head>
	<title>Appointment</title>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/turn.min.js"></script>
	<style type="text/css">
		body {
			overflow:hidden;
			background-image: url("img/4.png");
			background-size: cover;
		}
		#album .page {
			margin-left: 10px;
			background-image: linear-gradient(to right,#7f7fd5,#86a8e7,#91eae4);
		}
		#album {
			margin: 0;
		}
		img{
			margin:0;
			padding: 0;
		}
		.i1{
			color: red;
			text-align: center;
			text-transform: capitalize;
			font-size: 30px;
			text-align: justify;
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
			margin-right: 30px;
			text-align: center;	
			align-self: center;
			top:10px;
		}
		nav ul li{
			background:white;
			width: 250px;
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
					<li><a href="login.php">log out</a></li>
				</ul>
			</li>
			<li><a href="Appointment.php?cust_eid=<?php echo $res?>"><h2>Appointment</h2></a></li>
			<li><a href="Feedback.php?cust_eid=<?php echo $res?>"><h2>Feedback</h2></a></li>
			<li><a href="about.php?cust_eid=<?php echo $res?>"><h2>About Us</h2></a></li>
		</ul>
	</nav>	
	</div>
	<center>
	<div id="album" >
		<div>
			<center>
			<img src="img/3.jpeg" width="400px" height="600px">
			</center>
		</div>
		<div>
			<img src="img/9.jpg" width="400px" height="600px">
		</div>
		<div>
			<br>
			<h1 class="i1" style="font-size: 50px">For <br>healthier <br>looking hair<br>
			<h1 class="i1" style="font-size: 80px">	<a href="booking.php?cust_eid=<?php echo $res?>&type=hair">book now</h1>
		</div>
		<div>
			<img src="img/10.jpg" width="500px" height="600px">
		</div>
		<div>
			<br>
			<h1 class="i1" style="font-size: 50px">For <br>Outlines <br>of beautiful <br>face<br>
			<h1 class="i1" style="font-size: 80px">	<a href="booking.php?cust_eid=<?php echo $res?>&type=makeup">book now</h1>
		</div>
		<div>
			<img src="img/11.jpg" width="500px" height="600px">
		</div>
		<div>
			<br>
			<h1 class="i1" style="font-size: 50px">For <br>The joy <br>of Best Nail<br>
			<h1 class="i1" style="font-size: 80px">	<a href="booking.php?cust_eid=<?php echo $res?>&type=nail">book now</h1>
		</div>
		<div>
			<img src="img/12.jpg" width="500px" height="600px">
		</div>
		<div>
			<br>
			<h1 class="i1" style="font-size: 50px">For <br> smooth <br> feet<br>
			<h1 class="i1" style="font-size: 80px">	<a href="booking.php?cust_eid=<?php echo $res?>&type=spa">book now</h1>
		</div>
	</center>
	<script type="text/javascript">
		 $('#album').turn({
		 	width:800,
		 	height:600,
		 	page:1,
		 	autoCenter:true,
		 	duration:2000,
		 });
	</script>
</body>
</html>