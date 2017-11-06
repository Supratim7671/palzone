<?php
include "configuration.php";
//include "./template/header.php";
?>
<link rel="stylesheet" href="formoid1_files/formoid1/formoid-solid-light-green.css" type="text/css" />
<script type="text/javascript" src="formoid1_files/formoid1/jquery.min.js"></script>
<?php
$userid=$_SESSION['uid'];
//$view_userid=$_GET['id'];
if (isset($userid))
{
?>
<html lang="en" ng-app="myApp">
<?php  
  //session_start();
 // $userid=$_SESSION['uid'];
  $query1=mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$userid';");
  $row1=mysqli_fetch_array($query1,MYSQLI_ASSOC);
  $name=$row1['username'];
  function GetImageExtension($imagetype)
     {
		if(empty($imagetype)) return false;
		switch($imagetype)
{
			case 'image/bmp': return '.bmp';
			case 'image/gif': return '.gif';
			case 'image/jpeg': return '.jpg';
			case 'image/png': return '.png';
			default: return false;
	}
}
if (isset($_POST['bt1']))
{
	$profile_id=$_POST['profileid'];
	mysqli_query($conn,"DELETE FROM `user_profile_pic` WHERE `profile_id`='$profile_id' and `user_id`='$userid';");
	
}
if (isset($_POST['img']))
{	if (!empty($_FILES["uploadedimage"]["name"])) 
 {
	$file_name=$_FILES["uploadedimage"]["name"];
	$temp_name=$_FILES["uploadedimage"]["tmp_name"];
	$imgtype=$_FILES["uploadedimage"]["type"];
	$ext= GetImageExtension($imgtype);
	$imagename=date("d-m-Y")."-".time().$ext;
	$target_path = "./images/".$imagename;
	
if(move_uploaded_file($temp_name, $target_path)) 
{	
           $query1= mysqli_query($conn,"SELECT * FROM `users` where `user_id`='$userid';");
     $fetch1=mysqli_fetch_array($query1,MYSQLI_NUM);
     $username=$fetch1[1];
	$uid=$_SESSION['uid'];
	$query=mysqli_query($conn,"SELECT * FROM  `users` WHERE `user_id`='$uid';");
	$result=mysqli_fetch_array($query,MYSQLI_NUM);
	$userid=$result[0];
$query_upload="INSERT into `user_profile_pic` (`user_id`,`image`,`image_path`) 
VALUES('$userid','$imagename','$target_path');";
	$message=$username.' has added a  pic in gallery';
                mysqli_query($conn,"INSERT INTO `admin_notification` (`notification`) VALUES ('$message');");
             
	mysqli_query($conn,$query_upload);
                  echo "<meta content=\"2;photos.php\" http-equiv=\"refresh\">";  

}
else
{
	exit("Error While uploading image on the server");
}
}
}
  ?>
  
<head>
  
  
  <title>PAL-ZONE</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="./bootstrap_files/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.css">
  

  
  <script src="./app.js"></script>

	<script>
$(function(){
	$("#divid").autocomplete({
			source: function(request,response){
				$.getJSON("livesearch.php",{name:request.term},response);
			},
			minLength:2,
            create: function () {
                $(this).data('ui-autocomplete')._renderItem = function (ul, item) {
                    return $('<li class="name-list">')
                        .append(item.label)
                        .appendTo(ul);
				};
			},
			select: function( event, ui ) { 
			event.preventDefault();
				window.location.href = ui.item.id;
				},
			focus: function (event, ui) {
			   event.preventDefault();
			}
	});
});

</script>
  <style>    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #2E8B57;
      color: white;
      padding: 15px;
    position:fixed-bottom
	}
	.badge{
   background:red;
   position:relative;
   top: -10px;
   left: -15px;

	}
	span.glyphicon-globe {
    font-size: 1.8em;
}	
	span.glyphicon-envelope {
    font-size: 1.8em;
}
  </style>
  
</head>

<body style="position:relative" data-spy="scroll" data-target=".navbar-fixed-top" >

