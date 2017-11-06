<?php
include "configuration.php";
?>
<?php
if (isset($_SESSION['admin']))
{
?>
<html lang="en" ng-app="myApp">

  
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
<div class="container-fluid" >    
  <div class="row">
    <div class="col-sm-2 well" >
      <div class="well well-lg">
        <p><a href="#"><?php echo "<h5>Welcome Admin</h5>";?></a></p>
         <?php
	//$query=mysqli_query($conn,"SELECT * FROM `users` where `user_id`='$userid';");
	//$fetch=mysqli_fetch_array($query,MYSQLI_NUM);
	//$userid=$fetch[0];
		//$userid=intval($_POST['userid']);
		$query=mysqli_query($conn,"SELECT * from `user_profile_pic` WHERE `user_id`='$userid';");
		$result=mysqli_fetch_assoc($query);
		$image_path=$result['image_path'];
	?>
		<img class="img-circle" height="140" width="140"  src="<?php echo $image_path?>" alt="D.P" />
		
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


	static $flag=1,$rid,$gid;
	if (isset($_POST['block']))
	{
			$userid=intval($_POST['blockid']);
			$block="yes";
		if ($userid==3)
			echo'<h5 style="color:red;">YOU CANNOT BLOCK THIS USER SINCE HE IS A SUPER USER</h5>';
		else
		mysqli_query($conn,"UPDATE `users` SET `block`='$block' WHERE `user_id`='$userid';");
	}
	if (isset($_POST['unblock']))
	{
			$userid=intval($_POST['unblockid']);
			
		mysqli_query($conn,"UPDATE `users` SET `block`='no' WHERE `user_id`='$userid';");
	}
	if (isset($_POST['grant']))
	{
			$userid=intval($_POST['grantid']);
			$type="admin";
			//$gid=$userid;
		mysqli_query($conn,"UPDATE `users` SET `type`='$type' WHERE `user_id`='$userid';");
		//$query=mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$userid';");
		//$result=mysqli_fetch_array($query,MYSQLI_NUM);
		//$username=$result[1];
		//$password=$result[3];
		//$query1=mysqli_query($conn,"INSERT INTO `admin_info` ('username','password') VALUES ('$username','$password');");
		//$flag=0;
		//if ($flag==0)
	      //$grantid=$gid;
		$message="YOU HAVE BEEN PROVIDED THE ADMIN PRIVILEDGE ...PLEASE LOGIN WITH USERNAME AND PASSWORD TO admin_index.php";
		mysqli_query($conn,"INSERT INTO `user_notification` (`user_id`,`notification`) VALUES('$userid','$message');");
	
	
		
		
	}
	if (isset($_POST['revoke']))
		
	{
		$userid=intval($_POST['revokeid']);
		$type="player";
		//$query=mysqli_query($conn,"DELETE  FROM `admin_info` WHERE `user_id`='$userid';");
		//$rid=$userid;
		
		$flag=1;
		if ($userid==3)
			echo'<h5 style="color:red;">YOU CANNOT REVOKE ADMIN PRIVILEDGE FROM THIS USER...HE IS A SUPER USER</h5>';
		else
		{
               mysqli_query($conn,"UPDATE `users` SET `type`='$type' WHERE `user_id`='$userid';");
		
       
	//else
	
		//$revokeid=$rid;
		$message="YOUR ADMIN PRIVILEDGE HAS BEEN REVOKED...";
		mysqli_query($conn,"INSERT INTO `user_notification` (`user_id`,`notification`) VALUES('$userid','$message');");
	}
	
		
		//mysqli_query($conn,"UPDATE `users` SET `type`='$type' WHERE `user_id`='$userid';");
	}
	
		
	$sql = mysqli_query($conn,"select * from `users` ;"); 
$total = mysqli_num_rows($sql);

$adjacents = 3;
//your file name
$limit =10; //how many items to show per page
if(isset($_GET['page']))
{
    $page = $_GET['page'];
}else{
    $page = 0;
}

if($page){ 
    $start = ($page - 1) * $limit; //first item to display on this page
}else{
    $start = 0;
}
/* Setup page vars for display. */
    if ($page == 0) $page = 1; //if no page var is given, default to 1.
    $prev = $page - 1; //previous page is current page - 1
    $next = $page + 1; //next page is current page + 1
    $lastpage = ceil($total/$limit); //lastpage.
    $lpm1 = $lastpage - 1; //last page minus 1

$sql2 = "SELECT * FROM `users`";
$sql2 .= "limit $start ,$limit ";
$sql_query = mysqli_query($conn,$sql2);

$targetpage = $_SERVER['PHP_SELF']; 
/* CREATE THE PAGINATION */

$pagination = "";
if($lastpage > 1)
{ 
    $pagination .= "<ul class='pagination'>";
   // if ($page > $counter+1) {
     //   $pagination.= "<li><a href=\"$targetpage?page=$prev\"><</a></li>"; 
    //}

    if ($lastpage < 7 + ($adjacents * 2)) 
    { 
        for ($counter = 1; $counter <= $lastpage; $counter++)
        {
            if ($counter == $page)
                $pagination.= "<li><a href='#' class='active'>$counter</a></li>";
            else
                $pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>"; 
        }
    }
    elseif($lastpage > 5 + ($adjacents * 2)) //enough pages to hide some
    {
        //close to beginning; only hide later pages
        if($page < 1 + ($adjacents * 2)) 
        {
            for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<li><a href='#' class='active'>$counter</a></li>";
                else
                    $pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>"; 
            }
            $pagination.= "<li>...</li>";
            $pagination.= "<li><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
            $pagination.= "<li><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>"; 
        }
        //in middle; hide some front and some back
        elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
        {
            $pagination.= "<li><a href=\"$targetpage?page=1\">1</a></li>";
            $pagination.= "<li><a href=\"$targetpage?page=2\">2</a></li>";
            $pagination.= "<li>...</li>";
            for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<li><a href='#' class='active'>$counter</a></li>";
                else
                    $pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>"; 
            }
            $pagination.= "<li>...</li>";
            $pagination.= "<li><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
            $pagination.= "<li><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>"; 
        }
        //close to end; only hide early pages
        else
        {
            $pagination.= "<li><a href=\"$targetpage?page=1\">1</a></li>";
            $pagination.= "<li><a href=\"$targetpage?page=2\">2</a></li>";
            $pagination.= "<li>...</li>";
            for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; 
            $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<li><a href='#' class='active'>$counter</a></li>";
                else
                    $pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>"; 
            }
        }
    }

    //next button
    if ($page < $counter - 1) 
        $pagination.= "<li><a href=\"$targetpage?page=$next\">></a></li>";
    else
        $pagination.= "";
    $pagination.= "</ul>\n"; 
}


