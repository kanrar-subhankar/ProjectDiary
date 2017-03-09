
<?php
require("database_signup.php");
 if(isset($_POST['submit'])){
	if(isset($_POST['fname']) AND isset($_POST['email']) AND isset($_POST['password']))
{

	$username = mysqli_real_escape_string($connection,$_POST['fname']);
	$email = mysqli_escape_string($connection,$_POST['email']); 
	$password=$_POST['password'];
	$sname = $_POST['sname'];
	$query="select * from users  where email='$email'";
	$result = mysqli_query($connection,$query);
	if(mysqli_num_rows($result)>=1){
	echo "<script type='text/javascript'>";
	echo "alert('An account exists')";
	echo "</script>";
	
	}
	else{
		$encrypt_pass = crypt($password);
		$sql = "insert into users(fname,sname,email,password) values ('$username','$sname','$email','$encrypt_pass')";
		$query1=mysqli_query($connection,$sql);
		if($query1){ 
		echo "<script type='text/javascript'>";
		echo "alert('Now login to enter')";
		echo "</script>";
		include('login_signup.php');
		}	
	}
}
}

?>

