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

global $postid1;	
if ($_SERVER['REQUEST_METHOD']=="POST")
{	

if (isset($_POST['comment_txt']))
{
	
	$post_id=intval($_POST['postid']);
	$user_id=intval($_POST['userid']);
	$txt=test_input($_POST['comment_txt']);
	if ($txt!=null)
	{
		
		mysqli_query($conn,"INSERT INTO `user_post_comment` (`post_id`,`user_id`,`comment`) VALUES ('$post_id','$user_id','$txt');");
                $query1=mysqli_query($conn,"SELECT * FROM `user_post` WHERE `post_id`='$post_id';");
		$fetch1=mysqli_fetch_array($query1,MYSQLI_NUM);
		$userid1=$fetch1[1];
		$query2=mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$user_id';");
		$fetch2=mysqli_fetch_array($query2,MYSQLI_NUM);
		$username=$fetch2[1];
		if ($userid1!=$user_id)
		{
			$message=$username.' has commented on your post';
			mysqli_query($conn,"INSERT INTO `user_notification` (`user_id`,`notification`) VALUES ('$userid1','$message');");
		}
	}
		 $postid1=$post_id;
	}

if (isset($_POST['comm_id']))
{
	$postid=intval($_POST['post_id']);
	$comm_id=intval($_POST['comm_id']);
	//$userid=intval($_POST['userid']);
	mysqli_query ($conn,"DELETE FROM `user_post_comment` WHERE `comment_id`='$comm_id';");
	$postid1=$postid;
		 
}
}

	$que_comment=mysqli_query($conn,"SELECT * from `user_post_comment` where `post_id` ='$postid1' order by `comment_id`;");
	$count_comment=mysqli_num_rows($que_comment);
		 
		
$str=$count_comment.'%';
	while($comment_data=mysqli_fetch_array($que_comment,MYSQLI_NUM))
	{
		//echo '11';
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
		
 $str.='	<div class="row">
		
		<div class="col-sm-1 col-sm-offset-1" style="padding-top:5px;">  <img src="'.$user_pic1.'" height="40" width="47">    </div>
		<div class="col-sm-8 col-sm-offset-1" ><div class="row"> <a href="./view_profile.php?id='.$comment_user_id.'" style="text-transform:capitalize; text-decoration:none; color:#3B5998;" onMouseOver="Comment_name_underLine('.$comment_id.')" onMouseOut="Comment_name_NounderLine('.$comment_id.')" id="cuname'.$comment_id.'"> '.$user_name1.'</a> 
		</div><div class="row">
		
		<div class="col-sm-12" style="word-wrap:break-word;"> '.$comment_data[3].'</div>
	</div></div>';
	
		if($userid==$postid1)
		{ 
		$str.='<div class="col-sm-1 " > 
				
<form class="form-inline delete_comment" role="form" method="post" id="'.$comment_id.'delete">
  <div class="form-group has-success has-feedback" style="width:100px;">
    <label class="control-label" for="inputSuccess4"></label>
	<input type="hidden" name="post_id" value="'.$postid1.'">
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
		 $str.='<div class="col-sm-1 ">
			 
		<form class="form-inline delete_comment" role="form" method="post" id="'.$comment_id.'delete">
  <div class="form-group has-success has-feedback" style="width:100px;">
    <label class="control-label" for="inputSuccess4"></label>
	<input type="hidden" name="post_id" value="'.$postid1.'">
	<input type="hidden" name="comm_id" value="'.$comment_id.'" style="width:100px;">
	<button type="submit" class="btn btn-default btn-sm " name="delete_comment" id="delete_comment">
 <span class="glyphicon glyphicon-trash"></span>
  </button>
  </div>
</form>
			
			
			</div>';
		
		}
	
		$str.='</div>';

	
	//$clen=strlen($comment_data[3]);
	//if($clen>0 && $clen<=60)
	//{
		//$cline1=substr($comment_data[3],0,60);
	
	//echo'';
	
	//}
	}
	echo $str;
	die();
	echo'
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
 



	echo'</div>
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


			