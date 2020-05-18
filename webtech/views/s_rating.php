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
	<h2> <?php echo "<b>Your TUTOR</b>" ;?> </h2>
</section>
<section class="main">
			</br></br></br>
			
	
<?php
	if(isset($_POST['submit']))
	{		
		
			global $new;
			$con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
			$tutor=$_POST['key'];
			$rating=$_POST['rating'];
			$review=$_POST['review'];
			$sql = "select * from ratings where teacher_name='$tutor' AND name='$new';";
			$result = mysqli_query($con, $sql);
			$count =mysqli_num_rows($result);
			if($count>0)
				{
					?>
					<table align='center'>
					<tr>
					<td><span style='color:#F4FF09' align='center'><b>already you give your rating </b></span></table></td> 
					</tr>
					<?php
				}
			else
				{				
						$sql = "insert into ratings (teacher_name,name,review,ratings) values ('$tutor','$new','$review','$rating')";
						$result = mysqli_query($con, $sql);
						?>
					<table align='center'>
					<tr>
					<td><span style='color:#F4FF09' align='center'><b>thank you for giving your opinion </b></span></table></td> 
					</tr>
					<?php
				}
	}
	
?>


	
			
			
			<?php
	global $new;
	$con = $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
	$sql = "select * from s_tutor where student='$new'";
	
	$result = mysqli_query($con, $sql);
	$count =mysqli_num_rows($result);
	

	
	if($count){

		$data = "<table border='5' BORDERCOLOR=#FC8C41 align='center'>
									<tr>
										<td><span style='color:#FC8C41 '><b>Tutor Name</b></span></td>
										
										<td><span style='color:#FC8C41 '><b>review</b></span></td>
										<td><span style='color:#FC8C41 '><b>rating</b></span></td>
										<td><span style='color:#FC8C41 '><b>Select</b></span></td>
										<td><span style='color:#FC8C41 '><b>SEND</b></span></td>
										</tr>
									";

		while($row = mysqli_fetch_assoc($result)){
			$data .= "<tr>
					<form action='' method='post' role='form' onsubmit='return validation_js()' name='vform'>
					<td><span style='color:#2BD790 '>{$row['tutor']}</span></td>
					<td>
						<input type='text' name='review' value='' >
						<div id='review' class='val'></div>
					</td>
					<td>
					<span style='color:#2BD790 '>
						<input type='radio' name='rating' value='1' required/>1
						<input type='radio' name='rating' value='2' />2
						<input type='radio' name='rating' value='3' />3
						<input type='radio' name='rating' value='4' />4
						<input type='radio' name='rating' value='5' />5
						</span>
						<div id='rating' class='val'></div>
					</td>
					<td>
						<input type='checkbox' name='key' value='{$row['tutor']}' required>
					</td>
					<td>
						<input type='submit' name='submit' value='rating' style='color:#FF4500 ' >
					</td>
					</form>					
					</tr>";
		}

		$data .= "</table>";
		echo $data;

		
	}
?>












<script type="text/javascript">
								
								
								var review=document.forms["vform"]["review"];
								var rating=document.forms["vform"]["rating"];
								
								
								
								
								var review_error=document.getElementById("review");
								var rating_error=document.getElementById("rating");
								
								
								
								review.addEventListener("blur",reviewVarify,true);
								
								
								
								
						function validation_js()
							{
							
								
								if(review.value == "" )
									{
										alert('required to fill up the review fields');
										review.style.border="1px sloid #5555";
										review_error.textContent="review is required";
										review.focus();
										return false;
									}
								
								if(rating.value == "" )
									{
										alert('required to fill up the rating fields');
										rating.style.border="1px sloid #5555";
										rating_error.textContent="rating is required";
										rating.focus();
										return false;
									}	
									
									
							}
							
					function reviewVarify()
						{
							if(review.value !== "" )
									{
										review.style.border="1px solid #5E6E66";
										review_error.textContent="";
										return true;
										
									}
							
						}
							
					function ratingVarify()
						{
							if(rating.value !== "" )
									{
										rating.style.border="1px solid #5E6E66";
										rating_error.textContent="";
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
