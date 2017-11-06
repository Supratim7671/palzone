<!DOCTYPE html>
<?php
include 'configuration.php';
?>
<html>

<head>
  <title>Sign Up/Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./bootstrap_files/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
  body {
      position: relative; 
  }
  #section1 {padding-top:50px;color: #fff; background-color: #9ab8cd;}
  #section2 {padding-top:50px;color: #fff; background-color: #034f84;}
  #section3 {padding-top:50px;color: #fff; background-color: #9ab8cd;}
  #section41 {padding-top:50px;height:500px;color: #fff; background-color: #00bcd4;}
  #section42 {padding-top:50px;height:500px;color: #fff; background-color: #009688;}
    
	
    /* Set black background color, white text and some padding */
    footer {
      background-color: #2E8B57;
      color: white;
      padding: 15px;
    }
  .g-recaptcha{margin:10px;}
  </style>
</head>
<body  data-spy="scroll" data-target=".navbar-fixed-top" style="position:relative">


<script src='https://www.google.com/recaptcha/api.js'></script>

<nav class="navbar navbar-inverse navbar-fixed-top" style="">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
      </button> 
    <a class="navbar-brand" href="#" style="color:solid-green;;">
	<div style="float: left;">
        <img src="logo.png" alt="logo" id="" style="height:70px;width:80px;">
    </div><b><i>PAL-ZONE</i></b></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
			
          <li ><a href="#section1" >Welcome</a></li>
          <li ><a href="#section2" >About</a></li>
          <li ><a href="#section3" >CONTACT US</a></li>
    </ul>
	<ul class="nav navbar-nav navbar-right">
	<li>      
	   <form class="form-inline" role="form" method="post">
    <div class="form-group" style="padding-top:12px">
      
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
    
	</div>
    <div class="form-group" style="padding-top:12px">
      
      <input type="password" class="form-control" id="pass" name="pass" placeholder="Enter password" required>
   
   </div>
    <div class="form-group" style="padding-top:12px">
      

 <input type="submit" id="login" name="login" class="btn btn-info active" value="Login" style="">
   
   </div>
    
  </form>
  <div >
  <!--<p style="color:white;float:left;"><input type="checkbox" > Remember Me</input></p>-->
 
 <p style="font-size:16px;text-decoration:underline;float:left"><a href="#forgotpassword" data-toggle="modal" style=""><strong>Forgot Password</strong></a> </p>
	
	</div>   
	   </li>
	   <button type="button" id="reg" name="reg" class="btn btn-link" data-toggle="modal"  data-target="#register" style="padding-top:20px;"><span class="glyphicon glyphicon-user"></span>Sign Up </button>

 <!--       <li><a href="#register" data-toggle="modal" style="color:#fff;padding-top:20px;"><span class="glyphicon glyphicon-user"></span> Signup</a>
	</li>  -->
	  </ul>
	  </div>
    
  </div>
</nav>    

<div id="section1" class="container-fluid">
  <div class="row" id="banner">
<div class="col-lg-12 text-center" style="">
<h2 style="color:#006400">WELCOME</h2>
                  
				 
                   
		<img src="bg.png" alt="logo" id="" style="height:380px;width:600px;">
              
				</div>
				</div>
</div>
<div id="section2" class="container-fluid ">
 
  <div class="jumbotron" style="color:white;background:#034f84;"><center>
    <h1>About</h1> 
	</br>
    <p><b><i>PAL-ZONE </i></b>&nbsp;&nbsp;&nbsp; is a Social Community-cum-QUIZ Portal Website where one can benefit by 
	solving questions of different domains and interacting with their friends.</p>  
	</br>
	<p>The gist of this website is to make its users reach the <i>zenith</i> of computer programming and 
	<i>Palzone</i> their friends.</p>  
	</br>
	<p>It helps in a better interaction between witty people to help them become more intelligent 
	and help the newbies and geeks to develop their technical skills along with lots of fun..
	</p>  
	</br>
	<p><b>So !HURRY! UP GUYZ TO GET REGISTERED IN  <i>PAL-ZONE</i> </b></p>
	</br>
	
	</br>
	</center>
  </div>
  
</div>

