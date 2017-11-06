<?php
include "configuration.php";
?>
<?php
$userid=$_SESSION['uid'];
if (isset($userid))
{
?>


<?php

	$que_user_info=mysqli_query($conn,"SELECT * from `users` where `user_id`='$userid';");
		$user_data=mysqli_fetch_array($que_user_info,MYSQLI_NUM);
	$userid=$user_data[0];
	if (isset($_POST['feedback_txt']))
	{
		$feedback_txt=test_input($_POST['feedback_txt']);
		$star=$_POST['star'];
		$feedback_time=$_POST['feedback_time'];
		mysqli_query($conn,"INSERT INTO `feedback` (`user_id`,`feedback_txt`,`star`,`date`) VALUES ('$userid','$feedback_txt','$star','$feedback_time');");
	 $message="A feedback has been sent by "."    ".$user_data[1];
	mysqli_query($conn,"INSERT INTO `admin_notification` (`notification`) VALUES ('$message');");
	}
	if (isset($_POST['feedback_id'])) 
	{
		$feedback_id=intval($_POST['feedback_id']);
		mysqli_query($conn,"DELETE FROM `feedback` WHERE `feedback_id`='$feedback_id';");
		
		
		
	}
	




echo'

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


$query=mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$userid';");
$result=mysqli_fetch_array($query,MYSQLI_NUM);
$userid1=$result[0];
$sql2 = "SELECT * FROM `feedback` WHERE `user_id`='$userid1'";
$sql2 .= "ORDER BY `feedback_id` desc  ";
//$que_feedback=mysqli_query($conn,"SELECT * FROM `feedback` WHERE `user_id`='$userid1' ORDER BY `feedback_id` desc;");
$sql_query = mysqli_query($conn,$sql2);
//$que_feedback=mysqli_query($conn,"SELECT * FROM `feedback` WHERE `user_id`='$userid1' ORDER BY `feedback_id` desc;");
echo
 '<div class="row" style="">
	  <div class=" " style="position:absolute;margin:0px;padding-bottom:0px;top:400%;left:5%;width:785px;overflow-y:scroll;height:1000px;overflow-x:hidden;" >
	
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
	<button type="submit" class="btn btn-default btn-sm " name="delete_feedback" id="delete_feedback">
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
	

echo '</div>
</div>
   </div>
   </div>
   <div style="position:absolute; left:90%; top:100%;" > &nbsp; </div>	

';
?>

 
<?php
}
else
	echo "<meta content=\"0;index.php\" http-equiv=\"refresh\">";

?>