


<div class="container-fluid" >    
  <div class="row">
    <div class="col-sm-2 well" >
      <div class="well well-lg">
        <p><a href="#"><?php echo "<h5>Welcome $name</h5>";?></a></p>
        
		<img class="img-circle" height="140" width="140"  src="<?php echo uploadimage();?>" alt="D.P" />
		
		</br>
		</br>
<!--<input type="file" id="img" name="img" style="background-color:blue;float:right;" placeholder="Upload Your image">-->
	
	</div>
      <div class="well" style="">
	  <p><a href="timeline.php"> Timeline</a></p>
	  <p><a href="slampage.php"> Slam Book</a></p>
	  <p><a href="groupchat.php"> Group Discussion</a></p>
	  </div>
	  
	  
	  <div class="well" style="">
        
      
      <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <p><strong>Hey!</strong></p>
        There are many notification pending in your account.
      </div>
	  <h4>These are the places where you can learn new things</h4>
      <p><a href="http://www.w3schools.com/" target="_blank">w3schools.com</a></p>
      <p><a href="http://www.tutorialspoint.com/" target="_blank">tutorialspoint.com</a></p>
      <p><a href="http://www.javatpoint.com/" target="_blank">javatpoint.com</a></p>
    </div>
</div>
	<?php
function GetImageExtension($imagetype)
     {
		if(empty($imagetype)) return false;
		switch($imagetype)
{
			case 'image/bmp': return '.bmp';
			case 'image/gif': return '.gif';
			case 'image/jpeg': return '.jpg';
			case 'image/png': return '.png';
			default: return false;
	}
}

if (isset($_POST['img']) and isset($_SESSION['uid']))
{	if (!empty($_FILES["uploadedimage"]["name"])) 
 {
	$file_name=$_FILES["uploadedimage"]["name"];
	$temp_name=$_FILES["uploadedimage"]["tmp_name"];
	$imgtype=$_FILES["uploadedimage"]["type"];
	$ext= GetImageExtension($imgtype);
	$imagename=date("d-m-Y")."-".time().$ext;
	$target_path = "images/".$imagename;
	
if(move_uploaded_file($temp_name, $target_path)) 
{$uid=$_SESSION['uid'];
	$query=mysqli_query($conn,"SELECT * FROM  `users` WHERE `user_id`='$uid';");
	$result=mysqli_fetch_array($query,MYSQLI_NUM);
	$userid=$result[0];
$query_upload="INSERT into `college_network`.`user_profile_pic` (`user_id`,`image`,`image_path`) 
VALUES('$userid','$imagename','$target_path');";
	mysqli_query($conn,$query_upload);  

}
else
{
	exit("Error While uploading image on the server");
}
}
}
?>
<?php
		function uploadimage()
		{
		$query=mysqli_query($conn,"SELECT * from `college_network`.`user_profile_pic` WHERE `user_id`='$userid';");
		$result=mysqli_fetch_assoc($query);
		return $result['image_path'];
		}
		?>