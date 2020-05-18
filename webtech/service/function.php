<?php
	
	require('db.php');
	
	function validate($nname, $password,$type){

		$con = getConnection();
		$sql = "select * from users where nname='{$nname}' and password='{$password}' and type='{$type}'";
		$result = mysqli_query($con, $sql);
		$user = mysqli_fetch_assoc($result);									
							
		return $user;
	}


	function getAllUsers(){
		$con = getConnection();
		$sql = "select * from users";
		$result = mysqli_query($con, $sql);
		return $result;
	}

?>