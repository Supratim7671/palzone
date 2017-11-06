<?php
include "configuration.php";
?>
<?php
if (isset($_SESSION['admin']))
{
?>
<html lang="en" ng-app="myApp">
<?php  
  //session_start();
  
 // $query1=mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$userid';");
  //$row1=mysqli_fetch_array($query1,MYSQLI_ASSOC);
  //$name=$row1['username'];

  ?>
  
<head>
  
  
  <title>PAL-ZONE ADMIN PANEL</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  

  
  <script src="./app.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0-beta.1/angular-cookies.min.js"></script>   
	
	
  <style>    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #2E8B57;
      color: white;
      padding: 15px;
    position:fixed-bottom
    }
  </style>
  
</head>

<body style="position:relative" data-spy="scroll" data-target=".navbar-fixed-top" >

<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#006600;">
  <div class="container-fluid">
    <div class="navbar-header" >
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"> <div style="float: left;">
        <img src="logo.png" alt="logo" id="" style="height:40px;width:80px;">
    </div><b><i>PAL-ZONE</i></b></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="admin_main_page.php">Home</a></li>
         	<?php
	$query=mysqli_query($conn,"SELECT * FROM `admin_notification`;");
	$result=mysqli_fetch_array($query,MYSQLI_NUM);
	$count=mysqli_num_rows($query);
?>
		 <li><a href="adminleaderboard.php">LEADERBOARD</a></li>
		 <li><a href="admin_notification.php">Notification<span class="badge"><?php echo $count;?></span></a></li>

	<li class=""><a href="quizportal.php">QUIZ PORTAL</a></li>
	  </ul>
      <form class="navbar-form navbar-right" role="search" method="get" action="https://www.google.com/search" target="_blank">
        <div class="form-group input-group"  >
          <input type="text" class="form-control" placeholder="Search.." name="q">
          <!--<span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span> -->       
        </div>
      </form>
	  <!-- <div class="col-sm-2"  style="float:right; " ng-repeat="res in result" ng-show="showstartcard" >
        <div >
            <p>{{res.username}}</p>
            <p>{{res.email}}</p>
            <p><a href=""><cite></cite></a></p>
        </div>>
            
                
    </div>--->
      <ul class="nav navbar-nav navbar-right">
       
  <?php
  $userid=$_SESSION['admin'];
   $query=mysqli_query($conn,"SELECT * FROM `users` where `user_id`='$userid';");
   $result=mysqli_fetch_array($query,MYSQLI_NUM);
   $name=$result[1];
  ?>
  
		<li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo $name;?></a></li>
		
		<li class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-wrench"></span>Settings
		<span class="caret"></span>
		</a>
		<ul class="dropdown-menu">
          <li><a href="admin_accountsettings.php">Account Settings</a></li>
          <li><a href="admin_feedback.php">Feedback</a></li>
        <li><a href="admin_logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
		</ul>
		</li>
		
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
    <div class="col-sm-3 well" >
      <div class="well well-lg">
        <p><a href="#"><?php echo "<h5>Welcome Admin</h5>";?></a></p>
         <?php
	//$query=mysqli_query($conn,"SELECT * FROM `users` where `user_id`='$userid';");
	//$fetch=mysqli_fetch_array($query,MYSQLI_NUM);
	//$userid=$fetch[0];
		//$userid=intval($_POST['userid']);
		$query=mysqli_query($conn,"SELECT * from `user_profile_pic` WHERE `user_id`='$userid';");
		$result=mysqli_fetch_assoc($query);
		$image_path=$result['image_path'];
	?>
		<img class="img-circle" height="140" width="140"  src="<?php echo $image_path?>" alt="D.P" />
		
		</br>
		</br>
<!--<input type="file" id="img" name="img" style="background-color:blue;float:right;" placeholder="Upload Your image">-->
	
	</div>
      <div class="well" style="">
	  <p><a href="admin_main_page.php"> All Public Post</a></p>
	  <p><a href="admin_group_chat.php"> Group Discussions</a></p>
	  <p><a href="notice.php">Notice</a></p>
	  <p><a href="allusers.php">USERS</a></p>
	  <p><a href="#"></a></p>
	  </div>
	  
	  
	  
