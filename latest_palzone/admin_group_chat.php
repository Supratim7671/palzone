<?php
include "configuration.php";
?>
<?php
if (isset($_SESSION['admin']))
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
<script>
	function chat_name_underLine(fid)
	{
		document.getElementById("uname"+fid).style.textDecoration = "underline";
	}
	function chat_name_NounderLine(fid)
	{
		document.getElementById("uname"+fid).style.textDecoration = "none"
	}
	function blank_chat_check()
{
	var chat_txt=document.chat_form.chat_txt.value;
	if (chat_txt=="")
	{
		return false;
	}
return true;
}
function chat_name_underLine(fid)
{
	document.getElementById("uname"+fid).style.textdDecoration="underline";
}
function chat_name_NounderLine(fid)
{
	document.getElementById("uname"+fid).style.Decoration="none";
}
function time_get()
{
	d=new Date();
	month=d.getMonth()+1;
	time = d.getDate()+"-"+mon+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes();
	Message_send.value=time;
}	
</script>
<?php

	if (isset($_POST['chat_button']))
{
	$chat_txt=$_POST['chat_txt'];
	$chat_time=$_POST['chat_time'];
	mysqli_query($conn,"INSERT INTO `group_chat`(`user_id`,`chat_txt`,`time`)VALUES('100001','$chat_txt','$chat_time');");
}
	if (isset($_POST['delete_chat']))
	{
		$chat_id=intval($_POST['chat_id']);
		mysqli_query($conn,"DELETE FROM `group_chat` where `chat_id`='$chat_id' OR `chat_id`='100001';");
	}
	
	$sql = mysqli_query($conn,"select * from `group_chat` ;"); 
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

$sql2 = "SELECT * FROM `group_chat`";
$sql2 .= "ORDER BY `chat_id` desc limit $start ,$limit ";
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
 <div class="row">
    <h3 style="color:green">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Group Discussion</h3>
	  
	  <div class="well well-lg" style="position:absolute;margin:20px;padding-bottom:35px;height:200px;width:850px">
	   <form method="post" name="chat_form" onSubmit="return blank_chat_check()">
	
	<div style="position:absolute; left:5%; top:25%;">
		<textarea style="height:100px; width:750px;padding:5px;" name="chat_txt" maxlength="511" placeholder="Tell Them Solution"></textarea>
	</div>	
   	<input type="hidden" name="chat_time">
     <div style="position:absolute;left:85%; top:80%; "> 
	 <button class="btn btn-primary btn-sm" style="left:85%; top:52%;" type="submit" value="" onClick="time_get()" name="chat_button" id="chat_button" onClick="time_get()">Send </button>
    </div>
	</form>
    
	</div> 
	 
	
	  </div>
	 
<div class="row"  style="">

 <div class="well " style="position:absolute;margin:0px;padding-bottom:0px;top:600%;left:5%;width:785px;" >
	  <div class="well" style="width:735px;">
	  <ul class="pagination">'
 .$pagination.
