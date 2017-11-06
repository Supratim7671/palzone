<html lang="en" ng-app="MyApp">
<?php  
  //session_start();
  //$conn=connect();
  $userid=$_SESSION['uid'];
  
  $query1=mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$userid';");
  $row1=mysqli_fetch_array($query1,MYSQLI_ASSOC);
  $name=$row1['username'];
 //require "requirement.php";
  ?>
 
  
  
  
<head>
  
  
  <title>COLLEGE NETWORK</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script>
   <?php 
 
if (isset($_POST['search']))
{
$sql="SELECT `name`,`email`,`birthdate` FROM `users`";
$result=mysqli_query($conn,$sql);
$emparray[]=array();
while($row=mysqli_fetch_assoc($result))
{
	$emparray[]=$row;
}
}

  ?>
//$records=$json_encode($emparray);
	var records = <?php echo  (json_encode($emparray)); ?>;
	var app=angular.module('myApp',[]);
  app.controller('UserController',function($scope)
  {
	  $scope.Members=records;
	  
	  }
		  
		  );
 
  </script>
  <style>    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #2E8B57;
      color: white;
      padding: 15px;
	  position: fixed;
    }
  </style>
  
</head>

<body style="position:relative" data-spy="scroll" data-target=".navbar-fixed-top"  >

<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#006600;">
  <div class="container-fluid">
    <div class="navbar-header" >
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
       <a class="navbar-brand" href="#" style="color:solid-green;;">
	<div style="float: left;">
        <img src="logo.png" alt="logo" id="" style="height:40px;width:80px;">
    </div><b><i>PAL-ZONE</i></b></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="main_page.php">Home</a></li>
         
		 <li><a href="#">LEADERBOARD</a></li>
		 <li><a href="#">Notification</a></li>
	
		
	  </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group input-group" ng-controller="UserController">
          <input type="text" class="form-control" placeholder="Search.." ng-model="mysearch.$" >
		 <div >
		 <tr ng-repeat="member in Members|filter:mysearch">
			
			<td bgcolor="#FFFFFF" style="padding-left:5;" id=""> <a href="">  <img src="" style="height:70; width:70;"> </a> </td>
			
			<td width="500" bgcolor="#FFFFFF" id=""> <a href="" style=" text-decoration:none; text-transform:capitalize; color:#3B5998;" id=""> {{member.username}}			
			</a></td>
			
				  
			</tr>
		 </div>
          <span class="input-group-btn">
            <button class="btn btn-default" type="button" name="search">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>        
        </div>
      </form>
	  
      <ul class="nav navbar-nav navbar-right">
       
  
  
		<li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo "$name";?></a></li>
		
		<li class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" href="slampage.php"><span class="glyphicon glyphicon-wrench"></span>Settings
		<span class="caret"></span>
		</a>
		<ul class="dropdown-menu">
          <li><a href="#">Account Settings</a></li>
          <li><a href="#">Feedback</a></li>
          <li><a href="about.php">About</a></li> 
        </ul>
		</li>
		<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
	  </ul>

	  </div>
  </div>
</nav>
 
 </br>
  </br>
  </br>
  </br>
