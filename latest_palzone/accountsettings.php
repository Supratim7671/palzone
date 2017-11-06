<?php
include "configuration.php";
//include "./template/header.php";
?>
<?php
$userid=$_SESSION['uid'];
if (isset($userid))
{
	if (isset($_POST['change_name']))
{    $query1= mysqli_query($conn,"SELECT * FROM `users` where `user_id`='$userid';");
     $fetch1=mysqli_fetch_array($query1,MYSQLI_NUM);
     $username=$fetch1[1];
	$newname=test_input($_POST['fnm']).' '.test_input($_POST['lnm']);
	mysqli_query($conn,"UPDATE `users` set `username`='$newname' WHERE `user_id`='$userid';");
	$message=$username.' has changed his name';
        mysqli_query($conn,"INSERT INTO `admin_notification` (`notification`) VALUES ('$message');");
          echo "<meta content=\"2;accountsettings.php\" http-equiv=\"refresh\">";
		  	echo '<script>window.onload=function(){$(\'#suc\').modal();}</script>';
	
}
	
if (isset($_POST['change_password']))
{    
     $query1= mysqli_query($conn,"SELECT * FROM `users` where `user_id`='$userid';");
     $fetch1=mysqli_fetch_array($query1,MYSQLI_NUM);
     $username=$fetch1[1];
	$oldpassword=test_input($_POST['oldpassword']);
	$newpassword=test_input($_POST['newpassword']);
	$cnewpassword=test_input($_POST['cnewpassword']);
	$oldpassword=md5($oldpassword);
	$newpassword=md5($newpassword);
	$cnewpassword=md5($cnewpassword);
	$result=mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$userid';");
	$row=mysqli_fetch_array($result,MYSQLI_NUM);
	$db_password=$row[3];
	if ((strcmp($db_password,$oldpassword)==0) and (strcmp($newpassword,$cnewpassword)==0))
	{
		mysqli_query($conn,"UPDATE `users` set `password`='$newpassword' WHERE `user_id`='$userid';");
		$message=$username.' has changed his password';
                mysqli_query($conn,"INSERT INTO `admin_notification` (`notification`) VALUES ('$message');");
					echo '<script>window.onload=function(){$(\'#success\').modal();}</script>';
              echo "<meta content=\"2;accountsettings.php\" http-equiv=\"refresh\">";
	}
	else
	{echo '<script>window.onload=function(){$(\'#failure\').modal();}</script>';
		echo "PASSWORDS DO NOT MATCH";
}
}
if (isset($_POST['change_email']))
{
	$newemail=test_input($_POST['email']);
	mysqli_query($conn,"UPDATE `users` set `email`='$newemail' WHERE `user_id`=$userid;");
	echo "<meta content=\"2;accountsettings.php\" http-equiv=\"refresh\">";
}
if (isset($_POST['change_dob']))
{
	$olddate=$_POST['date'];
	mysqli_query($conn,"UPDATE `user_info` set `birthday`='$olddate' WHERE `user_id`='$userid';");
		echo '<script>window.onload=function(){$(\'#suc\').modal();}</script>';
	echo "<meta content=\"2;accountsettings.php\" http-equiv=\"refresh\">";
}	
if (isset($_POST['delete_account']))
{
	mysqli_query($conn,"UPDATE `users` set `block`='yes' WHERE `user_id`='$userid'; ");
	echo "<meta content=\"0;home.php\" http-equiv=\"refresh\">";
	
}
	
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
	$query2=mysqli_query($conn,"SELECT * FROM `user_profile_pic` WHERE `user_id`='$userid';");
	$fetch2=mysqli_fetch_assoc($query2);
	$profile_id=$fetch2['profile_id'];
	$image_path=$fetch2['image_path'];
	if ($image_path==null)
mysqli_query($conn,"INSERT INTO `user_profile_pic` (`user_id`,`image`,`image_path`) VALUES('$userid','$imagename','$target_path');");
	
else
	
	mysqli_query($conn,"UPDATE `user_profile_pic` set `image`='$imagename',`image_path`='$target_path' WHERE `user_id`='$userid' and `profile_id`='$profile_id';");
$message=$username.' has changed his profile pic';
                mysqli_query($conn,"INSERT INTO `admin_notification` (`notification`) VALUES ('$message');");    
	echo "<meta content=\"2;accountsettings.php\" http-equiv=\"refresh\">";  

}
else
{
	exit("Error While uploading image on the server");
}
}
}
?>