'</ul>
    <table border="0">';
	//	$query1=mysqli_query($conn,"SELECT * from `group_chat` ORDER BY `chat_id` desc limit $start,$limit;");
	while($chat_data=mysqli_fetch_array($sql_query,MYSQLI_NUM))
	{
		$chat_id=$chat_data[0];
		$fb_user_id=$chat_data[1];
		$chat_txt=$chat_data[2];
		$chat_time=$chat_data[3];
		$que_fb_user_info=mysqli_query($conn,"SELECT * from `users` where `user_id`='$fb_user_id';");
		$fb_user_data=mysqli_fetch_array($que_fb_user_info,MYSQLI_NUM);
		$user_name=$fb_user_data[1];
		$user_email=$fb_user_data[2];
		$user_gender=$fb_user_data[4];
		$que_fb_user_pic=mysqli_query($conn,"SELECT * from `user_profile_pic` where `user_id`='$fb_user_id';");
		$fetch_user_pic=mysqli_fetch_array($que_fb_user_pic,MYSQLI_NUM);
		$user_pic=$fetch_user_pic[3];

	echo '<tr>

	<td colspan="3"align="right" style="border-top:outset; border-top-width:thin;"> 
			<!--<form method="post">  
				<input type="hidden" name="chat_id" value="'.$chat_id.'" >
				<input type="submit" name="delete_chat" value=" " style="background-color:#FFFFFF; border:#FFFFFF; background-image:url(img/delete_post.gif); width:2%;"> 
			</form>-->
			
			
<form class="form-inline" role="form" method="post" >
  <div class="form-group has-success has-feedback" style="width:100px;">
    <label class="control-label" for="inputSuccess4"></label>
	<input type="hidden" name="chat_id" value="'.$chat_id.'" style="width:100px;">
	<button type="submit" class="btn btn-default btn-sm " name="delete_chat" id="delete_chat">
 <span class="glyphicon glyphicon-trash"></span>
  </button>
  </div>
</form>
     </td>
     <td>  </td>
			
     </tr>';
    
	echo '<tr>
    	<td style="padding-left:25;" rowspan="2"> <img src="'.$user_pic.'" height="60" width="55">  </td>
        <td colspan="2" style="padding:7;"> <a href="" style="text-transform:capitalize; text-decoration:none; color:#003399;" onMouseOver="chat_name_underLine('.$chat_id.')" onMouseOut="chat_name_NounderLine( '.$chat_id.' )" id="uname '.$chat_id.'"> '.$user_name.'  
		</a>  
		</td>
       
    </tr>';
   
    
    
	$len=strlen($chat_data[2]);
	if($len>0 && $len<=73)
	{
		$line1=substr($chat_data[2],0,73);
	
	echo '<tr>
		<td colspan="2" style="padding-left:7;"> '.$line1.'</td>
        <td> </td>
	</tr>';
	
	}
	else if($len>73 && $len<=146)
	{
		$line1=substr($chat_data[2],0,73);
		$line2=substr($chat_data[2],73,73);
	
	echo'<tr>
		<td colspan="2" style="padding-left:7;">'.$line1.'</td>	
        <td> </td>
        
	</tr>
	<tr>
    	<td> </td>
		<td colspan="2" style="padding-left:7;"> '.$line2.'</td>
        <td> </td>
	</tr>';
	
	}
	else if($len>146 && $len<=219)
	{
		$line1=substr($chat_data[2],0,73);
		$line2=substr($chat_data[2],73,73);
		$line3=substr($chat_data[2],146,73);
	
	echo '<tr>
		
		<td colspan="2" style="padding-left:7;"> '.$line1.' </td>	
        <td> </td>
	</tr>
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;">'. $line2.' </td>	
        <td> </td>
	</tr>
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;"> '.$line3.' </td>	
        <td> </td>
	</tr>';
	
	}
	else if($len>219 && $len<=292)
	{
		$line1=substr($chat_data[2],0,73);
		$line2=substr($chat_data[2],73,73);
		$line3=substr($chat_data[2],146,73);
		$line4=substr($chat_data[2],219,73);
	
	echo'<tr>
		<td colspan="2" style="padding-left:7;">'.$line1.' </td>	
        <td> </td>
	</tr>
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;">'.$line2.'</td>	
        <td> </td>
	</tr>
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;"> '.$line3.'  </td>	
        <td> </td>
	</tr>
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;">'.$line4.' </td>	
        <td> </td>
	</tr>';
	
	
	
	}
	else if($len>292 && $len<=365)
	{
		$line1=substr($chat_data[2],0,73);
		$line2=substr($chat_data[2],73,73);
		$line3=substr($chat_data[2],146,73);
		$line4=substr($chat_data[2],219,73);
		$line5=substr($chat_data[2],292,73);
	
	echo '<tr>
		<td colspan="2" style="padding-left:7;">'.$line1.'  </td>	
        <td> </td>
	</tr>
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;">'.$line2.' </td>	
        <td> </td>
	</tr>
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;">'. $line3.'</td>	
        <td> </td>
	</tr>
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;">'.$line4.' </td>	
        <td> </td>
	</tr>
	
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;">'.$line5.' </td>	
        <td> </td>
	</tr>';
	
	
	
	}
	else if($len>365 && $len<=438)
	{
		$line1=substr($chat_data[2],0,73);
		$line2=substr($chat_data[2],73,73);
		$line3=substr($chat_data[2],146,73);
		$line4=substr($chat_data[2],219,73);
		$line5=substr($chat_data[2],292,73);
		$line6=substr($chat_data[2],365,73);
	
	echo'<tr>
		<td colspan="2" style="padding-left:7;">'.$line1.' </td>	
        <td> </td>
	</tr>
	<tr>
		<td></td>
		<td colspan="2" style="padding-left:7;">'. $line2.'</td>	
        <td> </td>
	</tr>
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;">'.$line3.'</td>	
        <td> </td>
	</tr>
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;">'. $line4.' </td>	
        <td> </td>
	</tr>
	
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;">'.$line5.' </td>	
        <td> </td>
	</tr>
	
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;">'. $line6.' </td>
        <td> </td>	
	</tr>';
	
	
	}
	else if($len>438 && $len<=511)
	{
		$line1=substr($chat_data[2],0,73);
		$line2=substr($chat_data[2],73,73);
		$line3=substr($chat_data[2],146,73);
		$line4=substr($chat_data[2],219,73);
		$line5=substr($chat_data[2],292,73);
		$line6=substr($chat_data[2],365,73);
		$line7=substr($chat_data[2],438,73);
	
	echo'<tr>
		<td colspan="2" style="padding-left:7;">'.$line1.' </td>	
        <td> </td>
	</tr>
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;"> '. $line2.' </td>	
        <td> </td>
	</tr>
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;">'.$line3.' </td>	
        <td> </td>
	</tr>
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;">'. $line4.'  </td>	
        <td> </td>
	</tr>
	
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;">'.$line5.' </td>	
        <td> </td>
	</tr>
	
	<tr>
		<td> </td>
		<td colspan="2" style="padding-left:7;">'.$line6.' </td>	
        <td> </td>
	</tr>
	
	<tr>
    	<td> </td>
		<td colspan="2" style="padding-left:7;">'.$line7.'</td>	
        <td> </td>
	</tr>';
    
	}
    
    
  echo'  <tr>
    	<td> </td>
        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:#CCC;"> <?php echo $chat_time; ?> </span> </td>
        <td> </td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>';

	}

 echo' </table>
   </div>
</div>
</div>

   </div>';
   

?>

<?php
}
else
	
echo "<meta content=\"0;admin_index.php\" http-equiv=\"refresh\">";
?>