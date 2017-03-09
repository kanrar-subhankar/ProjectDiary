<?php
session_start();
require("database_signup.php");
 global $ip,$s;
if(isset($_SESSION['user'])){
  $ip=$_SESSION['user'];
}
global $email_user;
if(isset($_SESSION['email'])){
  $email_user=$_SESSION['email'];
}

if(isset($_POST['submit'])){
				
 if(isset($_POST['area0']) && isset($_POST['area1']) && isset($_POST['area2']))
	{
			$area0 = mysqli_real_escape_string($connection,$_POST['area0']);
			$area1 = mysqli_real_escape_string($connection,$_POST['area1']);
			$area2 = mysqli_real_escape_string($connection,$_POST['area2']);
			$area  = mysqli_real_escape_string($connection,$_POST['area']);
			$today=date('Y-m-d');
			 if($area0=="" && $area1=="" && $area2=="")
					{
						$_SESSSION['check']=1;
						$s=$_SESSSION['check'];
						echo "<script type='text/javascript'>";
						echo "alert('Please fill up breakfast,lunch and dinner')";
						echo "</script>";
					}
			$query="select breakfast,lunch,dinner from users  where date='$today'";
			$result = mysqli_query($connection,$query);
			if(mysqli_num_rows($result)>=1){
			echo "<script type='text/javascript'>";
			echo "confirm('Do you want to update?')";
			echo "</script>";
			$sql_update=mysqli_query($connection,"update users set breakfast='$area0',lunch='$area1',dinner='$area2',plan='$area' where date='$today' " );
			
			}
			else if($area0!="" && $area1!="" && $area2!="" || $area!="")
		 	{

				$sql=mysqli_query($connection,"insert into users(date,breakfast,lunch,dinner,plan) values (CURDATE(),'$area0','$area1','$area2','$area')");
				
			}
	}
}
header("Location:create_diary.php");
	?>