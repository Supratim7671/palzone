<!DOCTYPE html>
<?php
include 'configuration.php'; 
?>
<?php
$userid=$_SESSION['uid'];
//$level=intval($_SESSION['level']);
//$categoryid=intval($_SESSION['categid']);
if (isset($userid))
{
		static $flag=0;
		$less=intval($_SESSION['less']);
		$more=intval($_SESSION['more']);
		$timer=intval($_SESSION['timer']);
		$cateid=intval($_SESSION['categoryid']);
		$currentcategorylevel=$_SESSION['currentcategorylevel'];
		$categorylevelopened=$_SESSION['categorylevelopened'];
		
		//echo'<script>alert('.$difficulty.')</script>';
	//	echo'<script>alert('.$less.')</script>';
	//	echo'<script>alert('.$more.')</script>';
	//	echo'<script>alert('.$timer.')</script>';
	//	echo'<script>alert('.$cateid.')</script>';
	//	echo'<script>alert('.$currentcategorylevel.')</script>';
		//echo'<script>alert('.$categorylevelopened.')</script>';
		//$diffcultylevel=intval($_SESSION['difficultylevel']);
		
//$_SESSION['categid']=$categoryid;
//$categid=$_SESSION['categid'];
//$level=$_SESSION['level'];
//echo '<script>alert('.$cateid.')</script>';


?>
<script>
function submitbuttonclick()
{
	document.getElementById("bt1").disabled = true;
	
}
</script>
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
<!--<script>

var targetURL=\"./index.php\"
//change the second to start counting down from
var countdownfrom=60	
var currentsecond=document.ques.time.value=countdownfrom+1
function countredirect(){
if (currentsecond!=1){
currentsecond-=1
width=0
document.ques.time.value=currentsecond
}
else{
document.getElementById(\"questions\").submit();
return
}
setTimeout(\"countredirect()\",1000)
}

countredirect()
</script>-->

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
          <input type="search" name="search" id="divid" class="form-control" placeholder="Search.." ng-model="keybords" ng-keyup="search()">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
            </button>
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
           <p><a href="usernotice.php"> NOTICES</a></p>
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
<?php
//$userid=$_SESSION['uid'];
//$level=$_SESSION['level'];


	//if (isset($_POST['bt']))
	//{
	//$cid=$_POST['cid'];
	//}
 ?> 
<div class="col-sm-8">

<form action="" method="post">
<?php

//$level=$level+1;
//$level=intval($_SESSION['level']);
$sql="SELECT * FROM `questions` where `cid`='$cateid' and `level`='$currentcategorylevel' ;";
/*switch($level)
{
	case 1:{$timer=60*3;$more=10;$less=1;}break;
case 2:{$timer=60*5;$more=5;$less=1;}break;
case 3:{$timer=60*7;$more=10;$less=2;}break;
case 4:{$timer=60*10;$more=15;$less=3;}break;
case 5:{$timer=60*12;$more=20;$less=4;}break;
case 6:{$timer=60*15;$more=25;$less=5;}break;
case 7:{$timer=60*20;$more=30;$less=6;}break;
case 8:{$timer=60*22;$more=35;$less=7;}break;
case 9:{$timer=60*25;$more=40;$less=8;}break;
case 10:{$timer=60*30;$more=50;$less=10;}break;

}*/

$result=mysqli_query($conn,$sql);
$i=1;
echo'
<script>
function startTimer(duration, display) {
    var start = Date.now(),
        diff,
        minutes,
        seconds;
    function timer() {
        // get the number of seconds that have elapsed since 
        // startTimer() was called
        diff = duration - (((Date.now() - start) / 1000) | 0);

        // does the same job as parseInt truncates the float
        minutes = (diff / 60) | 0;
        seconds = (diff % 60) | 0;

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds; 

        if (diff <= 0) {
            // add one second so that the count down starts at the full duration
            // example 05:00 not 04:59
            //start = Date.now() + 1000;
			clearInterval(st);
			//$("form:input").attr("disabled","disabled");
			//document.getElementByTag("form").disabled = true;
			document.getElementById("bt1").disabled = true;
			//document.getElementByTag("form:input").disabled=true;
			//alert("Time Up");
        }
    };
    // we don\'t want to wait a full second before the timer starts
    timer();
    var st=setInterval(timer, 1000);
}

window.onload = function () {
    var fiveMinutes ='.$timer.',
        display = document.querySelector(\'#time\');
    startTimer(fiveMinutes, display);
};
</script>';
echo'<div class="row well well-lg">';
if ($flag==0)
{
echo'<div class="col-sm-4 well" style="height:100px;width:250px;color:red;">TIME ALLOTED:<span id="time"></span></div>';
echo'<div class="col-sm-4 col-sm-offset-4 well" style="float:right;height:100px;width:350px color:red;"><p style="color:red;"><b>MARKING SCHEME:</br></b> Correct Answer: '.$more.'</br>

Wrong Answer : -'.$less.' </br></p></div>';
}
echo'</div>';
while($i<=10 and $row=mysqli_fetch_array($result,MYSQLI_NUM))
{
	$qid=$row[0];
	$question=$row[2];
	$opt1=$row[3];
	$opt2=$row[4];
	$opt3=$row[5];
	$opt4=$row[6];
	//$flag=0;
	$level_difficulty=$row[8];
	
//if ($flag==1)
//	 echo '<script>window.onload=function(){$(\'#attempted\').modal();}</script>';

//	else {
		echo '<div class="well well-lg" style="height:200px;">';
		echo 'Q'.$i.':'.$question.'</br></br>';
		echo "<input type='hidden' name='qid'  value='" .$qid."'/></br>";
		echo "<input type='hidden' name='nowlevel'  value='" .$categorylevelopened."'/></br>";
		echo "<input type='radio' name='".$i."'  value='".$opt1."'/>".$opt1."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	    echo "<input type='radio' name='".$i."'  value='" .$opt2."'/>".$opt2."</br>";
	    echo "<input type='radio' name='".$i."'  value='" .$opt3."'/>".$opt3."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	    echo "<input type='radio' name='".$i."'   value='" .$opt4."'/>".$opt4."</br>";
	    //echo"<input type='hidden' name='flag' value='".$flag."'/>"
		echo '</div>' ;
	
	++$i;
//	}		
}
?>
<?php
//$nowlevel1=$_SESSION['nowlevel1'];
global $score;
if (isset($_POST['bt1']) )
{
	$nowlevel=intval($_POST['nowlevel']);
	
	$result=mysqli_query($conn,"SELECT * FROM `questions` where `cid`='$cateid';");
	
//	$_SESSION['nowlevel1']=$nowlevel;
	
	echo "<script>alert(".$more.")</script>";
	echo "<script>alert(".$less.")</script>";
	//echo "<script>alert(".$.")</script>";
	//echo "<script>alert(".$more.")</script>";
	//echo "<script>alert(".$more.")</script>";
	//$difficulty=intval($_SESSION['difficultylevel']);
	if ($currentcategorylevel==$nowlevel)
		{
		for ($i=1;$i<=5;$i++)
		{
			
			$row=mysqli_fetch_array($result,MYSQLI_NUM);
			$qid=intval($_POST['qid']);
			//$rr=$_POST["$i"];
		//echo '<script>alert('.$rr.');</script>';
		
			
		if (isset($_POST["$i"]))
		{
			
			$answer=$_POST["$i"];
			if ($_POST["$i"]==$row[7])
				$score=$score+$more;
			else
				$score=$score-$less;
		}
		
		else
		{
		$score=$score+0;
		$answer="NOT GIVEN";
		
		}		
		$currentcategorylevel++;
		echo '<script>alert('.$score.');</script>';
		mysqli_query($conn,"UPDATE `users` set `score`=`score`+'$score' where `user_id`='$userid' and `cid`='$cateid';");
		echo '<script>alert('.$answer.');</script>';
		mysqli_query($conn,"INSERT INTO `user_question` (`uid`,`qid`,`score`,`answer`,`cid`,`category_level`)VALUES ('$userid','$qid','$score','$answer','$cateid','$currentcategorylevel');");
		//mysqli_query($conn,"UPDATE `user_question` set `qid`='$qid',`score`=`score`+'$score',`answer`='$answer',`category_level`='$currentcategorylevel' WHERE
		//`uid`='$userid' and `cid`='$cateid';");
		//$level=$level+1;
		$flag=1;
	 //  mysqli_query($conn,"UPDATE `users` set `level`='$level' WHERE `user_id`='$userid';");
	}
		}
		else
			echo'<script>document.getElementById("bt1").disabled = true;</script>';
		
			//echo '<script>window.onload=function(){$(\'#attempted\').modal();}</script>';
		
$flag=1;
}
if ($flag==0)
		{
			
?>

<button type="submit" class="btn btn-sm btn-primary" onClick="" name="bt1" id="bt1" value="">SUBMIT </button>
<?php
		}
?>
</br>
</form>

</br>
</br>
<?php
/*if ($flag==1)
{
	echo '<script>window.onload=function(){$(\'#attempted\').modal();}</script>';
}
else
{*/
?>


<div class="well" style="float:right;height:100px ;width:200px; color:red;">
<?php
//$query3=mysqli_query($conn,"SELECT * FROM `user_question` WHERE `uid`='$userid' and `level`='$currentcategorylevel' and `cid`='$cateid';");
//$fetch3=mysqli_fetch_assoc($query3);
//$score=$fetch3['score'];
?>
<p>YOUR SCORE IS : &nbsp;<?php echo $score;?></p>
<?php
//}
?>
<?php
//$query=mysqli_query($conn,"SELECT * FROM `user_question`  where `uid`='$userid';");
//$result=mysqli_fetch_array($query,MYSQLI_NUM);
//$Score=$result[2];
//mysqli_query($conn,"UPDATE `user_question` set `score`=`score`+'$Score' where `uid`='$userid';");

?>
<!--<p>YOUR TOTAL SCORE IS:&nbsp;<?php//echo $Score;?></p>-->
</div>

</div>

	
   
   <div class="col-sm-2 well" >
      <!--<div class="thumbnail" >
        <p>Upcoming Events:</p>
        <img src="paris.jpg" alt="Paris" width="400" height="300">
        <p><strong>CODE-VITA</strong></p>
        <p>Fri. 27 November 2015</p>
        <button class="btn btn-primary">Info</button>
      </div>      -->
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
<div class="modal fade" id="attempted" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#034f84;height:80px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center" style="color:#ff0000;">PASSED</h4>
        </div>
        <div class="modal-body">
          <p><?php echo "YOU HAVE SUCCESSFULLY ATTEMPTED THIS LEVEL...or....YOU HAVE TO COMPLETE LOWER LEVELS TO UNLOCK THIS LEVEL";?></p>
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