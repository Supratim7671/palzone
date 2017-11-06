


<div class="container-fluid" >    
  <div class="row">
    <div class="col-sm-3 well" >
      <div class="well well-lg">
        <p><a href="#"><?php echo "<h5>Welcome Admin</h5>";?></a></p>
        
		<img class="img-circle" height="140" width="140"  src="default.jpeg" alt="D.P" />
		
		</br>
		</br>
<!--<input type="file" id="img" name="img" style="background-color:blue;float:right;" placeholder="Upload Your image">-->
	
	</div>
      <div class="well" style="">
	  <p><a href="admin_main_page.php"> All Public Post</a></p>
	  <p><a href="admin_group_chat.php"> Group Discussions</a></p>
	  <p><a href="notice.php">Notice</a></p>
	  <p><a href="allusers.php">USERS</a></p>
	  <p><a href="#"></a></p>
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

if (isset($_POST['img']))
{	if (!empty($_FILES["uploadedimage"]["name"])) 
 {
	$file_name=$_FILES["uploadedimage"]["name"];
	$temp_name=$_FILES["uploadedimage"]["tmp_name"];
	$imgtype=$_FILES["uploadedimage"]["type"];
	$ext= GetImageExtension($imgtype);
	$imagename=date("d-m-Y")."-".time().$ext;
	$target_path = "images/".$imagename;

if(move_uploaded_file($temp_name, $target_path)) 
{
$query_upload="INSERT into `college_network`.`user_profile_pic` (`image_path`) VALUES('$target_path');";
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