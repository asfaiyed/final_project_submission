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
	<h2> <?php echo "<b>**You can upload your file**</b>" ;?> </h2>
</section>
<section class="main">
			</br></br></br>
			
	
<?php
	if(isset($_POST['submit']))
	{		
		
			global $new;
			$con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
			$subject=$_POST['subject'];
			$time=$_POST['time'];
			
			$filename = $_FILES["file"]["name"];
			$tempname = $_FILES["file"]["tmp_name"];
			$folder = "../views/upload/".$filename;
			move_uploaded_file($tempname,$folder);
	
			
			
			$sql = "select * from s_notes where notes='$folder' AND nname='$new';";
			$result = mysqli_query($con, $sql);
			$count =mysqli_num_rows($result);
			if($count>0)
				{
					?>
					<table align='center'>
					<tr>
					<td><span style='color:#F4FF09' align='center'><b>already uploaded </b></span></table></td> 
					</tr>
					<?php
				}
			else
				{				
						$sql = "insert into s_notes (nname,subject,date,notes) values ('$new','$subject','$time','$folder')";
						$result = mysqli_query($con, $sql);
						?>
					<table align='center'>
					<tr>
					<td><span style='color:#F4FF09' align='center'><b>Notes Uploaded </b></span></table></td> 
					</tr>
					<?php
				}
	}
	
?>


	
	
	
	
	
	
	
	
	
	
	
			
			
			<?php
	
		$data = "<table border='5' BORDERCOLOR=#FC8C41 align='center'>
									<tr>
										
										<td><span style='color:#FC8C41 '><b>SUBJECT</b></span></td>
										<td><span style='color:#FC8C41 '><b>Exam Date</b></span></td>
										<td><span style='color:#FC8C41 '><b>FILE Locaiton</b></span></td>
										<td><span style='color:#FC8C41 '><b></b></span></td>
										</tr>
									";

			$data .= "<tr>
					<form action='' enctype='multipart/form-data' method='post' role='form' onsubmit='return validation_js()' name='vform'>
					<td>
						<input type='text' name='subject' value='' >
						<div id='subject' class='val'></div>
					</td>
					<td>
						<input type='date' name='time' value='' >
						<div id='time' class='val'></div>
					</td>
					
					<td align='center'>
						<input type='file' name='file' style='color:#32CD32'><div id='file' class='val'></div>
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
								var file=document.forms["vform"]["file"];
								
								
								
								
								var subject_error=document.getElementById("subject");
								var time_error=document.getElementById("time");
								var file_error=document.getElementById("file");
								
								
								
								subject.addEventListener("blur",subjectVarify,true);
								time.addEventListener("blur",timeVarify,true);
								file.addEventListener("blur",fileVarify,true);
								
								
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
								if(file.value == "" )
									{
										alert('required to fill up the file fields');
										file.style.border="1px sloid #5555";
										file_error.textContent="file is required";
										file.focus();
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
						function fileVarify()
						{
							if(file.value !== "" )
									{
										file.style.border="1px solid #5E6E66";
										file_error.textContent="";
										return true;
										
									}
							
						}
					
							
</script>



















			
			</br></br>
			<table>
			<tr>
			<td><a href="s_student_notes.php"><span style=color:#F4FF09><b>BACK</b></span></a></td>
			
			</table>
		
</section>
	
<section class="footer">
	<h2><?php echo $_SERVER['PHP_SELF'] ; ?> </h2>
</section>
</div>
</body>

</html>
