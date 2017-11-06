<?php
include "configuration.php";
?>
<?php
$userid=$_SESSION['uid'];
if (isset($userid))
{
?>

<script>
function blank_feedback_check()
	{
		var feedback_txt=document.feedback_form.feedback_txt.value;
		if(feedback_txt=="")
		{
			return false;
		}
		return true;
	}
	function feedback_name_underLine(fid)
	{
		document.getElementById("uname"+fid).style.textDecoration = "underline";
	}
	function feedback_name_NounderLine(fid)
	{
		document.getElementById("uname"+fid).style.textDecoration = "none"
	}
	
	function time_get()
	{
			d = new Date();
			mon = d.getMonth()+1;
			time = d.getDate()+"-"+mon+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes();
			feedback_form.feedback_time.value=time;
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
          <input type="search" name="divid" id="divid" class="form-control" placeholder="Search.." ng-model="keybords" ng-keyup="search()">
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

<?php

	$que_user_info=mysqli_query($conn,"SELECT * from `users` where `user_id`='$userid';");
		$user_data=mysqli_fetch_array($que_user_info,MYSQLI_NUM);
	$userid=$user_data[0];
	if (isset($_POST['feedback']))
	{
		$feedback_txt=test_input($_POST['feedback_txt']);
		$star=$_POST['star'];
		$feedback_time=$_POST['feedback_time'];
		mysqli_query($conn,"INSERT INTO `feedback` (`user_id`,`feedback_txt`,`star`,`date`) VALUES ('$userid','$feedback_txt','$star','$feedback_time');");
	 $message="A feedback has been sent by "."    ".$user_data[1];
	mysqli_query($conn,"INSERT INTO `admin_notification` (`notification`) VALUES ('$message');");
	}
	if (isset($_POST['delete_feedback'])) 
	{
		$feedback_id=intval($_POST['feedback_id']);
		mysqli_query($conn,"DELETE FROM `feedback` WHERE `feedback_id`='$feedback_id';");
		
		
		
	}
	$sql = mysqli_query($conn,"select * from `feedback` ;"); 
$total = mysqli_num_rows($sql);

$adjacents = 3;
//your file name
$limit =5; //how many items to show per page
if(isset($_GET['page']))
{
    $page = $_GET['page'];
}else{
    $page = 0;
}

if($page){ 
    $start = ($page - 1) * $limit; //first item to display on this page
}else{
    $start = 0;
}
/* Setup page vars for display. */
    if ($page == 0) $page = 1; //if no page var is given, default to 1.
    $prev = $page - 1; //previous page is current page - 1
    $next = $page + 1; //next page is current page + 1
    $lastpage = ceil($total/$limit); //lastpage.
    $lpm1 = $lastpage - 1; //last page minus 1



$targetpage = $_SERVER['PHP_SELF']; 
/* CREATE THE PAGINATION */

$pagination = "";
if($lastpage > 1)
{ 
    $pagination .= "<ul class='pagination'>";
   // if ($page > $counter+1) {
     //   $pagination.= "<li><a href=\"$targetpage?page=$prev\"><</a></li>"; 
    //}

    if ($lastpage < 7 + ($adjacents * 2)) 
    { 
        for ($counter = 1; $counter <= $lastpage; $counter++)
        {
            if ($counter == $page)
                $pagination.= "<li><a href='#' class='active'>$counter</a></li>";
            else
                $pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>"; 
        }
    }
    elseif($lastpage > 5 + ($adjacents * 2)) //enough pages to hide some
    {
        //close to beginning; only hide later pages
        if($page < 1 + ($adjacents * 2)) 
        {
            for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<li><a href='#' class='active'>$counter</a></li>";
                else
                    $pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>"; 
            }
            $pagination.= "<li>...</li>";
            $pagination.= "<li><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
            $pagination.= "<li><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>"; 
        }
        //in middle; hide some front and some back
        elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
        {
            $pagination.= "<li><a href=\"$targetpage?page=1\">1</a></li>";
            $pagination.= "<li><a href=\"$targetpage?page=2\">2</a></li>";
            $pagination.= "<li>...</li>";
            for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<li><a href='#' class='active'>$counter</a></li>";
                else
                    $pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>"; 
            }
            $pagination.= "<li>...</li>";
            $pagination.= "<li><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
            $pagination.= "<li><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>"; 
        }
        //close to end; only hide early pages
        else
        {
            $pagination.= "<li><a href=\"$targetpage?page=1\">1</a></li>";
            $pagination.= "<li><a href=\"$targetpage?page=2\">2</a></li>";
            $pagination.= "<li>...</li>";
            for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; 
            $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<li><a href='#' class='active'>$counter</a></li>";
                else
                    $pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>"; 
            }
        }
    }

    //next button
    if ($page < $counter - 1) 
        $pagination.= "<li><a href=\"$targetpage?page=$next\">></a></li>";
    else
        $pagination.= "";
    $pagination.= "</ul>\n"; 
}
	

