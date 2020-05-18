<?php

	$fonts= "verdana";
	session_start();
	if(!isset($_SESSION['nname'])){  
		header("location: login.php");
	}
	include('../service/function.php');
	$con = getConnection();
	$sql = "select * from users where nname='{$_SESSION['nname']}'";
	$result = mysqli_query($con, $sql);
	$user = mysqli_fetch_assoc($result);

?>

<html>
<head>
		<title>PHP SYNTEX</title>
		<style>
		body{font-family:$fonts;}
		.phpcoding{width:1500px ;margin: 10; background:#ddd;}
		.header,.footer {background:#444;color:#FC8C41 ;text-align:center;padding: 10px;}
		.main{min-height:580px; background:#444; }
		.header h2,.footer h2 {margin:0 auto; text-align:center;}
		</style>
</head>
<body>
<div class="phpcoding">
<section class="header">
	<h2> <?php echo "<b>".$user['fname']."'s PROFILE</b>" ;?> </h2>
</section>
<section class="main">
			</br></br></br>
			<table color:#FC8C41>
			<tr>
					<td ><span style=color:#FC8C41><b>FULL NAME :</b></span></td>
					<td></td><td></td><td></td>
					<td><span style=color:#FC8C41><?php echo "</br>"."<b>".$user['fname']."</b>"."</br></br>"; ?></span></td>
			</tr>
			
			<tr>
					<td ><span style=color:#FC8C41><b>NICK NAME :</b></span></td>
					<td></td><td></td><td></td>
					<td><span style=color:#FC8C41><?php echo "</br>"."<b>".$_SESSION['nname']."</b>"."</br></br>";?></span></td>
			</tr>
			
			<tr>
					<td ><span style=color:#FC8C41><b> GENDER :</b></span></td>
					<td></td><td></td><td></td>
					<td><span style=color:#FC8C41><?php echo "</br>"."<b>".$user['gender']."</b>"."</br></br>"; ?></span></td>
			</tr>
			
			<tr>
					<td ><span style=color:#FC8C41><b> EDUCATION :</b></span></td>
					<td></td><td></td><td></td>
					<td><span style=color:#FC8C41><?php echo "</br>"."<b>".$user['education']."</b>"."</br></br>"; ?></span></td>
			</tr>
			
			<tr>
					<td ><span style=color:#FC8C41><b> EMAIL ADDRESS :</b></span></td>
					<td></td><td></td><td></td>
					<td><span style=color:#FC8C41><?php echo "</br>"."<b>".$user['email']."</b>"."</br></br>"; ?></span></td>
			</tr>
			
			</table>
			
			</br></br>
			<table>
			<tr>
			<td><a href="shome.php"><span style=color:#F4FF09><b>BACK</b></span></a></td>
			<td></td><td></td><td></td><td></td><td></td><td></td>
			<td><a href="s_profile_update.php"><span style=color:#F4FF09><b>UPDATE PROFILE</b></span></a></td>
			</tr>
			</table>
		
</section>
	
<section class="footer">
	<h2><?php echo $_SERVER['PHP_SELF'] ; ?> </h2>
</section>
</div>
</body>

</html>
