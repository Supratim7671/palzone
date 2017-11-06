<!DOCTYPE html>
<?php

include 'configuration.php'; 
//include './template/header.php';

?>
<?php
$userid=$_SESSION['uid'];
$view_userid=$_GET['id'];
if (isset($userid)  )
{
	if ($view_userid!=$userid)
	{
	$query10=mysqli_query($conn,"SELECT * FROM `conversation` where (`user_one_id`='$userid' and `user_two_id`='$view_userid') or 
(`user_one_id`='$view_userid' and `user_two_id`='$userid');");
$fetch10=mysqli_fetch_assoc($query10);
$cid=$fetch10['c_id'];
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
/*	function time_get()
	{
		d = new Date();
		mon = d.getMonth()+1;
		time = d.getDate()+"-"+mon+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes();
		Reg.fb_join_time.value=time;
		return Reg.fb_join_time.value;
	}*/
function blank_post_check()
{
	var post_txt=document.posting_txt.post_txt.value;
	if (post_txt=="")
	{
		return false;
	}
return true;
}
function blank_comment_check()
{
	var comment_txt=document.commenting.comment_txt.value;
	if(comment_txt=="")
	{
		return false;
	}
	else
		return true;
	}
function chat_name_underLine(fid)
{
	document.getElementById("uname"+fid).style.textdDecoration="underline";
}
function chat_name_NounderLine(fid)
{
	document.getElementById("uname"+fid).style.Decoration="none";
}	
function time_get()
{
	d=new Date();
	mon=d.getMonth()+1;
	time=d.getDate()+"-"+mon+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes();
	posting_txt.txt_post_time=time;
	
	
}	
	function time_get1()
	{
		d=new Date();
		mon=d.getMonth()+1;
		time=d.getDate+"-"+mon+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes();
		posting_pic1.pic_post_time.value=time;
	
	}
	function Comment_focus(postid)
{
	document.getElementById(postid).focus();
}
function hide_photo_erorr()
{
	document.getElementById("photo_erorr").style.display='none';
	document.getElementById("body").style.overflow="visible";
}

function post_name_underLine(pid)
{
	document.getElementById("uname"+pid).style.textDecoration = "underline";
}
function post_name_NounderLine(pid)
{
	document.getElementById("uname"+pid).style.textDecoration = "none"
}

function like_underLine(pid)
{
	document.getElementById("like"+pid).style.textDecoration = "underline";
}
function like_NounderLine(pid)
{
	document.getElementById("like"+pid).style.textDecoration = "none"
}

function unlike_underLine(pid)
{
	document.getElementById("unlike"+pid).style.textDecoration = "underline";
}
function unlike_NounderLine(pid)
{
	document.getElementById("unlike"+pid).style.textDecoration = "none"
}

function Comment_underLine(pid)
{
	document.getElementById("comment"+pid).style.textDecoration = "underline";
}
function Comment_NounderLine(pid)
{
	document.getElementById("comment"+pid).style.textDecoration = "none"
}

function Comment_name_underLine(cid)
{
	document.getElementById("cuname"+cid).style.textDecoration = "underline";
}
function Comment_name_NounderLine(cid)
{
	document.getElementById("cuname"+cid).style.textDecoration = "none"
}
	
</script>
<?php 

	if(isset($_POST['delete_notice']))
	{
		$n_id=intval($_POST['notice_id']);
		mysqli_query($conn,"DELETE from `users_notice` where `notice_id`='$n_id';");
	}
	
		if (isset($_POST['txt']))
		{
			$txt=test_input($_POST['post_txt']);
			$priority=$_POST['priority'];
			$post_time=$_POST['txt_post_time'];
			mysqli_query($conn,"INSERT INTO `user_post`(`user_id`,`post_txt`,`post_time`,`priority`)VALUES('$userid','$txt','$post_time','$priority');");
			
		}	
			
		
if (isset($_POST['Like']))
{
	$post_id=intval($_POST['postid']);
	$user_id=intval($_POST['userid']);
	mysqli_query($conn,"INSERT INTO `user_post_status`(`post_id`,`user_id`,`status`) VALUES ('$post_id','$user_id','Like');");
        $query1=mysqli_query($conn,"SELECT * FROM `user_post` WHERE `post_id`='$post_id';");;
		$fetch1=mysqli_fetch_array($query1,MYSQLI_NUM);
		$userid=$fetch1[1];
		$query2=mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$user_id';");
		$fetch2=mysqli_fetch_array($query2,MYSQLI_NUM);
		$username=$fetch2[1];
		if ($userid!=$user_id)
		{
			$message=$username.' has liked  your post';
			mysqli_query($conn,"INSERT INTO `user_notification` (`user_id`,`notification`) VALUES ('$userid','$message');");
		}
}
if (isset($_POST['Unlike']))
{
	$post_id=intval($_POST['postid']);
	$user_id=intval($_POST['userid']);
	mysqli_query($conn,"DELETE from `user_post_status` WHERE `post_id`='$post_id' and `user_id`='$user_id';");
}

if (isset($_POST['comment']))
{
	$post_id=intval($_POST['postid']);
	$user_id=intval($_POST['userid']);
	$txt=test_input($_POST['comment_txt']);
	if ($txt!='')
	{
		mysqli_query($conn,"INSERT INTO `user_post_comment` (`post_id`,`user_id`,`comment`) VALUES ('$post_id','$user_id','$txt');");
                $query1=mysqli_query($conn,"SELECT * FROM `user_post` WHERE `post_id`='$post_id';");;
		$fetch1=mysqli_fetch_array($query1,MYSQLI_NUM);
		$userid=$fetch1[1];
		$query2=mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$user_id';");
		$fetch2=mysqli_fetch_array($query2,MYSQLI_NUM);
		$username=$fetch2[1];
		if ($userid!=$user_id)
		{
			$message=$username.' has commented on your post';
			mysqli_query($conn,"INSERT INTO `user_notification` (`user_id`,`notification`) VALUES ('$userid','$message');");
		}
	}
}
if (isset($_POST['delete_comment']))
{	//$postid=intval($_POST['post_id']);
	$comm_id=intval($_POST['comm_id']);
	//$userid=intval($_POST['userid']);
	mysqli_query ($conn,"DELETE FROM `user_post_comment` WHERE `comment_id`='$comm_id';");
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

		

echo'<div class="container-fluid">    
  <div class="row">
    <div class="col-sm-3 well" style="">
      <div class="well well-lg">';
	  
  //session_start();
  //$userid=$_SESSION['uid'];
  $query1=mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$view_userid';");
  $row1=mysqli_fetch_array($query1,MYSQLI_ASSOC);
  $view_name=$row1['username'];
  
        echo'<p><a href="#"><h4>'.$view_name.'</h4></a></p>';
        
	//$query=mysqli_query($conn,"SELECT * FROM `users` where `user_id`='$userid';");
	//$fetch=mysqli_fetch_array($query,MYSQLI_NUM);
	//$userid=$fetch[0];
		//$userid=intval($_POST['userid']);
		$query=mysqli_query($conn,"SELECT * from `user_profile_pic` WHERE `user_id`='$view_userid';");
		$result=mysqli_fetch_assoc($query);
		$image_path=$result['image_path'];
		if ($image_path==null)
			$image_path="default.jpg";
			$query100=mysqli_query($conn,"SELECT * FROM `friends` where (`friend_one_id`='$userid' and `friend_two_id`='$view_userid') or (`friend_one_id`='$view_userid' and `friend_two_id`='$userid');");
		if (mysqli_num_rows($query100)==0)
		echo '
	<form method="post">
	<input type="hidden" name="sender_id" value="'.$userid.'">
	<input type="hidden" name="reciever_id" value="'.$view_userid.'">
	<button type="submit" class="btn btn-primary btn-sm" style="float:right" name="add_friend">ADD FRIEND</button>
	</form>
	';
	echo'
		<img class="img-rounded" height="85" width="120"  src="'.$image_path.'" alt="D.P" />';

		echo'</br>
		</br>

	
	
	</div>
      <div class="well">
         
	 
	  <p><a href="slampage.php?id='.$view_userid.'"> Slam Book</a></p>
	  <p><a href="message_reply.php?id='.$view_userid.'">Message</a></p>
	    
		<p><a href="view_photos.php?id='.$view_userid.'"> Gallery</a></p>
         <p><a href="view_about.php?id='.$view_userid.'"> About</a></p>
		 <p><a href="view_friends.php?id='.$view_userid.'">Friends</a></p>
	  </div>
	  
	  
	  <div class="well">
        <p><a href="#">Topics </a></p>
        
		
      </div>';
    
	   $query100=mysqli_query($conn,"SELECT * FROM `user_notification` where `user_id`='$userid';");
	   if (mysqli_num_rows($query100)>0)
	   {
	  
     echo' <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <p><strong>Hey!</strong></p>
        There are many notification pending in your account.
      </div>';
	
	   }
	 
	echo'  <h4>These are the places where you can learn new things</h4>
      <p><a href="http://www.w3schools.com/" target="_blank">w3schools.com</a></p>
      <p><a href="http://www.tutorialspoint.com/" target="_blank">tutorialspoint.com</a></p>
      <p><a href="http://www.javatpoint.com/" target="_blank">javatpoint.com</a></p>
    </div>';

	
	
  
echo'
<div class="col-sm-9" id="refresh">
    
   
     
     <div class="well " style="overflow-y:scroll;height:1000px;overflow-x:hidden;" id="hello">
           <div class="well-col-sm-12">';
$sql2 = "SELECT * FROM `user_post` WHERE `user_id`='$view_userid'";
$sql2 .= "ORDER BY `post_id` desc  ";
//$query_post=mysqli_query($conn,"SELECT * FROM `user_post` WHERE `priority`='Public' ORDER BY `post_id`;");
$sql_query = mysqli_query($conn,$sql2);
	//$que_post=mysqli_query($conn,"SELECT * from `user_post` where `user_id`='$userid' order by `post_id` desc;");
	while($post_data=mysqli_fetch_array($sql_query,MYSQLI_NUM))
	{
		$postid=$post_data[0];
		$post_user_id=$post_data[1];
		$post_txt=$post_data[2];
		//$post_img=$post_data[3];
		$que_user_info=mysqli_query($conn,"SELECT * from `users` where `user_id`='$post_user_id';");
		$que_user_pic=mysqli_query($conn,"SELECT * from `user_profile_pic` where `user_id`='$post_user_id';");
		$fetch_user_info=mysqli_fetch_array($que_user_info,MYSQLI_NUM);
		$fetch_user_pic=mysqli_fetch_array($que_user_pic,MYSQLI_NUM);
		$user_name=$fetch_user_info[1];
		$user_Email=$fetch_user_info[2];
		$user_gender=$fetch_user_info[4];
		$user_pic=$fetch_user_pic[3];
		if ($user_pic==null)
			$user_pic="default.jpg";
	
		
	
 	echo'
 	<div class="row">
		<div class="col-sm-1"> <img src="'.$user_pic.'" height="50" width="45">  </div>
		
		<div class="col-sm-4"> 
	<a href="./view_profile.php?id='.$post_user_id.'" style="text-transform:capitalize; text-decoration:none;" onMouseOver="post_name_underLine('.$postid.')" onMouseOut="post_name_NounderLine('.$postid.')" id="uname'.$postid.'"> '.$user_name.' </a>  
	</div>
		
	</div>';

	//$len=strlen($post_data[2]);
	//if($len>0 && $len<=73)
	//{
		//$line1=substr($post_data[2],0,73);
	echo'
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-10" style="word-wrap:break-word;">'.$post_data[2].' </div>
	</div>';
	
	
	
	
	
	echo'<div class="row" style="padding-top:10px;">';
		$userid1=$_SESSION['uid'];
		 	$que_status=mysqli_query($conn,"SELECT * from `user_post_status` where `post_id`='$postid' and `user_id`='$userid1';");
			$que_like=mysqli_query($conn,"SELECT * from `user_post_status` where `post_id`='$postid';");
			$count_like=mysqli_num_rows($que_like);
			$status_data=mysqli_fetch_array($que_status,MYSQLI_NUM);
			if($status_data[3]=="Like")
			{
			
			echo'<div class="col-sm-1 col-sm-offset-1">
		
		<form class="form-inline" role="form" id="'.$postid.'form" method="post">
  <div class="form-group has-success has-feedback" style="width:100px;">
    <label class="control-label" for="inputSuccess4"></label>
	
	<input type="hidden" name="postid" value="'.$postid.'" style="width:100px;">
    <input type="hidden" name="userid" value="'.$_SESSION['uid'].'" style="width:100px;">
	 
	<button type="submit" name="Unlike" id="'.$postid.'like" class="btn btn-default btn-sm like-btn"  >
	<span class="glyphicon glyphicon-thumbs-down"></span>Unlike<input type="hidden" name="flaglike" value="1"></button>
	</div>
    
  </form>
</div>';
			
			}
			else
			{
		echo'	<div class="col-sm-1 col-sm-offset-1">
		
	<form class="form-inline" role="form" id="'.$postid.'form" method="post">
  <div class="form-group has-success has-feedback" style="width:100px;">
    <label class="control-label" for="inputSuccess4"></label>
	
	<input type="hidden" name="postid" value="'.$postid.'" style="width:100px;">
    <input type="hidden" name="userid" value="'.$_SESSION['uid'].'" style="width:100px;">
	 
	<button type="submit" name="Like" id="'.$postid.'like" class="btn btn-default btn-sm like-btn"  >
	<span class="glyphicon glyphicon-thumbs-up"></span>Like<input type="hidden" name="flaglike" value="2"></button>
	</div>
    
  </form>
		</div>';
			
			}
		 
		
		 
		 	$que_comment=mysqli_query($conn,"SELECT * from `user_post_comment` where `post_id` ='$postid' order by `comment_id`;");
	$count_comment=mysqli_num_rows($que_comment);
		 
		echo'
		<div class="col-sm-1 col-sm-offset-1"><input type="button" value="Comment('.$count_comment.')" style="background:#FFFFFF; line-height:2;border:#FFFFFF;font-size:15px; color:#6D84C4;" onClick="Comment_focus('.$postid.');" onMouseOver="Comment_underLine('.$postid.')" onMouseOut="Comment_NounderLine('.$postid.')" id="comment'.$postid.'"><span style="color:#999999;">   </span> 
		</div>
		
	</div>
	<div class="row">
		
		<div class="col-sm-2 col-sm-offset-1" style="padding-top:5px;"><span class="glyphicon glyphicon-thumbs-up"  id="'.$postid.'likes"> '.$count_like.'</span> like this. </div>
		
	</div>
	';
echo'<div id="'.$postid.'refresh2">';
	while($comment_data=mysqli_fetch_array($que_comment,MYSQLI_NUM))
	{
		$comment_id=$comment_data[0];
		$comment_user_id=$comment_data[2];
		$que_user_info1=mysqli_query($conn,"SELECT * from `users` where `user_id`='$comment_user_id';");
		$que_user_pic1=mysqli_query($conn,"SELECT * from `user_profile_pic` where `user_id`='$comment_user_id';");
		$fetch_user_info1=mysqli_fetch_array($que_user_info1,MYSQLI_NUM);
		$fetch_user_pic1=mysqli_fetch_array($que_user_pic1,MYSQLI_NUM);
		$user_name1=$fetch_user_info1[1];
		$user_Email1=$fetch_user_info1[2];
		$user_gender1=$fetch_user_info1[4];
		$user_pic1=$fetch_user_pic1[3];
		if ($user_pic1==null)
			$user_pic1="default.jpg";
echo'
	<div class="row">
		
		<div class="col-sm-1 col-sm-offset-1" style="padding-top:5px;">  <img src="'.$user_pic1.'" height="40" width="47">    </div>
		<div class="col-sm-8 col-sm-offset-1" ><div class="row"> <a href="./view_profile.php?id='.$comment_user_id.'" style="text-transform:capitalize; text-decoration:none; color:#3B5998;" onMouseOver="Comment_name_underLine('.$comment_id.')" onMouseOut="Comment_name_NounderLine('.$comment_id.')" id="cuname'.$comment_id.'"> '.$user_name1.'</a> 
		</div><div class="row">
		
		<div class="col-sm-12" style="word-wrap:break-word;"> '.$comment_data[3].'</div>
	</div></div>';
	
		
		 if($_SESSION['uid']==$comment_user_id)
		{ 
		echo '<div class="col-sm-1 ">
			 
		<form class="form-inline delete_comment" role="form" method="post" id="'.$comment_id.'delete">
  <div class="form-group has-success has-feedback" style="width:100px;">
    <label class="control-label" for="inputSuccess4"></label>
	<input type="hidden" name="post_id" value="'.$postid.'">
	<input type="hidden" name="comm_id" value="'.$comment_id.'" style="width:100px;">
	<button type="submit" class="btn btn-default btn-sm " name="delete_comment" id="delete_comment">
 <span class="glyphicon glyphicon-trash"></span>
  </button>
  </div>
</form>	
			
			</div>';
		
		}
		else
		{
		echo	'';
		
		}
	
		
echo'</div>';
	
	//$clen=strlen($comment_data[3]);
	//if($clen>0 && $clen<=60)
	//{
		//$cline1=substr($comment_data[3],0,60);
	
	echo'';
	
	//}
	}
	echo'</div>
	<div class="row">
	
	<div class="col-sm-2" >  <img src="" style="height:33; width:33;">    </div>
		<div class="col-sm-10"> 
		 
			<form class="form-inline commenting" role="form" method="post" id="'.$postid.'commenting">
  <div class="form-group" style="width:100%;">
    <label class="control-label" for="inputSuccess4"></label>
	<input name="comment_txt" style="width:100%;" class="form-control" placeholder="Write a comment..." maxlength="511" style="" id="'.$postid.'text" required="required"></textarea>
	<input type="hidden" name="postid" value="'.$postid.'" >
    <input type="hidden" name="userid" value="'.$_SESSION['uid'].'">
	<input type="submit" name="comment" value="" class="form-control" id="inputSuccess4" style="display:none;" >
  </div>
</form>
		</br>
		</br>
		</br>
		
		</div>
	</div>';
echo'<hr style="border-width:5px">';
 
} 
echo'
<script>  
$(document).ready(function(){
	
	//update_view_profile();
	update();
	//update_view_profile_comment();
	
	});
function update() {
//	var position = element.scrollTop;
	//alert(position);
    $.get("response_ajax.php", function(data) {
	//	alert(data);
		
		var count=data;
       $("#refresh2").html("<a href=\"./notification.php\"><big><span class=\"glyphicon glyphicon-globe\"> </big></span><span class=\"badge\">"+count+"</span></a>");
    });
    window.setTimeout(update,1000);

	}
/*function update_view_profile()
{
	
	

	//alert(tempScrollTop);
	//var position = element.scrollTop;
//	alert("position");
	//alert(document.activeElement.tagName);
	if(document.activeElement.tagName!="INPUT" && document.activeElement.tagName!="TEXTAREA")
	{
	$.get("view_profile_ajax.php",function(data){
		//alert(data);
			var tempScrollTop = $("#hello").scrollTop();
		$("#refresh").html(data);
	$("#hello").scrollTop(tempScrollTop);
		
		
	});
	
	//element.scrollTop=position;
	}
	window.setTimeout(update_view_profile,1000);
	
}
function update_view_profile_comment()
{
	
	var tempScrollTop = $(window).scrollTop();
	

	if(document.activeElement.tagName!="INPUT" && document.activeElement.tagName!="TEXTAREA")
	{
		$.get("view_profile_comment_ajax.php",function(data){
			var pid=document.getElementById(id).elements["post_id"].value;
			$("#"+pid+"refresh2").html(data);
		});
		
	}
	
$(window).scrollTop(tempScrollTop);
	
	window.setTimeout(update_view_profile_comment,1000);
	
}
*/
$("#refresh").on("click",".like-btn",function(event){
	event.preventDefault();
	
	var id = $(this).attr("id");
	//alert($("#"+id.substring(0, id.length - 4)+"form").serialize());
	$.ajax({
		type:"post",
		url:"view_profile_ajax.php",
		data:$("#"+id.substring(0, id.length - 4)+"form").serialize(),
	//alert(data);
		success:function(data){
			//alert(data);
	if(data.charAt(data.length-1)=="l")
	{			$("#"+id).html("<span class=\"glyphicon glyphicon-thumbs-down\"></span>Unlike <input type=\"hidden\" name=\"flaglike\" value=\"1\">");
				var likes=data.substring(0,data.length-1);
				//alert(likes);
				//alert("#"+id+"s");
				$("#"+id+"s").html("");
				$("#"+id+"s").html(likes);
				//$("#refresh2").html();
	}
	else if(data.charAt(data.length-1)=="u") 
		{
				$("#"+id).html("<span class=\"glyphicon glyphicon-thumbs-up\"></span>Like<input type=\"hidden\" name=\"flaglike\" value=\"2\">");
				//$("#refresh2").html();
				var likes=data.substring(0,data.length-1);
				//alert(likes);
				//alert("#"+id+"s");
				$("#"+id+"s").html("");
				$("#"+id+"s").html(likes);
		}
	//	update_view_profile();
			}	
	});
});
</script>';
echo'<script>
	
$(document).on("submit",".delete_comment",function(event){
	//alert("here");
	event.preventDefault();
	var id=$(this).attr("id");
	//alert(id);
	var pid=document.getElementById(id).elements["post_id"].value;
	$.ajax({
		type:"post",
		url:"view_profile_comment_ajax.php",
		data:$(this).serialize(),
		success:function(data){
			var c = data.substring(0,data.indexOf("%"));
			//alert(data.substring(data.indexOf("%")+1,data.length));
			$("#"+pid+"refresh2").html(data.substring(data.indexOf("%")+1,data.length));
		$("#"+pid+"counting").html(\'<input type="button" value="Comment(\'+c+\')" style="background:#FFFFFF; line-height:2;border:#FFFFFF;font-size:15px; color:#6D84C4;" onClick="Comment_focus(\'+pid+\');" onMouseOver="Comment_underLine(\'+pid+\')" onMouseOut="Comment_NounderLine(\'+pid+\')"><span style=\"color:#999999;\"> </span>\' );
		$(window).scrollTop(tempScrollTop);
		//update_view_profile();	
		//update_view_profile_comment();
		//$(window).scrollTop(tempScrollTop);
		}
	//		element.scrollTop=position;
	});
});
</script>';
 echo' <script>
	$(document).on("submit",".commenting",function(event){
	event.preventDefault();
	var id=$(this).attr("id");
var pid=document.getElementById(id).elements["postid"].value;
	
	//alert($(this).serialize());
	$.ajax({
		type:"post",
		url:"view_profile_comment_ajax.php",
		data:$(this).serialize(),
		success:function(data){
			//alert(data);
			var c = data.substring(0,data.indexOf("%"));
			$("#"+id.substring(0,id.length-10)+"refresh").html(data);
			$("#"+pid+"refresh2").html(data.substring(data.indexOf("%")+1,data.length));
		$("#"+pid+"counting").html(\'<input type="button" value="Comment(\'+c+\')" style="background:#FFFFFF; line-height:2;border:#FFFFFF;font-size:15px; color:#6D84C4;" onClick="Comment_focus(\'+pid+\');" onMouseOver="Comment_underLine(\'+pid+\')" onMouseOut="Comment_NounderLine(\'+pid+\')"><span style=\"color:#999999;\"> </span>\' );
			//alert("#"+pid+"text");
			$("#"+pid+"text").val("");
			//update_view_profile();
			//update_view_profile_comment();
			//$("#refresh").html(data);
			}
		
	});
});
	</script>';
	echo'</div>
    </div>
	</div>
	</div>
   </div>';

  ?> 
 
<?php
}
else
{
	echo "<meta content=\"0;timeline.php\" http-equiv=\"refresh\">";
}

?>
   
<footer class="container-fluid text-center">
  <div>

  <p style="text-align:left">&copy;&nbsp;ALL RIGHTS RESERVED</p>
  </div>
</footer>		
		
<?php
}
else
{
	echo "<meta content=\"0;home.php\" http-equiv=\"refresh\">";
}
?>	


			