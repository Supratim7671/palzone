<?php
include"configuration.php";
?>

<?php
$uid=$_SESSION['uid'];
mysqli_query($conn,"INSERT INTO `user_info` (`user_id`, `job`, `school`, `current_city`, `hometown`, `relationship_status`, `mobile_no`, `college`, `country`, `gender`, `mail`, `facebookid`, `birthday`) VALUES ('$uid', '', '', '', '', '', '', '', '', '', '', '', '');");
	if (isset($uid))
	{
		//$query1=mysqli_query($conn,"SELECT * from `users` where `user_id`='$uid';");
		//$rec1=mysqli_fetch_array($query1,MYSQLI_NUM);
		//$userid=$rec1[0];
		
		
	if (isset($_POST['add_school']))
	{
		$school=test_input($_POST['school']);
		mysqli_query($conn,"UPDATE `user_info` SET `school`='$school' where `user_id`='$uid';");
	}
	if (isset($_POST['add_college']))
	{
		$college=test_input($_POST['college']);
		mysqli_query($conn,"UPDATE `user_info` SET `college`='$college' where `user_id`='$uid';");
	}
	if (isset($_POST['add_job']))
	{
		$job=test_input($_POST['job']);
		mysqli_query($conn,"UPDATE `user_info` SET `job`='$job' where `user_id`='$uid';");
	}
	if (isset($_POST['add_city']))
	{
		$city=test_input($_POST['city']);
		mysqli_query($conn,"UPDATE `user_info` SET `current_city`='$city' where `user_id`='$uid';");
	}
	if (isset($_POST['add_hometown']))
	{
		$hometown=test_input($_POST['hometown']);
		mysqli_query($conn,"UPDATE `user_info` SET `hometown`='$hometown' where `user_id`='$uid';");
	}
if (isset($_POST['add_country']))
	{
		$country=test_input($_POST['country']);
		mysqli_query($conn,"UPDATE `user_info` SET `country`='$country' where `user_id`='$uid';");
	}
	if (isset($_POST['add_mobile']))
	{
		$mobile=test_input($_POST['mobile']);
		mysqli_query($conn,"UPDATE `user_info` SET `mobile_no`='$mobile' where `user_id`='$uid';");
	}
	if (isset($_POST['add_gender']))
	{
		$gender=($_POST['gender']);
		mysqli_query($conn,"UPDATE `user_info` SET `gender`='$gender' where `user_id`='$uid';");
	}
	if (isset($_POST['change_relationship']))
	{
		$relationship=$_POST['relationship'];
		
	if ((strcasecmp($relationship,"single")==0)||(strcasecmp($relationship,"married")==0)||(strcasecmp($relationship,"seperated")==0)||(strcasecmp($relationship,"complicated")==0)||(strcasecmp($relationship,"divorced")==0)||(strcasecmp($relationship,"open relationship")==0))
		
		mysqli_query($conn,"UPDATE `user_info` SET `relationship_status`='$relationship' where `user_id`='$uid';");
		//else
		//echo '<script>alert( "BE CAREFUL...DONT TRY TO HACK");</script>';
	}
	if (isset($_POST['add_dob']))
	{
		$dob=$_POST['dob'];
		mysqli_query($conn,"UPDATE `user_info` SET `birthday`='$dob' where `user_id`='$uid';");
	}
	if (isset($_POST['add_mail']))
	{
		$mail=test_input($_POST['mail']);
		mysqli_query($conn,"UPDATE `user_info` SET `mail`='$mail' where `user_id`='$uid';");
	}
	if (isset($_POST['add_facebookid']))
	{
		$facebookid=test_input($_POST['facebookid']);
		mysqli_query($conn,"UPDATE `user_info` SET `facebookid`='$facebookid' where `user_id`='$uid';");
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
<p style="color:red;"><h2 style="color:red;"><center>ABOUT</center><h2></p>
</div>

<div class="row well" style=" margin:0px;">
<div class="col-sm-6 ">
<p><h4 style="color:green">WORK AND EDUCATION</h4></p>

<div class="well">
<h5 style="color:red">ADD YOUR LAST SCHOOL YOU VISITED</h5>
<button type="button" class="btn btn-default btn-md" style="background:lightgreen;" data-toggle="modal"  data-target="#school">
          <span class="glyphicon glyphicon-education"></span>
        </button>
</div>
<div class="well">
<h5 style="color:red">ADD YOUR CURRENT COLLEGE</h5>
 <button type="button" class="btn btn-default btn-md" style="background:skyblue;" data-toggle="modal"  data-target="#college">
          <span class="glyphicon glyphicon-education"></span>
        </button>
</div>
<div class="well">
<h5 style="color:red">ADD YOUR JOB</h5>
 <button type="button" class="btn btn-default btn-md" style="background:violet;" data-toggle="modal"  data-target="#job">
          <span class="glyphicon glyphicon-briefcase"></span>
        </button>
</div>


</div>
<div class="col-sm-6">
<p><h4 style="color:green">LIVING</h4></p>
<div class="well">
<h5 style="color:red">ADD YOUR CURRENT CITY</h5>
 <button type="button" class="btn btn-default btn-md" style="background:magenta;" data-toggle="modal"  data-target="#city">
          <span class="glyphicon glyphicon-map-marker"></span>
        </button>
</div>
<div class="well">
<h5 style="color:red">ADD YOUR CURRENT HOMETOWN</h5>
 <button type="button" class="btn btn-default btn-md" style="background:orange;" data-toggle="modal"  data-target="#hometown">
          <span class="glyphicon glyphicon-home"></span>
        </button>
</div>
<div class="well">
<h5 style="color:red">ADD YOUR COUNTRY</h5>
 <button type="button" class="btn btn-default btn-md" style="background:cyan;" data-toggle="modal"  data-target="#country">
          <span class="glyphicon glyphicon-map-marker"></span>
        </button>
</div>
</div>
</div>


<div class="row well" style="margin-top:10px;margin-bottom:10px;margin-left:0px;margin-right:0px;">
<div class="col-sm-6">
<p><h4 style="color:green">BASIC INFORMATION</h4></p>

<div class="well">
<h5 style="color:red">BIRTHDAY</h5>
<button type="button" class="btn btn-default btn-md" style="background:yellow;" data-toggle="modal"  data-target="#birthday">
          <span class="glyphicon glyphicon-pencil"></span>
        </button>
</div>
<div class="well">
<h5 style="color:red">GENDER</h5>
 <button type="button" class="btn btn-default btn-md" style="background:grey;" data-toggle="modal"  data-target="#gender">
          <span class="glyphicon glyphicon-user"></span>
        </button>
</div>
<div class="well">
<h5 style="color:red">RELATIONSHIP</h5>
 <button type="button" class="btn btn-default btn-md" style="background:green;" data-toggle="modal"  data-target="#relationship">
          <span class="glyphicon glyphicon-pencil"></span>
        </button>
</div>


</div>
<div class="col-sm-6">
<p><h4 style="color:green">CONTACT INFORMATION</h4></p>
<div class="well">
<h5 style="color:red">MOBILE</h5>
 <button type="button" class="btn btn-default btn-md" style="" data-toggle="modal"  data-target="#mobile">
          <span class="glyphicon glyphicon-earphone"></span>
        </button>
</div>
<div class="well">
<h5 style="color:red">EMAIL</h5>
 <button type="button" class="btn btn-default btn-md" style="background:orange;" data-toggle="modal"  data-target="#mail">
          <span class="glyphicon glyphicon-envelope"></span>
        </button>
</div>
<div class="well">
<h5 style="color:red">FACEBOOK ID</h5>
 <button type="button" class="btn btn-default btn-md" style="background:lightblue;" data-toggle="modal"  data-target="#facebook">
          <span class="glyphicon glyphicon-globe"></span>
        </button>
</div>
</div>
</div>
</div>

<div class="col-sm-2 well" >
      <!--<div class="thumbnail" >
        <p>Upcoming Events:</p>
        <img src="paris.jpg" alt="Paris" width="400" height="300">
        <p><strong>CODE-VITA</strong></p>
        <p>Fri. 27 November 2015</p>
        <button class="btn btn-primary">Info</button>
      </div>    -->  
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
</body>
</html>
<?php
}
else
	echo "<meta content=\"2;home.php\" http-equiv=\"refresh\">";
?>
<div class="modal fade" id="birthday" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="height:80px;background:#436C98;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 style="color:#fff;"class="modal-title" id="myModalLabel">ADD DATE OF BIRTH</h2>
      </div><!--modal header -->
	  <div class="modal-body">
				<form class="form"  action="" method="post">
				
				<div class="form-group">
				<label for="">DATE OF BIRTH:</label></td><td><input id="dob" type="date" class="form-control" name="dob"  title="" placeholder="ENTER YOUR DATE OF BIRTHDATE HERE" required>
				</br>
				</br>
				</br>
				</br>
				</br>
				
				
				</div><!-- Email form group -->
				
				
				
				
				
				</div><!-- CONFIRM Password form group -->
				<div class="modal-footer" style="background-color: #2E8B57;height:100px;">
				<p class="help-block" style=""><strong> BY SUBMITTING YOU ARE GOING TO ADD YOUR DATE OF BIRTH</strong> </p>
				<button type="submit" id="add_dob" name="add_dob" class="btn btn-primary btn-md" style="">SAVE</button>
				</div><!-- modal footer"-->
		  </form><!-- form "-->
	  </div><!-- modal body"-->
	</div><!-- modal content "-->
</div><!-- modal dialog"-->

<div class="modal fade" id="mail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#436C98;height:80px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 style="color:#fff;"class="modal-title" id="myModalLabel">ADD EMAIL</h2>
      </div><!--modal header -->
	  <div class="modal-body">
				<form class="form"  action="" method="post">
				
				<div class="form-group">
				<label for="">EMAIL:</label></td><td><input id="mail" type="email" class="form-control" name="mail" pattern="[a-zA-Z0-9._]+@[a-zA-Z]+.[a-zA-Z]+" placeholder="ADD YOUR EMAIL HERE" required>
				
				
				
				</div><!-- Email form group -->
				
				<p>THIS IS SHOULD BE AN ALTERNATE EMAIL WHICH IS NEEDED FOR SECURITY PURPOSE</p>
				
				
				
				</div><!-- CONFIRM Password form group -->
				<div class="modal-footer" style="background-color:#2E8B57 ;height:100px;">
				<p class="help-block" style=""><strong> BY SUBMITTING YOU ARE GOING TO ADD YOUR EMAIL</strong> </p>
				<button type="submit" id="add_mail" name="add_mail" class="btn btn-primary btn-md" style="background-color:#034f84;">SAVE</button>
				</div><!-- modal footer"-->
		  </form><!-- form "-->
	  </div><!-- modal body"-->
	</div><!-- modal content "-->
</div>
<div class="modal fade" id="school" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#034f84;height:80px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 style="color:#fff;"class="modal-title" id="myModalLabel">ADD SCHOOL</h2>
      </div><!--modal header -->
	  <div class="modal-body">
				<form class="form"  action="" method="post">
				
				<div class="form-group">
				<label for="email">SCHOOL:</label></td><td><input id="school" type="text" class="form-control" name="school" title="" placeholder="ADD YOUR SCHOOL HERE" required>
				
				
				
				</div><!-- Email form group -->
				
				
				
				
				
				</div><!-- CONFIRM Password form group -->
				<div class="modal-footer" style="background-color: #2E8B57;height:100px;">
				<p class="help-block" style=""><strong> BY SUBMITTING YOU ARE GOING TO ADD YOUR SCHOOL</strong> </p>
				<button type="submit" id="add_school" name="add_school" class="btn btn-primary btn-md" style="background-color:#034f84;">SAVE</button>
				</div><!-- modal footer"-->
		  </form><!-- form "-->
	  </div><!-- modal body"-->
	</div><!-- modal content "-->
</div>
<div class="modal fade" id="college" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#034f84;;height:80px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 style="color:#fff;"class="modal-title" id="myModalLabel">ADD COLLEGE</h2>
      </div><!--modal header -->
	  <div class="modal-body">
				<form class="form"  action="" method="post">
				
				<div class="form-group">
				<label for="">COLLEGE:</label></td><td><input id="college" type="text" class="form-control" name="college" placeholder="ADD YOUR COLLEGE HERE" required>
				
				
				
				</div><!-- Email form group -->
				
				
				
				
				
				</div>
				<div class="modal-footer" style="background-color: #2E8B57;height:100px;">
				<p class="help-block" style=""><strong> BY SUBMITTING YOU ARE GOING TO ADD YOUR COLLEGE</strong> </p>
				<button type="submit" id="add_college" name="add_college" class="btn btn-primary btn-md" style="color:white;background-color:#034f84;;">SAVE</button>
				</div><!-- modal footer"-->
		  </form><!-- form "-->
	  </div><!-- modal body"-->
	</div><!-- modal content "-->
</div>
<div class="modal fade" id="job" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#034f84;height:80px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 style="color:#fff;"class="modal-title" id="myModalLabel">ADD JOB</h2>
      </div><!--modal header -->
	  <div class="modal-body">
				<form class="form"  action="" method="post">
				
				<div class="form-group">
				<label for="">JOB</label></td><td><input id="job" type="text" class="form-control" name="job" placeholder="ADD YOUR JOB HERE" required>
				
				
				
				</div><!-- Email form group -->
				
				
				
				
				
				</div><!-- CONFIRM Password form group -->
				<div class="modal-footer" style="background-color:#2E8B57;height:100px;">
				<p class="help-block" style=""><strong> BY SUBMITTING YOU ARE GOING TO ADD YOUR JOB</strong> </p>
				<button type="submit" id="add_job" name="add_job" class="btn btn-primary btn-md" style="color:white;background-color:#034f84;">SAVE</button>
				</div><!-- modal footer"-->
		  </form><!-- form "-->
	  </div><!-- modal body"-->
	</div><!-- modal content "-->
</div>
<div class="modal fade" id="city" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#034f84;height:80px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 style="color:#fff;"class="modal-title" id="myModalLabel">ADD CURRENT CITY</h2>
      </div><!--modal header -->
	  <div class="modal-body">
				<form class="form"  action="" method="post">
				
				<div class="form-group">
				<label for="email">CITY:</label></td><td><input id="city" type="text" class="form-control" name="city" placeholder="ADD YOUR CITY HERE" title="" required>
				
				
				
				</div><!-- Email form group -->
				
				
				
				
				
				</div><!-- CONFIRM Password form group -->
				<div class="modal-footer" style="background-color: #2E8B57;height:100px;">
				<p class="help-block" style=""><strong> BY SUBMITTING YOU ARE GOING TO ADD YOUR CITY</strong> </p>
				<button type="submit" id="add_city" name="add_city" class="btn btn-primary btn-md" style="color:white;background-color:#034f84;">SAVE</button>
				</div><!-- modal footer"-->
		  </form><!-- form "-->
	  </div><!-- modal body"-->
	</div><!-- modal content "-->
</div>
<div class="modal fade" id="hometown" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#034f84;height:80px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 style="color:#fff;"class="modal-title" id="myModalLabel">ADD YOUR HOMETOWN</h2>
      </div><!--modal header -->
	  <div class="modal-body">
				<form class="form"  action="" method="post">
				
				<div class="form-group">
				<label for="email">HOMETOWN:</label></td><td><input id="hometown" type="text" class="form-control" name="hometown" placeholder="ADD YOUR HOMETOWN HERE...." title="" required>
				
				
				
				</div><!-- Email form group -->
				
				
				
				
				
				</div><!-- CONFIRM Password form group -->
				<div class="modal-footer" style="background-color: #2E8B57;height:100px;">
				<p class="help-block" style=""><strong> BY SUBMITTING YOU ARE GOING TO ADD YOUR HOMETOWN</strong> </p>
				<button type="submit" id="add_hometown" name="add_hometown" class="btn btn-primary btn-md" style="color:white;background-color:#034f84;">SAVE</button>
				</div><!-- modal footer"-->
		  </form><!-- form "-->
	  </div><!-- modal body"-->
	</div><!-- modal content "-->
</div>
<div class="modal fade" id="country" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#034f84;height:80px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 style="color:#fff;"class="modal-title" id="myModalLabel">ADD YOUR COUNTRY</h2>
      </div><!--modal header -->
	  <div class="modal-body">
				<form class="form"  action="" method="post">
				
				<div class="form-group">
				<label for="email">COUNTRY:</label></td><td><input id="country" type="text" class="form-control" name="country" placeholder="ADD YOUR COUNTRY" required>
				
				
				
				</div><!-- Email form group -->
				
				
				
				
				
				</div><!-- CONFIRM Password form group -->
				<div class="modal-footer" style="background-color: #2E8B57;height:100px;">
				<p class="help-block" style=""><strong> BY SUBMITTING YOU ARE GOING TO ADD YOUR COUNTRY</strong> </p>
				<button type="submit" id="add_country" name="add_country" class="btn btn-primary btn-md" style="color:white;background-color:#034f84;">SAVE</button>
				</div><!-- modal footer"-->
		  </form><!-- form "-->
	  </div><!-- modal body"-->
	</div><!-- modal content "-->
</div>
<div class="modal fade" id="mobile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#034f84;height:80px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 style="color:#fff;"class="modal-title" id="myModalLabel">ADD YOUR MOBILE</h2>
      </div><!--modal header -->
	  <div class="modal-body">
				<form class="form"  action="" method="post">
				
				<div class="form-group">
				<label for="email">MOBILE:</label></td><td><input id="mobile" type="number" class="form-control" name="mobile" pattern="[0-9]" title="" placeholder="ADD YOUR MOBILE NO HERE" required>
				
				
				
				</div><!-- Email form group -->
				
				
				
				
				
				</div><!-- CONFIRM Password form group -->
				<div class="modal-footer" style="background-color: #2E8B57;height:100px;">
				<p class="help-block" style=""><strong> BY SUBMITTING YOU ARE GOING TO ADD YOUR MOBILE</strong> </p>
				<button type="submit" id="add_mobile" name="add_mobile" class="btn btn-primary btn-md" style="color:white;background-color:#034f84;">SAVE</button>
				</div><!-- modal footer"-->
		  </form><!-- form "-->
	  </div><!-- modal body"-->
	</div><!-- modal content "-->
</div>
<div class="modal fade" id="gender" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#034f84;height:80px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 style="color:#fff;"class="modal-title" id="myModalLabel">ADD YOUR GENDER</h2>
      </div><!--modal header -->
	  <div class="modal-body">
				<form class="form"  action="" method="post">
				
				<div class="form-group">
				<label for="email">GENDER:</label></td><td>
				<div class="col-sm-2" style="color:#808080;">
						<select name="gender" id="gender" style="width:250%;border-radius:4px;" required>
							<option value="" selected>Select...</option>
							<option value="male">MALE</option>
							<option value="female">FEMALE</option>

						</select>
						</div>
				
				
				</div><!-- Email form group -->
				
				
				
				
				
				</div><!-- CONFIRM Password form group -->
				<div class="modal-footer" style="background-color: #2E8B57;height:100px;">
				<p class="help-block" style=""><strong> BY SUBMITTING YOU ARE GOING TO ADD YOUR GENDER</strong> </p>
				<button type="submit" id="add_gender" name="add_gender" class="btn btn-primary btn-md" style="color:white;background-color:#034f84;">SAVE</button>
				</div><!-- modal footer"-->
		  </form><!-- form "-->
	  </div><!-- modal body"-->
	</div><!-- modal content "-->
</div>
<div class="modal fade" id="relationship" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#034f84;height:80px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 style="color:#fff;"class="modal-title" id="myModalLabel">ADD YOUR RELATIONSHIP STATUS</h2>
      </div><!--modal header -->
	  <div class="modal-body">
				<form class="form"  action="" method="post">
				<div class="form-group">
					<label  for="year">RELATIONSHIP STATUS : </label></td>
					</br>
						<div class="col-sm-2" style="color:#808080;">
						<select name="relationship" id="relationship" style="width:250%;border-radius:4px;" required>
							<option value="" selected>Select...</option>
							<option value="single">SINGLE</option>
							<option value="open relationship">OPEN RELATIONSHIP</option>
							<option value="complicated">COMPLICATED</option>
							<option value="maried">MARRIED</option>
							<option value="divorced">DIVORCED</option>
							<option value="seperated">SEPERATED</option>
						</select>
						</div>
					</div>
				
				
				
				
				
				</div><!-- CONFIRM Password form group -->
				<div class="modal-footer" style="background-color:#2E8B57;height:100px;">
				<p class="help-block" style=""><strong> BY SUBMITTING YOU ARE GOING TO ADD YOUR RELATIONSHIP STATUS</strong> </p>
				<button type="submit" id="change_relationship" name="change_relationship" class="btn btn-primary btn-md" style="color:white;background-color:#034f84">SAVE</button>
				</div><!-- modal footer"-->
		  </form><!-- form "-->
	  </div><!-- modal body"-->
	</div><!-- modal content "-->
</div>
<div class="modal fade" id="facebook" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#034f84;height:80px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 style="color:#fff;"class="modal-title" id="myModalLabel">ADD YOUR FACEBOOK ID</h2>
      </div><!--modal header -->
	  <div class="modal-body">
				<form class="form"  action="" method="post">
				
				<div class="form-group">
				<label for="email">FACEBOOK ID</label></td><td><input id="facebookid" type="text" class="form-control" name="facebookid" placeholder="ADD YOUR FACEBOOK ID HERE" title="" required>
				
				
				
				</div><!-- Email form group -->
				
				
				
				
				
				</div><!-- CONFIRM Password form group -->
				<div class="modal-footer" style="background-color: #2E8B57;height:100px;">
				<p class="help-block" style=""><strong> BY SUBMITTING YOU ARE GOING TO ADD YOUR FACEBOOK ID</strong> </p>
				<button type="submit" id="add_facebookid" name="add_facebookid" class="btn btn-primary btn-md" style="color:white;background-color:#034f84;">SAVE</button>
				</div><!-- modal footer"-->
		  </form><!-- form "-->
	  </div><!-- modal body"-->
	</div><!-- modal content "-->
</div>
