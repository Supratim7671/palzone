<!DOCTYPE html>
<?php

include 'configuration.php'; 
//include './template/header.php';

?>
<?php
$userid=$_SESSION['uid'];
//$level=$_SESSION['level'];

if (isset($userid))
{
//$q1=mysqli_query($conn,"SELECT * FROM `friend` where `friend_two_id`='$userid' and `status`='requested';");
//$request=mysqli_num_rows($q1);
//if ($request>0)
//	echo '<script>window.onload=function(){$(\'#request\').modal();}</script>';
if (isset($_POST['unfriend']))
{
	$sender_id=intval($_POST['sender_id']);
	$reciever_id=intval($_POST['reciever_id']);
	mysqli_query($conn,"DELETE FROM `friends` where (`friend_one_id`='$sender_id' and `friend_two_id`='$reciever_id') or (`friend_one_id`='$reciever_id' and `friend_two_id`='$sender_id');");
//	mysqli_query($conn,"DELETE FROM `friends` where `friend_one_id`='$reciever_id' and `friend_two_id`='$sender_id';");
	
}	
if (isset($_POST['cancel']))
{
	$sender_id=intval($_POST['sender_id']);
	$reciever_id=intval($_POST['reciever_id']);
	mysqli_query($conn,"DELETE FROM `friends` where `friend_one_id`='$sender_id' and `friend_two_id`='$reciever_id';");
	//	mysqli_query($conn,"DELETE FROM `friends` where `friend_one_id`='$receiver_id' and `friend_two_id`='$sender_id';");
}	
if (isset($_POST['accept']))
{
	$sender_id=intval($_POST['sender_id']);
	$reciever_id=intval($_POST['reciever_id']);
	mysqli_query($conn,"UPDATE `friends` set `status`='accepted' WHERE `friend_one_id`='$sender_id' and `friend_two_id`='$reciever_id';");
	$query99=mysqli_query($conn,"SELECT * FROM `users` where `user_id`='$reciever_id';");
	$fetch99=mysqli_fetch_assoc($query99);
	$name=$fetch99['username'];
	$message=$name." has accepted your friend request";
	mysqli_query($conn,"INSERT INTO `user_notification`(`user_id`,`notification`) VALUES ('$sender_id','$message');");
//	mysqli_query($conn,"UPDATE `friends` set `status`='accepted' WHERE `friend_one_id`='$reciever_id' and `friend_two_id`='$sender_id';");
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
      background-color: #006400;
      color: white;
      padding: 15px;
    }
	
	#here{
		width:400px;
		height:300px;
		border:1px solid grey;
		display:none;
	}
	#here a{
		display:block;
		width:98%;
		padding:1%;
		font-size:20px;
		border-bottom:1px solid grey;
		
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

<script>
	function time_get()
	{
		d = new Date();
		mon = d.getMonth()+1;
		time = d.getDate()+"-"+mon+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes();
		Reg.fb_join_time.value=time;
		return Reg.fb_join_time.value;
	}
</script>

<div class="container-fluid" >    
  <div class="row">
    <div class="col-sm-2 well" >
      <div class="well well-lg">
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
          <p><a href="usernotice.php"> Notice</a></p>
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
  