<nav class="navbar navbar-inverse navbar-fixed-top" style="">
  <div class="container-fluid">
    <div class="navbar-header" >
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
       <a class="navbar-brand" href="#" style="color:solid-green;;">
	<div style="float: left;">
        <img src="logo.png" alt="logo" id="" style="height:40px;width:70px;">
    </div></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="main_page.php">Home</a></li>
         
		 <li><a href="leaderboard.php">Leaderboard</a></li>
		   	<?php
				$query=mysqli_query($conn,"SELECT * FROM `user_notification` where `user_id`='$userid';");
				$result=mysqli_fetch_array($query,MYSQLI_NUM);
				$count=mysqli_num_rows($query);
			?>
		<li><a href="./notification.php"><big><span class="glyphicon glyphicon-globe"></big></span> <span class="badge"><?php echo $count;?></span></a></li>
	 <li><a href="./message.php"><span class="glyphicon glyphicon-envelope"></a></li>
	
		
		
	  </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group input-group" ng-controller="SearchController" >
          <input type="search" name="search" id="divid" class="form-control" placeholder="Search.." ng-model="keybords" ng-keyup="search()">
          <span class="input-group-btn">
          
          </span>        
        </div>
      </form>
	  <!-- <div class="col-sm-2"  style="float:right; " ng-repeat="res in result" ng-show="showstartcard" >
        <div >
            <p>{{res.username}}</p>
            <p>{{res.email}}</p>
            <p><a href=""><cite></cite></a></p>
        </div>
            
                
    </div>-->
      <ul class="nav navbar-nav navbar-right">
       
  
  
		<li><a href="profile.php"><span class="glyphicon glyphicon-user"></span><?php echo "$name";?></a></li>
		
		<li class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-wrench"></span>Settings
		<span class="caret"></span>
		</a>
		<ul class="dropdown-menu">
          <li><a href="accountsettings.php">Account Settings</a></li>
		  <li><a href="submissionhistory.php">My Submissions</a></li>
          <li><a href="feedback.php">Feedback</a></li>
          <li><a href="about.php">About</a></li> 
        </ul>
		</li>
		<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
	  </ul>

	  </div>
  </div>
</nav>
 
 </br>
  </br>
  </br>
  </br>

<div class="container-fluid" >    
  <div class="row">
    <div class="col-sm-2 well" style="">
      <div class="well well-lg">
	  <?php  
  //session_start();
 // $userid=$_SESSION['uid'];
  $query2=mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$userid';");
  $row2=mysqli_fetch_array($query2,MYSQLI_ASSOC);
  $name=$row2['username'];
  ?>
        <p><a href="#"><?php echo $name;?></a></p>
    <?php
	//$query=mysqli_query($conn,"SELECT * FROM `users` where `user_id`='$userid';");
	//$fetch=mysqli_fetch_array($query,MYSQLI_NUM);
	//$userid=$fetch[0];
		//$userid=intval($_POST['userid']);
		$query=mysqli_query($conn,"SELECT * from `user_profile_pic` WHERE `user_id`='$userid';");
		$result=mysqli_fetch_assoc($query);
		$image_path=$result['image_path'];
		if ($image_path==null)
		{
			// mysqli_query($conn,"INSERT INTO `user_profile_pic` (`user_id`,`image`,`image_path`) VALUES ('$userid','default.jpg','images/default.jpg');");
			//echo "<meta content=\"0;main_page.php\" http-equiv=\"refresh\">";
		
		$image_path="./default.jpg";
	
		echo'<img class="img-circle" height="140" width="140"  src="'.$image_path.'" alt="D.P" />';
	
		}
		
		else
			echo'<img class="img-circle" height="140" width="140"  src="'.$image_path.'" alt="D.P" />';
		?>
		</br>
		</br>
<!--<input type="file" id="img" name="img" style="background-color:blue;float:right;" placeholder="Upload Your image">-->
	
	</div>
      <div class="well" style="">
     <p><a href="newsfeed.php"> News Feed</a></p>
	  <p><a href="timeline.php"> Timeline</a></p>
	  <p><a href="photos.php"> Gallery</a></p>
	    <p><a href="group_chat.php"> Group Discussion</a></p>
          <p><a href="usernotice.php"> Notices</a></p>
		    <p><a href="friends.php"> Friends </a></p> 
	  </div>
	  
	  
	  <div class="well" style="">
        
      
            <?php
	   $query100=mysqli_query($conn,"SELECT * FROM `user_notification` where `user_id`='$userid';");
	   if (mysqli_num_rows($query100)>0)
	   {
	   ?> 
      
      <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <p><strong>Hey!</strong></p>
        There are many notification pending in your account.
      </div>
	  <?php
	   }
	  ?>
	  <h4>These are the places where you can learn new things</h4>
      <p><a href="http://www.w3schools.com/" target="_blank">w3schools.com</a></p>
      <p><a href="http://www.tutorialspoint.com/" target="_blank">tutorialspoint.com</a></p>
      <p><a href="http://www.javatpoint.com/" target="_blank">javatpoint.com</a></p>
    </div>
</div>


