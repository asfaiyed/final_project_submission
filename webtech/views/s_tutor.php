<?php

	$fonts= "verdana";
	session_start();
	if(!isset($_SESSION['nname'])){  
		header("location: login.php");
	}
	
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
	<h2> <?php echo "<b>Your TUTOR</b>" ;?> </h2>
</section>
<section class="main">
			</br></br></br>
			
			
			
			
			<?php
	
	$con = $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
	$sql = "select * from s_tutor where student='{$_SESSION['nname']}'";
	
	$result = mysqli_query($con, $sql);
	$count =mysqli_num_rows($result);
	

	
	if($count){

		$data = "<table border='5' BORDERCOLOR=#FC8C41 align='center'>
									<tr>
										<td><span style='color:#FC8C41 '><b>SUBJECT</b></span></td>
										
										<td><span style='color:#FC8C41 '><b>Tutor Name</b></span></td>
										<td><span style='color:#FC8C41 '><b>Select</b></span></td>
										<td><span style='color:#FC8C41 '><b>Delete it</b></span></td>
										</tr>
									";

		while($row = mysqli_fetch_assoc($result)){
			$data .= "<tr>
					<form action='../php/s_tutor_delete.php' method='post' role='form'>
					<td><span style='color:#2BD790 '>{$row['subject']}</span></td>
					<td><span style='color:#2BD790 '>{$row['tutor']}</span></td>
					<td>
						<input type='checkbox' name='keyToDelete' value='{$row['id']}' required>
					</td>
					<td>
						<input type='submit' name='submit' value='delete' style='color:#FF4500 ' >
					</td>
					</form>					
					</tr>";
		}

		$data .= "</table>";
		echo $data;

		
	}
?>
			
			
			</br></br>
			<table>
			<tr>
			<td><a href="shome.php"><span style=color:#F4FF09><b>BACK</b></span></a></td>
			<td></td><td></td><td></td><td></td><td></td><td></td>
			<td><a href="s_tutor_add.php"><span style=color:#F4FF09><b>Add Tutor</b></span></a></td>
			
			
			</tr>
			</table>
			
			
			
			<h1 id="abc"></h1>

	<form>
		<input type="button" name="" value="Check all grades" style='color:#E308D5' onclick="ajax()">
		</form>

	<script type="text/javascript">
		
		function ajax(){
			

			var xhttp = new XMLHttpRequest();	
			xhttp.onreadystatechange = function() {

			    if (this.readyState == 4 && this.status == 200){
			    	document.getElementById("abc").innerHTML = this.responseText;
			    }
			};
			
			xhttp.open("POST", "../service/s_grade.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(); 
		}

	
	</script>

			
			
		
</section>
	
<section class="footer">
	<h2><?php echo $_SERVER['PHP_SELF'] ; ?> </h2>
</section>
</div>
</body>

</html>
