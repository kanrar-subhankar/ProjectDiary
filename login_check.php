<?php
session_start();
require("database_signup.php");
if(isset($_POST['submit1'])){
  if(isset($_POST['fname1']) AND isset($_POST['email1']) AND isset($_POST['password1']))
{

  $username = mysqli_real_escape_string($connection,$_POST['fname1']);
  $email = mysqli_escape_string($connection,$_POST['email1']);
  $password=$_POST['password1'];
  $_SESSION['email']=$email;
  $query="select * from users  where email='$email' and fname='$username' ";
  $result = mysqli_query($connection,$query);
  $row = mysqli_fetch_assoc($result);
  $hash_pass = $row['password'];
  $hash = crypt($password,$hash_pass);
  if($hash === $hash_pass){
    $_SESSION['user'] = $username;
    $GLOBALS['user']=$_SESSION['user'];
    $_SESSION['email'] = $email;
    $GLOBALS['email']=$_SESSION['email'];
    $email_user=$_SESSION['email'];
    $ip=$_SESSION['user'];
     header("HTTP/1.1 301 Moved Permanently");
    header ("Location:diary.php");
    die();
  }
  else{
    include('login_signup.php');
    echo "<script type='text/javascript'>";
    echo "alert('Username or password is wrong')";
    echo "</script>";
    
    }
  }
}
else
header ("Location: login_signup.php");   
?>