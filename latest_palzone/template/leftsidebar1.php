 
<div class="container-fluid">    
  <div class="row">
    <div class="col-sm-3 well" style="">
      <div class="well well-lg">
        <p><a href="#"><?php echo "<h4>$name</h4>";?></a></p>
        
		<img class="img-rounded" height="85" width="120"  src="<?php echo uploadimage();?>" alt="D.P" />
		
		</br>
		</br>
<!--<input type="file" id="img" name="img" style="background-color:blue;float:right;" placeholder="Upload Your image">-->
	<form method="post" enctype="multipart/form-data">
	<input type="file" class="btn btn-sm" id="" name="uploadedimage" style="" placeholder="" accept="image/*" value="Upload Image">
	</br>
	<input type="submit" class="btn btn-info active" id="img" name="img" style="" placeholder="" accept="image/*" value="Upload Image">
	</form>
	</div>
      <div class="well">
	  <p><a href="timeline.php"> Timeline</a></p>
	  <p><a href="slampage.php"> Slam Book</a></p>
	  <p><a href="groupchat.php"> Group Chat</a></p>
	  </div>
	  
	  
	  <div class="well">
        <p><a href="#">Topics </a></p>
        
		<div class="btn-group btn-group-xs">
          
	<button type="button" class="btn btn-primary" style="background-color:red;">C</button>
    <button type="button" class="btn btn-primary" style="background-color:blue;">C++</button>
     <button type="button" class="btn btn-primary" style="background-color:green;">JAVA</button>
   <button type="button" class="btn btn-primary" style="background-color:pink;">PHP</button>
    <button type="button" class="btn btn-primary" style="background-color:yellow;">BOOTSTRAP</button>
    <button type="button" class="btn btn-primary" style="background-color:grey;">JAVASCRIPT</button>
        </div>
      </div>
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
	
	
	