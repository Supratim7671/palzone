<?php
include "configuration.php";
//include "./template/header.php";
?>
<link rel="stylesheet" href="formoid1_files/formoid1/formoid-solid-light-green.css" type="text/css" />
<script type="text/javascript" src="formoid1_files/formoid1/jquery.min.js"></script>
<?php
$userid=$_SESSION['uid'];
$view_userid=$_GET['id'];
if (isset($userid))
{
	$query10=mysqli_query($conn,"SELECT * FROM `conversation` where (`user_one_id`='$userid' and `user_two_id`='$view_userid') or 
(`user_one_id`='$view_userid' and `user_two_id`='$userid');");
$fetch10=mysqli_fetch_assoc($query10);
$cid=$fetch10['c_id'];
?>
<html lang="en" ng-app="myApp">
<?php  
  //session_start();
 // $userid=$_SESSION['uid'];
  $query1=mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$userid';");
  $row1=mysqli_fetch_array($query1,MYSQLI_ASSOC);
  $name=$row1['username'];
 
  if(isset($_POST['sendpdf']))
{    
     
 $file = $name."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $_FILES['file']['type']=='application/pdf';
 $file_type = $_FILES['file']['type'];
 //$_FILES['file']['type']=='application/pdf';
 $folder="uploads/";
 
 move_uploaded_file($file_loc,$folder.$file);
 $sql="INSERT INTO `user_slambook` (`userid`,`filename`,`filetype`,`filesize`) VALUES('$view_userid','$file','$file_type','$file_size')";
 mysqli_query($conn,$sql); 
$message=$name." has filled slambook for you...Please see the my submission section...";

 mysqli_query($conn,"INSERT  INTO `user_notification` (`user_id`,`notification`) VALUES ('$view_userid','$message');");
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
	.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
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
  $query2=mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$view_userid';");
  $row2=mysqli_fetch_array($query1,MYSQLI_ASSOC);
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
		$image_path="default.jpg";
	
	?> 
		<img class="img-circle" height="140" width="140"  src="<?php echo $image_path;?>" alt="D.P" />
		<?php	echo'</br></br>';
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
	 
	  <p><a href="./message_reply.php?id=<?php echo $view_userid;?>">Message</a></p>
	    
		<p><a href="./view_photos.php?id=<?php echo $view_userid;?>"> Gallery</a></p>
         <p><a href="./view_about.php?id=<?php echo $view_userid;?>"> About</a></p>
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
<?php 
if (isset($_POST['submit']) and $_SERVER['REQUEST_METHOD']=="POST")
{	
	$name=test_input($_POST['input20']);
	$petname=test_input($_POST['input21']);
	$address=test_input($_POST['input22']);
	$zodiac_sign=test_input($_POST['input']);
	$date_of_birth=test_input($_POST['date']);
	$fav_movies=test_input($_POST['input1']);
	$fav_singer=test_input($_POST['input23']);
	$siblings=test_input($_POST['input24']);
	$fav_actor=test_input($_POST['input25']);
	$fav_actoress=test_input($_POST['input26']);
	$fav_food=test_input($_POST['input2']);
	$fav_passtime=test_input($_POST['input6']);
	$friends=test_input($_POST['input5']);
	$fav_personality=test_input($_POST['input4']);
	$fav_place=test_input($_POST['input3']);
	$fav_sports=test_input($_POST['input13']);
	$fav_sports_personality=test_input($_POST['input12']);
	$fav_song=test_input($_POST['input11']);
	$motto_in_life=test_input($_POST['input10']);
	$happy_moments=test_input($_POST['input9']);
	$embarrasing_moments=test_input($_POST['input8']);
	$crush=test_input($_POST['input7']);
	$places_visited=test_input($_POST['input14']);
	$fear=test_input($_POST['input15']);
	$strength=test_input($_POST['input16']);
	$dont_like_at_all=test_input($_POST['input17']);
	$say_love=test_input($_POST['textarea3']);
	$say_college=test_input($_POST['textarea2']);
	$say_to_me=test_input($_POST['textarea']);
	//$rating=$_POST['rating'];
if (!empty($name)and !empty($petname)and!empty($address)and!empty($zodiac_sign)and!empty($date_of_birth)
	and!empty($fav_movies)and !empty($fav_singer)and!empty($siblings)and!empty($fav_actor)and!empty($fav_actoress)
and !empty($fav_food)and!empty($fav_passtime)and!empty($friends)and!empty($fav_personality)and!empty($fav_place)and!empty($fav_sports)
and !empty($fav_sports_personality)and!empty($fav_song)and!empty($motto_in_life)and!empty($happy_moments)
and !empty($embarrasing_moments)and!empty($crush)and!empty($places_visited)and!empty($fear)and!empty($strength)
and!empty($dont_like_at_all)and!empty($say_love)and !empty($say_college)and!empty($say_to_me))	
	$query=mysqli_query($conn,"INSERT INTO `slambook`(`name`, `petname`, `address`, `zodiac_sign`, `dob`, `fav_movies`, `fav_singer`, 
	`siblings`, `fav_actor`, `fav_actoress`, `fav_food`, `fav_passtime`, `friends`, `fav_personality`, `fav_place`, `fav_sports`, 
	`fav_sports_personality`, `fav_songs`,`motto_in_life`, `happy_moments`, `embarrasing_moments`, `crush`, `places_visited`, 
	`fear`, `strength`, `dont_like`, `say_love`, `say_college`, `say_to_me`) 
	VALUES ('$name','$petname','$address','$zodiac_sign','$date_of_birth','$fav_movies','$fav_singer','$siblings',
	'$fav_actor','$fav_actoress','$fav_food','$fav_passtime','$friends','$fav_personality','$fav_place','$fav_sports',
	'$fav_sports_personality','$fav_song','$motto_in_life','$happy_moments','$happy_moments','$embarrasing_moments'
	'$crush','$places_visited','$fear','$strength','$dont_like_at_all','$say_love','$say_college','$say_to_me');"
	);
	else
		echo"please enter all the fields";
}
?>

<?php 

?>

<div class="col-sm-8"  style="">
<div class="well">
<form class="formoid-solid-light-green" action="actionpdf.php" target="_blank" style="background-color:#aaaaff;font-size:14px;font-family:'Open Sans',Arial,Verdana,sans-serif;color:#34495E;max-width:720px;min-width:150px" method="post">
<div class="title">
<h2>Fill Your Slampage Here</h2>
</div>
	<div class="element-name">
	<label class="title"></label>
	<span class="nameFirst">
	<input placeholder=" You are Known As" type="text" size="8" name="input20" required />
	<span class="icon-place"></span>
	</span><span class="nameLast">
	<input placeholder=" Loved Ones Call You" type="text" size="14" name="input21" required/>
	<span class="icon-place"></span></span>
	</div>
	<div class="element-address">
	<label class="title">
	</label><span class="addr1">
	<input placeholder="Home Sweet Home" type="text" name="input22" required />
	<span class="icon-place"></span>
	</span>
	</div>
	<div class="element-input">
	<label class="title"></label>
	<div class="item-cont">
	<input class="large" type="text" name="input" placeholder="Your Zodiac Sign" required/>
	<span class="icon-place"></span>
	</div>
	</div>
	<div class="element-date">
	<label class="title"></label>
	<div class="item-cont">
	<input class="large" data-format="yyyy-mm-dd" type="date" name="date" placeholder="You landed earth on" required/>
	<span class="icon-place"></span>
	</div>
	</div>
	<div class="element-input">
	<label class="title"></label>
	<div class="item-cont"><input class="large" type="text" name="input1" placeholder="Favorate Movies" required/>
	<span class="icon-place"></span>
	</div>
	</div>
	<div class="element-input">
	<label class="title"></label>
	<div class="item-cont"><input class="large" type="text" name="input23" placeholder="Favorate Singer" required/>
	<span class="icon-place"></span>
	</div>
	</div>
	<div class="element-input">
	<label class="title"></label>
	<div class="item-cont"><input class="large" type="text" name="input24" placeholder="Siblings" required/>
	<span class="icon-place"></span>
	</div>
	</div>
	<div class="element-input">
	<label class="title"></label>
	<div class="item-cont"><input class="large" type="text" name="input25" placeholder="Favorate Actor" required/>
	<span class="icon-place"></span>
	</div>
	</div>
	<div class="element-input">
	<label class="title"></label>
	<div class="item-cont"><input class="large" type="text" name="input26" placeholder="Favorate Actoress" required/>
	<span class="icon-place"></span>
	</div>
	</div>
	
	<div class="element-input">
	<label class="title"></label>
	<div class="item-cont">
	<input class="large" type="text" name="input2" placeholder="Your Ummiest Delight" required/>
	<span class="icon-place"></span>
	</div>
	</div>
	<div class="element-input">
	<label class="title"></label>
	<div class="item-cont">
	<input class="large" type="text" name="input6" placeholder="Your Favorate passtime" required/>
	<span class="icon-place"></span>
	</div></div>
	<div class="element-input">
	<label class="title"></label>
	<div class="item-cont">
	<input class="large" type="text" name="input5" placeholder="Your companions" required/>
	<span class="icon-place"></span>
	</div>
	</div>
	<div class="element-input">
	<label class="title"></label>
	<div class="item-cont"><input class="large" type="text" name="input4" placeholder="Favorite Personality" required/><span class="icon-place"></span></div></div>
	<div class="element-input"><label class="title">
	</label>
	<div class="item-cont">
	<input class="large" type="text" name="input3" placeholder="Favorite Place" required/>
	<span class="icon-place"></span>
	</div>
	</div>
	<div class="element-input">
	<label class="title"></label>
	<div class="item-cont">
	<input class="large" type="text" name="input13" placeholder="Favorite Sports" required/>
	<span class="icon-place"></span></div></div>
	<div class="element-input">
	<label class="title"></label>
	<div class="item-cont">
	<input class="large" type="text" name="input12" placeholder="Favorite Sports Personality" required/>
	<span class="icon-place"></span></div></div>
	<div class="element-input">
	<label class="title"></label><div class="item-cont">
	<input class="large" type="text" name="input11" placeholder="Favorate Song" required/>
	<span class="icon-place"></span>
	</div>
	</div>
	<div class="element-input">
	<label class="title"></label>
	<div class="item-cont">
	<input class="large" type="text" style="resize:none;"name="input10" placeholder="Your Motto in life" required/>
	<span class="icon-place"></span>
	</div>
	</div>
	<div class="element-input">
	<label class="title"></label>
	<div class="item-cont">
	<input class="large" type="text" name="input9" placeholder="Most Happy Moments in your life" required/>
	<span class="icon-place"></span>
	</div>
	</div>
	<div class="element-input">
	<label class="title"></label>
	<div class="item-cont">
	<input class="large" type="text" name="input8" placeholder="Most embarrasing Moments in your life" required/>
	<span class="icon-place"></span>
	</div>
	</div>
	<div class="element-input">
	<label class="title"></label>
	<div class="item-cont">
	<input class="large" type="text" name="input7" placeholder="Any crush till now" required/>
	<span class="icon-place"></span>
	</div>
	</div>
	<div class="element-input">
	<label class="title"></label>
	<div class="item-cont">
	<input class="large" type="text" name="input14" placeholder="Places you have visited" required/>
	<span class="icon-place"></span>
	</div>
	</div>
	<div class="element-input">
	<label class="title"></label>
	<div class="item-cont">
	<input class="large" type="text" name="input15" placeholder="Your deepest fear" required/>
	<span class="icon-place"></span>
	</div>
	</div>
	<div class="element-input">
	<label class="title"></label>
	<div class="item-cont">
	<input class="large" type="text" name="input16" placeholder="Your strength" required/>
	<span class="icon-place"></span>
	</div>
	</div>
	<div class="element-input">
	<label class="title"></label>
	<div class="item-cont">
	<input class="large" type="text" name="input17" placeholder="You dont like at all..." required/>
	<span class="icon-place"></span>
	</div>
	</div>
	<div class="element-textarea">
	<label class="title"></label>
	<div class="item-cont">
	<textarea class="medium" style="resize:none;"name="textarea3" cols="20" rows="5" placeholder="Say something about love" required></textarea><span class="icon-place"></span></div></div>
	<div class="element-textarea">
	<label class="title"></label>
	<div class="item-cont">
	<textarea class="medium" name="textarea2" style="resize:none;"cols="20" rows="5" placeholder="Say Something about College" required></textarea><span class="icon-place"></span></div></div>
	<div class="element-textarea">
	<label class="title"></label>
	<div class="item-cont">
	<textarea class="medium" style="resize:none" name="textarea" cols="20" rows="5" placeholder="Say at least 2 things about me which you like" required></textarea><span class="icon-place"></span></div></div>
	<div class="element-rating">
	<label class="title">How Much You Like this slam book</label>
	<div class="rating" name="rating">
	<input type="radio" class="rating-input" id="rating-5" name="rating" value="5" />
	<label for="rating-5" class="rating-star"></label>
	<input type="radio" class="rating-input" id="rating-4" name="rating" value="4" />
	<label for="rating-4" class="rating-star"></label>
	<input type="radio" class="rating-input" id="rating-3" name="rating" value="3" />
	<label for="rating-3" class="rating-star"></label>
	<input type="radio" class="rating-input" id="rating-2" name="rating" value="2" />
	<label for="rating-2" class="rating-star">
	</label><input type="radio" class="rating-input" id="rating-1" name="rating" value="1" />
	<label for="rating-1" class="rating-star"></label>
	</div>
	</div>
	<div class="submit">
	<input type="submit" value="Submit" name="submit"/></div></form>
	<!--<p class="frmd"><a href="http://formoid.com/v29.php">form builder</a> Formoid.com 2.9</p>
	<script type="text/javascript" src="formoid1_files/formoid1/formoid-solid-light-green.js"></script>-->
<!-- Stop Formoid form-->
</br>
</br>
<div class="well">
<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="userid" value="<?php echo $view_userid; ?>" style="width:100px;">
	<span class="btn btn-default btn-file btn-sm">Browse...
	<input type="file" class="btn btn-sm" id="" name="file" style="" placeholder="" accept="" value="Upload Image" required>
	</span>
	
	<input type="submit" class="btn btn-primary btn-md" id="sendpdf" name="sendpdf" style="float:right" placeholder="" accept="" value="Send" >
	SEND THIS PDF TO THE USER....
	</form>
	
</div>
</div>
</div>
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
<div class="col-sm-2 well" >
   <!--   <div class="thumbnail" >
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
		<div class="col-sm-4 col-sm-offset-1"> <a href="./message_reply.php?id=<?php echo $online_user_id?>" style="text-transform:capitalize; text-decoration:none; color:#003399;" target="_blank"> <?php echo $online_user_name;?> </a>   </div>
       
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
<?php
}
else
	echo "<meta content=\"0;home.php\" http-equiv=\"refresh\">";
?>