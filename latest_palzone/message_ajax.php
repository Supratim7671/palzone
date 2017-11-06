<?php
include"configuration.php";
?>
<?php


if (isset($_POST['reply'])&&$_POST['reply']!='')
{
$reply=test_input($_POST['reply']);
$c_id=intval($_POST['c_id']);
$sender_id=intval($_POST['sender_id']);
$reciever_id=intval($_POST['reciever_id']);
//$uid=test_input($db,$uid_session);
//$time=time();
//$ip=$_SERVER['REMOTE_ADDR'];
 mysqli_query($conn,"INSERT INTO `conversation_reply` (`reply`,`sender_id`,`reciever_id`,`c_id`) VALUES ('$reply','$sender_id','$reciever_id','$c_id');") ;
$userid=$sender_id;
$view_userid=$reciever_id;

$user_one_id=$sender_id;
$user_two_id=$reciever_id;

echo '<div class="well" style="overflow-y:scroll;height:600px;" id="hello">';
global $c_id1;
if($user_one_id!=$user_two_id)
{
$q= mysqli_query($conn,"SELECT `c_id` FROM `conversation` WHERE (`user_one_id`='$user_one_id' and `user_two_id`='$user_two_id') ; ");
$fetch10=mysqli_fetch_assoc($q);
$cid=$fetch10['c_id'];
$q3= mysqli_query($conn,"SELECT `c_id` FROM `conversation` WHERE (`user_one_id`='$user_one_id' and `user_two_id`='$user_two_id') ; ");
$fetch3=mysqli_fetch_assoc($q3);
$c_id_1=$fetch10['c_id'];

  $query= mysqli_query($conn,"SELECT * FROM  `conversation_reply`  WHERE `c_id` in (SELECT `c_id` FROM `conversation` WHERE (`user_one_id`='$userid' and `user_two_id`='$view_userid') 
or (`user_one_id`='$view_userid' and `user_two_id`='$userid'))  ORDER BY `cr_id` desc;");

while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
$cr_id=$row['cr_id'];

$c_id1=$row['c_id'];
$reply=$row['reply'];
$sender_id=$row['sender_id'];
$reciever_id=$row['reciever_id'];
$query3=mysqli_query($conn,"SELECT * FROM `users` where `user_id`='$sender_id';");
$fetch3=mysqli_fetch_array($query3,MYSQLI_ASSOC);

$username=$fetch3['username'];
$query_pic=mysqli_query($conn,"SELECT * FROM `user_profile_pic` where `user_id`='$sender_id';");
$fetch_pic=mysqli_fetch_array($query_pic,MYSQLI_NUM);
$user_pic=$fetch_pic[3];
if ($user_pic==null)
	$user_pic="default.jpg";
echo' <div class="row">
    	<div class=" col-sm-offset-1 col-sm-1 " style="padding:5px;" > <img src="'.$user_pic.'" height="40" width="35">  </div>';
	

	echo '<div class="col-sm-4"> <a href="#" style="text-transform:capitalize; text-decoration:none; color:#003399;"> '.$username.' </a>   </div>';
	
		
    echo'</div>
	<div class="row">
	<div class="col-sm-offset-2 col-sm-10" style="word-wrap:break-word;">'.$reply.'</div>
	</div><hr>';
}
//}
echo '   </div>
	<div class="row">
	<div class="well">
	<form id="post_txt">
	
	<div class="row form-group">
		<textarea class="form-control" cols=115 rows=5 style="padding:5px; resize:none;" name="reply" maxlength="255" placeholder="GIVE YOUR REPLY"></textarea>
	</div>	
   	<input type="hidden" name="txt_post_time">
	
	<div class="row">
	
	
     <div class="col-sm-2 col-sm-offset-10 text-center"> 
	 <input type="hidden" name="c_id" value="'.$c_id_1.'">
	 <input type="hidden" name="sender_id" value="'.$userid.'">
	 <input type="hidden" name="reciever_id" value="'.$view_userid.'">
	 <button type="submit" class="btn btn-primary btn-sm" value="" name="send_message" id="send_message">SEND</button>
    </div>
		</div>
	</form>
	</div>
	</div>
 ';
 }

 }
