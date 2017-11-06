<!DOCTYPE html>
<?php

include 'configuration.php'; 
//include './template/header.php';

?>


<?php
//$level=$_SESSION['level'];
//$c_id1=$_GET['c_id'];
//echo "<meta content=\"0;message_reply.php?id=".$view_userid."\" http-equiv=\"refresh\">";
//echo "<meta content=\"0;\" http-equiv=\"refresh\">";
if (isset($_SESSION['uid'])&&isset($_GET['id']))
{
	//
	$userid=$_SESSION['uid'];
//$level=$_SESSION['level'];
$view_userid=$_GET['id'];
//$query10=mysqli_query($conn,"SELECT * FROM `conversation` where (`user_one_id`='$userid' and `user_two_id`='$view_userid') or 
//(`user_one_id`='$view_userid' and `user_two_id`='$userid');");
$user_one_id=$userid;
$user_two_id=$view_userid;

/*
if (isset($_POST['send_message']))
{
$reply=test_input($_POST['reply']);
$c_id=intval($_POST['c_id']);
$sender_id=intval($_POST['sender_id']);
$reciever_id=intval($_POST['reciever_id']);
//$uid=test_input($db,$uid_session);
//$time=time();
//$ip=$_SERVER['REMOTE_ADDR'];
 mysqli_query($conn,"INSERT INTO `conversation_reply` (`reply`,`sender_id`,`reciever_id`,`c_id`) VALUES ('$reply','$sender_id','$reciever_id','$c_id');") ;
}*/	
?>
<html lang="en" ng-app="myApp">
<?php  
  //session_start();
  //$userid=$_SESSION['uid'];
  $query1=mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$userid';");
  $row1=mysqli_fetch_array($query1,MYSQLI_ASSOC);
  $name=$row1['username'];
  
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
function blank_post_check()
{
	var post_txt=document.posting_txt.send_.value;
	if (post_txt=="")
	{
		return false;
	}
return true;
}

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
        <img src="logo.png" alt="logo" id="" style="height:40px;width:80px;">
    </div><b><i>PAL-ZONE</i></b></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="main_page.php">Home</a></li>
         
		 <li><a href="leaderboard.php">Leaderboard</a></li>
		   	<?php
				$query=mysqli_query($conn,"SELECT * FROM `user_notification` WHERE `user_id`='$userid';");
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
	   <div id="here">
		  </div>
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
	  <?php
	  $query2=mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$view_userid';");
  $row2=mysqli_fetch_array($query2,MYSQLI_ASSOC);
  $name=$row2['username'];
	  ?>
        <p><a href="#"><?php echo $name;?></a></p>
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
	
	</div>
     
	   <div class="well" style="">
			<p><a href="./view_profile.php?id=<?php echo $view_userid;?>">Timeline</a></p>
	 
	  <p><a href="slampage.php?id=<?php echo $view_userid;?>"> Slam Book</a></p>
	    
		<p><a href="view_photos.php?id=<?php echo $view_userid;?>"> Gallery</a></p>
         <p><a href="view_about.php?id=<?php echo $view_userid;?>"> About</a></p>
		  <p><a href="view_friends.php?id=<?php echo $view_userid; ?>">Friends</a></p>
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
  

<div class="col-sm-8 hello" id="refresh">
<div class="well" style="overflow-y:scroll;height:600px;" id="hello">
<?php  
global $c_id1;
//$time=time();
//$ip=$_SERVER['REMOTE_ADDR'];
//while($fetch1=mysqli_fetch_assoc($q1))
//{
//$cid1=$fetch1['c_id'];
//$user_one_id=$fetch1['user_one_id'];
//$user_two_id=$fetch1['user_two_id'];
if($user_one_id!=$user_two_id)
{
$q= mysqli_query($conn,"SELECT `c_id` FROM `conversation` WHERE (`user_one_id`='$user_one_id' and `user_two_id`='$user_two_id') ; ");
//$time=time();
//$ip=$_SERVER['REMOTE_ADDR'];
$fetch10=mysqli_fetch_assoc($q);
$cid=$fetch10['c_id'];

if($cid===Null) 
{ 
$query5 = mysqli_query($conn,"INSERT INTO `conversation` (`user_one_id`,`user_two_id`) VALUES ('$user_one_id','$user_two_id');");
echo "<meta content=\"0;message_reply.php?id=".$view_userid."\" http-equiv=\"refresh\">";
//$query6=mysqli_query($conn,"SELECT `c_id` FROM `conversation` WHERE `user_one_id`='$user_one_id' ORDER BY `c_id` DESC limit 10;");
//$fetch6=mysqli_fetch_array($query6,MYSQLI_ASSOC);
// $fetch6['c_id'];
}
//else
//{
//$query6=mysqli_query($conn,"SELECT `c_id` FROM `conversation` WHERE `user_one_id`='$user_one_id' ORDER BY `c_id` DESC limit 10;");
//$fetch6=mysqli_fetch_array($query6,MYSQLI_ASSOC);
//$cid=$fetch6['c_id'];
//}
}
$q3= mysqli_query($conn,"SELECT `c_id` FROM `conversation` WHERE (`user_one_id`='$user_one_id' and `user_two_id`='$user_two_id') ; ");
//$time=time();
//$ip=$_SERVER['REMOTE_ADDR'];
$fetch3=mysqli_fetch_assoc($q3);
$c_id_1=$fetch10['c_id'];
  $query= mysqli_query($conn,"SELECT * FROM  `conversation_reply`  WHERE `c_id` in (SELECT `c_id` FROM `conversation` WHERE (`user_one_id`='$userid' and `user_two_id`='$view_userid') 
or (`user_one_id`='$view_userid' and `user_two_id`='$userid'))  ORDER BY `cr_id` asc;");
while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
$cr_id=$row['cr_id'];

$c_id1=$row['c_id'];
//$time=$row['time'];
$reply=$row['reply'];
//$query3=mysqli_query($conn,"SELECT * FROM `users` where `user_id`='$userid' or `user_id`='$view_userid';");
//$fetch3=mysqli_fetch_array($query3,MYSQLI_ASSOC);
$sender_id=$row['sender_id'];
$reciever_id=$row['reciever_id'];
$query3=mysqli_query($conn,"SELECT * FROM `users` where `user_id`='$sender_id';");
$fetch3=mysqli_fetch_array($query3,MYSQLI_ASSOC);

$username=$fetch3['username'];
//$email=$row['email'];
//HTML Output
$query_pic=mysqli_query($conn,"SELECT * FROM `user_profile_pic` where `user_id`='$sender_id';");
$fetch_pic=mysqli_fetch_array($query_pic,MYSQLI_NUM);
$user_pic=$fetch_pic[3];
if ($user_pic==null)
	$user_pic="./default.jpg";
echo' <div class="row">
    	<div class=" col-sm-offset-1 col-sm-1 " style="padding:5px;" > <img src="'.$user_pic.'" height="40" width="35">  </div>';
	

	echo '<div class="col-sm-4"> <a href="#" style="text-transform:capitalize; text-decoration:none; color:#003399;"> '.$username.' </a>   </div>';
	
		
    echo'</div>
	<div class="row">
	<div class="col-sm-offset-2 col-sm-10" style="word-wrap:break-word;">'.$reply.'</div>
	</div><hr>';
} 
//}
echo'<script>

