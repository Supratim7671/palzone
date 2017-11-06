<!DOCTYPE html>
<?php
include 'configuration.php';
$uid=$_SESSION["uid"];
//rest_questions($uid);
 $row=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$uid'"),MYSQLI_NUM);
 $message=$row[1]."    "."has logged out successfully";
$query=mysqli_query($conn,"INSERT INTO `admin_notification` (`notification`) VALUES ('$message');");
$query1=mysqli_query($conn,"UPDATE `users` set `online`='no' WHERE `user_id`='$uid';");
session_unset(); 
session_destroy(); 
//echo "Please wait while we log you out... We will redirect you to your home page after you are loged out!!!";

//if($uid>0)

echo "ThankYou For Visiting....Please wait while you are redirected....";
echo "<meta content=\"0;home.php\" http-equiv=\"refresh\">";
?>
