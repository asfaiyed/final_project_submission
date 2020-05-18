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
		<title>Conversation</title>
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
	<h2> <?php echo "<b>You can send or recieve text</b>" ;?> </h2>
</section>
<section class="main">
			</br></br></br>
			
	





<?php
	if(isset($_POST['submit']))
	{		
		
			global $new;
			$con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
			$reciever=$_POST['key'];
			$text=$_POST['text'];
						$sql = "insert into student_stext (sender,s_text,reciever) values ('$new','$text','$reciever')";
						$result = mysqli_query($con, $sql);
						?>
					<table align='center'>
					<tr>
					<td><span style='color:#F4FF09' align='center'><b>text send </b></span></table></td> 
					</tr>
					<?php
				
	}
	
?>







	
			
			
			<?php
	
	$con = $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
	$sql = "select * from users where type='student'";
	
	$result = mysqli_query($con, $sql);
	$count =mysqli_num_rows($result);
	global $new;

	
	if($count){

		$data = "<table border='5' BORDERCOLOR=#FC8C41 align='center'>
									<tr>
										<td><span style='color:#FC8C41 '><b>Students nick name</b></span></td>
										<td><span style='color:#FC8C41 '><b>text</b></span></td>
										<td><span style='color:#FC8C41 '><b>Select</b></span></td>
										<td><span style='color:#FC8C41 '><b>Send</b></span></td>
										
										</tr>
									";

		while($row = mysqli_fetch_assoc($result)){
			if($row['nname']=="$new")
			{	
				continue;
			}
			$data .= "<tr>
					<form action='' method='post' role='form' onsubmit='return validation_js()' name='vform'>
					<td><span style='color:#2BD790 '>{$row['nname']}</span></td>
					
					<td>
						<input type='text' name='text' value='' >
						<div id='text' class='val'></div>
					</td>
					
					
					<td>
						<input type='checkbox' name='key' value='{$row['nname']}' required>
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
			
			
			</br></br>
			<table>
			<tr>
			<td><a href="shome.php"><span style=color:#F4FF09><b>BACK</b></span></a></td>
			
			
			</tr>
			</table>
			
			
			
			<h1 id="abc"></h1>

	<form>
		<input type="button" name="" value="Your all conversations" style='color:#E308D5' onclick="ajax()">
		</form>

		
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

		
		
	<script type="text/javascript">
		
		function ajax(){
			

			var xhttp = new XMLHttpRequest();	
			xhttp.onreadystatechange = function() {

			    if (this.readyState == 4 && this.status == 200){
			    	document.getElementById("abc").innerHTML = this.responseText;
			    }
			};
			
			xhttp.open("POST", "../service/s_all_con.php", true);
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