echo '<div class="container-fluid" >    
  <div class="row">
    <div class="col-sm-2 well" >
      <div class="well well-lg">
        <p><a href="#">'.$name.'</a></p>';
      
	//$query=mysqli_query($conn,"SELECT * FROM `users` where `user_id`='$userid';");
	//$fetch=mysqli_fetch_array($query,MYSQLI_NUM);
	//$userid=$fetch[0];
		//$userid=intval($_POST['userid']);
		$query=mysqli_query($conn,"SELECT * from `user_profile_pic` WHERE `user_id`='$userid';");
		$result=mysqli_fetch_assoc($query);
		$image_path=$result['image_path'];
	 
		 
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
		
		
		echo'</br>
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
	  
	  
	  <div class="well" style="">';
        
      

	   $query100=mysqli_query($conn,"SELECT * FROM `user_notification` where `user_id`='$userid';");
	   if (mysqli_num_rows($query100)>0)
	   {
	 
      
      echo'<div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <p><strong>Hey!</strong></p>
        There are many notification pending in your account.
      </div>';
	   }
	  echo'<h4>These are the places where you can learn new things</h4>
      <p><a href="http://www.w3schools.com/" target="_blank">w3schools.com</a></p>
      <p><a href="http://www.tutorialspoint.com/" target="_blank">tutorialspoint.com</a></p>
      <p><a href="http://www.javatpoint.com/" target="_blank">javatpoint.com</a></p>
    </div>
</div>';



echo'
<div class="col-sm-8" id="refresh">
<center><h3 style="color:green">FEEDBACK FORM<h3></center>
<div class="row">
    
	  <div class="well well-lg" style="position:absolute;margin:15px;padding-bottom:35px;height:200px;width:850px;background:#81a1c1;">
	   <form method="post" name="feedback_form" id="feedback_form">
	
	<div style="position:absolute; left:5%; top:20%;" class="form-group">
		<textarea class="form-control" style="height:110px; width:780px;padding:5px; resize:none;" name="feedback_txt" maxlength="511" placeholder="Share your problems and rate us"></textarea>
	</div>	
   	<input type="hidden" name="feedback_time">
     <div style="position:absolute;left:83%; top:79%; "> 
	 <button class="btn btn-primary btn-md" style="left:83%; top:56%;background:green;" type="submit" value="" name="feedback" id="feedback_button" >FEEDBACK 
	 </button>
    </div>
	<div style="position:absolute; left:5%; top:77%;"> <img src="./images/star.png"> </div>
	<div style="position:absolute; left:11%; top:80%;">
    	<select name="star" style=" font-size:16px; height:25; width:40;"> 
			<option value="5"> 5 </option> 
			<option value="4"> 4 </option> 
            <option value="3"> 3 </option> 
			<option value="2"> 2 </option>
            <option value="1"> 1 </option> 
		</select> 
    </div>
	
   
	</form>
    
	</div> 
	 
	
	  </div>
	  
	  </br>
	 
';
echo' <script>
	$("#refresh").on("submit","#feedback_form",function(event){
	event.preventDefault();
	$.ajax({
		type:"post",
		url:"feedback_ajax.php",
		data:$(this).serialize(),
		success:function(data){
			$("#refresh").html("");
			$("#refresh").html(data);
			}
		
	});
});
	</script>';

