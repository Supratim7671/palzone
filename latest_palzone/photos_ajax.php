<?php
include "configuration.php";
//include "./template/header.php";
?>

<?php
$userid=$_SESSION['uid'];
//$view_userid=$_GET['id'];
if (isset($userid))
{
	if (isset($_POST['profileid']))
{
	$profile_id=$_POST['profileid'];
	mysqli_query($conn,"DELETE FROM `user_profile_pic` WHERE `profile_id`='$profile_id' and `user_id`='$userid';");
	
}
?>
<div class="row well">
<center><h3>PHOTO GALLERY</h3></center>
<button style="float:right;" type="button" class="btn btn-default btn-sm" data-toggle="modal"  data-target="#image">ADD PHOTO</button>
</div>
<div class="row">
   <?php
	
		$query=mysqli_query($conn,"SELECT * from `user_profile_pic` WHERE `user_id`='$userid';");
		//$result=mysqli_fetch_assoc($query);
		//$image_path=$result['image_path'];
	while($result=mysqli_fetch_assoc($query))
	{   $profileid=$result['profile_id'];
		$image_path=$result['image_path'];
		if ($image_path!=null)
		{
	?>


<form method="post" style="padding:0px;margin:0px;border:0px;" class="delete_photo">		
<div class="col-sm-4 well" style="padding-left:1px;">
<input type="hidden" name="profileid" value="<?php echo $profileid;?>" style="">
<button type="submit" class="btn btn-sm" name="bt1" id="delete_photo" style="float:right;">x</button>

<center><img class="img-rounded" height="160" width="160"  src="<?php echo $image_path;?>" alt="photo" />
</center>

		<!--<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>-->
		
</div>
</form>
<?php
		}
	?>
	<?php 
	}
?>
</div>
<?php
}
else
	echo "<meta content=\"0;home.php\" http-equiv=\"refresh\">";
?>
