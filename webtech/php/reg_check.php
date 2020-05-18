<?php
	include('../service/validation_registration.php');
	
	$fonts= "verdana";
	session_start();
	if(isset($_SESSION['nname'])){  
		header("location: ../views/Home.php");
		
	}
	
	
				if($_SERVER["REQUEST_METHOD"] == "POST" )
					{
								$fname=		$_POST["fname"];
								$nname=		$_POST["nname"];
								$password=	$_POST["password"];
								$gender=	$_POST["gender"];
								$education=	$_POST["education"];
								$email=     $_POST["email"];
								$type=		$_POST["type"];
								
								$filename = $_FILES["mypic"]["name"];
								$tempname = $_FILES["mypic"]["tmp_name"];
								$folder = "../views/upload/".$filename;
								move_uploaded_file($tempname,$folder);
	

								Validation($fname);
								Validation($nname);
								fname($fname);
								nname($nname);
								if(strlen($password) < 5)
									{
										passwordf();
										
									}
								if($flag_err==0)
									{
										
										congratulation($fname,$nname,$password,$gender,$education,$email,$folder,$type);
										
									}
								
							
					}
					
				
?>


	