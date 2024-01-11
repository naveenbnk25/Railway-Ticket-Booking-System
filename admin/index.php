<?php
session_start();
if (isset($_POST['submit']))
{
	$conn = mysqli_connect("localhost","root","","railways");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
$email=$_POST['email'];
$pw=$_POST['pw'];
$sql ="SELECT * FROM login WHERE email = '$email' AND pw = '$pw';";
$sql_result = mysqli_query ($conn, $sql) or die ('Could not execute SQL query '.$sql);
		$user = mysqli_fetch_assoc($sql_result);
		if(!empty($user)){
			$_SESSION['user_info'] = $user['email'];
			$message='Logged in successfully';
		}
		else{
			$message = 'Wrong email or password.';
		}
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>INDIAN RAILWAYS</title>
</head>
<script type="text/javascript">
	function validate()	{
		var EmailId=document.getElementById("user_account");
		var atpos = EmailId.value.indexOf("@");
    	var dotpos = EmailId.value.lastIndexOf(".");
		var pw=document.getElementById("user_password");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=EmailId.value.length) 
		{
        	alert("Enter valid email-ID");
			EmailId.focus();
        	return false;
   		}
   		if(pw.value.length< 8)
		{
			alert("Password consists of atleast 8 characters");
			pw.focus();
			return false;
		}
		return true;
	}
</script>
<style type="text/css">
	#loginarea{
		background-color: palevioletred;
		width: 30%;
		margin: auto;
		border-radius: 25px;
		border: 2px solid blue;
		margin-top: 100px;
		background-color:lightcyan;
	    box-shadow: inset -2px -2px rgba(0,0,0,0.5);
	    padding: 40px;
	    font-family:sans-serif;
		font-size: 20px;
		color: black;
	}
	body{
	background-image: url("../images/bg1.jpg");
  background-position: center;
  background-size: cover;
  background-repeat:no-repeat;

	}
	#submit	{
		border-radius: 5px;
		background-color: black;
		padding: 7px 7px 7px 7px;
		box-shadow: inset -1px -1px rgba(0,0,0,0.5);
		font-family:"Comic Sans MS", cursive, sans-serif;
		font-size: 17px;
		margin:auto;
		margin-top: 20px;
  		display:block;
  		color: white;
	}
	#logintext	{
		text-align: center;
	}
	.data	{
		color: black;
	}

	ul {
      list-style: none;
      margin: 0;
      padding: 0;
      position: absolute;
      top: 0;
      right:0;
    }

    li {
      display: inline-block;
      margin-right: 100; 
    }

    a {
      text-decoration:none;
      color: black;
	  background: white;
    }
</style>
<body>
<li><a href="../"><span></span><h3> Return Home</h3></a></li>
	
	    </ul>
	<div id="loginarea">
	<form id="login" action="index.php" onsubmit="return validate()" method="post" name="login">
	<div id="logintext">Login to Indian Railways!</div><br/><br/>
	<table>
		<tr><td><div class="data">Enter E-Mail ID:</div></td><td><input type="text" id="email" size="30" maxlength="30" name="email"/></td></tr>
		<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
		<tr><td><div class="data">Enter Password:</div></td><td><input type="password" id="pw" size="30" maxlength="30" name="pw"/></td></tr>
		<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
	</table>
	<INPUT TYPE="Submit" value="Submit" name="submit" id="submit" class="button">
	</form></div>
	<br></br>
	<ul class="nav navbar-nav navbar-right">
	   
</body>
</html>