<html lang="en" ng-app="myApp">
<?php  
  //session_start();
  $userid=$_SESSION['uid'];
  $query1=mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$userid';");
  $row1=mysqli_fetch_array($query1,MYSQLI_ASSOC);
  $name=$row1['username'];
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
	.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
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
		<li id="refresh2"><a href="./notification.php"><big><span class="glyphicon glyphicon-globe"></big></span> <span class="badge"><?php echo $count;?></span></a></li>
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
  
<div class="container-fluid">    
  <div class="row">
  <div class="col-sm-6"></div>
  <div class="col-sm-3">
  <div id="showresult" style="width:60px;float:right">
		  </div>
		  </div>
		  <div class="col-sm-3">
		  </div>
		  </div>
  <div class="row">
    <div class="col-sm-3 well" style="">
      <div class="well well-lg">
        <p><a href="#"><?php echo "<h4>$name</h4>";?></a></p>
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
	
	<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="userid" value="<?php echo $userid; ?>" style="width:100px;">
	<span class="btn btn-default btn-file btn-sm">Browse...
	<input type="file" class="btn btn-sm" id="" name="uploadedimage" style="" placeholder="" accept="image/*" value="Upload Image" required>
	</span>
	</br>
	</br>
	<input type="submit" class="btn btn-info active" id="img" name="img" style="" placeholder="" accept="image/*" value="Upload Image" >
	</form>
	</div>
      <div class="well">
          <p><a href="newsfeed.php"> News Feed</a></p>
	  <p><a href="timeline.php"> Timeline</a></p>
	  <p><a href="photos.php"> Gallery</a></p>
	    <p><a href="group_chat.php"> Group Discussion</a></p>
          <p><a href="usernotice.php"> Notice </a></p>
           
		   <p><a href="friends.php"> Friends </a></p>
	  </div>
	  
	  
	 
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


<div class="col-sm-7">
<div class="row">
<div class="well" style="height:100px;padding:20px;margin:15px;">
<div style="float:left">
<h4>Change Name<h4> 
</div>
<div style="float:right">
<p>
        <button type="button" class="btn btn-default btn-sm" data-toggle="modal"  data-target="#name">
          <span class="glyphicon glyphicon-pencil"></span>&nbsp;EDIT
        </button>
      </p>
</div>
	  </div>
<div class="well" style="height:100px;padding:20px;margin:15px;">
<div style="float:left">
<h4>Change Password<h4> 
</div>
<div style="float:right">
<p>
        <button type="button" class="btn btn-default btn-sm" data-toggle="modal"  data-target="#pass">
          <span class="glyphicon glyphicon-pencil"></span>&nbsp;EDIT
        </button>
      </p>
</div>
	  </div>


<div class="well" style="height:100px;padding:20px;margin:15px;" data-toggle="modal"  data-target="#dob">
<div style="float:left">
<h4>Change Your Date Of Birth<h4> 
</div>
<div style="float:right">
<p>
        <button type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-pencil"></span>&nbsp;EDIT
        </button>
      </p>
</div>
	  </div>
<div class="well" style="height:100px;padding:20px;margin:15px;" data-toggle="modal"  data-target="#delete">
<div style="float:left">
<h4>DELETE YOUR ACCOUNT<h4> 
</div>
<div style="float:right">
<p>
        <button type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-trash"></span>&nbsp;DELETE
        </button>
      </p>
</div>
	  </div>

