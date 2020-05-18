<?php

	$fonts= "verdana";
	session_start();
	if(!isset($_SESSION['nname'])){  
		header("location: index.php");
	}
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
		echo "<table border='5' BORDERCOLOR=#FC8C41>
									<tr>
										<td><span style='color:#FC8C41 '><b>FULL NAME</b></span></td>
										<td><span style='color:#FC8C41 '><b>NICK NAME</b></span></td>
										<td><span style='color:#FC8C41 '><b>EMAIL ADDRESS</b></span></td>
										<td><span style='color:#FC8C41 '><b>GENDER</b></span></td>
										<td><span style='color:#FC8C41 '><b>EDUCATION</b></span></td>
										</tr>
									";
		
		$con = $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
		$sql = "select * from users";
		$result = mysqli_query($con, $sql);
		while($row=mysqli_fetch_array($result))
			{
				if($row['education']=="ssc")
				{
					echo "<tr>
												<td><span style='color:#2BD790 '>".$row['fname']."</span></td>
												<td><span style='color:#2BD790 '>".$row['nname']."</span></td>
												<td><span style='color:#2BD790 '>".$row['email']."</span></td>
												<td><span style='color:#2BD790 '>".$row['gender']."</span></td>
												<td><span style='color:#2BD790 '>".$row['education']."</span></td>
												
												</tr>";
				}				
			}
		?>
		</table>
					<a href="s_studentList.php"><span style='color:#F4FF09'><b>back</b></span></a>
</section>
	
<section class="footer">
	<h2> <?php echo $_SERVER['PHP_SELF'] ; ?> </h2>
</section>
</div>
</body>

</html>
