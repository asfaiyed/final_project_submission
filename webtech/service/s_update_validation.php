<?php
	?>


<html>
<head>
		<title>Update</title>
		<style>
		body{font-family:$fonts;}
		.phpcoding{width:1500px ;margin: 10; background:#ddd;}
		.header{background:#444;color:#FC8C41 ;text-align:center;padding: 10px;}
		.footer {background:#222;color:#FC8C41 ;text-align:center;padding: 10px;}
		.main{min-height:580px;text-align:center; background:#2F4F4F;}
		.header h2,.footer h2,.main {margin:0 auto;}
		</style>
</head>
<body>
<div class="phpcoding">
<section class="header">
	<h2>Form Submission </h2>
</section>


<?php
		
		$flag_err=0;
		$flag=0;
		
		if(empty($_POST['fname']) or empty($_POST['p_password']) or empty($_POST["email"]) or empty($_POST["education"]) )
			{
				
				global $flag;
				echo "<section class='main'>
					</br></br></br></br></br></br>
						
					<table align='center' border='1' BORDERCOLOR=#FF0000>
									
							<tr>
							<td width=300px text-align:center><span style='color:#FFA500'><b>field can not be empty!!</b></span></td>
							</tr>
							</table>
							</section>";
				
				$flag+=1;
			}
			
		
		function fname($fname)
			{
				global $flag;
				if(str_word_count($fname)<2 && $flag==0)
							{
								global $flag;
								$fname="";
								echo "<section class='main'>
									</br></br></br></br></br></br>
									<table align='center' border='1' BORDERCOLOR=#FF0000	>
									<tr>
									<td width=300px text-align:center><span style='color:#FFA500'><b>FULL NAME:you have to use your full name which contains minimum 2 WORDS!!</b></span></td>
									</tr>
									</table>
									</section>";
								$flag+=1;
							}
			}
			function passwordf()
				{
					global $flag;
					if($flag==0)
						{
								echo "<section class='main'>
							  </br></br></br></br>
							  <table align='center' border='1' BORDERCOLOR=#FF0000>
							  <tr>
						   	  <td width=300px text-align:center><span style='color:#FFA500'><b>incorrect password!!</b></span></td>
								</tr>
								</table>
								</section>";
								$flag+=1;
						}
				}
			function congratulation($fname,$n_password,$education,$email)
				{
					global $flag;
					if($flag==0)
					{		$con=mysqli_connect('localhost','root','','webtech');
							$sql = "UPDATE `users` SET fname='$fname',password='$n_password',education='$education',email='$email' WHERE nname='$_SESSION[nname]'";
							$run=mysqli_query($con, $sql);
							if($run)
							{
								echo "<section class='main'>
									</br></br></br></br></br></br>
									<table align='center' border='1' BORDERCOLOR=#FC8C41>
									<tr>
									<td width=300px text-align:center><span style='color:#00FF00'><b>You have Completed Your UPDATE.</br></b></span></td>
									</tr>
									</table>
									</section>";
							}else{
									echo "</br></br>";
								echo "<section class='main'>
									</br></br></br></br>
									<table align='center' border='1' BORDERCOLOR=#FF0000>
									<tr>
									<td width=300px text-align:center><span style='color:#FFA500'><b>PLEASE FOLLOW THE INSTRUCTION!!!!</b></span></td>
									</tr>
									</table>
									</section>";
								}
					}				
				}
			
		
				
		function Validation($data)
			{
			$data=trim($data);
			$data=htmlspecialchars($data);
			return $data;
			}	
				
				
			
				
				
				
				
?>

	
<section class="footer">
	<h2><table>
	<tr>
			<td><a href="../views/s_profile_update.php"><span style='color:#F4FF09'><h3>back</h3></span></a></td>
			<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
			<td><a href="../views/shome.php"><span style='color:#F4FF09'><h3>home</h3></span></a></td>
	
	</tr>
	</table></h2>
	
</section>
</div>
</body>

</html>




