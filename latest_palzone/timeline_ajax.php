<?php

include 'configuration.php'; 
//include './template/header.php';

?>
<?php
$userid=$_SESSION['uid'];
if (isset($userid))
{
?>

<?php  
  //session_start();
  $userid=$_SESSION['uid'];
  $query1=mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$userid';");
  $row1=mysqli_fetch_array($query1,MYSQLI_ASSOC);
  $name=$row1['username'];
  ?>
  




  



<?php 

	if ($_SERVER['REQUEST_METHOD']=="POST")
	{
		if (isset($_POST['post_txt']))
		{
			$txt=test_input($_POST['post_txt']);
			$priority=$_POST['priority'];
			$post_time=$_POST['txt_post_time'];
			mysqli_query($conn,"INSERT INTO `user_post`(`user_id`,`post_txt`,`priority`)VALUES('$userid','$txt','$priority');");
			
		}	
	if (isset($_POST['post_id']))
	{
		$post_id=intval($_POST['post_id']);
		mysqli_query($conn,"DELETE FROM `user_post` where `post_id`='$post_id';");
		
	}		
		
if (isset($_POST['flaglike'])&&$_POST['flaglike']==2)
{
	$post_id=intval($_POST['postid']);
	$user_id=intval($_POST['userid']);
	mysqli_query($conn,"INSERT INTO `user_post_status`(`post_id`,`user_id`,`status`) VALUES ('$post_id','$user_id','Like');");
        $query1=mysqli_query($conn,"SELECT * FROM `user_post` WHERE `post_id`='$post_id';");
		$fetch1=mysqli_fetch_array($query1,MYSQLI_NUM);
		$userid1=$fetch1[1];
		$query2=mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$user_id';");
		$fetch2=mysqli_fetch_array($query2,MYSQLI_NUM);
		$username=$fetch2[1];
		if ($userid1!=$user_id)
		{
			$message=$username.' has liked  your post';
			mysqli_query($conn,"INSERT INTO `user_notification` (`user_id`,`notification`) VALUES ('$userid1','$message');");
		}
			$que_status=mysqli_query($conn,"SELECT * from `user_post_status` where `post_id`='$post_id' and `user_id`='$user_id';");
			$que_like=mysqli_query($conn,"SELECT * from `user_post_status` where `post_id`='$post_id';");
			$count_like=mysqli_num_rows($que_like);	
		echo $count_like."l";
		die();
}
if (isset($_POST['flaglike'])&&$_POST['flaglike']==1)
{
	$post_id=intval($_POST['postid']);
	$user_id=intval($_POST['userid']);
	mysqli_query($conn,"DELETE from `user_post_status` WHERE `post_id`='$post_id' and `user_id`='$user_id';");
	//echo "2";
			$que_status=mysqli_query($conn,"SELECT * from `user_post_status` where `post_id`='$post_id' and `user_id`='$user_id';");
			$que_like=mysqli_query($conn,"SELECT * from `user_post_status` where `post_id`='$post_id';");
			$count_like=mysqli_num_rows($que_like);	
		echo $count_like."u";
	
	die();
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

		
	}
	
	
  
echo'

    
   
      <div class="row">
    <div class=" col-sm-11">
	  <div class="well well-lg" style="padding-bottom:10px;">
	   <form method="post" name="posting_txt"  id="post_txt">
	
	<div class="row form-group">
		<textarea class="form-control" cols=115 rows=5 style="padding:5px; resize:none;" required="required" name="post_txt" maxlength="511" placeholder="Share your ideas and issues"></textarea>
	</div>	
   	<input type="hidden" name="txt_post_time">
	<div class="row">
	
	<div class="col-sm-2">
	<select style="background:#add8e6; " name="priority"> 
				<option value="Public"> Public </option> 
				<option value="Private"> Only me </option> 
			</select>
			</div>
     <div class="col-sm-2 col-sm-offset-8 text-center"> 
	 <button class="btn btn-primary btn-sm"  type="submit" value="" name="txt" id="post_button">POST 
	 </button>
    </div>
		</div>
	</form>
    
	</div> 
	 
		</div>
	  </div>';

   
 echo'<div class="well " style="overflow-y:scroll;height:1000px;overflow-x:hidden;" id="hello">
           <div class="well-col-sm-12">';
$sql2 = "SELECT * FROM `user_post` WHERE `user_id`='$userid'";
$sql2 .= "ORDER BY `post_id` desc  ";
//$query_post=mysqli_query($conn,"SELECT * FROM `user_post` WHERE `priority`='Public' ORDER BY `post_id`;");
$sql_query = mysqli_query($conn,$sql2);
	$que_post=mysqli_query($conn,"SELECT * from `user_post` where `user_id`='$userid' order by `post_id` desc;");
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
	
		if($userid==$post_user_id)
		{ 
		echo'<div class="row">';
			
			if($post_txt=="JOIN SOCIAL NETWORKING")
			{
			echo'
			';
			
			}
			else
			{
			
			echo'<div class="col-sm-2 col-sm-offset-11" > 
			
			
 <form class="form-inline delete_post" role="form" method="post" >
  <div class="form-group has-success has-feedback" style="width:100px;">
    <label class="control-label" for="inputSuccess4"></label>
	<input type="hidden" name="post_id" value="'.$postid.'" style="width:100px;">
	<button type="submit" class="btn btn-default btn-sm " name="delete_post" id="delete_post">
 <span class="glyphicon glyphicon-trash"></span>
  </button>
  </div>
</form>
			
			
			
			</div>
			
		</div>';
	
		}
		}
		else
		{ 
	echo'<div class="row">
			<div class="col-sm-2">&nbsp;  </div>
			
		</div>';
			
		}
	
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
	
	
	
	
	
	echo'<div class="row" style="padding-top:10px;">
		';
		
		 	$que_status=mysqli_query($conn,"SELECT * from `user_post_status` where `post_id`='$postid' and `user_id`='$userid';");
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
    <input type="hidden" name="userid" value="'.$userid.'" style="width:100px;">
	 
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
    <input type="hidden" name="userid" value="'.$userid.'" style="width:100px;">
	 
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
	
		if($userid==$post_user_id)
		{ 
			echo'<div class="col-sm-1 " > 
				
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
		else if($userid==$comment_user_id)
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
	<input name="comment_txt"  style="width:100%;" class="form-control" placeholder="Write a comment..." maxlength="511" style="" id="'.$postid.'text" required="required"></textarea>
	<input type="hidden" name="postid" value="'.$postid.'" style="width:100px;">
    <input type="hidden" name="userid" value="'.$userid.'" style="width:100px;">
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
	echo "<meta content=\"0;home.php\" http-equiv=\"refresh\">";
}
?>	


			