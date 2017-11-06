<?php
include "configuration.php";
?>

<?php
$userid=$_SESSION['uid'];
if (isset($userid))
{
	$query=	mysqli_query($conn,"SELECT * FROM `user_notice` WHERE `user_id`='$userid';");
	$result=mysqli_fetch_array($query,MYSQLI_NUM);
			if (isset($_POST['bt1']))
			{
				$delid=$_POST['delid'];
				mysqli_query($conn,"DELETE FROM `user_notice` WHERE `nid`='$delid' and `user_id`='$userid';");
				
			}
			if (isset($_POST['bt2']))
			{
				//$delid=$_POST['delid'];
				mysqli_query($conn,"DELETE FROM `user_notice` where `user_id`='$userid';");
				
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
           <p><a href="usernotice.php"> Notice </a></p>
		   <p><a href="friends.php"> Friends </a></p> 
           
	  </div>
	  
	  
	  <div class="well" style="">
       	<?php
				$query=mysqli_query($conn,"SELECT * FROM `user_notification` where `user_id`='$userid';");
				$result=mysqli_fetch_array($query,MYSQLI_NUM);
				$count=mysqli_num_rows($query);
			if ($count>0)
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
<form class="form-inline" role="form" method="post" >
<button class="btn btn-sm btn-primary" name="bt2" id="bt2" style="float:right;">Clear All</button>
</form>

</br>
</br>
<?php

$query=	mysqli_query($conn,"SELECT * FROM `user_notice` WHERE `user_id`='$userid' ORDER BY `notice_id` desc;");

while($result=mysqli_fetch_array($query,MYSQLI_NUM))
{	
	$noticeid=$result[0];
	$notice=$result[2];
	//$time=$result[2];
	?>
	
		 <form class="form-inline" role="form" method="post" >
		</br>
		<div class="alert alert-info well" style="background:#7ec0ee;">
        <p><?php echo $notice;?></p>
		<input type="hidden" name="delid" value="<?php echo $noticeid;?>" style="width:100px;">
		<button class="btn btn-sm" name="bt1" id="bt1" style="float:right;">x</button>
		<!--<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>-->
		  </br>   
	 </div>
	 </form>
	  
<?php
}
?>


</div>
<div class="col-sm-2 well" >
 <!--     <div class="thumbnail" >
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
		<div class="col-sm-4 col-sm-offset-1"> <a href="./message_reply.php?id=<?php echo $online_user_id?>" style="text-transform:capitalize; text-decoration:none; color:#003399;"target="_blank"> <?php echo $online_user_name;?> </a>   </div>
       
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

</body>
</html>

<?php  
}
else
	echo  "<meta content=\"0;home.php\" http-equiv=\"refresh\">";
?>