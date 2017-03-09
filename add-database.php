<?php
$dbhost="localhost";
 $dbname="root";
 $dbpassword="subhankar62";
 $databasename="add";
 $conn = mysqli_connect($dbhost,$dbname,$dbpassword,$databasename);
 if(mysqli_connect_errno()){
 	die("Database connection failed" . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")"
 		);
 }
 ?>