<div id="section3" class="container-fluid">
 
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
                    <form id="contact-form" method="post">
						
                                <input type="text" class="form-control" style="width:70%; margin-left:15%" placeholder="Name (Required)" id="name" name="name" required />
                                <p class="help-block text-danger"></p>
                                
                                <input type="email" class="form-control" style="width:70%; margin-left:15%" placeholder="Email Address (Required)" id="email" name="email" required />
                                <p class="help-block text-danger"></p>
                                
                                <input type="tel" class="form-control" style="width:70%; margin-left:15%" placeholder="Phone Number (Optional)" id="phone" name="phone" />
                                <p class="help-block text-danger"></p>
                                
                                <textarea rows="5" class="form-control" style="width:70%; margin-left:15%" placeholder="Message (Required)" id="message" name="message" required></textarea>
                                <p class="help-block text-danger"></p>
                                
								 <center><input type="submit" name="contact" class="btn btn-success btn-lg" style="background:#034f84"value="submit"></center>
                        
                    </form>
                </div>
            </div>
        </div>

  </br>
  </br>
</div>

<footer class="container-fluid text-center">
  <p style="text-align:left">&copy;&nbsp;ALL RIGHTS RESERVED</p>
</footer>
<!-- For Successful registration-->
<div class="modal fade" id="suc" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#034f84;height:80px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center" style="color:#005300;">Success</h4>
        </div>
        <div class="modal-body">
          <p style="color:#A9A9A9;"><?php echo "You have been successfully registered. Please login using email and password."?></p>
        </div>
				</div>
			</div>
			</div>
			<!-- Failure in registration -->
			<div class="modal fade" id="fail" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#034f84;height:80px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center" style="color:#ff0000;">Failure</h4>
        </div>
        <div class="modal-body">
          <p><?php echo "PASSWORDS DID NOT MATCHED";?></p>
        </div>
				</div>
			</div>
			</div>
			<div class="modal fade" id="loggedin" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#034f84;height:80px;">
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
             <div class="modal fade" id="captchafailed" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#034f84;height:80px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center" style="color:#009300;">Please wait...</h4>
        </div>
        <div class="modal-body">
          <p style="color:red;"><?php  echo "You have not  selected the  given captcha box.Please select it and try again to register"; ?>
		  </p>
        </div>
				</div>
			</div>
			</div>
			<div class="modal fade" id="loginfailed" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#034f84;height:80px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center" style="color:#ff0000;">Failed</h4>
        </div>
        <div class="modal-body">
          <p style="color:#A9A9A9;"><?php echo "Login failed. Please check your e-mail and password...or YOU have been blocked by the Admins...Please contact with Admins.."?></p>
        </div>
				</div>
			</div>
			</div>
			
			
			<div class="modal fade" id="mailnotfound" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#034f84;height:80px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center" style="color:#ff0000;">Failed</h4>
        </div>
        <div class="modal-body">
          <p style="color:#A9A9A9;"><?php echo "Email address not found. Please register first..."?></p>
        </div>
				</div>
			</div>
			</div>
			
			<div class="modal fade" id="mailnotsend" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#034f84;height:80px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center" style="color:#ff0000;">Failed</h4>
        </div>
        <div class="modal-body">
          <p style="color:#A9A9A9;"><?php echo "PLEASE WAIT FOR SOME TIME...SOME ERROR MIGHT HAVE OCCURED"?></p>
        </div>
				</div>
			</div>
			</div>
			
			<div class="modal fade" id="mailfound" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#034f84;height:80px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center" style="color:#ff0000;">Success</h4>
        </div>
        <div class="modal-body">
          <p style="color:#A9A9A9;"><?php echo "MAIL HAVE BEEN SENT SUCCESSFULLY..PLEASE VISIT YOUR MAIL TO RETRIEVE YOUR PASSWORD..."?></p>
        </div>
				</div>
			</div>
			</div>
			
			<div class="modal fade" id="mailsend" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#034f84;height:80px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center" style="color:#ff0000;">Success</h4>
        </div>
        <div class="modal-body">
          <p style="color:#A9A9A9;"><?php echo "MAIL HAVE BEEN SENT SUCCESSFULLY...."?></p>
        </div>
				</div>
			</div>
			</div>
			
			
			
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="height:80px;background:#034f84;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 style="color:#fff;"class="modal-title" id="myModalLabel">Register</h2>
      </div><!--modal header -->
	  <div class="modal-body">
				<form class="form"  action="" method="post">
				<div class="form-group">
				<label for="name">NAME:</label></td><td><input id="name" type="text" class="form-control" name="name"   title="Please Enter letters with first character in Uppercase" required >
				</div><!-- NAME form group -->
				<div class="form-group">
				<label for="email">EMAIL:</label></td><td><input id="email" type="email" class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Please Enter a Valid Username" >
				
				
				
				</div><!-- Email form group -->
				
				<div class="form-group">
				<label for="password">PASSWORD:</label></td><td><input id="pass" type="password" class="form-control" name="pass" title="" required>
				</div><!-- Password form group -->
				<div class="form-group">
				<label for="confirmpassword">CONFIRM PASSWORD:</label></td><td><input id="cpass" type="password" class="form-control" name="cpass"  title="" required>
				</div>
                      <div class="g-recaptcha" data-sitekey="6Lc75CUTAAAAAAXer8I8NEpzdFtqBBFpVqTjqnrc"></div>
				
				<!-- CONFIRM Password form group -->
				<div class="modal-footer" style="background:#2E8B57">
				<p class="help-block" style=""><strong> BY REGISTERING YOU ACCEPT OUR TERM AND CONDITIONS</strong> </p>
				<button type="submit" id="regist" name="regist" class="btn btn-primary btn-md" style="">REGISTER</button>
				</div><!-- modal footer"-->
		  </form><!-- form "-->
	  </div><!-- modal body"-->
	</div><!-- modal content "-->
