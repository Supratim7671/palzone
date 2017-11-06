<?php 
include"configuration.php";
?>
<?php
$userid=$_SESSION['uid'];
if (isset($userid))
{
?>
<script>
function blank_chat_check()
{
	var chat_txt=document.chat_form.chat_txt.value;
	if (chat_txt=="")
	{
		return false;
	}
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
	month=d.getMonth()+1;
	time = d.getDate()+"-"+mon+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes();
	Message_send.value=time;
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
  
  
  <title>COLLEGE NETWORK</title>

 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./bootstrap_files/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.css">

  

  
  <script src="./app.js"></script>
 
	
  <style>    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #2E8B57;
      color: white;
      padding: 15px;
	  position: fixed;
    bottom:0;
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
      <a class="navbar-brand" href="#"><div style="float: left;">
        <img src="logo.png" alt="logo" id="" style="height:40px;width:70px;">
    </div></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="main_page.php">Home</a></li>
         
		 <li><a href="leaderboard.php">Leaderboard</a></li>
		   	<?php
				$query=mysqli_query($conn,"SELECT * FROM `user_notification` WHERE `user_id`='$userid' ;");
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

<script>
/*$(document).ready(function(){
	setInterval(function(){loadchats()},100);
	$("#chat_form").on('submit',function(event){
		event.preventDefault();
	$("#chat_button").click(function(){
		var chat_txt=$("#chat_txt").val();
		$.post("groupchat.php",{chat_txt:chat_txt},function(data){
			$("#chat_txt").val("");
		});
	});
	});
});
function loadchats(){
	$.ajax({url:"groupchat.php",type:POST,success:function(result){
		$("#chat").html(result);
	
	}});
	
}*/
</script>
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
<?php 

	$user_email=$_SESSION['email'];
	$query=mysqli_query($conn,"SELECT * from `users` WHERE `email`='$user_email';");
	$result=mysqli_fetch_array($query,MYSQLI_NUM);
if (isset($_POST['chat_button']))
{
	$chat_txt=test_input($_POST['chat_txt']);
	$chat_time=$_POST['chat_time'];
	mysqli_query($conn,"INSERT INTO `group_chat`(`user_id`,`chat_txt`,`time`)VALUES('$userid','$chat_txt','$chat_time');");
}
	if (isset($_POST['delete_chat']))
	{
		$chat_id=intval($_POST['chat_id']);
		mysqli_query($conn,"DELETE FROM `group_chat` WHERE `chat_id`='$chat_id' and `user_id`='$userid';");
	}
	$sql = mysqli_query($conn,"select * from `group_chat` ;"); 
$total = mysqli_num_rows($sql);




echo'	<div class="container-fluid" >    
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
	  
	  
	  <div class="well" style="">
        
      
      ';
        
      

	   $query100=mysqli_query($conn,"SELECT * FROM `user_notification` where `user_id`='$userid';");
	   if (mysqli_num_rows($query100)>0)
	   {
	 
      
      echo'<div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <p><strong>Hey!</strong></p>
        There are many notification pending in your account.
      </div>';
	   }
	  echo'
	  <h4>These are the places where you can learn new things</h4>
      <p><a href="http://www.w3schools.com/" target="_blank">w3schools.com</a></p>
      <p><a href="http://www.tutorialspoint.com/" target="_blank">tutorialspoint.com</a></p>
      <p><a href="http://www.javatpoint.com/" target="_blank">javatpoint.com</a></p>
    </div>
</div>';
echo'
<div class="col-sm-8"style="" id="refresh">
 <div class="row">
    <div class=" col-sm-12">
	  <div class="well well-lg" style="padding-bottom:10px;">
	   <form name="chating_txt"  id="post_txt">
	
	<div class="row form-group">
		<textarea class="form-control" cols=125 rows=5 required="required" style="padding:5px; resize:none;" name="chat_txt" maxlength="511" placeholder="Share your ideas and issues"></textarea>
	</div>	
   	<input type="hidden" name="chat_time">';
	echo '
	<div class="row">
	
	
     <div class="col-sm-2 col-sm-offset-10 text-right" style="padding-top:10px"> 
	 <button class="btn btn-primary btn-sm"  type="submit" value="" name="chat_button" id="chat_button">POST 
	 </button>
    </div>
		</div>
	</form>
    

	 
		</div>
	  </div> ';
echo' <script>
	$("#refresh").on("submit","#post_txt",function(event){
	event.preventDefault();
	$.ajax({
		type:"post",
		url:"groupchat_ajax.php",
		data:$(this).serialize(),
		success:function(data){
			$("#refresh").html("");
			$("#refresh").html(data);
			update_groupchat();
			}
		
	});
});
	</script>';
	
	 //$query1=mysqli_query($conn,"SELECT * from `group_chat` ORDER BY chat_id desc;");
	$sql2 = "SELECT * FROM `group_chat`";
$sql2 .= "ORDER BY `chat_id` desc ";
$sql_query = mysqli_query($conn,$sql2);
	 echo' </div>
	  
	  
	  <div class="row"  style="">
	  <div class="well " style="padding-left:10px;padding-right:10px;overflow-y:scroll;height:1000px;overflow-x:hidden;" id="hello" >
	 <div class="well col-sm-12"> 
	 
	  ';

	while($chat_data=mysqli_fetch_array($sql_query,MYSQLI_NUM))
	{
		$chat_id=$chat_data[0];
		$fb_user_id=$chat_data[1];
		$chat_txt=$chat_data[2];
		$chat_time=$chat_data[3];
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
 
    if($fb_user_id==$userid)
    {
	echo'<div class="col-sm-1 col-sm-offset-11" > 
			
			
			
<form class="form-inline delete_post" role="form" >
  <div class="form-group" style="width:100px;">
    <label class="control-label" for="inputSuccess4"></label>
	<input type="hidden" name="chat_id" value="'.$chat_id.'" style="width:100px;">
	<button type="submit" class="btn btn-default btn-sm " name="delete_chat" id="delete_chat">
 <span class="glyphicon glyphicon-trash"></span>
  </button>
  </div>
</form>

     </div>';
	}
	else
	{

	echo'<div class="col-sm-1 col-sm-offset-11">&nbsp;  </div>
     ';
     
			

	}

			
  echo'   </div>
    
	<div class="row">';
	if ($user_pic==null)
	{
		$user_pic="default.jpg";
		echo'<div class="col-sm-1 col-sm-offset-1" style="padding-left:25;" rowspan="2"> <img src="'.$user_pic.'" height="60" width="55">  </div>';
	}
	else
		echo'
    	<div class="col-sm-1 col-sm-offset-1" style="padding-left:25;" rowspan="2"> <img src="'.$user_pic.'" height="60" width="55">  </div>

        <div class="col-sm-4 col-sm-offset-1"> <a href="" style="text-transform:capitalize; text-decoration:none; color:#003399;" onMouseOver="chat_name_underLine('.$chat_id.')" onMouseOut="chat_name_NounderLine('.$chat_id.')" id="uname'.$chat_id.'"> '.$user_name.' </a>   </div>
       
    </div>';
   
    
   
	//$len=strlen($chat_data[2]);
	//if($len>0 && $len<=73)
	//{
		//$line1=substr($chat_data[2],0,73);

	echo'<div class="row" style="word-wrap:break-word;">
		<div class="col-sm-9 col-sm-offset-3" >'.$chat_data[2].' </div>
       
	</div>
	 <hr style="border-width:5px">';
	echo'
	  ';
	}
	echo'
	</div>
	   </div>
	</div>
	  </div>';
	
   echo '<script>  
$("#refresh").on("submit",".delete_post",function(event){
	event.preventDefault();
	$.ajax({
		type:"post",
		url:"groupchat_ajax.php",
		data:$(this).serialize(),
		success:function(data){
			$("#refresh").html("");
			$("#refresh").html(data);
			update_groupchat();
			}
		
	});
});
$(document).ready(function(){
	
	update_groupchat();
	update();
	//update_newsfeed_comment();
	
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
function update_groupchat()
{
	
	

	//alert(tempScrollTop);
	//var position = element.scrollTop;
//	alert("position");
	//alert(document.activeElement.tagName);
	if(document.activeElement.tagName!="TEXTAREA")
	{
	$.get("groupchat_ajax.php",function(data){
		//alert(data);
			var tempScrollTop = $("#hello").scrollTop();
		$("#refresh").html(data);
	$("#hello").scrollTop(tempScrollTop);
		
		
	});
	
	//element.scrollTop=position;
	}
	window.setTimeout(update_groupchat,3000);
	
}
</script>';
	

?>

	<div class="col-sm-2 well" style="">
    <!--  <div class="thumbnail" >
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
		<div class="col-sm-4 col-sm-offset-1"> <a href="./message_reply.php?id=<?php echo $online_user_id?>" style="text-transform:capitalize; text-decoration:none; color:#003399;" target="_blank"> <?php echo $online_user_name;?> </a>   </div>
       
    </div>
<?php
}
?>   </div>
   </div>
  
   </div>
</div>


</body>
</html>



<?php
}
else
{
	echo "<meta content=\"0;home.php\" http-equiv=\"refresh\">";
}
?>
	