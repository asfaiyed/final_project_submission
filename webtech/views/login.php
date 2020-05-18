<?php
	
	$fonts= "verdana";
	$Global['flag']=1;
	session_start();
	if(isset($_SESSION['nname'])){  
		header("location: Home.php");
	}
	
?>

<html>
<head>
		<title>PHP SYNTEX</title>
		<style>
		body{font-family:$fonts;}
		.phpcoding{width:1500px ;margin: 10; background:#ddd;}
		.header,.footer {background:#444;color:#FC8C41 ;text-align:center;padding: 10px;}
		.main{min-height:580px;text-align:center;}
		.header h2,.footer h2 {margin:0 auto;}
		
		</style>
</head>
<body>
<div class="phpcoding">
<section class="header">
	<h2> Welcome to Our Site </h2>
</section>
<section class="main">
		
		<html>
			<head>
				<title><b>Log IN</b></title>
			</head>
			<form action="../php/log_check.php" method="post">
				<body>
					<h3>UserName</h3>
					<input type="text" name="nname" value="" required />
					<h3>User Type</h3>
					<input type="radio" name="type" value="admin" required/>Admin
						<input type="radio" name="type" value="tp" />Tution Provider
						<input type="radio" name="type" value="teacher" />Teacher
						<input type="radio" name="type" value="student" />Student
						<div id="type" class="val"></div>
					<h3>Password</h3>
					<input type="password" name="password" value="" required />
					<br /><br />
					<input type="submit" name="submit" value="submit" />
					<a href="registration.php">GO to Registration</a>
					
					
				</body>
			</form>
		</html>
		
		
		

</section>	
<section class="footer">
	<h2><?php echo $_SERVER['PHP_SELF'] ; ?></h2>
</section>
</div>
</body>
</html>
