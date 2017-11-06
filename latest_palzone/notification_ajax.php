<?php
include "configuration.php";
?>

<?php
$userid=$_SESSION['uid'];
if (isset($userid))
{
	
			if (isset($_POST['delid']))
			{
				$delid=$_POST['delid'];
				mysqli_query($conn,"DELETE FROM `user_notification` WHERE `nid`='$delid' and `user_id`='$userid';");
				
				
			}
			

?>

<?php
$query1=mysqli_query($conn,"SELECT * FROM `user_notification` WHERE `user_id`='$userid';");
$count1=mysqli_num_rows($query1);
if ($count1>0)
{
?>
<form class="form-inline" role="form" method="post" >
<button class="btn btn-sm btn-primary" name="bt2" id="bt2" style="float:right;">Clear All</button>
</form>
<?php
}
?>
</br>
</br>
<?php

$query=	mysqli_query($conn,"SELECT * FROM `user_notification` WHERE `user_id`='$userid' ORDER BY `nid` desc;");

while($result=mysqli_fetch_array($query,MYSQLI_NUM))
{	
	$nid=$result[2];
	$notification=$result[1];
	//$time=$result[2];
	?>
	
		 <form class="form-inline delete_notification" role="form" method="post"  >
		</br>
		<div class="alert alert-success fade in">
        <p><?php echo $notification;?></p>
		<input type="hidden" name="delid" value="<?php echo $nid;?>" style="width:100px;">
		<button class="btn btn-sm" name="bt1" id="bt1" style="float:right;">x</button>
		<!--<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>-->
		  </br>   
	 </div>
	 </form>
	  
<?php
}

?>






<?php  
}
else
	echo  "<meta content=\"0;home.php\" http-equiv=\"refresh\">";
?>