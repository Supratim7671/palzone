<?php
function datafetch()
{$sql="SELECT `name`,`email`,`birthdate` FROM `users`";
$result=mysqli_query($conn,$sql);
$emparray[]=array();
while($row=mysqli_fetch_assoc($result))
{
	$emparray[]=$row;
}
return $emparray;
}
//$records=$json_encode($emparray);
?>