</div><!-- modal dialog"-->
</div><!-- modal fade"-->
<!-- Forgot Password-->
<div id="forgotpassword" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" >
	<div class="modal-dialog " style="color:#000000;" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color:#034f84;height:80px;">
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
						<div class="modal-footer" style="background-color: #2E8B57;height:70px;">
						<button type="submit" name="fsubmit" id="fsubmit" class="btn btn-primary btn-md" style="border-radius:5px;">Submit</button>
						</div>
		</div>
		</form>
      </div>
    </div>
	</div>
	</div>
<?php 

//Registration part of the form

if ($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['regist']) and isset($_POST['g-recaptcha-response']))
{
	if (!empty($_POST['name'])and !empty($_POST['email']) and !empty($_POST['pass']) and !empty($_POST['cpass']) )
{
	$name=test_input($_POST['name']);
$email=test_input($_POST['email']);
$password=test_input($_POST['pass']);
$cpassword=test_input($_POST['cpass']);
$password=md5($password);
$cpassword=md5($cpassword);
$captcha=$_POST['g-recaptcha-response'];
if (!$captcha)
{
echo '<script>window.onload=function(){$(\'#captchafailed\').modal();}</script>';
exit;
}
$secretkey="6Lc75CUTAAAAAJIhjTCCQHCyVP-nJZzzdW9eSMPp";
$ip=$_SERVER['REMOTE_ADDR'];
$response=file_get_contents( "https://www.google.com/recaptcha/api/siteverify?secret=".$secretkey."&response=".$captcha."&remoteip=".$ip);
$responsekeys=json_decode($response,true);

if (intval($responsekeys["success"]!==1))
echo '<h3 style="color:red;">YOU ARE NOT HUMAN</h3>';
$query="SELECT * FROM `users` WHERE `email`='$email';";
$result=mysqli_query($conn,$query);
if (strcmp($password,$cpassword)==0 and mysqli_num_rows($result)==0)
{
	$q="INSERT INTO `users`(`username`,`email`,`password`)VALUES('$name','$email','$password');";
if(mysqli_query($conn,$q))
{
	echo '<script>window.onload=function(){$(\'#suc\').modal();}</script>';
			$message="A NEW USER HAS REGISTERED NOW    ";
			
		mysqli_query($conn,"INSERT INTO `admin_notification` (`notification`) VALUES ('$message');");
		 //mysqli_query($conn,"INSERT INTO `user_profile_pic` (`user_id`,`image`,`image_path`) VALUES ('$userid','14-07-2016-1468521118.jpg','./images/14-07-2016-1468521118');");
              
			}
//else
		
		//echo '<script>window.onload=function(){$(\'#fail\').modal();}</script>';
	 
}	

else 
	echo '<script>window.onload=function(){$(\'#fail\').modal();}</script>';
}

else
	echo "Please fill up all the fields....";
//while($i<=7)
//{
//	mysqli_query($conn,"INSERT INTO `user_question`(`uid`,`qid`,`score`,`answer`,`cid`,`level`) VALUES ('$userid','','','','$cateid','1');");
	
//}	
}
//Login part of the form
else if ($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['login']))
{
	
	if (!empty($_POST['email'])and !empty($_POST['pass']))
	{
		$email=test_input($_POST['email']);
		$password=test_input($_POST['pass']);
		$password=md5($password);
		$query="SELECT * FROM `users` WHERE `email` = '$email' and `password` = '$password' and `block`='no';";
		$result=mysqli_query($conn,$query);
		if (mysqli_num_rows($result)==1)
		{
			 $row=mysqli_fetch_assoc($result);
				$userid=$row['user_id'];
				$level=$row['level'];
				//$level="l1";
				//echo "$userid";
				$_SESSION['uid']=$userid;
				$_SESSION['email']=$email;
				$_SESSION['level']=$level;
				mysqli_query($conn,"UPDATE `users` SET `online`='yes' where `user_id`='$userid'");
			 
			 echo '<script>window.onload=function(){$(\'#loggedin\').modal();}</script>';
			$message=$row['username']."     "."has logged in the website";
			mysqli_query($conn,"INSERT INTO `admin_notification` (`notification`) VALUES ('$message');");
            //mysqli_query($conn,"INSERT INTO `user_profile_pic` (`user_id`,`image`,`image_path`) VALUES ('$userid','14-07-2016-1468521118.jpg','./images/14-07-2016-1468521118');");                
			 echo "<meta content=\"2;".main_page.".php\" http-equiv=\"refresh\">";
			
			
		}
	else
	
	 echo '<script>window.onload=function(){$(\'#loginfailed\').modal();}</script>';;
	
	}
	else
			echo "Please enter the fields for succesfull login";
}

