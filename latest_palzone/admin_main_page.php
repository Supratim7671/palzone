<?php
include"configuration.php";
?>
<?php
$userid=$_SESSION['admin'];
if (isset($userid))
{
	
?>
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
  //$userid=$_SESSION['admin'];
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

if (isset($_POST['delete_post']))
{
	$post_id=intval($_POST['post_id']);
	mysqli_query($conn,"DELETE  FROM `user_post` WHERE `post_id`='$post_id';");
}
if (isset($_POST['delete_comment']))
{
	$comment_id=intval($_POST['comment_id']);
	mysqli_query($conn,"DELETE  FROM `user_post_comment` WHERE `comment_id`='$comment_id';");
}
	$sql = mysqli_query($conn,"select * from `user_post` ;"); 
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

$sql2 = "SELECT * FROM `user_post` WHERE `priority`='Public'";
$sql2 .= "ORDER BY `post_id` desc limit $start ,$limit ";
//$query_post=mysqli_query($conn,"SELECT * FROM `user_post` WHERE `priority`='Public' ORDER BY `post_id`;");
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
	


echo '<div class="col-sm-9">

<div class="row" style="overflow-y:scroll;">
	  <div class=" " style="position:absolute;margin:0px;padding-bottom:0px;top:600%;left:5%;width:785px;" >
	  <h2 style="color:blue;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ALL PUBLIC POST</h2>
	  </br>
	  </br>
	  <ul class="pagination">'
	  .$pagination.
	  '</ul>
	  
	  <div class="well" style="width:885px;">
           <table cellspacing="0">';

//$query_post=mysqli_query($conn,"SELECT * FROM `user_post` WHERE `priority`='Public' ORDER BY `post_id`;");
while($post_data=mysqli_fetch_array($sql_query,MYSQLI_NUM))
{		
		$postid=$post_data[0];
		$post_user_id=$post_data[1];
		$post_txt=$post_data[2];
		//$post_img=$post_data[3];
		$que_user_info=mysqli_query($conn,"SELECT * from `users` where `user_id`='$post_user_id';");
		$que_user_pic=mysqli_query($conn,"SELECT * from `user_profile_pic` where `user_id`='$post_user_id';");
		$fetch_user_info=mysqli_fetch_array($que_user_info,MYSQLI_NUM);
		$fetch_user_pic=mysqli_fetch_array($que_user_pic,MYSQLI_NUM);
		$user_name=$fetch_user_info[1];
		$user_Email=$fetch_user_info[2];
		$user_gender=$fetch_user_info[4];
		$user_pic=$fetch_user_pic[3];
echo
'<tr style="width:25px;border-top:20px;">
<td></td>
<td></td>
<td></td>
<td></td>
</tr>';
echo
'<tr>
		<td colspan="4"align="right" style="border-top:outset; border-top-width:thin;"> 
			<!--<form method="post">  
				<input type="hidden" name="post_id" value="<?php echo $postid; ?>" >
				<input type="submit" name="delete_post" value=" " style="background-color:#FFFFFF; border:#FFFFFF; background-image:url(img/delete_post.gif); width:2.3%;"> 
			</form>-->
		
<form class="form-inline" role="form" method="post" >
  <div class="form-group has-success has-feedback" style="width:100px;">
    <label class="control-label" for="inputSuccess4"></label>
	<input type="hidden" name="post_id" value="'.$postid.'" style="width:100px;">
	<button type="submit" class="btn btn-default btn-sm " name="delete_post" id="delete_post">
 <span class="glyphicon glyphicon-trash"></span>
  </button>
  </div>
</form>
			
			</td>
			<td>  </td>
			<td> </td>
	</tr>';
    
  echo ' <tr>
		<td width="4%" style="padding-left:25px;" rowspan="2"> <img src="'.$user_pic.'" height="50" width="45">  </td>
		<td > </td>
		<td> </td>
		<td> </td>
	</tr>
	<tr>
		<td  style="padding:25px;"> <a href="#" style="text-transform:capitalize; text-decoration:none;" onMouseOver="post_name_underLine('.$postid.' )" onMouseOut="post_name_NounderLine('.$postid.' )" id="uname'.$postid.'"> '.$user_name.' </a>  </td>
		<td> </td>
		<td> </td>
		<td> </td>
	</tr>';

	$len=strlen($post_data[2]);
	if($len>0 && $len<=73)
	{
		$line1=substr($post_data[2],0,73);
	
	echo'<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;">'.$line1.' </td>
	</tr>';
	
	}
	else if($len>73 && $len<=146)
	{
		$line1=substr($post_data[2],0,73);
		$line2=substr($post_data[2],73,73);

echo'<tr >
		<td></td>
		<td colspan="3" style="padding-left:7;">'. $line1.' </td>	
	</tr>
	<tr >
		<td> </td>
		<td colspan="3" style="padding-left:7;">'.$line2.' </td>
	</tr>';
	}
	else if($len>146 && $len<=219)
	{
		$line1=substr($post_data[2],0,73);
		$line2=substr($post_data[2],73,73);
		$line3=substr($post_data[2],146,73);

	echo '<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;"> '.$line1.' </td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;">'.$line2.' </td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;">'.$line3.' </td>	
	</tr>';
	
	}
	else if($len>219 && $len<=292)
	{
		$line1=substr($post_data[2],0,73);
		$line2=substr($post_data[2],73,73);
		$line3=substr($post_data[2],146,73);
		$line4=substr($post_data[2],219,73);

	echo '<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;">'.$line1.' </td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;">'.$line2.' </td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;">'.$line3.' </td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;">'.$line4.' </td>	
	</tr>';
	
	
	
	}
	else if($len>292 && $len<=365)
	{
		$line1=substr($post_data[2],0,73);
		$line2=substr($post_data[2],73,73);
		$line3=substr($post_data[2],146,73);
		$line4=substr($post_data[2],219,73);
		$line5=substr($post_data[2],292,73);
	
	echo'<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;">'.$line1.' </td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;"> '.$line2.' </td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;">'.$line3.' </td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;">'.$line4.'</td>	
	</tr>
	
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;">'. $line5.' </td>	
	</tr>';
	
	
	}
	else if($len>365 && $len<=438)
	{
		$line1=substr($post_data[2],0,73);
		$line2=substr($post_data[2],73,73);
		$line3=substr($post_data[2],146,73);
		$line4=substr($post_data[2],219,73);
		$line5=substr($post_data[2],292,73);
		$line6=substr($post_data[2],365,73);
	echo
	'<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;">'.$line1.' </td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;">'.$line2.' </td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;">'.$line3.' </td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;">'.$line4.' </td>	
	</tr>
	
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;">'.$line5.' </td>	
	</tr>
	
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;">'.$line6.' </td>	
	</tr>';
	
	}
	else if($len>438 && $len<=511)
	{
		$line1=substr($post_data[2],0,73);
		$line2=substr($post_data[2],73,73);
		$line3=substr($post_data[2],146,73);
		$line4=substr($post_data[2],219,73);
		$line5=substr($post_data[2],292,73);
		$line6=substr($post_data[2],365,73);
		$line7=substr($post_data[2],438,73);
	echo
	'<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;">'.$line1.' </td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;">'.$line2.' </td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;">'.$line3.' </td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;">'.$line4.' </td>	
	</tr>
	
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;">'.$line5.' </td>	
	</tr>
	
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;">'.$line6.'</td>	
	</tr>
	
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;">'.$line7.' </td>	
	</tr>';
	
	
	}

		
	
    
    echo'<tr style="color:#6D84C4;">
		<td >   </td>
        <td style="padding-top:15;">
        
        </td>
        
        
		 
		 
        
		<td>   </td>
	</tr>';
	
    
			 	$que_comment=mysqli_query($conn,"select * from `user_post_comment` where `post_id` ='$postid' order by `comment_id`;");
			$count_comment=mysqli_num_rows($que_comment);
		$que_like=mysqli_query($conn,"select * from `user_post_status` where `post_id`='$postid';");
		$count_like=mysqli_num_rows($que_like);

echo
    '<tr>
		<td>   </td>
		<td  bgcolor="" style="width:10px;" colspan="1">&nbsp;&nbsp;&nbsp;&nbsp;<img src=""><span style="color:#6D84C4;">'.$count_like.'</span> likes. </td>
		 <td colspan="1" style="padding-top:;"> &nbsp; <input type="button" value="Comment('.$count_comment.')" style="background:#FFFFFF; border:#FFFFFF;font-size:15px; color:#6D84C4;" onMouseOver="Comment_underLine('.$postid.')" onMouseOut="Comment_NounderLine('.$postid.')" id="comment '.$postid.'"> &nbsp;&nbsp;&nbsp;&nbsp;</td>

		<td> </td>
	</tr>
	<tr>
		<td>   </td>
		<td></td>
		<td> </td>
		<td> </td>
	</tr>';
    
    
	while($comment_data=mysqli_fetch_array($que_comment,MYSQLI_NUM))
	{
		$comment_id=$comment_data[0];
		$comment_user_id=$comment_data[2];
		$que_user_info1=mysqli_query($conn,"select * from `users` where `user_id`='$comment_user_id';");
		$que_user_pic1=mysqli_query($conn,"select * from `user_profile_pic` where `user_id`='$comment_user_id';");
		$fetch_user_info1=mysqli_fetch_array($que_user_info1,MYSQLI_NUM);
		$fetch_user_pic1=mysqli_fetch_array($que_user_pic1,MYSQLI_NUM);
		$user_name1=$fetch_user_info1[1];
		$user_Email1=$fetch_user_info1[2];
		$user_gender1=$fetch_user_info1[4];
		$user_pic1=$fetch_user_pic1[3];



echo	'<tr>
		<td> </td>
		<td width="4%" bgcolor="#EDEFF4" style="padding-left:12;" rowspan="2">  <img src="'.$user_pic1.'" height="40" width="47">    </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" > <a href="../fb_view_profile/view_profile.php?id='.$comment_user_id.'" style="text-transform:capitalize; text-decoration:none; color:#3B5998;" onMouseOver="Comment_name_underLine('.$comment_id.')" onMouseOut="Comment_name_NounderLine('.$comment_id.')" id="cuname'.$comment_id.'"> '.$user_name1.'</a> </td>
        
        <td align="right" rowspan="2" bgcolor="#EDEFF4"> 
			<!--<form method="post">  
				<input type="hidden" name="comm_id" value="<?php echo $comment_id; ?>" >
				<input type="submit" name="delete_comment" value="  " style="background-color:#FFFFFF; border:#FFFFFF; background-image:url(img/delete_comment.gif); width:13; height:13;"> &nbsp;
			</form>--> 
			
<form class="form-inline" role="form" method="post" >
  <div class="form-group has-success has-feedback" style="width:100px;">
    <label class="control-label" for="inputSuccess4"></label>
	<input type="hidden" name="comment_id" value="'.$comment_id.'" style="width:100px;">
	<button type="submit" class="btn btn-default btn-sm " name="delete_comment" id="delete_comment">
 <span class="glyphicon glyphicon-trash"></span>
  </button>
  </div>
</form>

	   </td>
     </tr>';
     
     
	$clen=strlen($comment_data[3]);
	if($clen>0 && $clen<=60)
	{
		$cline1=substr($comment_data[3],0,60);
	
	echo'<tr>
		<td> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> '.$cline1.'</td>
	</tr>';
	
	}
	else if($clen>60 && $clen<=120)
	{
		$cline1=substr($comment_data[3],0,60);
		$cline2=substr($comment_data[3],60,60);
	
	echo'<tr>
		<td> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> '.$cline1.'</td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> '.$cline2.'</td>
	</tr>';
	
	}
	else if($clen>120 && $clen<=180)
	{
		$cline1=substr($comment_data[3],0,60);
		$cline2=substr($comment_data[3],60,60);
		$cline3=substr($comment_data[3],120,60);
	
	echo' <tr>
		<td> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">'.$cline1.'</td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> '.$cline2.'</td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">'.$cline3.'</td>
	</tr>';
	
	}
	else if($clen>180 && $clen<=240)
	{
		$cline1=substr($comment_data[3],0,60);
		$cline2=substr($comment_data[3],60,60);
		$cline3=substr($comment_data[3],120,60);
		$cline4=substr($comment_data[3],180,60);
	
	echo'<tr>
		<td> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> '.$cline1.'</td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> '.$cline2.'</td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> '.$cline3.'</td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> '.$cline4.'</td>
	</tr>';
	}
	else if($clen>240 && $clen<=300)
	{
		$cline1=substr($comment_data[3],0,60);
		$cline2=substr($comment_data[3],60,60);
		$cline3=substr($comment_data[3],120,60);
		$cline4=substr($comment_data[3],180,60);
		$cline5=substr($comment_data[3],240,60);
	echo'<tr>
		<td> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> '.$cline1.'</td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">'.$cline2.'</td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">'.$cline3.'</td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> '.$cline4.'</td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> '.$cline5.'</td>
	</tr>';
	
	}
	else if($clen>300 && $clen<=360)
	{
		$cline1=substr($comment_data[3],0,60);
		$cline2=substr($comment_data[3],60,60);
		$cline3=substr($comment_data[3],120,60);
		$cline4=substr($comment_data[3],180,60);
		$cline5=substr($comment_data[3],240,60);
		$cline6=substr($comment_data[3],300,60);
	echo
	'<tr>
		<td> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> '. $cline1.'</td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">'.$cline2.'</td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> '.$cline3.'</td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">'.$cline4.'</td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> '.$cline5.'</td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">  '.$cline6.'</td>
	</tr>';
	
	}
	else if($clen>360 && $clen<=420)
	{
		$cline1=substr($comment_data[3],0,60);
		$cline2=substr($comment_data[3],60,60);
		$cline3=substr($comment_data[3],120,60);
		$cline4=substr($comment_data[3],180,60);
		$cline5=substr($comment_data[3],240,60);
		$cline6=substr($comment_data[3],300,60);
		$cline7=substr($comment_data[3],360,60);
	
	echo '<tr>
		<td> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">'.$cline1.'</td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> '.$cline2.'</td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> '.$cline3.'</td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> '.$cline4.'</td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> '.$cline5.'</td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> '.$cline6.'</td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> '.$cline7.'</td>
	</tr>';
	
	}
	
	
	
	

	}


echo'<tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr>';

	
	
	

} 
echo
'</table>
</br>
</br>
</br>
</br>
    </div>
	</div>
	</div>	   
</div>';

?>


<?php
	}
	else
	{
		echo "<meta content=\"0;admin_index.php\" http-equiv=\"refresh\">";
	}
?>