</script>';
 ?> 
    </div>
	<div class=" well">
	<div class="">
	<form id="post_txt">
	
	<div class="row form-group">
		<textarea class="form-control" cols=115 rows=5 style="padding:5px; resize:none;" name="reply" required="required" maxlength="255" placeholder="GIVE YOUR REPLY"></textarea>
	</div>	
   
	
	<div class="row">
	
	
     <div class="col-sm-2 col-sm-offset-10 text-center">
		<input type="hidden" name="id" value="<?php echo $view_userid;?>">
	 <input type="hidden" name="c_id" value="<?php echo $c_id_1;?>">
	 <input type="hidden" name="sender_id" value="<?php echo $userid;?>">
	 <input type="hidden" name="reciever_id" value="<?php echo $view_userid;?>">
	 <button type="submit" class="btn btn-primary btn-sm" value="" name="" id="">SEND</button>
    </div>
		</div>
	</form>
	</div>
	</div>
	</div>
	
   <div class="col-sm-2 well" >
  <!--    <div class="thumbnail" >
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


<script>
$(document).ready(function(){
	//alert("s");
	update();
	//update_timeline();
	//var tempScrollTop = $("#refresh").scrollTop();
	$("#hello").animate({ scrollTop: $("#hello")[0].scrollHeight},"slow");
  return false;
	
	update_message();
	//update_newsfeed_comment();
	
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
	
function update_message() {
	//alert("here");
//	var position = element.scrollTop;
	//alert(position);
	//$("#hello")[0].scrollTop(tempScrollTop);
	
		
	if(document.activeElement.tagName!="TEXTAREA")
	{
		
	$.ajax({
	type:"post",
	url:"message_ajax.php",
	data:"c_id=<?php echo $c_id_1;?>&sender_id=<?php echo $userid;?>&reciever_id=<?php echo $view_userid;?>&id=<?php echo $view_userid;?>",
	success:function(data) {
	//	alert(data);
		
		//var count=data;
		var tempScrollTop = $("#hello").scrollTop();
		$("#refresh").html(data);
	$("#hello").scrollTop(tempScrollTop);

	//$("#hello").scrollTop(tempScrollTop);
	}
	});
		$(document).ready(function(){
	$("#hello").animate({ scrollTop: $("#hello")[0].scrollHeight},"slow");	
	});
	
   window.setTimeout(update_message,1000);

	}
}
</script>
<script>
	$("#refresh").on("submit","#post_txt",function(event){
event.preventDefault();	
	//alert("uhdhud");
	
	$.ajax({
		type:"post",
		url:"message_ajax.php",
		data:$(this).serialize(),
		success:function(data){
			$("#refresh").html("");
			$("#refresh").html(data);
			update_message();
			}
		
	});
});
	
	</script>
	</body>
</html>
<?php
}
else
	echo "1";
?>