</div>
<?php
	//session_start();
	
	//$conn=mysqli_connect("localhost","root","","faceback");
		//mysql_select_db("faceback");
		
		if(isset($_POST['notice_users']))
		{
			$notice_txt=$_POST['notice_txt'];
			$notice_time=$_POST['notice_time'];
			$user_id=$_POST['user_id'];
			$que_users=mysqli_query($conn,"SELECT * from `users` ;");
			if($users_data=mysqli_fetch_array($que_users,MYSQLI_NUM))
			{
				//$user_id=$users_data[0];
				mysqli_query($conn,"insert into user_notice(user_id,notice_txt,notice_time) values('$user_id','$notice_txt','$notice_time');");
				$message="A NOTICE HAS BEEN SENT TO YOU PLEASE VISIT THE NOTICE SECTION";
                                mysqli_query($conn,"INSERT INTO `user_notification`(`user_id`,`notification`)VALUES ('$user_id','$message');");
			}
		}
		
		

?>


<script>
	function time_get()
	{
		d = new Date();
		mon = d.getMonth()+1;
		time = d.getDate()+"-"+mon+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes();
		notice_form.notice_time.value=time;
	}
</script>




<!--notice-->
<script>
	function open_notice_form()
	{
		document.getElementById("notice_form").style.display='block';
	}
	function close_notice_form()
	{
		document.getElementById("notice_form").style.display='none';
	}
</script>
<style>
#notice_button
{
	font-size:18px;
	height:50;
	width:100;
	padding:2;
	background-color:#5B74A8; 
	color:#FFFFFF;
	border-top:#29447E;
	border-right-color:#29447E;
	border-bottom-color:#1A356E;
	border-left-color:#29447E;
	font-weight:bold;
	box-shadow:0px 0px 10px 1px rgb(0,0,0);
}
</style>



<!--notice -->
<div class="col-sm-7" >
<div style="position:absolute; left:37%; top:10%;"> <img src="images/Notice.png" height="80" width="80"></div>
<div style="position:absolute; left:48%; top:10%;  color:#3B59A4; font-size:60px;">   Notice  </div>
<div style="position:absolute;top:80px;">
<hr style="position:absolute;height:0.5%;width:760px; border-color:#CCCCCC; box-shadow:0px 5px 5px 0px rgb(0,0,0); ">
</div>
<div style="position:absolute; left:30%; top:120px; ">
    <img src="images/users.png" height="100" width="100">
</div>
<div style="position:absolute; left:45%; top:140px;  text-transform:capitalize; font-size:42; color:green;"> All Users </div>
<form method="post" name="notice_form">
<div style="position:absolute; left:2%; top:240px; "> 
	<input type="text" style="height:30; width:760px; font-size:20px; color:#3B59A4;" name="user_id" maxlength="30" placeholder="ENTER THE USERID TO SEND NOTICE">
</div>
<div style="position:absolute; left:2%; top:300px; "> 
	<input type="text" style="height:50; width:760px; font-size:20px; color:#3B59A4;" name="notice_txt" maxlength="90" placeholder="Write a notice..">
</div>
<input type="hidden" name="notice_time">
<div style="position:absolute; left:86%; top:357px; ">  
    <input type="submit" name="notice_users" value="Notice" id="notice_button" onClick="time_get()">
</div> 
</form>

<div style="position:absolute; left:90%; top:100%;" > &nbsp; </div>	
</div>

<div class="col-sm-2 well" >
      <div class="thumbnail" >
        <p>Upcoming Events:</p>
        <img src="paris.jpg" alt="Paris" width="400" height="300">
        <p><strong>CODE-VITA</strong></p>
        <p>Fri. 27 November 2015</p>
        <button class="btn btn-primary">Info</button>
      </div>      
      <div class="well" >
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
    	<div class="col-sm-1 col-sm-offset-1" style="padding:5px;" > <img src="<?php echo $user_pic;?>" height="40" width="35">  </div>
        <div class="col-sm-4 col-sm-offset-1"> <a href="#" style="text-transform:capitalize; text-decoration:none; color:#003399;"> <?php echo $online_user_name;?> </a>   </div>
       
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
	{
		echo "<meta content=\"0;index.php\" http-equiv=\"refresh\">";
	}
?>