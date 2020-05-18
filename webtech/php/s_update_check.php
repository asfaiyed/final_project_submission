<?php
	include('../service/s_update_validation.php');
	
	$fonts= "verdana";
	session_start();
	if(!isset($_SESSION['nname'])){  
		header("location: ../views/login.php");
		
	}
	
	include('../service/function.php');
	$con = getConnection();
	$sql = "select * from users where nname='{$_SESSION['nname']}'";
	$result = mysqli_query($con, $sql);
	$user = mysqli_fetch_assoc($result);

	
	
				if($_SERVER["REQUEST_METHOD"] == "POST" )
					{
								$fname=		$_POST["fname"];
								
								$n_password=	$_POST["n_password"];
								$p_password=	$_POST["p_password"];
								$education=	$_POST["education"];
								$email=     $_POST["email"];
							

								Validation($fname);
								fname($fname);
								if($p_password != $user['password'])
									{
										passwordf();
										
									}
								if(strlen($n_password) < 5)
									{
										if(strlen($n_password) != "")
											{
												passwordf();
											}
										
									}
				
							if($flag_err==0)
									{
										
										congratulation($fname,$n_password,$education,$email);
										
									}
								
							
					}
					
				
?>


	