<?php
	
	//include('../service/function.php');

	$search = $_GET['key'];

	$con = $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
	$sql = "select * from users where nname like '%{$search}%'";
	$result = mysqli_query($con, $sql);
	$count =mysqli_num_rows($result);
	

	
	if($count){

		$data = "<table border='5' BORDERCOLOR=#FC8C41>
									<tr>
										<td><span style='color:#FC8C41 '><b>FULL NAME</b></span></td>
										<td><span style='color:#FC8C41 '><b>NICK NAME</b></span></td>
										<td><span style='color:#FC8C41 '><b>GENDER</b></span></td>
										<td><span style='color:#FC8C41 '><b>Email Address</b></span></td>
										<td><span style='color:#FC8C41 '><b>EDUCATION</b></span></td>
										</tr>
									";

		while($row = mysqli_fetch_assoc($result)){
			$data .= "<tr>
					<td><span style='color:#2BD790 '>{$row['fname']}</span></td>
					<td><span style='color:#2BD790 '>{$row['nname']}</span></td>
					<td><span style='color:#2BD790 '>{$row['gender']}</span></td>
					<td><span style='color:#2BD790 '>{$row['email']}</span></td>
					<td><span style='color:#2BD790 '>{$row['education']}</span></td>
			</tr>";
		}

		$data .= "</table>";
		echo $data;

	}else{
		echo "<span style=color:#FC8C41><b>No result found!!!!!</b></span>";
		
		
	}
?>