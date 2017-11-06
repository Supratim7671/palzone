<?php
include "configuration.php";
//include "./template/header.php";
?>
<link rel="stylesheet" href="formoid1_files/formoid1/formoid-solid-light-green.css" type="text/css" />
<script type="text/javascript" src="formoid1_files/formoid1/jquery.min.js"></script>
<?php
$userid=$_SESSION['uid'];
//$no_of_rows=-1;
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
		<li id="refresh2"><a href="./notification.php"><big><span class="glyphicon glyphicon-globe"></big></span> <span class="badge"></span></a></li>
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
			$image_path="default.jpg";
		
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
<?php 

?>

<?php 

?>

<div class="col-sm-8"  style="">
<div class="well">
<center><p ><h3 style="color:blue"><b>CONVERSATIONS</b></h3></p></center>
</div>
<div class="well" style="overflow-y:scroll;height:1000px;">
     <?php
/*$query4= mysqli_query($conn,"SELECT u.user_id,c.c_id,u.username
 FROM conversation c, users u
 WHERE CASE 
 WHEN c.user_one_id = '$userid'
 THEN c.user_two_id = u.user_id
 WHEN u.user_two_id = '$userid'
 THEN c.user_one_id= u.user_id
 END 
 AND (
 c.user_one_id ='$userid'
 OR c.user_two_id ='$userid'
 )
 ORDER BY c.c_id DESC Limit 20;");
*/
$query5=mysqli_query($conn,"SELECT * FROM `conversation` WHERE `user_one_id`='$userid' or `user_two_id`='$userid';");
while($fetch5=mysqli_fetch_assoc($query5))
{
	$c_id=$fetch5['c_id'];
	$user_one_id=$fetch5['user_one_id'];
	$user_two_id=$fetch5['user_two_id'];
	$query6=mysqli_query($conn,"SELECT * FROM `conversation_reply` WHERE `c_id`='$c_id';");
	$fetch6=mysqli_fetch_assoc($query6);
	$sender_id=$fetch6['sender_id'];
	$reciever_id=$fetch6['reciever_id'];
	if ($sender_id!=$userid)
	{$query7=mysqli_query($conn,"SELECT * FROM `conversation_reply` where `c_id`='$c_id' and (`sender_id`='$sender_id' or `reciever_id`='$reciever_id') ORDER BY `cr_id` desc limit 1;");
		$fetch7=mysqli_fetch_assoc($query7);
		$reply=$fetch7['reply'];
		$query8=mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$sender_id';");
		$fetch8=mysqli_fetch_assoc($query8);
		$username=$fetch8['username'];
//$time=$crow['time'];
//HTML Output. 

$query2=mysqli_query($conn,"SELECT * FROM `user_profile_pic` WHERE `user_id`='$sender_id';");
$fetch2=mysqli_fetch_array($query2,MYSQLI_NUM);
$user_pic=$fetch2[3];
if($user_pic==null)
	$user_pic="default.jpg";
if ($reply!=null)
echo' <div class="row">
    	<div class="col-sm-1 col-sm-offset-1" style="padding:5px;" > <img src="'.$user_pic.'" height="40" width="35">  </div>
		
	   <div class="col-sm-4"> <a href="./message_reply.php?id='.$sender_id.'" style="text-transform:capitalize; text-decoration:none; color:#003399;"> '.$username.' </a>   </div>
       
    </div>
	<div class="row">
	<div class="col-sm-offset-2 col-sm-10" style="word-wrap:break-word;">'.$reply.'</div>
	</div><hr>';

}
}

?>
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
      <div class="well"  style="overflow-y:scroll;height:400px;">
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
		<div class="col-sm-4 col-sm-offset-1"> <a href="" style="text-transform:capitalize; text-decoration:none; color:#003399;" target="_blank"> <?php echo $online_user_name;?> </a>   </div>
       
    </div>
<?php
}
?>   
   </div>
	</div>
  </div>
</div>
<?php
include "./template/footer.php";
?>
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
<?php
}
else
	echo "<meta content=\"0;home.php\" http-equiv=\"refresh\">";
?>