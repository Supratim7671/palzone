<!DOCTYPE html>
<?php

include 'configuration.php'; 
//include './template/header.php';

?>
<?php
$userid=$_SESSION['uid'];
$view_userid=$_GET['id'];
if (isset($userid))
{
	$query10=mysqli_query($conn,"SELECT * FROM `conversation` where (`user_one_id`='$userid' and `user_two_id`='$view_userid') or 
(`user_one_id`='$view_userid' and `user_two_id`='$userid');");
$fetch10=mysqli_fetch_assoc($query10);
$cid=$fetch10['c_id'];
	if(isset($_POST['file']) && ($_POST['file']=='post'))
	{
		$txt=$_POST['post_txt'];
		$priority=$_POST['priority'];
		$post_time=$_POST['pic_post_time'];
		if($txt=="")
		{
			$txt="added a new photo.";
		}
		
		
			$path = "./images".$user."/Post/";
		
		
		
		$img_name=$_FILES['file']['name'];
    	$img_tmp_name=$_FILES['file']['tmp_name'];
    	$prod_img_path=$img_name;
		
		move_uploaded_file($img_tmp_name,"./images".$user."/Post/".$prod_img_path);
	
    	mysqli_query($conn,"INSERT INTO `user_post`(`user_id`,`post_txt`,`post_pic`,`post_time`,`priority`) VALUES('$userid','$txt','$img_name','$post_time','$priority');");
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
	$uid=$_SESSION['uid'];
	$query=mysqli_query($conn,"SELECT * FROM  `users` WHERE `user_id`='$uid';");
	$result=mysqli_fetch_array($query,MYSQLI_NUM);
	$userid=$result[0];
$query_upload="INSERT into `college_network`.`user_profile_pic` (`user_id`,`image`,`image_path`) 
VALUES('$userid','$imagename','$target_path');";
	mysqli_query($conn,$query_upload);  

}
else
{
	exit("Error While uploading image on the server");
}
}
}
if (isset($_POST['add_friend']))
{
	$sender_id=intval($_POST['sender_id']);
	$reciever_id=intval($_POST['reciever_id']);
	mysqli_query($conn,"INSERT INTO `friends` (`friend_one_id`,`friend_two_id`,`status`) VALUES ('$sender_id','$reciever_id','requested');");
$query99=mysqli_query($conn,"SELECT * FROM `users` where `user_id`='$sender_id';");
	$fetch99=mysqli_fetch_assoc($query99);
	$name=$fetch99['username'];
	$message=$name." has send friend request";
	mysqli_query($conn,"INSERT INTO `user_notification`(`user_id`,`notification`) VALUES ('$reciever_id','$message');");
	//	mysqli_query($conn,"INSERT INTO `friends` (`friend_one_id`,`friend_two_id`,`status`) VALUES ('$reciever_id','$sender_id','requested');");
	
}	
	
?>
<html lang="en" ng-app="myApp">
<?php  
  //session_start();
  //$userid=$_SESSION['uid'];
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
	  <ul class="nav navbar-nav navbar-right">
   
 
		<li><a href="profile.php"><span class="glyphicon glyphicon-user"></span><?php echo $name;?></a></li>
		
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
    <div class="col-sm-3 well" style="">
      <div class="well well-lg">
	      <?php  
  //session_start();
  //$userid=$_SESSION['uid'];
  $query2=mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$view_userid';");
  $row2=mysqli_fetch_array($query2,MYSQLI_ASSOC);
  $name=$row2['username'];
  ?>
  
        <p><a href="#"><?php echo "<h4>$name</h4>";?></a></p>
        <?php
	//$query=mysqli_query($conn,"SELECT * FROM `users` where `user_id`='$userid';");
	//$fetch=mysqli_fetch_array($query,MYSQLI_NUM);
	//$userid=$fetch[0];
		//$userid=intval($_POST['userid']);
		$query=mysqli_query($conn,"SELECT * from `user_profile_pic` WHERE `user_id`='$view_userid';");
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
			echo'</br></br>';
	$query100=mysqli_query($conn,"SELECT * FROM `friends` where (`friend_one_id`='$userid' and `friend_two_id`='$view_userid') or (`friend_one_id`='$view_userid' and `friend_two_id`='$userid');");
		if (mysqli_num_rows($query100)==0)
		echo '
	<form method="post">
	<input type="hidden" name="sender_id" value="'.$userid.'">
	<input type="hidden" name="reciever_id" value="'.$view_userid.'">
	<button type="submit" class="btn btn-primary btn-sm" style="float:right" name="add_friend">ADD FRIEND</button>
	</form>
	';
		?>
		</br>
		</br>
