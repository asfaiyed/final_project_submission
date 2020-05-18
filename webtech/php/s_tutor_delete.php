<?php
	if(isset($_POST['submit']))
	{		
			$con = $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
			$key=$_POST['keyToDelete'];
			$sql = "select * from s_tutor where id='$key'";
			$result = mysqli_query($con, $sql);
			$count =mysqli_num_rows($result);
			if($count)
				{
					$sql="DELETE from s_tutor where id='$key'";
					$result = mysqli_query($con, $sql);
					header("location:../views/s_tutor.php");
				}
	
		}
	else
		{
			echo "problem";
		}

?>