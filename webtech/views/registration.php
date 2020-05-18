<?php
	
	$fonts= "verdana";
	session_start();
	if(isset($_SESSION['nname'])){  
		header("location: ../views/shome.php");
	}

?>

<html>
		<body>
		<head>
		<title>Web Tech Reg Page</title>
		<style>
		body{font-family:$fonts;}
		.phpcoding{width:1500px ;margin: 10; background:#ddd;}
		.header,.footer {background:#444;color:#FC8C41 ;text-align:center;padding: 10px;}
		.main{min-height:580px;}
		.header h2,.footer h2 {margin:0 auto;}
		</style>
</head>
<section class="header">
	<h2>WELCOME To The Registration PAGE </h2>
</section>

<section class="main">
		<html>
			<head>
				<title><b>Registration</b></title>
			</head>
			<body>
				<form action="../php/reg_check.php" enctype="multipart/form-data" method="post" onsubmit="return validation_js()" name="vform"  >
					<table>
					<p style='color:red' align=left>** Requirement of the field <a href="registration_rules.html">RULES</a></p>
					<tr>
						<td><b>Full NAME</b></td>
						<td><input type="text" name="fname" value=""/><div id="fname" class="val"></div></td>
					</tr>
					<tr>
						<td> </td>
						<td> </td>
					</tr>
					<tr>
						<td> </td>
						<td> </td>
					</tr>
					<tr>
					<td><b>Nick NAME</b></td>
					<td><input type="text" name="nname" value="" /><div id="nname" class="val"></div></td>
					</tr>
					<tr>
						<td> </td>
						<td> </td>
					</tr>
					<tr>
						<td> </td>
						<td> </td>
					</tr>
					<tr>
					<td><b>Password</b></td>
					<td><input type="password" name="password" value="" /><div id="password" class="val"></div></td>
					</tr>
					<tr>
					<tr></tr>
					<td><b>Email</b></td>
					<td><input type="email" name="email" value=""><div id="email" class="val"></div></td>
					</tr>
					<tr></tr>
					<tr>
						<td> </td>
						<td> </td>
					</tr>
					<tr>
						<td></td>
						<td></td>
					</tr>
					<tr>
					<td><b>GENDER</b></td>
					<td><input type="radio" name="gender" value="M" required/>Male
						<input type="radio" name="gender" value="F" />Female
						<input type="radio" name="gender" value="O" />Other
						<div id="gender" class="val"></div>
					</td>
					</tr>
					<tr>
						<td> </td>
						<td> </td>
					</tr>
					<tr>
						<td> </td>
						<td> </td>
					</tr>
					<tr></tr>
					<td><b>Profile Picture</b></td>
					<td><input type="file" name="mypic"><div id="mypic" class="val"></div></td>
					</tr>
					<tr></tr>
					<tr>
					<td><b>EDUCATION</b></td>
					<td><input type="radio" name="education" value="ssc" required/>S.S.C.
						<input type="radio" name="education" value="hsc" />H.S.C
						<input type="radio" name="education" value="bsc" />B.SC.
						<div id="education" class="val"></div>
					</td>
					</tr>
					<tr>
					<td><b>USER TYPE</b></td>
					<td><input type="radio" name="type" value="admin" required/>Admin
						<input type="radio" name="type" value="tp" />Tution Provider
						<input type="radio" name="type" value="teacher" />Teacher
						<input type="radio" name="type" value="student" />Student
						<div id="type" class="val"></div>
					</td>
					</tr>
					
					<tr>
						<td> </td>
						<td> </td>
					</tr>
					<tr>
						<td> </td>
						<td> </td>
					</tr>
					<tr>
					<td><input type="submit" name="Registration" value="Submit" class="text" /></td>
					<td><a href="login.php">LogIn page</a> </td>
					<tr>
					</table>
					
				</form>
				
					
		</body>
		
		
		<script type="text/javascript">
								
								
								var fname=document.forms["vform"]["fname"];
								var nname=document.forms["vform"]["nname"];
								var password=document.forms["vform"]["password"];
								var email=document.forms["vform"]["email"];
								var gender=document.forms["vform"]["gender"];
								var education=document.forms["vform"]["education"];
								var type =document.forms["vform"]["type"];
								
								
								
								
								var fname_error=document.getElementById("fname");
								var nname_error=document.getElementById("nname");
								var password_error=document.getElementById("password");
								var gender_error=document.getElementById("gender");
								var education_error=document.getElementById("education");
								var email_error=document.getElementById("email");
								var type_error=document.getElementById("error");
								
								
								
								fname.addEventListener("blur",fnameVarify,true);
								nname.addEventListener("blur",nnameVarify,true);
								password.addEventListener("blur",passwordVarify,true);
								gender.addEventListener("blur",genderVarify,true);
								education.addEventListener("blur",educationVarify,true);
								email.addEventListener("blur",emailVarify,true);
								type.addEventListener("blur",typeVarify,true);
								
								
								
								
						function validation_js()
							{
							
								
								if(fname.value == "" )
									{
										//alert('required to fill up all the fields');
										fname.style.border="1px sloid #5555";
										fname_error.textContent="full name is required";
										fname.focus();
										return false;
									}
								if(WordCount(fname.value)<2)
									{
										fname_error.textContent="full name must be contain of 2 words";
										fname.focus();
										return false;
									}
									
								if(nname.value == "" )
									{
										//alert('required to fill up all the fields');
										nname.style.border="1px solid red";
										nname_error.textContent="nick name is required";
										nname.focus();
										return false;
									}
									
								if(password.value == "" )
									{
										//alert('required to fill up all the fields');
										password.style.border="1px solid red";
										password_error.textContent="password is required";
										password.focus();
										return false;
									}
								if(WordCount2(password.value)<5)
									{
										password.style.border="1px solid red";
										password_error.textContent="minimum 5 character is required";
										password.focus();
										return false;
									}
								if(gender.value == "" )
									{
										//alert('required to fill up all the fields');
										gender.style.border="1px solid red";
										gender_error.textContent="gender is required";
										gender.focus();
										return false;
									}
								if(email.value == "" )
									{
										//alert('required to fill up all the fields');
										email.style.border="1px solid red";
										email_error.textContent="email is required";
										email.focus();
										return false;
									}		
									
							}
							
					function fnameVarify()
						{
							if(fname.value !== "" )
									{
										fname.style.border="1px solid #5E6E66";
										fname_error.textContent="";
										return true;
										
									}
							
						}
							
					function nnameVarify()
						{
							if(nname.value !== "" )
									{
										nname.style.border="1px solid #5E6E66";
										nname_error.textContent="";
										return true;
									}
							
						}
					function passwordVarify()
						{
							if(password.value !== "" )
									{
										password.style.border="1px solid #5E6E66";
										password_error.textContent="";
										return true;
									}
							
						}
					function emailVarify()
						{
							if(email.value !== "" )
									{
										email.style.border="1px solid #5E6E66";
										email_error.textContent="";
										return true;
									}
							
						}
					function genderVarify()
						{
							if(gender.value !== "" )
									{
										gender.style.border="1px solid #5E6E66";
										gender_error.inneHTML="";
										return true;
									}
							
						}
					function educationVarify()
						{
							if(education.value !== "" )
									{
										education.style.border="1px solid #5E6E66";
										education_error.inneHTML="";
										return true;
									}
							
						}
										
					function WordCount(str)
									{ 
									  return str.split(" ").length;
									}					
					

					function WordCount2(str)
									{ 
									  return str.length;
									}					
					
							
</script>

</html>
</section>
	
<section class="footer">
	<h2><?php echo $_SERVER['PHP_SELF'] ; ?></h2>
	
</section>
</div>
</body>

</html>