<?php
	
	$fonts= "verdana";
	session_start();
	if(!isset($_SESSION['nname'])){  
		header("location: ../views/login.php");
	}

?>

<html>
<head>
		<title>Home page</title>
		<style>
		body{font-family:$fonts;}
		.phpcoding{width:1500px ;margin: 10; background:#ddd;}
		.header,.footer {background:#444;color:#FC8C41 ;text-align:center;padding: 10px;}
		.main{min-height:580px;}
		.header h2,.footer h2 {margin:0 auto;}
		</style>
</head>
<body>
<div class="phpcoding">
<section class="header">
	<h2> Welcome <?php echo $_SESSION['nname'].","; ?> to your HOME PAGE </h2>
</section>
<section class="main">

		<a href="sprofile.php"> <p style="text-align:center">PROFILE</p></a>
		
		<a href="s_studentList.php"> <p style="text-align:center">STUDENT LIST</p></a>
		
		<a href="s_conversation.php"> <p style="text-align:center">Conversation with students</p></a>
		
		<a href="s_student_notes.php"> <p style="text-align:center">STUDENT NOTES</p></a>
		
		
		<a href="registration_rules.html"> <p style="text-align:center">REGISTRATION RULES</p></a>
		</br>
		<a href="s_req.php"> <p style="text-align:center"> List of Requesting tutor </p></a>
		
		<a href="s_tutor.php"> <p style="text-align:center"> Your Tutor and grade </p></a>
		
		<a href="s_teacher_notice.php"> <p style="text-align:center"> Teacher Notice </p></a>
		
		<a href="s_teacher_notes.php"> <p style="text-align:center"> Teacher Notes </p></a>
		
		<a href="s_rating.php"> <p style="text-align:center">Teacher's Rating</p></a>
		
		<a href="s_exam.php"> <p style="text-align:center">Submit Exam</p></a>
		</br>
		
		<a href="s_text.php"> <p style="text-align:center">TEXTING to your Teacher</p></a>
		</br>
		
		<a href="s_tp.php"> <p style="text-align:center">Request Tuition Provider for Tuition</p></a>
		</br>
		<a href="Logout.php"> <p style="text-align:center">LOG OUT</p></a>
		</br>
		
</section>
	
<section class="footer">
	<h2><?php echo $_SERVER['PHP_SELF'] ; ?></h2>
</section>
</div>
</body>

</html>
