<?php
session_start();
	if(!isset($_SESSION['nname'])){  
		header("location: login.php");
	}
	
	
	$con = $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
	$sql = "select * from grade where name='{$_SESSION['nname']}'";
	
	$result = mysqli_query($con, $sql);
	$count =mysqli_num_rows($result);
	

	
	if($count){

		$data = "<table border='5' BORDERCOLOR=#FC8C41 align='center'>
									<tr>
										<td><span style='color:#FC8C41 '><b>Tutor Name</b></span></td>
										<td><span style='color:#FC8C41 '><b>Your Grade</b></span></td>
										<td><span style='color:#FC8C41 '><b>DATE</b></span></td>
										</tr>
									";

		while($row = mysqli_fetch_assoc($result)){
			$data .= "<tr>
					<td><span style='color:#2BD790 '>{$row['teacher_name']}</span></td>
					<td><span style='color:#2BD790 '>{$row['grade']}</span></td>
					<td><span style='color:#2BD790 '>{$row['date']}</span></td>
					
					</tr>";
		}

		$data .= "</table>";
		echo $data;

		
	}
?>
