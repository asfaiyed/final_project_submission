<?php

	$fonts= "verdana";
	session_start();
	if(!isset($_SESSION['nname'])){  
		header("location: login.php");
		
	}
	$new=$_SESSION['nname'];
?>

<html>
<head>
		<title>s_ssc</title>
		<style>
		body{font-family:$fonts;}
		.phpcoding{width:1500px ;margin: 10; background:#ddd;}
		.header,.footer {background:#444;color:#FC8C41 ;text-align:center;padding: 10px;}
		.main{min-height:580px; background:#444; }
		.header h2,.footer h2 {margin:0 auto;}
		</style>
</head>
<body>
<div class="phpcoding">
<section class="header">
	<h2> SSC STUDENTS </h2>
</section>
<section class="main">
		<?php
		echo "<table border='5' BORDERCOLOR=#FC8C41 align='center'>
									<tr>
										<td><span style='color:#FC8C41 '><b>Teacher NAME</b></span></td>
										<td><span style='color:#FC8C41 '><b>Notice</b></span></td>
										<td><span style='color:#FC8C41 '><b>DATE</b></span></td>
										</tr>
									";
		global $new;
		$con = $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
		$sql = "select * from pnotices where name='$new'";
		$result = mysqli_query($con, $sql);
		while($row=mysqli_fetch_array($result))
			{
					echo "<tr>
												<td><span style='color:#2BD790 '>".$row['teacher_name']."</span></td>
												<td><span style='color:#2BD790 '>".$row['notice']."</span></td>
												<td><span style='color:#2BD790 '>".$row['date']."</span></td>
												
												</tr>";
			}
		?>
		</table>
					</br></br></br></br></br><a href="shome.php"><span style='color:#F4FF09'><b>back</b></span></a>
</section>
	
<section class="footer">
	<h2> <?php echo $_SERVER['PHP_SELF'] ; ?> </h2>
</section>
</div>
</body>

</html>