<!--<input type="file" id="img" name="img" style="background-color:blue;float:right;" placeholder="Upload Your image">-->
	
	<!--<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="userid" value="<?php echo $userid; ?>" style="width:100px;">
	<input type="file" class="btn btn-sm" id="" name="uploadedimage" style="" placeholder="" accept="image/*" value="Upload Image" required>
	</br>
	<input type="submit" class="btn btn-info active" id="img" name="img" style="" placeholder="" accept="image/*" value="Upload Image" required>
	</form>-->
	</div>
      <div class="well">
	  <p><a href="./view_profile.php?id=<?php echo $view_userid;?>">Timeline</a></p>
	  <p><a href="./slampage.php?id=<?php echo $view_userid;?>"> Slam Book</a></p>
	  <p><a href="./message_reply.php?id=<?php echo $view_userid;?>">Message</a></p>
	    
		<p><a href="./view_photos.php?id=<?php echo $view_userid;?>"> Gallery</a></p>
		<p><a href="view_friends.php?id=<?php echo $view_userid; ?>"> Friends</a></p>
         
	  </div>
	  
	  
	  <div class="well">
        <p><a href="#">Topics </a></p>
        
		<div class="btn-group btn-group-xs">
          
	
        </div>
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
<div class="well">
<p style="color:blue;"><h2 style="color:blue;"><center>
BASIC INFORMATION</center><h2></p>
</div>
<?php
$query=mysqli_query($conn,"SELECT * FROM `user_info` WHERE 	`user_id`='$view_userid';");
$result=mysqli_fetch_array($query,MYSQLI_NUM);
$school=$result[2];
$college=$result[7];
$job=$result[1];
$city=$result[3];
$hometown=$result[4];
$country=$result[8];
$birthday=$result[12];
$gender=$result[9];
$relationship=$result[5];
$mobile=$result[6];
$email=$result[10];
$facebook=$result[11];
?>
<div class="row well" style=" margin:0px;">
<div class="col-sm-6 ">

<div class="well">
<h5 style="color:green"> LAST SCHOOL  VISITED:</h5>

<p style="color:blue"><?php echo $school;?></p>
</div>
<div class="well">
<h5 style="color:green"> CURRENT COLLEGE</h5>
<p style="color:blue"><?php echo $college;?></p>
</div>
<div class="well">
<h5 style="color:green">ADD YOUR JOB</h5>
 <p style="color:blue"><?php echo $job;?></p>

</div>


</div>
<div class="col-sm-6">
<div class="well">
<h5 style="color:green">ADD YOUR CURRENT CITY</h5>
 <p style="color:blue"><?php echo $city;?></p>

</div>
<div class="well">
<h5 style="color:green">ADD YOUR CURRENT HOMETOWN</h5>
  <p style="color:blue"><?php echo $hometown;?></p>

</div>
<div class="well">
<h5 style="color:green">ADD YOUR COUNTRY</h5>
 <p style="color:blue"><?php echo $country;?></p>

</div>
</div>
</div>


<div class="row well" style="margin-top:10px;margin-bottom:10px;margin-left:0px;margin-right:0px;">
<div class="col-sm-6">


<div class="well">
<h5 style="color:green">BIRTHDAY</h5>
 <p style="color:blue"><?php echo $birthday;?></p>
</div>
<div class="well">
<h5 style="color:green">GENDER</h5>
  <p style="color:blue"><?php echo $gender;?></p>
</div>
<div class="well">
<h5 style="color:green">RELATIONSHIP</h5>
 <p style="color:blue"><?php echo $relationship;?></p>
</div>


</div>
<div class="col-sm-6">

<div class="well">
<h5 style="color:green">MOBILE</h5>
  <p style="color:blue"><?php echo $mobile;?></p>
</div>
<div class="well">
<h5 style="color:green">EMAIL</h5>
  <p style="color:blue"><?php echo $email;?></p>
</div>
<div class="well">
<h5 style="color:green">FACEBOOK ID</h5>
 <p style="color:blue"><?php echo $facebook;?></p>
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
$(document).ready(function(){
	
	//update_view_profile();
	update();
	//update_view_profile_comment();
	
	});
function update() {
//	var position = element.scrollTop;
	//alert("position");
	
	
    $.get("response_ajax.php", function(data) {
	//	alert(data);
		
		var count=data;
       $("#refresh2").html("<a href=\"./notification.php\"><big><span class=\"glyphicon glyphicon-globe\"> </big></span><span class=\"badge\">"+count+"</span></a>");
    });
    window.setTimeout(update,1000);

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
	echo "<meta content=\"0;home.php\" http-equiv=\"refresh\">";

?>