<html lang="en" ng-app="myApp">
<?php  
  //session_start();
  
 // $query1=mysqli_query($conn,"SELECT * FROM `college_network`.`users` WHERE `user_id`='$userid';");
  //$row1=mysqli_fetch_array($query1,MYSQLI_ASSOC);
  //$name=$row1['username'];

  ?>
  
<head>
  
  
  <title>PAL-ZONE ADMIN PANEL</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  

  
  <script src="./app.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0-beta.1/angular-cookies.min.js"></script>   
	
	
  <style>    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #2E8B57;
      color: white;
      padding: 15px;
    position:fixed-bottom
    }
  </style>
  
</head>

<body style="position:relative" data-spy="scroll" data-target=".navbar-fixed-top" >

<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#006600;">
  <div class="container-fluid">
    <div class="navbar-header" >
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"> <div style="float: left;">
        <img src="logo.png" alt="logo" id="" style="height:40px;width:80px;">
    </div><b><i>PAL-ZONE</i></b></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="admin_main_page.php">Home</a></li>
         	<?php
	$query=mysqli_query($conn,"SELECT * FROM `admin_notification`;");
	$result=mysqli_fetch_array($query,MYSQLI_NUM);
	$count=mysqli_num_rows($query);
?>
		 <li><a href="adminleaderboard.php">LEADERBOARD</a></li>
		 <li><a href="admin_notification.php">Notification<span class="badge"><?php echo $count;?></span></a></li>

	<li class=""><a href="quizportal.php">QUIZ PORTAL</a></li>
	  </ul>
      <form class="navbar-form navbar-right" role="search" method="get" action="https://www.google.com/search" target="_blank">
        <div class="form-group input-group"  >
          <input type="text" class="form-control" placeholder="Search.." name="q">
          <!--<span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span> -->       
        </div>
      </form>
	  <!-- <div class="col-sm-2"  style="float:right; " ng-repeat="res in result" ng-show="showstartcard" >
        <div >
            <p>{{res.username}}</p>
            <p>{{res.email}}</p>
            <p><a href=""><cite></cite></a></p>
        </div>>
            
                
    </div>--->
      <ul class="nav navbar-nav navbar-right">
       
  <?php
  $userid=$_SESSION['admin'];
   $query=mysqli_query($conn,"SELECT * FROM `users` where `user_id`='$userid';");
   $result=mysqli_fetch_array($query,MYSQLI_NUM);
   $name=$result[1];
  ?>
  
		<li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo $name;?></a></li>
		
		<li class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-wrench"></span>Settings
		<span class="caret"></span>
		</a>
		<ul class="dropdown-menu">
          <li><a href="admin_accountsettings.php">Account Settings</a></li>
          <li><a href="admin_feedback.php">Feedback</a></li>
        <li><a href="admin_logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
		</ul>
		</li>
		
	  </ul>

	  </div>
  </div>
</nav>
 
 </br>
  </br>
  </br>
  </br>
