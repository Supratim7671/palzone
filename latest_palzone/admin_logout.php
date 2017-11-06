<!DOCTYPE html>
<?php
include 'configuration.php';
//$uid=$_SESSION["uid"];
//rest_questions($uid);
session_unset(); 
session_destroy(); 
//echo "Please wait while we log you out... We will redirect you to your home page after you are loged out!!!";
//$message=" Logged Out :SYSTEM";
//if($uid>0)
 //updatenotification($uid,$message);
echo "ThankYou For Visiting....Please wait while you are redirected....";
echo "<meta content=\"0;admin_index.php\" http-equiv=\"refresh\">";
?>