</div>
</div>
<!--change name-->
<div class="modal fade" id="name" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#034f84;height:80px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 style="color:#fff;"class="modal-title" id="myModalLabel">Change Name</h2>
      </div><!--modal header -->
	  <div class="modal-body">
				<form class="form"  action="" method="post">
				<div class="form-group">
				<label for="name">First Name:</label></td><td><input id="name" type="text" class="form-control" name="fnm"  title="Enter Your First Name" required>
				</div><!-- NAME form group -->
					<div class="form-group">
				<label for="name">Last Name:</label></td><td><input id="name" type="text" class="form-control" name="lnm" title="Enter Your Last Name" required>
				</div>
				
				
				</div><!-- CONFIRM Password form group -->
				<div class="modal-footer" style="background-color: #2E8B57;height:100px;">
				<p class="help-block" style=""><strong> BY SUBMITTING YOUR ARE GOING TO CHANGE YOUR NAME</strong> </p>
				<button type="submit" id="change_name" name="change_name" class="btn btn-primary btn-md" style="color:white;background-color:#034f84;">SAVE</button>
				</div><!-- modal footer"-->
		  </form><!-- form "-->
	  </div><!-- modal body"-->
	</div><!-- modal content "-->
</div><!-- modal dialog"-->

<!--change name-->
<div class="modal fade" id="pass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#034f84;height:80px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 style="color:#fff;"class="modal-title" id="myModalLabel">Change Password</h2>
      </div><!--modal header -->
	  <div class="modal-body">
				<form class="form"  action="" method="post">
				<div class="form-group">
				<label for="password">OLD PASSWORD:</label></td><td><input id="oldpassword" type="password" class="form-control" name="oldpassword" title="" required>
				</div>
				<div class="form-group">
				<label for="password">NEW PASSWORD:</label></td><td><input id="newpassword" type="password" class="form-control" name="newpassword" title="" required>
				</div><!-- Password form group -->
				<div class="form-group">
				<label for="confirmpassword">CONFIRM NEW PASSWORD:</label></td><td><input id="cnewpassword" type="password" class="form-control" name="cnewpassword"  title="" required>
				
				
				
				</div><!-- CONFIRM Password form group -->
				<div class="modal-footer" style="background-color: #2E8B57;height:100px;">
				<p class="help-block" style=""><strong> BY SUBMITTING YOU ARE GOING TO CHANGE YOUR PASSWORD</strong> </p>
				<button type="submit" id="change_password" name="change_password" class="btn btn-primary btn-md" style="color:white;background-color:#034f84;">SAVE</button>
				</div><!-- modal footer"-->
		  </form><!-- form "-->
	  </div><!-- modal body"-->
	</div><!-- modal content "-->
</div><!-- modal dialog"-->
</div>
<!--change name-->
<div class="modal fade" id="mail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#034f84;height:80px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 style="color:#fff;"class="modal-title" id="myModalLabel">CHANGE EMAIL</h2>
      </div><!--modal header -->
	  <div class="modal-body">
				<form class="form"  action="" method="post">
				
				<div class="form-group">
				<label for="email">EMAIL:</label></td><td><input id="email" type="email" class="form-control" name="email" pattern="[a-zA-Z0-9._]+@[a-zA-Z]+.[a-zA-Z]+" title="">
				
				
				
				</div><!-- Email form group -->
				
				
				
				
				
				</div><!-- CONFIRM Password form group -->
				<div class="modal-footer" style="background-color:#2E8B57;height:100px;">
				<p class="help-block" style=""><strong> BY SUBMITTING YOU ARE GOING TO CHANGE YOUR EMAIL</strong> </p>
				<button type="submit" id="change_email" name="change_email" class="btn btn-primary btn-lg" style="color:white;background-color:#034f84;">SAVE</button>
				</div><!-- modal footer"-->
		  </form><!-- form "-->
	  </div><!-- modal body"-->
	</div><!-- modal content "-->
