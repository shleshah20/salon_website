<?php
include("db_con.php");
$fnameerr=$lnameerr=$unameerr=$pswerr=$conpswerr=$generr=$connoerr=$mailerr="";
$c=0;
if(isset($_POST["btnsubmit"])=="submit")
{
	$cid=$_POST["txtcid"];
	$cname=$_POST["txtcname"];
	$pass=$_POST["txtpass"];
	$cpass=$_POST["txtcpass"];
	$cph=$_POST["txtcph"];
	$cdob=$_POST["txtdob"];
	$cgender=$_POST["txtgender"];
	$filetmp_path=$_FILES['txtcpic']['tmp_name'];
	$dest_path="upload/".$_FILES['txtcpic']['name'];
	if(empty($cname))
	{
		$lnameerr= "name is require";
		$c++;
	}
	if(empty($cid))
	{
		$unameerr= "Username is require";
		$c++;
	}
	if(empty($pass))
	{
		$pswerr= "Password is require";
		$c++;
	}
	if(empty($cpass))
	{
		$conpswerr= "Please confirm the password";
		$c++;
	}
	if(empty($cph))
	{
		$connoerr= "Contact is require";
		$c++;
	}
	if(!move_uploaded_file($filetmp_path, $dest_path))
	{
		$fnameerr = "file upload fail";
		$c++;
	}
	if(!preg_match('/^[a-zA-Z]*$/',$cname))
	{
		$lnameerr='Alphabets Only';
		$c++;
	}
	if(!preg_match('/(?=.[A-Z])(?=.[a-z])(?=.[0-9])(?=.[@_#*]).{8,}$/',$pass))
	{
		$pswerr='Formate:Abcd@123(Size:min[8])';
		$c++;
	}
	if(strcmp($pass,$cpass)!=0)
	{
		$conpswerr= "password doesnot match";
		$c++;
	}
	if(!preg_match('/^[0-9]{10}$/',$cph))
	{
		$connoerr='10 digit only';
		$c++;
	}
	if(!filter_var($cid,FILTER_VALIDATE_EMAIL))
	{
		$mailerr='Invalid email formate';
		$c++;
	}
	if($c==0)
	{
		try {
		$connect->beginTransaction();
		$query = "insert into customertb(cust_eid,cust_name,cust_pass,cust_phno,cust_dob,cust_gender,cust_pic) values('$cid','$cname','$cpass',$cph,'$cdob','$cgender','$dest_path')";
		$res=$connect->exec($query);
		$connect->commit();
		}
		catch (PDOException $e) {
			echo $e->getMessage();
			$connect->rollback();
		}
		if($res)
		{
			header("location:login.php");
		}
	}	
$connect=null;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>registration</title>
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
		margin-top: 100px;
		margin-bottom: 100px;
		margin-left: 400px;
		margin-right: 500px; 
		background-position: center;
		color:#dc143c;	
		font-size: 30px;		
	}
</style>

</head>
<body>
<form method="post" enctype="multipart/form-data">
	<label>email</label>
	<input type="text" name="txtcid"><br>
	<?php echo $mailerr;?><br>
	<label>name</label>
	<input type="text" name="txtcname"><br>
	<?php echo $lnameerr;?><br>
	<label>password</label>
	<input type="password" name="txtpass"><br>
	<?php echo $pswerr;?><br>
	<label>password</label>
	<input type="password" name="txtcpass"><br>
	<?php echo $conpswerr;?><br>
	<label>phone number</label>
	<input type="number" name="txtcph"><br>
	<?php echo $connoerr;?><br>
	<label>birth date</label>
	<input type="date" name="txtdob"><br>
	<label>gender:</label>
	<br>
	<input type="radio" name="txtgender" value="male" checked="true">
	<label>male</label>
	<input type="radio" name="txtgender" value="female">
	<label>female</label><br>
	<label>picture:</label>
	<input type="file" name="txtcpic"><br>
	<?php echo $fnameerr; ?><br>
	<input type="submit" name=" btnsubmit" value="submit">
</form>