$query=mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$userid';");
$result=mysqli_fetch_array($query,MYSQLI_NUM);
$userid1=$result[0];
$sql2 = "SELECT * FROM `feedback` WHERE `user_id`='$userid1'";
$sql2 .= "ORDER BY `feedback_id` desc limit $start ,$limit ";
//$que_feedback=mysqli_query($conn,"SELECT * FROM `feedback` WHERE `user_id`='$userid1' ORDER BY `feedback_id` desc;");
$sql_query = mysqli_query($conn,$sql2);
//$que_feedback=mysqli_query($conn,"SELECT * FROM `feedback` WHERE `user_id`='$userid1' ORDER BY `feedback_id` desc;");
echo
 '<div class="row" style="">
	  <div class=" " style="position:absolute;margin:0px;padding-bottom:0px;top:400%;left:5%;width:785px;overflow-y:scroll;height:500px;overflow-x:hidden;" >
	  
	  <div class="well" style="width:785px;">
           <div class="well"></hr>';
	 
		while ($feedback_data=mysqli_fetch_array($sql_query,MYSQLI_NUM))	
		{
			$feedback_id=$feedback_data[0];
		$fb_user_id=$feedback_data[1];
		$fb_txt=$feedback_data[2];
		$fb_star=$feedback_data[3];
		$fb_time=$feedback_data[4];
		$que_fb_user_info=mysqli_query($conn,"SELECT * from `users` where `user_id`='$fb_user_id';");
		$fb_user_data=mysqli_fetch_array($que_fb_user_info,MYSQLI_NUM);
		$user_name=$fb_user_data[1];
		$user_email=$fb_user_data[2];
		$user_gender=$fb_user_data[4];
		
		$que_fb_user_pic=mysqli_query($conn,"SELECT * from `user_profile_pic` where `user_id`='$fb_user_id';");
		$fetch_user_pic=mysqli_fetch_array($que_fb_user_pic,MYSQLI_NUM);
		$user_pic=$fetch_user_pic[3];
		if ($user_pic==null)
			$user_pic="default.jpg";

echo'<div class="row">';

	echo '<div class="col-sm-offset-10 col-sm-2"> 
	
<form class="form-inline delete_feedback" role="form" method="post" >
  <div class="form-group has-success has-feedback" style="width:100px;">
    <label class="control-label" for="inputSuccess4"></label>
	<input type="hidden" name="feedback_id" value="'.$feedback_id.'" style="width:100px;">
	<button type="submit" class="btn btn-default btn-sm " name="delete" id="delete">
 <span class="glyphicon glyphicon-trash"></span>
  </button>
  </div>
</form>

</div>';


echo '</div>';

    
	echo '<div class="row">
    	<div class="col-sm-offset-1 col-sm-2"> <img src="'.$user_pic.'" height="60" width="55">  </div>
        <div class=" col-sm-8"> <a href="" style="text-transform:capitalize; text-decoration:none; color:#003399;" onMouseOver="feedback_name_underLine('.$feedback_id.')" onMouseOut="feedback_name_NounderLine('.$feedback_id.')" id="uname '.$feedback_id.'">'.$user_name.' </a>   </div>
       
    </div>
    <div class="row">
		<div class="col-sm-offset-2 col-sm-10"  style="word-wrap:break-word;">'.$fb_txt.'</div>
        
	</div>
    <div class="row">
    	
        <div class="col-sm-offset-1 col-sm-2"> <span style="color:#999999;">  Give\'s '.$fb_star.' star </span></div>
		<div class="col-sm-offset-1 col-sm-8"> <span style="color:#999999;"> '.$fb_time.' </span> </div>
        
    </div>
	
   
<hr style="">';
	}
	   echo '<script>  
$("#refresh").on("submit",".delete_feedback",function(event){
	event.preventDefault();
	$.ajax({
		type:"post",
		url:"feedback_ajax.php",
		data:$(this).serialize(),
		success:function(data){
			$("#refresh").html("");
			$("#refresh").html(data);
			}
		
	});
});
</script>';
	

echo '</div>
</div>
   </div>
   </div>
   <div style="position:absolute; left:90%; top:100%;" > &nbsp; </div>	

</div>';
?>
<div class="col-sm-2 well" >
   <!--   <div class="thumbnail" >
        <p>Upcoming Events:</p>
        <img src="paris.jpg" alt="Paris" width="400" height="300">
        <p><strong>CODE-VITA</strong></p>
        <p>Fri. 27 November 2015</p>
        <button class="btn btn-primary">Info</button>
      </div> -->     
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
		<div class="col-sm-4 col-sm-offset-1"> <a href="./message_reply.php?id=<?php echo $online_user_id?>" style="text-transform:capitalize; text-decoration:none; color:#003399;" target="_blank"> <?php echo $online_user_name;?> </a>   </div>
       
    </div>
<?php
}
?>   
   </div>
	</div>
  </div>
</div>
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
	echo "<meta content=\"0;index.php\" http-equiv=\"refresh\">";

?>