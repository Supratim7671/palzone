<?php
include"configuration.php";
?>
<?php
$userid=$_SESSION['uid'];
if (isset($userid))
{
$query=	mysqli_query($conn,"SELECT * FROM `user_notification` WHERE `user_id`='$userid';");
$result=mysqli_fetch_array($query,MYSQLI_NUM);
$count=mysqli_num_rows($query);	
echo $count;

?>
<?php  
}
else
	echo  "<meta content=\"0;home.php\" http-equiv=\"refresh\">";
?>