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
	<h2> Pending request of the teachers </h2>
</section>
<section class="main">
		
		
		
		<?php
	global $new;
	$con = $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
	$sql = "select * from s_req where student='$new'";
	$result = mysqli_query($con, $sql);
	$count =mysqli_num_rows($result);
	

	
	if($count){

		$data = "</br></br></br>
					<table border='5' BORDERCOLOR=#FC8C41 align='center'>
									<tr>
										<td><span style='color:#FC8C41 '><b>Tutor Name</b></span></td>
										
										<td><span style='color:#FC8C41 '><b>Subject</b></span></td>
										
										<td><span style='color:#FC8C41 '><b>Requested Time</b></span></td>
										</tr>
									";

		while($row = mysqli_fetch_assoc($result)){
			$data .= "<tr>
					<td><span style='color:#2BD790 '>{$row['tutor']}</span></td>
					<td><span style='color:#2BD790 '>{$row['subject']}</span></td>
					<td><span style='color:#2BD790 '>{$row['time']}</span></td>
					</tr>";
		}

		$data .= "</table>";
		echo $data;

	}
?>
		
		
		
		
		
		
		
		
		
		</br></br>
					<a href="shome.php"><span style='color:#F4FF09'><b>back</b></span></a>
</section>
	
<section class="footer">
	<h2> <?php echo $_SERVER['PHP_SELF'] ; ?> </h2>
</section>
</div>
</body>

</html>
