<!DOCTYPE html>
<?php

include 'configuration.php'; 
//include './template/header.php';

?>
<?php
$userid=$_SESSION['uid'];
//$level=$_SESSION['level'];
//echo'<script>alert('.$userid.');</script>';

if (isset($userid))
{
	//echo'<script>alert("iahsuihaish");</script>';
	if (isset($_POST['bt2']))
  {
	   
		//$more=intval($_POST['more']);
		//$timer=intval($_POST['timer']);
		//$less=intval($_POST['less']);
		$cateid=intval($_POST['cid']);
	$query1=mysqli_query($conn,"SELECT * FROM `user_question` WHERE `uid`='$userid' and `cid`='$cateid';");
	//$fetch1=mysqli_fetch_assoc($query1);
	$query_sum=mysqli_num_rows($query1);
	//$level=$fetch1['level'];
	//$qid=$fetch1['qid'];
	//$score=$fetch1['score'];
	//$answer=$fetch1['answer'];
	//echo'<script>alert('.$cateid.');</script>';
	//if ($qid=='')
		if ($query_sum==0)
	mysqli_query($conn,"INSERT INTO `user_question`(`uid`,`qid`,`score`,`answer`,`cid`,`category_level`) VALUES ('$userid','0','0','','$cateid','1');");
//echo'<script>alert('.$cateid.');</script>';
//$are=mysqli_error($conn);
//echo'<script>alert('.$are.')</script>';
//	else
//	mysqli_query($conn,"INSERT INTO `user_question`(`uid`,`qid`,`score`,`answer`,`cid`,`level`) VALUES ('$userid','$qid','$score','$answer','$cateid','$level');");
		
	//$_SESSION['less']=$less;
		//$_SESSION['more']=$more;
		//$_SESSION['less']=$timer;
		$_SESSION['categoryid']=$cateid;
	  echo "<meta content=\"0;main_page1.php\" http-equiv=\"refresh\">";
	  
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
		 <li><a href="./notification.php"><big><span class="glyphicon glyphicon-globe"></big></span> <span class="badge"><?php echo $count;?></span></a></li>
	 <li><a href="./message.php"><span class="glyphicon glyphicon-envelope"></a></li>

		
	  </ul>
      <form class="navbar-form navbar-right" method="post" action="#">
        <div class="form-group input-group navbar-form navbar-right"  >
          <input type="text" name="divid" id="divid" class="form-control" placeholder="Search.." >
         
		<!--  <span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span> -->       
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
        <p><a href="#"><?php echo "Welcome ".$name;?></a></p>
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
  

<div class="col-sm-8">
    
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default text-left">
            <div class="panel-body">
           
			  <p><h3 style="color:#507AA6;"><u><b>The QUIZ PORTION IS STILL IN PROGRESS....TILL THEN ENJOY THE OVERLINING FEATURE OF THIS WEBSITE</b></u></h3></p>
			  </br>
			  </br>
			   <ul>
			   <li><p>YOU CAN SHARE YOUR FEELINGS IN NEWSFEED SECTION AND CAN ALSO LIKE AND COMMENT THERE.</p></li>
			   
			   <li><p>YOU CAN ADD YOUR PICS IN GALLERY SECTION.</p> </li>
			   <li><p>YOU CAN SHARE YOUR DOUBTS IN GROUP DISCUSSION. </p></li>
			   <li><p>YOU CAN SEE YOUR FRIENDS IN FRIEND LIST SECTION.</p></li>
			   <li><p>YOU CAN GIVE FEEDBACK AND TELL YOUR PROBLEM TO FEEDBACK SECTION AND YOUR PROBLEM WILL  BE SECRET TO US .</p></li>
			   <li><p>YOU CAN FILL YOUR DETAILS IN ABOUT SECTION.</p></li>
			   <li><p>YOU CAN UPLOAD YOUR PIC CHANGE YOUR ACCOUNT NAME AND PASSWORD IN ACCOUNTS SECTION.</p></li>
			   <li><p>YOU CAN SEE YOUR IMPORTANT NOTICES IN YOUR NOTICE SECTION.</p></li>
			    <li><p>YOU CAN SEARCH AND FIND YOUR FRIEND AND CAN SEND PERSONAL MESSAGE. </p></li>
				<li><p>YOU CAN SEND FRIEND REQUEST TO YOUR FRIEND  TO WHOM YOU HAVE SEARCHED. </p></li>
				<li><p>YOU CAN ALSO SEE WHO ARE ALL ONLINE IN THIS SITE AND CAN START A CHAT WITH THEM.</p></li>
				<li><p>YOU CAN ALSO SEE THERE TIMELINE AND THEN LIKE AND COMMENT ON THEM.</p></li>
				<li><p>YOU CAN FILL THEIR SLAMBOOK AND SEND THEM.</p></li>
				<li><p>YOU CAN SEE THEIR DETAILS IN THEIR ABOUT SECTION.</p></li>
				<li><p>YOU CAN SEE THEIR PICS IN THEIR GALLERY SECTION.</p></li>
				<li><p>YOU CAN SEE THEIR FRIENDS LIST. </p> </li>
				<li><p>YOU CAN SEE YOUR NOTIFICATION SECTION WHERE ANYONE LIKES,COMMENTS,FILLS YOUR SLAMBOOK,SENDS YOU FRIEND REQUEST IS DISPLAYED.</p></li>
				<li><p>YOU CAN READ YOUR SLAMBOOK FILLED BY OTHERS IN YOUR SUBMISSION HISTORY SECTION.</p></li>
				<li style="color:green"><p>LEADERBOARD WILL BE SOON UPDATED WHEN QUIZ PORTION WILL BE ACTIVE.</p></li>
			  </ul>
            </div>
          </div>
        </div>
      </div>
	  
	  <?php 
/*	  $userid=$_SESSION['uid'];
	  
	  $result=mysqli_query($conn,"SELECT * FROM `category` ORDER BY `cid`;");
	 while($row=mysqli_fetch_array($result,MYSQLI_NUM))
	 {
		// $_SESSION['cid']=$row[0];
		echo '<div class="row" name="bt3" id="bt3">
        <div class="col-sm-3" >
          <div class="well well-lg">
           <p><h4> '.$row[1] .'</h4></p>
           
          </div>
        </div>
        <div class="col-sm-9" >
          <div class="well well-lg" >
            <p style="color:red">
			If YOU HAVE KNOWLEDGE IN '.$row[1].' THEN SHOW YOUR SKILLS OVER HERE...
			</p>
			<form action="" method="post">
			<input type="hidden" name="cid" id="cid" value="'.$row[0].'">
			<button type="submit" name="bt2" class="btn btn-primary btn-lg" style="background-color:light green;margin-top:10px;">VIEW ALL</button>
			</form>
	</div>
        </div>
      </div>';
	  ?>
   <?php 
	 }
*/
	 ?>
  	  
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

</body>
</html>

<?php
}
else
	echo "<meta content=\"0;home.php\" http-equiv=\"refresh\">";
?>