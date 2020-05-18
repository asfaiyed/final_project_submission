<?php
	
	$fonts= "verdana";
	session_start();
	if(!isset($_SESSION['nname'])){  
		header("location: index.php");
	}
?>

<html>
<head>
		<title>PHP SYNTEX</title>
		<style>
		body{font-family:$fonts;}
		.phpcoding{width:1500px ;margin: 10; background:#ddd;}
		.header,.footer {background:#444;color:#FC8C41 ;text-align:center;padding: 10px;}
		.main{min-height:580px; background:#444;}
		.header h2,.footer h2 {margin:0 auto;}
		</style>
</head>
<body>
<div class="phpcoding">
<section class="header">
	<h2> STUDENT LIST </h2>
</section>
<section class="main">
	
	<h1 id="abc"><span style=color:#FC8C41><b>Search the Nick Name of students :</b></span></h1>

	<form >
		<input type="text" id="term" name="term" onkeyup="selected_list()">
	</form>

	<br>
	<div id="result">
	
	<?php
		echo "<table border='5' BORDERCOLOR=#FC8C41>
									<tr>
										<td><span style='color:#FC8C41 '><b>FULL NAME</b></span></td>
										<td><span style='color:#FC8C41 '><b>NICK NAME</b></span></td>
										<td><span style='color:#FC8C41 '><b>EMAIL ADDRESS</b></span></td>
										<td><span style='color:#FC8C41 '><b>GENDER</b></span></td>
										<td><span style='color:#FC8C41 '><b>EDUCATION</b></span></td>
										</tr>
									";
		
		$con = $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
		$sql = "select * from users";
		$result = mysqli_query($con, $sql);
		while($row=mysqli_fetch_array($result))
			{
					echo "<tr>
												<td><span style='color:#2BD790 '>".$row['fname']."</span></td>
												<td><span style='color:#2BD790 '>".$row['nname']."</span></td>
												<td><span style='color:#2BD790 '>".$row['email']."</span></td>
												<td><span style='color:#2BD790 '>".$row['gender']."</span></td>
												<td><span style='color:#2BD790 '>".$row['education']."</span></td>
												
												</tr>";
							
			}
		?>
		</table>
	
	
	</div>

	<script type="text/javascript">
		
		function selected_list(){
			var search = document.getElementById("term").value;
			var xhttp = new XMLHttpRequest();	
			
			xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200){
			    	document.getElementById('result').innerHTML = this.responseText;
			    }
			};
			
			xhttp.open("GET", "../service/s_ajax_search.php?key="+search, true);
			xhttp.send(); 
		}
	</script>
							</br></br>
							<table>
								<tr>
									<td><a href="s_ssc.php"><span style='color:#F4FF09'><h3><b>ssc</b></h3></span></a></td>
									
									<td><a href="s_hsc.php"><span style='color:#F4FF09'><h3>hsc</h3></span></a></td>
									<td></td><td></td>
									<td><a href="s_bsc.php"><span style='color:#F4FF09'><h3>bsc</h3></span></a></td>
								</tr>
								<tr>
									<td><a href="../views/shome.php"><span style='color:#F4FF09'><h3>back</h3></span></a></td>
								</tr>
							</table>		
		
</section>
	
<section class="footer">
	<h2> <?php echo $_SERVER['PHP_SELF'] ; ?> </h2>
</section>
</div>
</body>

</html>
