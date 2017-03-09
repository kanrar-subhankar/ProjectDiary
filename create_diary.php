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
$today=date('Y-m-d');
if(isset($_SESSION['check']))
	echo $_SESSSION['check'];
else{
?>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	   <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
     <link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans" rel="stylesheet"> 
     <link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet"> 
     <link href="https://fonts.googleapis.com/css?family=Droid+Serif|Roboto" rel="stylesheet"> 
     <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">      
     <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet"> 
     <link href="https://fonts.googleapis.com/css?family=Baloo+Da|Cookie" rel="stylesheet"> 
     <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">

     <link rel="stylesheet" href="diary.css" type="text/css">
</head>
 <body>
 <form autocomplete="off" action="empty.php"  method="post" role="form">
  <div id="complete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:rgb(204,51,51)">
        <h4 class="modal-title" id="" style="color:rgb(249,243,243);margin-left:100px;text-transform:uppercase;font-family: 'Baloo Da', cursive;">DIARY OF <?php echo $ip; ?></h4>
      </div>
      <div class="modal-body" style="background:rgb(252,196,196)">
      <?php 
      	$query="select * from users  where date='$today' ";
  		$result = mysqli_query($connection,$query);
  		$row = mysqli_fetch_assoc($result);
 		?>
        <p style="font-family: 'Cookie', cursive;font-size:23px;word-wrap:break-word">BREAKFAST:-<?php echo $row['breakfast'] ?></br>LUNCH:-<?php echo $row['lunch'] ?></br>DINNER:-<?php echo $row['dinner'] ?></br>EXTRA PLAN:-<?php echo $row['plan'] ?></p>
      </div>
      <div class="modal-footer" style="background:rgb(139,57,57)">
        <button type="submit" class="btn btn-primary" onclick="msg()";>Save</button>
      </div>
    </div>
  </div>
</div>
</form>

<script type="text/javascript">
$(window).load(function(){
        $('#complete').modal('show');
    });
function msg(){
		alert("You have successfully saved your diary");
}
    </script>
 </body>
 </html>
 <?php } ?>
