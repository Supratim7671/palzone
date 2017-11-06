<?php
include "configuration.php";
?>
<?php

$querystring=test_input($_GET['name']);
$query=mysqli_query($conn,"SELECT * FROM `users` WHERE `username` LIKE '%$querystring%';");

//$query1=mysqli_query($conn,"SELECT * FROM `user_profile_pic` WHERE `user_id`='$userid';")
//$result=mysqli_fetch_array($query,MYSQLI_NUM);
$str='';
$a=[];
while($result=mysqli_fetch_array($query,MYSQLI_NUM))
{	$username=$result[1];
	$userid=$result[0];
	$query1=mysqli_query($conn,"SELECT * FROM `user_profile_pic` WHERE `user_id`='$userid';");
	$result1=mysqli_fetch_assoc($query1);
	$userpic=$result1['image_path'];
	if ($userpic==null)
		$userpic="default.jpg";
	$r=array('id'=>'view_profile.php?id='.$userid, 'value'=>'', 'label'=>'<div class="row">
    	<div class="col-sm-1 col-sm-offset-1" style="padding:5px;" > <img src="'.$userpic.'?>" height="40" width="35">  </div>
        <div class="col-sm-4 col-sm-offset-1"> <a href="./view_about.php?id='.$userid.'" target="_blank" style="text-transform:capitalize; text-decoration:none; color:#003399;">'.$username.' </a>   </div>
       
    </div>');
	array_push($a, $r);
	
}
echo json_encode($a);


	

	?>