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
    <div class="col-sm-3 well" >
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
$sql2 .= " order by `score` desc limit $start ,$limit ";
$sql_query = mysqli_query($conn,$sql2);

/* CREATE THE PAGINATION */
$targetpage = $_SERVER['PHP_SELF']; 
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


echo "<div class=\"col-sm-7\">";
echo "<div class=\"well\">";
echo '<p><h3 style=\"color:blue\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LEADERBOARD</h3></p>';
echo "</div>";
echo'<div class="table table-bordered">';
echo '<table class="table">
<thead>
<tr>
<th>USERNAME</th>
<th>SCORE</th>
<th>LEVEL</th>
</tr>
</thead>';

//$query=mysqli_query($conn,"SELECT * FROM `users` order by `score` desc limit $start,$limit;");
//$sql2 = "SELECT * FROM `users`";
//$sql2 .= "LIMIT $start,$limit ";
//$sql_query = mysqli_query($conn,$sql2);
while($row=mysqli_fetch_assoc($sql_query))
{
	$username=$row['username'];
	$score=$row['score'];
	$level=$row['level'];
echo '<tbody>';
echo '<tr>';
echo '<td>'.$username.'</td>';
echo '<td>'.$score.'</td>';
echo '<td>'.$level.'</td>';
echo'</tr>';
}
echo '</tbody>
</table>
</div>
<div class="pagination">
<ul class="pagination">'
 .$pagination;
echo'</ul>

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
       <?php
$query=mysqli_query($conn,"SELECT * FROM `users` WHERE `online`='yes' and `user_id`!='$userid';");
$count=mysqli_num_rows($query);

?>  
	  
       <p>ONLINE USERS (<?php echo $count;?>)</p>
<?php
//$fetch=mysqli_query($query,MYSQLI_NUM);
while($fetch=mysqli_fetch_array($query,MYSQLI_NUM))
{
	$online_user_id=$fetch[0];
$online_user_name=$fetch[1];
$query1=mysqli_query($conn,"SELECT * FROM `user_profile_pic` WHERE `user_id`='$online_user_id';");
$fetch1=mysqli_fetch_array($query1,MYSQLI_NUM);
$user_pic=$fetch1[3];
?>
	   <div class="row">
    	<div class="col-sm-1 col-sm-offset-1" style="padding:5px;" > <img src="<?php echo $user_pic;?>" height="40" width="35">  </div>
        <div class="col-sm-4 col-sm-offset-1"> <a href="" style="text-transform:capitalize; text-decoration:none; color:#003399;"> <?php echo $online_user_name;?> </a>   </div>
       
    </div>
<?php
}
?>   
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
	echo "<meta content=\"0;admin_index.php\" http-equiv=\"refresh\">";
?>