else
{
	
//$reply=test_input($_POST['reply']);
$c_id=intval($_POST['c_id']);
$sender_id=intval($_POST['sender_id']);
$reciever_id=intval($_POST['reciever_id']);
//$uid=test_input($db,$uid_session);
//$time=time();
//$ip=$_SERVER['REMOTE_ADDR'];
// mysqli_query($conn,"INSERT INTO `conversation_reply` (`reply`,`sender_id`,`reciever_id`,`c_id`) VALUES ('$reply','$sender_id','$reciever_id','$c_id');") ;
$userid=$sender_id;
$view_userid=$reciever_id;

$user_one_id=$sender_id;
$user_two_id=$reciever_id;

echo '<div class="well" style="overflow-y:scroll;height:600px;" id="hello">';
global $c_id1;
if($user_one_id!=$user_two_id)
{
$q= mysqli_query($conn,"SELECT `c_id` FROM `conversation` WHERE (`user_one_id`='$user_one_id' and `user_two_id`='$user_two_id') ; ");
$fetch10=mysqli_fetch_assoc($q);
$cid=$fetch10['c_id'];
$q3= mysqli_query($conn,"SELECT `c_id` FROM `conversation` WHERE (`user_one_id`='$user_one_id' and `user_two_id`='$user_two_id') ; ");
$fetch3=mysqli_fetch_assoc($q3);
$c_id_1=$fetch10['c_id'];

  $query= mysqli_query($conn,"SELECT * FROM  `conversation_reply`  WHERE `c_id` in (SELECT `c_id` FROM `conversation` WHERE (`user_one_id`='$userid' and `user_two_id`='$view_userid') 
or (`user_one_id`='$view_userid' and `user_two_id`='$userid'))  ORDER BY `cr_id` asc;");

while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
$cr_id=$row['cr_id'];

$c_id1=$row['c_id'];
$reply=$row['reply'];
$sender_id=$row['sender_id'];
$reciever_id=$row['reciever_id'];
$query3=mysqli_query($conn,"SELECT * FROM `users` where `user_id`='$sender_id';");
$fetch3=mysqli_fetch_array($query3,MYSQLI_ASSOC);

$username=$fetch3['username'];
$query_pic=mysqli_query($conn,"SELECT * FROM `user_profile_pic` where `user_id`='$sender_id';");
$fetch_pic=mysqli_fetch_array($query_pic,MYSQLI_NUM);
$user_pic=$fetch_pic[3];

echo' <div class="row">
    	<div class=" col-sm-offset-1 col-sm-1 " style="padding:5px;" > <img src="'.$user_pic.'" height="40" width="35">  </div>';
	

	echo '<div class="col-sm-4"> <a href="#" style="text-transform:capitalize; text-decoration:none; color:#003399;"> '.$username.' </a>   </div>';
	
		
    echo'</div>
	<div class="row">
	<div class="col-sm-offset-2 col-sm-10" style="word-wrap:break-word;">'.$reply.'</div>
	</div><hr>';
}
//}
echo '   </div>
	<div class="">
	<div class="well">
	<form id="post_txt">
	
	<div class="row form-group">
		<textarea class="form-control" cols=115 rows=5 style="padding:5px; resize:none;" name="reply" maxlength="255" placeholder="GIVE YOUR REPLY"></textarea>
	</div>	
   	<input type="hidden" name="txt_post_time">
	
	<div class="row">
	
	
     <div class="col-sm-2 col-sm-offset-10 text-center"> 
	 <input type="hidden" name="c_id" value="'.$c_id_1.'">
	 <input type="hidden" name="sender_id" value="'.$userid.'">
	 <input type="hidden" name="reciever_id" value="'.$view_userid.'">
	 <button type="submit" class="btn btn-primary btn-sm" value="" name="send_message" id="send_message">SEND</button>
    </div>
		</div>
	</form>
	</div>
	</div>
 ';
 }

 }
 ?>