</div><!-- modal dialog"-->
<div class="modal fade" id="dob" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#034f84;height:80px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 style="color:#fff;"class="modal-title" id="myModalLabel">CHANGE DATE OF BIRTH</h2>
      </div><!--modal header -->
	  <div class="modal-body">
				<form class="form"  action="" method="post">
				
				<div class="form-group">
				<label for="dob">DATE OF BIRTH:</label></td><td><input id="date" type="date" class="form-control" name="date"  title="" required>
				</br>
				</br>
				</br>
				</br>
				</br>
				
				
				</div><!-- Email form group -->
				
				
				
				
				
				</div><!-- CONFIRM Password form group -->
				<div class="modal-footer" style="background-color: #034f84;height:100px;">
				<p class="help-block" style="color:red"><strong> BY SUBMITTING YOU ARE GOING TO CHANGE YOUR DATE OF BIRTH</strong> </p>
				<button type="submit" id="change_dob" name="change_dob" class="btn btn-primary btn-md" style="color:white;background-color:red;">SAVE</button>
				</div><!-- modal footer"-->
		  </form><!-- form "-->
	  </div><!-- modal body"-->
	</div><!-- modal content "-->
</div><!-- modal dialog"-->

<!--Delete Account-->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#034f84;height:80px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h3 style="color:#fff;"class="modal-title" id="myModalLabel">DELETE ACCOUNT</h3>
      </div><!--modal header -->
	  <div class="modal-body">
				<form class="form"  action="" method="post">
				<h4 style="color:pink">OH! No You Are Going To DELETE Your ACCOUNT....Its So Ridiculous...</h4>
				
				</div><!-- CONFIRM Password form group -->
				<div class="modal-footer" style="background-color: #2E8B57;height:100px;">
				<p class="help-block" style=""><strong> BY SUBMITTING YOU ARE GOING TO DELETE YOUR ACCOUNT PERMANENTLY</strong> </p>
				<button type="submit" id="delete_account" name="delete_account" class="btn btn-primary btn-md" style="color:white;background-color:#034f84;">CONFIRM</button>
				</div><!-- modal footer"-->
		  </form><!-- form "-->
	  </div><!-- modal body"-->
	</div><!-- modal content "-->
</div><!-- modal dialog"-->

<div class="modal fade" id="success" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#034f84;height:80px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center" style="color:#ff0000;">Success</h4>
        </div>
        <div class="modal-body">
          <p style="color:#A9A9A9;"><?php echo "YOUR PASSWORD HAS BEEN CHANGED SUCCESSFULLY"?></p>
        </div>
				</div>
			</div>
			</div>
			<div class="modal fade" id="suc" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#034f84;height:80px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center" style="color:#ff0000;">Success</h4>
        </div>
        <div class="modal-body">
          <p style="color:#A9A9A9;"><?php echo "CHANGES ARE DONE SUCESSFULLY"?></p>
        </div>
				</div>
			</div>
			</div>
			<div class="modal fade" id="failure" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#034f84;height:80px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center" style="color:#ff0000;">Success</h4>
        </div>
        <div class="modal-body">
          <p style="color:#A9A9A9;"><?php echo "PASSWORD MISMATCH"?></p>
        </div>
				</div>
			</div>
			</div>


<div class="col-sm-2 well" >
     <!-- <div class="thumbnail" >
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
  <script>
	$(document).ready(function(){update();});
function update() {
    $.get("response_ajax.php", function(data) {
	//	alert(data);
		
		var count=data;
       $("#refresh2").html("<a href=\"./notification.php\"><big><span class=\"glyphicon glyphicon-globe\"> </big></span><span class=\"badge\">"+count+"</span></a>");
    });
    window.setTimeout(update,5000);
}
	</script>
<footer class="container-fluid text-center">
  <div>

  <p style="text-align:left">&copy;&nbsp;ALL RIGHTS RESERVED</p>
  </div>
</footer>

</body>
</html>
<?php
}
else
	 echo  "<meta content=\"0;home.php\" http-equiv=\"refresh\">";
?>		