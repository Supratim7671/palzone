<!DOCTYPE html>
<?php
include 'configuration.php';
?>
<html>

<head>
  <title>ADMIN PANEL LOGIN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
  body {
      position: relative; 
  }
  #section1 {padding-top:50px;height:500px;color: #fff; background-color: #98FB98;}
  #section2 {padding-top:50px;height:500px;color: #fff; background-color: #2E8B57;}
  #section3 {padding-top:50px;height:500px;color: #fff; background-color: #ff9800;}
  #section41 {padding-top:50px;height:500px;color: #fff; background-color: #00bcd4;}
  #section42 {padding-top:50px;height:500px;color: #fff; background-color: #009688;}
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #006600;
      color: white;
      padding: 15px;
    }
  
  </style>
</head>
<body  data-spy="scroll" data-target=".navbar-fixed-top" style="position:relative">

<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#006600;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
      </button> 
    <a class="navbar-brand" href="#" ><div style="float: left;">
        <img src="logo.png" alt="logo" id="" style="height:70px;width:80px;">
    </div><b><i>PAL-ZONE</i></b></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li ><a href="#section1" >Welcome</a></li>
          <li ><a href="#section2" >CONTACT US</a></li>
          
    </ul>
	<ul class="nav navbar-nav navbar-right">
	<li>      
	   <form class="form-inline" role="form" method="post">
    <div class="form-group" style="padding-top:12px">
      
      <input type="text" class="form-control" id="username" name="username" placeholder="Enter name" required>
    
	</div>
    <div class="form-group" style="padding-top:12px">
      
      <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
   
   </div>
    <div class="form-group" style="padding-top:12px">
      

 <input type="submit" id="login" name="login" class="btn btn-info active" value="Login" style="color:white;background:#006600;">
   
   </div>
    
  </form>
  <div >
  <!--<p style="color:white;float:left;"><input type="checkbox" > Remember Me</input></p>-->
 
 <p style="font-size:16px;text-decoration:underline;float:left"><a href="#forgotpassword" data-toggle="modal" style="color:white;background:"><strong>Forgot Password</strong></a> </p>
	
	</div>   
	   </li>
	   
       <li><a href="home.php" style="color:#fff;padding-top:20px;"><span class="glyphicon glyphicon-home"></span>&nbsp;GO BACK TO USER LOGIN</a>
	</li>  
	  </ul>
	  </div>
    
  </div>
</nav>    
</br>
</br>
<div id="section1" class="container-fluid">
<div class="row">
<div class="col-lg-12 text-center">
                    <h2 style="color:#006400">WELCOME</h2>
                   <img src="bg.png" alt="logo" id="" style="height:380px;width:1300px;">
                </div>
				</div>
  <p></p>
  <p></p>
</div>
<div id="section2" class="container-fluid">
  
   <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 style="color:#006400">Contact US</h2>
                    <hr class="star-primary">
                </div>
               
            </div>
            <br/>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2" id="contact-div">
                    <form id="contact-form">
						
                                <input type="text" class="form-control" style="width:70%; margin-left:15%" placeholder="Name (Required)" id="name" name="name" required />
                                <p class="help-block text-danger"></p>
                                
                                <input type="email" class="form-control" style="width:70%; margin-left:15%" placeholder="Email Address (Required)" id="email" name="email" required />
                                <p class="help-block text-danger"></p>
                                
                                <input type="tel" class="form-control" style="width:70%; margin-left:15%" placeholder="Phone Number (Optional)" id="phone" name="phone" />
                                <p class="help-block text-danger"></p>
                                
                                <textarea rows="5" class="form-control" style="width:70%; margin-left:15%" placeholder="Message (Required)" id="message" name="message" required></textarea>
                                <p class="help-block text-danger"></p>
                                
								 <center><input type="submit" class="btn btn-success btn-md" value="submit"></center>
                        
                    </form>
                </div>
            </div>
        </div>
</div>

<footer class="container-fluid text-center">
  <p style="text-align:left">&copy;&nbsp;ALL RIGHTS RESERVED</p>
