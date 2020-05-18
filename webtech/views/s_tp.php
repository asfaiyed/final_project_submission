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
	<h2> <?php echo "<b>**You can send maximum 3 request at a time**</b>" ;?> </h2>
</section>
<section class="main">
			</br></br></br>
			
	
<?php
	if(isset($_POST['submit']))
	{		
		
			global $new;
			$con = $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
			$subject=$_POST['subject'];
			$time=$_POST['time'];
			$sql = "select * from s_tp_req where nname='$new';";
			$result = mysqli_query($con, $sql);
			$count =mysqli_num_rows($result);
			if($count>3)
				{
					?>
					<table align='center'>
					<tr>
					<td><span style='color:#F4FF09' align='center'><b>Limit id to send maximum 3 request</b></span></table></td> 
					</tr>
					<?php
				}
			else
				{				
						$sql = "insert into s_tp_req (nname,subject,time) values ('$new','$subject','$time')";
						$result = mysqli_query($con, $sql);
						?>
					<table align='center'>
					<tr>
					<td><span style='color:#F4FF09' align='center'><b>Requst send </b></span></table></td> 
					</tr>
					<?php
				}
	}
	
?>


	
			
			
			<?php
	
	
		$data = "<table border='5' BORDERCOLOR=#FC8C41 align='center'>
									<tr>
										
										<td><span style='color:#FC8C41 '><b>SUBJECT</b></span></td>
										<td><span style='color:#FC8C41 '><b>Requsted time</b></span></td>
										<td><span style='color:#FC8C41 '><b>SEND REQ</b></span></td>
										</tr>
									";

			$data .= "<tr>
					<form action='' method='post' role='form' onsubmit='return validation_js()' name='vform'>
					<td>
						<input type='text' name='subject' value='' >
						<div id='subject' class='val'></div>
					</td>
					<td>
						<input type='text' name='time' value='' >
						<div id='time' class='val'></div>
					</td>
					<td align='center'>
						<input type='submit' name='submit' value='send' style='color:#32CD32' >
					</td>
					</form>					
					</tr>";
		

		$data .= "</table>";
		echo $data;

		
	
?>
			

















<script type="text/javascript">
								
								
								var subject=document.forms["vform"]["subject"];
								var time=document.forms["vform"]["time"];
								
								
								
								
								var subject_error=document.getElementById("subject");
								var time_error=document.getElementById("time");
								
								
								
								subject.addEventListener("blur",subjectVarify,true);
								time.addEventListener("blur",timeVarify,true);
								
								
								
						function validation_js()
							{
							
								
								if(subject.value == "" )
									{
										alert('required to fill up the subject fields');
										subject.style.border="1px sloid #5555";
										subject_error.textContent="subject is required";
										subject.focus();
										return false;
									}
								
								if(time.value == "" )
									{
										alert('required to fill up the time fields');
										time.style.border="1px sloid #5555";
										time_error.textContent="time is required";
										time.focus();
										return false;
									}	
									
									
							}
							
					function subjectVarify()
						{
							if(subject.value !== "" )
									{
										subject.style.border="1px solid #5E6E66";
										subject_error.textContent="";
										return true;
										
									}
							
						}
							
					function timeVarify()
						{
							if(time.value !== "" )
									{
										time.style.border="1px solid #5E6E66";
										time_error.textContent="";
										return true;
									}
							
						}
							
</script>



















			
			</br></br>
			<table>
			<tr>
			<td><a href="shome.php"><span style=color:#F4FF09><b>BACK</b></span></a></td>
			
			</table>
		
</section>
	
<section class="footer">
	<h2><?php echo $_SERVER['PHP_SELF'] ; ?> </h2>
</section>
</div>
</body>

</html>