<div class="col-sm-8">
    <div class="well">
     <div class="row">
	 
	 <div class="well col-sm-6">
	 <center><p style="color:#436C98">FRIENDS REQUEST</p></center>
	 </div>
	 
	
	 
	 <div class="well col-sm-6">
	 <center><p style="color:#436C98">FRIENDS LIST</p></center>
	 
	 	 </div>
	 </div>
	 </div>
	  <div class="well">
     <div class="row">
	 <div class="well col-sm-6" style="overflow-y:scroll;height:700px;">
	 <?php 
	 $q2=mysqli_query($conn,"SELECT * FROM `friends` WHERE `friend_two_id`='$userid' and `status`='requested';");
	  $no_of_request=mysqli_num_rows($q2);
		echo '<p> Friend Request ('.$no_of_request.') </p>';
	 while($f2=mysqli_fetch_assoc($q2))
	 {
	 $friend_user_id=$f2['friend_one_id'];
	 $q3=mysqli_query($conn,"SELECT * from `users` WHERE `user_id`='$friend_user_id';");
	 $q4=mysqli_query($conn,"SELECT * FROM `user_profile_pic` WHERE `user_id`='$friend_user_id';");
	 $f3=mysqli_fetch_assoc($q3);
	 $f4=mysqli_fetch_assoc($q4);
	 $user_id=$f3['user_id'];
	 $username=$f3['username'];
	 $user_pic=$f4['image_path'];
	 ?>
	 
	 <div class="row">
    	<div class="col-sm-1 col-sm-offset-1" style="padding:5px;" > <img src="<?php echo $user_pic;?>" height="40" width="35">  </div>
        <div class="col-sm-3 col-sm-offset-1"> <a href="./message_reply.php?id=<?php echo $user_id?>" onMouseOver="post_name_underLine(<?php echo $user_id ?>)" onMouseOut="post_name_NounderLine(<?php echo $user_id ?>)"style="text-transform:capitalize; text-decoration:none; color:#003399;"> <?php echo $username;?> </a>   </div>
       <div class="col-sm-2 col-sm-offset-1">
	   <form method="post">
	    <input type="hidden" name="sender_id" value="<?php echo $user_id; ?>">
	<input type="hidden" name="reciever_id" value="<?php echo $userid;?>">
	   <button type="submit" class="btn btn-default btn-xs" name="accept">
          <span class="glyphicon glyphicon-ok"></span>Accept
        </button>
	   </form>
	   </br>
	   <form method="post">
	    <input type="hidden" name="sender_id" value="<?php echo $user_id; ?>">
	<input type="hidden" name="reciever_id" value="<?php echo $userid;?>">
	   <button type="submit" class="btn btn-default btn-xs" name="cancel">
          <span class="glyphicon glyphicon-remove"></span>Cancel
        </button>
	   </form>
	   </div>
    </div>
	</br>
	 <?php
	 }
	 ?> 
	 </div>
	
	<div class="well col-sm-6" style="overflow-y:scroll;height:700px;">
	 <?php 
	 $q2=mysqli_query($conn,"SELECT * FROM `friends` WHERE (`friend_two_id`='$userid' or `friend_one_id`='$userid') and `status`='accepted';");
		 $no_of_friends=mysqli_num_rows($q2);
		echo '<p> Friends ('.$no_of_friends.') </p>';
	 while($f2=mysqli_fetch_assoc($q2))
	 {
	 $friend_user_id=$f2['friend_one_id'];
	 if ($friend_user_id==$userid)
		 $friend_user_id=$f2['friend_two_id'];
	 $q3=mysqli_query($conn,"SELECT * from `users` WHERE `user_id`='$friend_user_id';");
	 $q4=mysqli_query($conn,"SELECT * FROM `user_profile_pic` WHERE `user_id`='$friend_user_id';");
	 $f3=mysqli_fetch_assoc($q3);
	 $f4=mysqli_fetch_assoc($q4);

	 $user_id=$f3['user_id'];
	 $username=$f3['username'];
	 $user_pic=$f4['image_path'];
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
		<div class="col-sm-4 col-sm-offset-1"> <a href="./message_reply.php?id=<?php echo $user_id?>" onMouseOver="post_name_underLine(<?php echo $user_id ?>)" onMouseOut="post_name_NounderLine(<?php echo $user_id ?>)"style="text-transform:capitalize; text-decoration:none; color:#003399;"> <?php echo $username;?> </a>   </div>
       <div class="col-sm-2">
	   <form method="post">
	   <input type="hidden" name="sender_id" value="<?php echo $user_id; ?>">
	<input type="hidden" name="reciever_id" value="<?php echo $userid;?>">
	   <button type="submit" class="btn btn-default btn-sm" name="unfriend">
          <span class="glyphicon glyphicon-remove"></span>Unfriend
        </button>
	   </form>
	   </div>
    </div>
	 <?php
	 }
	 ?> 
	 </div>
	 </div>
	 </div>
  	  
    </div>
	
   <div class="col-sm-2 well" >
   <!--   <div class="thumbnail" >
        <p>Upcoming Events:</p>
        <img src="paris.jpg" alt="Paris" width="400" height="300">
        <p><strong>CODE-VITA</strong></p>
        <p>Fri. 27 November 2015</p>
        <button class="btn btn-primary">Info</button>
      </div>-->      
      <div class="well" style="overflow-y:scroll;height:400px;" >
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
		<div class="col-sm-4 col-sm-offset-1"> <a href="./message_reply.php?id=<?php echo $online_user_id?>" onMouseOver="post_name_underLine(<?php echo $online_user_id ?>)" onMouseOut="post_name_NounderLine(<?php echo $online_user_id ?>)"style="text-transform:capitalize; text-decoration:none; color:#003399;" target="_blank"> <?php echo $online_user_name;?> </a>   </div>
       
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
<div class="modal fade" id="request" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#034f84;height:80px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center" style="color:#ff0000;">Failed</h4>
        </div>
        <div class="modal-body">
          <p style="color:#A9A9A9;"><?php echo "You have friend requests pending in your account"?></p>
        </div>
				</div>
			</div>
			</div>
</body>
</html>

<?php
}
else
	echo "<meta content=\"0;home.php\" http-equiv=\"refresh\">";
?>