<?php
include "configuration.php";
?>
<html lang="en" ng-app="myApp">
<?php  
  //session_start();
 
$userid=$_SESSION['uid'];

		
		//$categoryid=$_SESSION['categoryid'];
		
		//$_SESSION['categid']=$categoryid;
//$categid=$_SESSION['categid'];
//$level=$_SESSION['level'];
if (isset($userid) )
{



  $query1=mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$userid';");
  $row1=mysqli_fetch_array($query1,MYSQLI_ASSOC);
  $name=$row1['username'];
  
  if (isset ($_POST['bt']))
  {
	  $categoryid=$_SESSION['categoryid'];
  //$userid=$_SESSION['uid'];
		$query2=mysqli_query($conn,"SELECT * FROM `user_question` WHERE `uid`='$userid' and `cid`='$categoryid';");
		$fetch2=mysqli_fetch_assoc($query2);
		$currentcategorylevel=$fetch2['category_level'];
		
	 $less=intval($_POST['less']);
		$more=intval($_POST['more']);
		$timer=intval($_POST['timer']);
	//	$categoryid=$_SESSION['categoryid'];
	 $categorylevelopened=intval($_POST['categorylevel']);
	// mysqli_query($conn,"INSERT INTO `user_question`(`uid`,`qid`,`score`,`answer`,`cid`,`level`) VALUES ('$userid','','','','$cateid','$currentcategorylevel');");
	 mysqli_query($conn,"UPDATE `user_question` set `level`='$currentcategorylevel' WHERE `uid`='$userid' and `cid`=`$categoryid`;");
	 
	// $categoryid1=$_POST['cid1'];
	// $_SESSION['categoryid']=$categoryid1;
	 $_SESSION['more']=$more;
	 $_SESSION['less']=$less;
	 $_SESSION['timer']=$timer;
	 $_SESSION['currentcategorylevel']=$currentcategorylevel;
	 //echo'<script>alert('.$currentcategorylevel.')</script>';
	 $_SESSION['categorylevelopened']=$categorylevelopened;
	  //if ($currentcategorylevel>=$categorylevelopened)
		  echo "<meta content=\"0;./main_page2.php\" http-equiv=\"refresh\">";
	 // else
	 // {
	//	  echo '<script>window.onload=function(){$(\'#failed\').modal();}</script>';
	//	echo "<meta content=\"2;./main_page1.php\" http-equiv=\"refresh\">";
		
		//}
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

</script>
	
	
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
         
		 <li><a href="leaderboard.php">LEADERBOARD</a></li>
		   	<?php
				$query=mysqli_query($conn,"SELECT * FROM `user_notification` where `user_id`='$userid';");
				$result=mysqli_fetch_array($query,MYSQLI_NUM);
				$count=mysqli_num_rows($query);
			?>
		 <li><a href="notification.php">Notification <span class="badge"><?php echo $count;?></span></a></li>
	
		
	  </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group input-group" ng-controller="SearchController" >
          <input type="search" name="divid" id="divid" class="form-control" placeholder="Search.." ng-model="keybords" ng-keyup="search()">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
            </button>
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
        <p><a href="#"><?php echo "<h5>Welcome $name</h5>";?></a></p>
       <?php
	//$query=mysqli_query($conn,"SELECT * FROM `users` where `user_id`='$userid';");
	//$fetch=mysqli_fetch_array($query,MYSQLI_NUM);
	//$userid=$fetch[0];
		//$userid=intval($_POST['userid']);
		$query=mysqli_query($conn,"SELECT * from `user_profile_pic` WHERE `user_id`='$userid';");
		$result=mysqli_fetch_assoc($query);
		$image_path=$result['image_path'];
	?> 
		<img class="img-circle" height="140" width="140"  src="<?php echo $image_path;?>" alt="D.P" />
		
		</br>
		</br>
<!--<input type="file" id="img" name="img" style="background-color:blue;float:right;" placeholder="Upload Your image">-->
	
	</div>
      <div class="well" style="">
           <p><a href="newsfeed.php"> News Feed</a></p>
	  <p><a href="timeline.php"> Timeline</a></p>
	  <p><a href="photos.php"> Gallery</a></p>
	  <p><a href="groupchat.php"> Group Discussion</a></p>
          <p><a href="usernotice.php"> NOTICE </a></p>
	  </div>
	  
	  
	  <div class="well" style="">
        
      
      <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <p><strong>Hey!</strong></p>
        There are many notification pending in your account.
      </div>
	  <h4>These are the places where you can learn new things</h4>
      <p><a href="http://www.w3schools.com/" target="_blank">w3schools.com</a></p>
      <p><a href="http://www.tutorialspoint.com/" target="_blank">tutorialspoint.com</a></p>
      <p><a href="http://www.javatpoint.com/" target="_blank">javatpoint.com</a></p>
    </div>
</div>
<div class="col-sm-8">
<?php
static $i=1;
while ($i<=10)
{
	//$time=3;
	//$correct=5;
	//$wrong=-1
	switch($i)
{
	case 1:{$timer=3;$more=5;$less=1;}break;
case 2:{$timer=5;$more=10;$less=2;}break;
case 3:{$timer=7;$more=15;$less=3;}break;
case 4:{$timer=10;$more=20;$less=4;}break;
case 5:{$timer=12;$more=25;$less=5;}break;
case 6:{$timer=15;$more=30;$less=6;}break;
case 7:{$timer=20;$more=35;$less=7;}break;
case 8:{$timer=22;$more=40;$less=8;}break;
case 9:{$timer=25;$more=45;$less=9;}break;
case 10:{$timer=30;$more=50;$less=10;}break;

}
?>
<div class="well well-lg" style="height:100px;">

<div style="float:left;">

<form action="" method="post">
<!--<input type="hidden" name="cid1" value="<?php //echo $categoryid;?>" id="cid">-->
<input type="hidden" name="categorylevel" value="<?php echo $i;?>" id ="level">
<input type="hidden" name="timer" value="<?php echo $timer*60?>">
<input type="hidden" name="more" value="<?php echo $more?>">
<input type="hidden" name="less" value="<?php echo $less?>">

<button class="btn btn-primary btn-md" style="" name="bt">LEVEL-<?php echo $i;?></button>
</form>
</div>
<div style="float:right;">
<p style="color:blue;"><b>Time Alloted:</b> &nbsp;&nbsp;<?php echo $timer;?> min</p>
<p style="color:red;"><b>MARKING SCHEME:</b> Correct Answer&nbsp;&nbsp; <?php echo $more;?></br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;Wrong Answer&nbsp;&nbsp; -<?php echo $less;?> </br>
</div>

</div>

<?php
++$i;	
}
?>

</div>

<div class="col-sm-2 well" >
      <div class="thumbnail" >
        <p>Upcoming Events:</p>
        <img src="paris.jpg" alt="Paris" width="400" height="300">
        <p><strong>CODE-VITA</strong></p>
        <p>Fri. 27 November 2015</p>
        <button class="btn btn-primary">Info</button>
      </div>      
      <div class="well" style="overflow-y:scroll;height:200px;">
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
        <div class="col-sm-4 col-sm-offset-1"> <a href="./view_about.php?id=<?php echo $online_user_id?>" style="text-transform:capitalize; text-decoration:none; color:#003399;"> <?php echo $online_user_name;?> </a>   </div>
       
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
 <div class="modal fade" id="failed" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#034f84;height:80px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center" style="color:#ff0000;">Failure</h4>
        </div>
        <div class="modal-body">
          <p><?php echo "YOU DIDNT UNLOCKED THE PREVIOUS LEVELS";?>
		  <?php echo $currentcategorylevel;?><?php echo $categorylevelopened;?></p>
        </div>
				</div>
			</div>
			</div>
</body>
</html>

<?php
}
else
	echo "<meta content=\"5;home.php\" http-equiv=\"refresh\">";
?>