// FORGOT PASSWORD
else 
	if(isset($_POST['fsubmit']) and !empty($_POST["femail"]) and $_SERVER["REQUEST_METHOD"] == "POST")
	{
		$result=mysqli_query($conn,"SELECT * FROM `users` WHERE `email`='".$_POST['femail']."';");
		if($result and mysqli_num_rows($result)==1)
		{
			//$acode='';
			//for($i = 0; $i < 10; $i++) {
			//	$acode .= mt_rand(0, 9);
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
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
			//mysqli_query($conn,"UPDATE `users` SET `password`='$password' WHERE `email`='$email';");
			$result3=mail($email,"DO NOT REPLY TO THIS MESSAGE",$message,'donotreplyFrom: <www.palzone.freevar.com>');
			if($result3!=false)
			{
			//	echo'<script>alert("Is it going")</script>';
			//ini_set("SMTP","mail.google.com");

// Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.
//ini_set("smtp_port","25");

// Please specify the return address to use
//ini_set('sendmail_from', 'www.palzone.freevar.com');
			mysqli_query($conn,"UPDATE `users` SET `password`='$password' WHERE `email`='$email';");
			//if ($mailing)
			//die();
			
		//echo'<script>alert("Dont know")</script>';
				echo '<script>window.onload=function(){$(\'#mailfound\').modal();}</script>';
				echo "<meta content=\"0;home.php\" http-equiv=\"refresh\">";
			
			}
			else 
			{
				echo '<script>window.onload=function(){$(\'#mailnotfound\').modal();}</script>';
			echo "<meta content=\"0;home.php\" http-equiv=\"refresh\">";
		//echo'<script>alert("Not going")</script>';
		}
		}
	
	//CONTACT Us
	else
	{
		if (isset($_POST['contact']) and $_SERVER["REQUEST_METHOD"]=="POST")
		{if (!empty($_POST['name'])and !empty($_POST['email'])and !empty($_POST['phone']) and !empty($_POST['message']))	
		$name=test_input($_POST['name']);
		$email=test_input($_POST['email']);
		$phoneno=test_input($_POST['phone']);
		$message=test_input($_POST['message']);
	$to="supratimbhattacharya1@gmail.com";
	$subject=$name.''.$phoneno;
	$header="FROM :".$email;
	$result=mail($to,$subject,$message,$header);
	if ($result==true)
	{
		echo '<script>window.onload=function(){$(\'#mailsend\').modal();}</script>';
		echo "<meta content=\"0;home.php\" http-equiv=\"refresh\">";
	}
	else
		
		{	echo '<script>window.onload=function(){$(\'#mailnotsend\').modal();}</script>';
			echo "<meta content=\"0;home.php\" http-equiv=\"refresh\">";
	}
		}
	else
		echo "";
	}

	


?>
<!--	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
<!--<script type="text/javascript">
$(function() {
    $(this).bind("contextmenu", function(e) {
        e.preventDefault();
    });
}); 
</script>-->
<!--<script type="text/JavaScript"> 
    function killCopy(e){ return false } 
    function reEnable(){ return true } 
    document.onselectstart=new Function ("return false"); 
    if (window.sidebar)
    { 
        document.onmousedown=killCopy; 
        document.onclick=reEnable; 
    } 
</script>-->
	
	</body>
</html>
	