<div class="col-sm-8"  id="refresh" style="">
<div class="row well">
<center><h3><b>PHOTO GALLERY</b></h3></center>
<button style="float:right;" type="button" class="btn btn-default btn-sm" data-toggle="modal"  data-target="#image">ADD PHOTO</button>
</div>
<div class="row">
   <?php
	
		$query=mysqli_query($conn,"SELECT * from `user_profile_pic` WHERE `user_id`='$userid';");
		//$result=mysqli_fetch_assoc($query);
		//$image_path=$result['image_path'];
	while($result=mysqli_fetch_assoc($query))
	{   $profileid=$result['profile_id'];
		$image_path=$result['image_path'];
		if ($image_path!='')
		{
	?>


<form method="post" style="padding:0px;margin:0px;border:0px;" class="delete_photo">		
<div class="col-sm-4 well" style="padding-left:1px;">
<input type="hidden" name="profileid" value="<?php echo $profileid;?>" style="">
<button type="submit" class="btn btn-sm" name="bt1" id="bt1" style="float:right;">x</button>

<center><img class="img-rounded" height="160" width="160"  src="<?php echo $image_path;?>" alt="photo" />

</center>

		<!--<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>-->
		
</div>
</form>
<?php
		}
	?>
	<?php 
	}
?>
</div>


</div>
<script>  
$("#refresh").on("submit",".delete_photo",function(event){
	//alert("here");
	event.preventDefault();
	$.ajax({
		type:"post",
		url:"photos_ajax.php",
		data:$(this).serialize(),
		success:function(data){
		//	alert(data);
			$("#refresh").html("");
			$("#refresh").html(data);
			}
		
	});
});
</script>

<div class="col-sm-2 well" style="" >
   <!--   <div class="thumbnail" >
        <p>Upcoming Events:</p>
        <img src="paris.jpg" alt="Paris" width="400" height="300">
        <p><strong>CODE-VITA</strong></p>
        <p>Fri. 27 November 2015</p>
        <button class="btn btn-primary">Info</button>
      </div>-->      
      <div class="well" style="overflow-y:scroll;height:400px;">
       <?php
$query=mysqli_query($conn,"SELECT * FROM `users` WHERE `online`='yes' and `user_id`!='$userid';");
$count=mysqli_num_rows($query);

?>  

	  
       <p>ONLINE USERS (<?php echo $count;?>)</p>
<?php
//$fetch=mysqli_query($query,MYSQLI_NUM);
while($fetch=mysqli_fetch_array($query,MYSQLI_NUM))
{
	$online_user_id=$fetch[0];
$online_user_name=$fetch[1];
$query1=mysqli_query($conn,"SELECT * FROM `user_profile_pic` WHERE `user_id`='$online_user_id';");
$fetch1=mysqli_fetch_array($query1,MYSQLI_NUM);
$user_pic=$fetch1[3];
?>
	   <div class="row">
    		<?php
	   if ($user_pic==null)
	   {
		   
		   $user_pic="default.jpg";
	   ?>
    	<div class="col-sm-1 col-sm-offset-1" style="padding:5px;" > <img src="<?php echo $user_pic;?>" height="40" width="35">  </div>
        <?php
	   }
	   else
		echo'<div class="col-sm-1 col-sm-offset-1" style="padding:5px;" > <img src="'.$user_pic.'" height="40" width="35">  </div>
         ';
		?> 
		<div class="col-sm-4 col-sm-offset-1"> <a href="./message_reply.php?id=<?php echo $online_user_id?>" style="text-transform:capitalize; text-decoration:none; color:#003399;" target="_blank"> <?php echo $online_user_name;?> </a>   </div>
       
    </div>
<?php
}
?>   
   </div>
	</div>
  </div>
</div>
<footer class="container-fluid text-center">
  <div>

  <p style="text-align:left">&copy;&nbsp;ALL RIGHTS RESERVED</p>
  </div>
</footer>
<div class="modal fade" id="image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#034f84;height:80px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 style="color:#fff;"class="modal-title" id="myModalLabel">ADD YOUR PHOTO HERE</h2>
      </div><!--modal header -->
	  <div class="modal-body">
				<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="userid" value="<?php echo $userid; ?>" style="width:100px;">
	<input type="file" class="btn btn-sm" id="" name="uploadedimage" style="" placeholder="" accept="image/*" value="Upload Image" required>
	</br>
	<input type="submit" class="btn btn-info active" id="img" name="img" style="" placeholder="" accept="image/*" value="Upload Image" >
	</form><!-- form "-->
	  </div><!-- modal body"-->
	</div><!-- modal content "-->
</div>
<?php
}
else
	echo "<meta content=\"0;home.php\" http-equiv=\"refresh\">";
?>