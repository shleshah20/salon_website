<?php
include("db_con.php");
$err="";
if(isset($_POST["btnlogin"])=="login")
{
	$uid=$_POST["uid"];
	$pass=$_POST["pass"];

	$stm = $connect->query("select cust_eid from customertb where cust_eid='".$uid."' and cust_pass='".$pass."'");
	$stm1 =$connect->query("select emp_eid from employeetb where emp_eid='".$uid."' and emp_pass='".$pass."'");
	if($stm1->rowCount()==1)
	{
		header("location:menu1.php");
	}
	else
	{
		if($stm->rowCount()==1)
		{
			header("location:menu.php?cust_eid=$uid");	
		}
		else
		{
			$err= "user not found";
		}
	}
}
?>
<html>
<head>
	<title>login</title>
	<style type="text/css">
		@-webkit-keyframes colorchange{
			0%{
				color:blue;
			}
			10%{
				color:#8e44ad;
			}
			20%{
				color:#1abc9c;
			}
			30%{
				color:#d35400;
			}
			40%{
				color:pink;
			}
			50%{
				color:yellow;
			}
			60%{
				color:red;
			}
			70%{
				color:#f1c40f;
			}
			80%{
				color:#2980b9;
			}
			90%{
				color:#70e1f5;
			}
			100%{
				color:#ffd194;
			}
		}
		h1{
			-webkit-animation:colorchange 20s infinite alternate;
			text-align: center;
			text-transform: capitalize;	
			margin: 0 auto;
		}
		body{
			background-image: url('img/1.jpg');
			background-size: cover;
			margin:0;
			padding: 0;
			height: 500px;
			width: 100%;
		}
		#uid,#pass,#button,a{
			border-radius: 30px;	
			background-color: rgba(192,192,192,0.2);
		}
		#uid,#pass{
			color:black;
		}
		#button,a{
			color:#dc143c;
		}
		form{
			margin-top: 100px;
			margin-bottom: 100px;
			margin-left: 500px;
			margin-right: 500px; 
			background-position: center;
			color:#dc143c;			
		}
	</style>
</head>
<body>
	<center>
	<form align='center' method="POST">
	<h1><span class="trytext"></span></h1>
	<p>USERID:</p>
	<input type="text" name="uid" id="uid"><br><br>
	<p>PASSWORD:</p>
	<input type="password" name="pass" id="pass"><br><br>
	<input type="submit" name="btnlogin" value="login" id="button">
	<br><br>
	<div>
	<?php echo $err?>
	</div>
	<a href="add_customer.php">new customer?</a>
	<br><br></p>
	</center>
	</form>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/typed.min.js"></script>
	<script type="text/javascript">
		var typed = new Typed('.trytext', {
				strings: ["Beauty Salon"],
				typeSpeed: 40,
				loop: true,
				backspeed: 40,
				backDelay: 1000,
				});
	</script>
</body>
</html>