</footer>
			
			<div class="modal fade" id="loggedin" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#006600;height:80px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center" style="color:#009300;">Please wait...</h4>
        </div>
        <div class="modal-body">
          <p style="color:#A9A9A9;"><?php  echo "You have successfully logged in. Please wait, you will be redirected automatically.."; ?>
		  </p>
        </div>
				</div>
			</div>
			</div>
			<div class="modal fade" id="loginfailed" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#006600;height:80px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center" style="color:#ff0000;">Failed</h4>
        </div>
        <div class="modal-body">
          <p style="color:#A9A9A9;"><?php echo "Login failed. Please check your username and password..."?></p>
        </div>
				</div>
			</div>
			</div>
			
			
			<div class="modal fade" id="mailnotfound" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#006600;height:80px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center" style="color:#ff0000;">Failed</h4>
        </div>
        <div class="modal-body">
          <p style="color:#A9A9A9;"><?php echo "Email address not found. Please register first..."?></p>
        </div>
				</div>
			</div>
			</div>
			
			
			

<!-- Forgot Password-->
<div id="forgotpassword" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" >
	<div class="modal-dialog " style="color:#000000;" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color:#006600;height:80px;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color:#f5f5f0;"><span class="glyphicon glyphicon-log-in"></span> &nbsp;Forgot Password</h4>
      </div>
      <div class="modal-body">
	   <br/>
        <form class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					<div class="form-group">
					<label class="control-label col-sm-4" for="email">Email: </label>
						<div class="col-sm-6">
						<input type="email" class="form-control" name="femail" id="femail" placeholder="Enter Email">
						</div>
					</div>
					</br>
					</br>
					<div class="form-group">
						<div class="modal-footer" style="background-color: #034f84;height:70px;">
						<button type="submit" name="fsubmit" id="fsubmit" class="btn btn-primary btn-md" style="border-radius:5px;">Submit</button>
						</div>
		</div>
		</form>
      </div>
    </div>
	</div>
	</div>
<?php 




//Login part of the form
if ($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['login']))
{
	if (!empty($_POST['username'])and !empty($_POST['password']))
	{
			$user=test_input($_POST['username']);
			$pass=test_input($_POST['password']);
			$pass=md5($pass);	
		$query_admin_check=mysqli_query($conn,"SELECT * FROM `users` where `username`='$user' and `password`='$pass' and `type`='admin' and `block`='no';");
			 
			 //mysqli_num_rows($que_admin_check);
	$fetch_admin=mysqli_fetch_array($query_admin_check,MYSQLI_NUM);
	if(mysqli_num_rows($query_admin_check))
	{
		//session_start();
		$admin=$fetch_admin[0];
			 $_SESSION['admin']=$admin;
			 echo '<script>window.onload=function(){$(\'#loggedin\').modal();}</script>';
			
			echo "<meta content=\"2;".admin_main_page.".php\" http-equiv=\"refresh\">";
			
	}
	else
	{
		 echo '<script>window.onload=function(){$(\'#loginfailed\').modal();}</script>';
		 echo "<meta content=\"2;".admin_index.".php\" http-equiv=\"refresh\">";
	}
		}
	else
			echo "Please enter the fields for successful login";
}

// FORGOT PASSWORD
else 
{
	if(isset($_POST['fsubmit']) and !empty($_POST["femail"]) and $_SERVER["REQUEST_METHOD"] == "POST")
	{
		$result=mysqli_query($conn,"SELECT * FROM `users` WHERE `email`='".$_POST['femail']."';");
		if($result and mysqli_num_rows($result)==1)
		{
			//$acode='';
			//for($i = 0; $i < 10; $i++) {
			//	$acode .= mt_rand(0, 9);
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*';
			$charactersLength = strlen($characters);
			$randomString = '';
                        
		for ($i = 0; $i < 10; $i++) 
		{
        $randomString .= $characters[rand(0, $charactersLength - 1)];
		}
			}
			$email=test_input($_POST['femail']);
			$pass=$randomString;
			$password=md5($pass);
                          $message="Your new password is ".$pass." please change your password after you login";
			$result1=mysqli_query($conn,"UPDATE `users` SET `password`='$password' WHERE `email`='$email';");
			if($result1)
			{
				mail($email,"DO NOT REPLY TO THIS MESSAGE",$message,'donotreplyFrom: <www.palzone.com>');
			}
			else 
				echo '<script>window.onload=function(){$(\'#fail\').modal();}</script>';
		}
	
}	

		

?>
	
	
	</body>
</html>
