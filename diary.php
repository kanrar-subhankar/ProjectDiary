<?php 
session_start();
 global $ip;
if(isset($_SESSION['user'])){
  $ip=$_SESSION['user'];
}

?>
<html>
<head>
<title>
DIARY
</title>
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


<nav class="nav navbar-default navbar-fixed-top" >
<div class="container-fluid" id="cow">
<div class="navbar-header">
<button class="navbar-toggle" data-target="#mynav" data-toggle="collapse" type="button">
<span class="sr-only">Toggle Navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>
<h2 class="nav navbar-nav navbar-left">Heaven</h2>
    <!--<form class="navbar-form navbar-left">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search" style="background:rgb(12,22,50);">
            </div>
            <button type="submit" class="btn btn-default" style="background:rgb(12,22,50);color:white">GO!</button>
      </form>-->
<div class="collapse navbar-collapse" id="mynav">
<ul class="nav navbar-nav navbar-right">
<li><a href="#" onclick="func2();">HOME</a></li>
<li><a href="#" onclick="func();">VIEW DIARY</a></li>
<li> <form action="logout.php" method="post"><button class="btn btn-default" type="submit">Logout</button></form></li>
</ul>
</div>
</nav>















<div class="row" id="main">
<div class="col-md-4">
<form action=""  method="post" enctype="multipart/form-data" id="uploadimage">
  <div id="image_preview"><input type="file" name="file" id="file">
   <img id="previewing" src="noimage.png" />
  </div>
<div>
<button type="submit" name="submit" class="btn btn-default" id="alt"><span class="glyphicon glyphicon-camera"></span>Upload profile picture</button></div>
</form>
</div>
<div class="col-md-6 col-md-offset-1">
<h2 style="font-family: 'Roboto Slab', serif;;color:#2B65EC;">Make your daily plan</h2>
<div style="border-bottom:2px solid teal;width:300px"></div>

<div class="gap">
<form action="add_diary.php" method='post'>
<h3 id="text-control">About Breakfast</h3>
<textarea id="area0" rows="2" cols="50" name="area0" placeholder="write about your breakfast...."></textarea>

<h3 id="text-control">About Lunch</h3>
<textarea id="area1" rows="2" cols="50" name="area1"  placeholder="write about your lunch...."></textarea>

<h3 id="text-control">About Dinner</h3>
<textarea id="area2" rows="2" cols="50" name="area2" placeholder="write about your dinner...."></textarea>

<h3 id="text-control">Your Extra Plan</h3>
<textarea id="area" rows="2" cols="50" name="area" placeholder="write about your extra plan"></textarea>
</br>

<button type="submit" class="btn btn-primary btn-lg" name='submit' class="cow"  id="add_main" onclick="change();">
  Add in diary
</button>
</form>
</div>
</div>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="color:blue">&times;</button>
          <p class="modal-title" style="margin-left:100px;color:teal;font-weight:bold">Hi <?php echo $ip; ?></p>
        </div>
        <div class="modal-body">
          <p style="font-size:15px;margin-left:23%;">Welcome in diary</p>
        </div>
      </div>
    </div>
  </div>
  <div id="complete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:rgb(204,51,51)">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="" style="color:rgb(249,243,243);margin-left:100px;text-transform:uppercase;font-family: 'Baloo Da', cursive;">DIARY OF <?php echo $ip; ?></h4>
      </div>
      <div class="modal-body" style="background:rgb(252,196,196)">
        <p style="font-family: 'Cookie', cursive;font-size:23px;word-wrap:break-word"></p>
      </div>
      <div class="modal-footer" style="background:rgb(139,57,57)">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(window).load(function(){
        $('#myModal').modal('show');
    });
document.getElementById('alt').addEventListener('click',function(){
   document.getElementById('file').click();
});
$(document).ready(function (e) {
$("#uploadimage").on('submit',(function(e) {
e.preventDefault();
$.ajax({
url: "upload.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success:function(data){}
});
}));

// Function to preview image after validation
$(function() {
$("#file").change(function() { 
/*var file = this.files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg"];
if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
{
$('#previewing').attr('src','noimage.png');
return false;
}
else*/
//{
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
});
});
function imageIsLoaded(e) {
  $('#previewing').attr('src', e.target.result);
  $("#file").css("color","green");
  $('#image_preview').css("display", "block");
  $('#previewing').attr('width', '200px');
  $('#previewing').attr('height', '200px');
};
});

function change(){
$('p').html(" ");
$("p").append("  Morning:"+"</br>"+$("#area0").val()+"</br> "+"  Lunch:"+"</br>"+"   "+$("#area1").val()+"</br>"+" Dinner:"+"</br>"+" "+$("#area2").val()+" "+"</br>"+"Special Event for the day:</br>"+$("#area").val());
$("#complete").modal('show');
}
(function(){
    $(".nav li a").click(function(e){
        e.preventDefault(); //To prevent the default anchor tag behaviour
        var url = this.href;
        $(".main").load(url);
    });
});


function func(){
  $("#head").hide(300);
  $('#main').load($(this).attr("href")).show();
}
function func2(){
  $("#head").show(300);
  $("#main").hide(300);
}
$('a').on('click mouseenter mouseout',function(){
      $(this).addClass("visited");
});
</script>
</body>
</html>