echo '<div class="col-sm-8">
<table class="table table-bordered">
<thead>
<tr>
<th>USER ID </th>
<th>USER NAME</th>
<th>EMAIL</th>
<th>BLOCK</th>
<th>ADMIN PRIVILEDGE</th>
</tr>
</thead>
<tbody>
<tr>';

//$query=mysqli_query($conn,"SELECT * FROM `users`;");
	 
while($row=mysqli_fetch_array($sql_query,MYSQLI_NUM))
{
	//static $i;
	$userid=$row[0];
         $username=$row[1];
	$email=$row[2];

echo '<td>' .$userid. '</td>';
echo '<td>' .$username.'</td>';
echo '<td>'.$email.'</td>';
//$i++;
if ($row[9]=="no")
{
echo '<td> 

<!--<button type="submit" class="btn btn-default btn-sm" name="block" id="block">
 <span class="glyphicon glyphicon-ban-circle"></span> BLOCK
  </button>--> 
  <form class="form-inline" role="form" method="post" >
  <div class="form-group has-success has-feedback" style="width:100px;">
    <label class="control-label" for="inputSuccess4"></label>
	<input type="hidden" name="blockid" value="'.$userid.'" style="width:100px;">
	<button type="submit" class="btn btn-default btn-sm" name="block" id="block">
 <span class="glyphicon glyphicon-ban-circle"></span> BLOCK
  </button>
  </div>
</form>
  
</td>';
}
else 
{
echo '<td>
<form class="form-inline" role="form" method="post" >
  <div class="form-group has-success has-feedback" style="width:100px;">
    <label class="control-label" for="inputSuccess4"></label>
	<input type="hidden" name="unblockid" value="'.$userid.'" style="width:100px;">
	<button type="submit" class="btn btn-default btn-sm" name="unblock" id="unblock">
 <span class="glyphicon glyphicon-ok-circle"></span>UNBLOCK
  </button>
  </div>
</form>
</td>';
}

if ($row[8]=="player")
{

echo '<td>
<form class="form-inline" role="form" method="post" >
  <div class="form-group has-success has-feedback" style="width:100px;">
    <label class="control-label" for="inputSuccess4"></label>
	<input type="hidden" name="grantid" value="'.$userid.'" style="width:100px;">
	<button type="submit" class="btn btn-default btn-sm" name="grant" id="grant"> GRANT
  </button>
  </div>
</form>
</td>';

} 
else
{

echo '<td>
<form class="form-inline" role="form" method="post" >
  <div class="form-group has-success has-feedback" style="width:100px;">
    <label class="control-label" for="inputSuccess4"></label>
	<input type="hidden" name="revokeid" value="'.$userid.'" style="width:100px;">
	<button type="submit" class="btn btn-default btn-sm" name="revoke" id="revoke"> REVOKE
  </button>
  </div>
</form>
</td>';

}
echo '</tr>
</tbody>';
}


echo '</table>
<div class="pagination">
<ul class="pagination">'
 .$pagination.
'</ul>

</div>
</div>';
?>

<div class="col-sm-2 well" >
      <div class="thumbnail" >
        <p>Upcoming Events:</p>
        <img src="paris.jpg" alt="Paris" width="400" height="300">
        <p><strong>CODE-VITA</strong></p>
        <p>Fri. 27 November 2015</p>
        <button class="btn btn-primary">Info</button>
      </div>      
      <div class="well" >
      <p>TOTAL VISITORS<p>
<script language="JavaScript">
  var data = '&r=' + escape(document.referrer)
	+ '&n=' + escape(navigator.userAgent)
	+ '&p=' + escape(navigator.userAgent)
	+ '&g=' + escape(document.location.href);

  if (navigator.userAgent.substring(0,1)>'3')
    data = data + '&sd=' + screen.colorDepth 
	+ '&sw=' + escape(screen.width+'x'+screen.height);

  document.write('<a href="http://www.1freecounter.com/stats.php?i=119153" target=\"_blank\" >');
  document.write('<img alt="Free Counter" border=0 hspace=0 '+'vspace=0 src="http://www.1freecounter.com/counter.php?i=119153' + data + '">');
  document.write('</a>');
  </script>
   </div>
	</div>
  </div>
</div>
<footer class="container-fluid text-center">
  <div>

  <p style="text-align:left">&copy;&nbsp;ALL RIGHTS RESERVED</p>
  </div>
</footer>

</body>
</html>
<?php
}
else
	echo "<meta content=\"0;admin_main_page.php\" http-equiv=\"refresh\">";

?>

				