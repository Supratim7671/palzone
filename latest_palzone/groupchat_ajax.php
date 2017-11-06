<?php 
include"configuration.php";
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
if(isset($_POST['chat_txt']))
{
	$chat_txt=test_input($_POST['chat_txt']);
	$chat_time=$_POST['chat_time'];
	mysqli_query($conn,"INSERT INTO `group_chat`(`user_id`,`chat_txt`,`time`)VALUES('$userid','$chat_txt','$chat_time');");
}
	if (isset($_POST['chat_id']))
	{
		$chat_id=intval($_POST['chat_id']);
		mysqli_query($conn,"DELETE FROM `group_chat` WHERE `chat_id`='$chat_id' and `user_id`='$userid';");
	}
}
	$sql = mysqli_query($conn,"select * from `group_chat` ;"); 
$total = mysqli_num_rows($sql);

	
	



        
      

echo'

 <div class="row">
    <div class=" col-sm-11">
	  <div class="well well-lg" style="padding-bottom:10px;">
	   <form id="post_txt">
	
	<div class="row form-group">
		<textarea class="form-control" cols=105 rows=5 style="padding:5px; resize:none;" name="chat_txt" maxlength="511" placeholder="Share your ideas and issues"></textarea>
	</div>	
   	<input type="hidden" name="chat_time">
	<div class="row">
	
	
     <div class="col-sm-2 col-sm-offset-10 text-right" style="padding-top:10px"> 
	 <button class="btn btn-primary btn-sm"  type="submit" value="" name="chat_button" id="chat_button" >POST 
	 </button>
    </div>
		</div>
	</form>
    

	 
		</div>
	  </div> ';
	 
	
	 //$query1=mysqli_query($conn,"SELECT * from `group_chat` ORDER BY chat_id desc;");
	$sql2 = "SELECT * FROM `group_chat`";
$sql2 .= "ORDER BY `chat_id` desc ";
$sql_query = mysqli_query($conn,$sql2);
	 
 echo' </div>
	  
	   
	  <div class="row"  >
	  <div class="well" style="padding-left:10px;padding-right:10px;overflow-y:scroll;height:1000px;overflow-x:hidden;" id="hello" >
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
			
			
			
<form class="form-inline delete_post" role="form" method="post" >
  <div class="form-group has-success has-feedback" style="width:100px;">
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
    
	<div class="row">
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
	}
	
	
echo'
	</div>
	  </div>
	  </div>
	  ';
	}
?>
	