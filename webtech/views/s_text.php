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
	<h2> <?php echo "<b>Previous grade and can send massage </b>" ;?> </h2>
</section>
<section class="main">
			</br></br></br>
			
			
			
			
			<?php
	if(isset($_POST['submit']))
	{		
			global $new;
			$con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
			$key=$_POST['keyToDelete'];
			$text=$_POST['text'];
			
			$sql = "select * from rnotices where name='$new' and notice='$text' and teacher_name='$key';";
			$result = mysqli_query($con, $sql);
			$count =mysqli_num_rows($result);
			
			
			
			if($count)
				{
						?>
					<table align='center'>
					<tr>
					<td><span style='color:#F4FF09' align='center'><b>text already send </b></span></table></td> 
					</tr>
					<?php
				}
			else
				{
					
					$sql="INSERT INTO rnotices (name,notice,teacher_name) values ('$new','$text','$key')";		
					$result = mysqli_query($con, $sql);
					
						?>
					<table align='center'>
					<tr>
					<td><span style='color:#F4FF09' align='center'><b>text send </b></span></table></td> 
					</tr>
					<?php
				}
				
		}
	
?>
			
			
			
			
			
			<?php
	
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
										<td><span style='color:#FC8C41 '><b>text</b></span></td>
										<td><span style='color:#FC8C41 '><b>Select to send </b></span></td>
										<td><span style='color:#FC8C41 '><b></b></span></td>
										</tr>
									";

		while($row = mysqli_fetch_assoc($result)){
			$data .= "<tr>
					<form action='' method='post' role='form' onsubmit='return validation_js()' name='vform'>
					<td><span style='color:#2BD790 '>{$row['teacher_name']}</span></td>
					<td><span style='color:#2BD790 '>{$row['grade']}</span></td>
					<td><span style='color:#2BD790 '>{$row['date']}</span></td>
					
					<td>
						<input type='text' name='text' value=''>
						<div id='text' class='val'></div>
					</td>
					
					
					<td>
						<input type='checkbox' name='keyToDelete' value='{$row['teacher_name']}' required>
					</td>
					<td>
						<input type='submit' name='submit' value='send' style='color:#FF4500 ' >
					</td>
					</form>					
					</tr>";
		}

		$data .= "</table>";
		echo $data;

		
	}
?>





<script type="text/javascript">
								
								
								var text=document.forms["vform"]["text"];
								
								
								
								
								var text_error=document.getElementById("text");
								
								
								
								text.addEventListener("blur",textVarify,true);
								
								
								
						function validation_js()
							{
							
								
								if(text.value == "" )
									{
										alert('required to fill up the text fields');
										text.style.border="1px sloid #5555";
										text_error.textContent="text is required";
										text.focus();
										return false;
									}
								
									
									
							}
							
					function textVarify()
						{
							if(text.value !== "" )
									{
										text.style.border="1px solid #5E6E66";
										text_error.textContent="";
										return true;
										
									}
							
						}
							
							
</script>










			
			
			</br></br>
			<table>
			<tr>
			<td><a href="shome.php"><span style=color:#F4FF09><b>BACK</b></span></a></td>
			<td></td><td></td><td></td><td></td><td></td><td></td>
			</tr>
			</table>
		
</section>
	
<section class="footer">
	<h2><?php echo $_SERVER['PHP_SELF'] ; ?> </h2>
</section>
</div>
</body>

</html>
