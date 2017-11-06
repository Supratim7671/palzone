<!DOCTYPE html>
<?php

include 'configuration.php'; 
//include './template/header.php';

?>
<?php
$userid=$_SESSION['uid'];
$level=$_SESSION['level'];

if (isset($userid) and isset($level))
{
	if (isset($_POST['bt2']))
  {
	   
		//$more=intval($_POST['more']);
		//$timer=intval($_POST['timer']);
		//$less=intval($_POST['less']);
		$cateid=intval($_POST['cid']);
		//$_SESSION['less']=$less;
		//$_SESSION['more']=$more;
		//$_SESSION['less']=$timer;
		$_SESSION['categoryid']=$cateid;
	  echo "<meta content=\"0;main_page1.php\" http-equiv=\"refresh\">";
	  
  }
?>
<html lang="en" ng-app="myApp">
<?php  
  //session_start();
  //$userid=$_SESSION['uid'];
  $query1=mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$userid';");
  $row1=mysqli_fetch_array($query1,MYSQLI_ASSOC);
  $name=$row1['username'];
  ?>
  
<head>
  
  
  <title>PAL-ZONE</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./bootstrap_files/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.css">
  

  
  <script src="./app.js"></script>
 
	<script>
$(function(){
	$("#divid").autocomplete({
			source: function(request,response){
				$.getJSON("livesearch.php",{name:request.term},response);
			},
			minLength:2,
            create: function () {
                $(this).data('ui-autocomplete')._renderItem = function (ul, item) {
                    return $('<li class="name-list">')
                        .append(item.label)
                        .appendTo(ul);
				};
			},
			select: function( event, ui ) { 
			event.preventDefault();
				window.location.href = ui.item.id;
				},
			focus: function (event, ui) {
			   event.preventDefault();
			}
	});
});

</script>
	
  <style>    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #006400;
      color: white;
      padding: 15px;
    }
	
	#here{
		width:400px;
		height:300px;
		border:1px solid grey;
		display:none;
	}
	#here a{
		display:block;
		width:98%;
		padding:1%;
		font-size:20px;
		border-bottom:1px solid grey;
		
	}
	.badge{
   background:red;
   position:relative;
   top: -10px;
   left: -15px;

	}
	span.glyphicon-globe {
    font-size: 1.8em;
}	
	span.glyphicon-envelope {
    font-size: 1.8em;
}

  </style>
  
</head>

<body style="position:relative" data-spy="scroll" data-target=".navbar-fixed-top" >

<nav class="navbar navbar-inverse navbar-fixed-top" style="">
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
         
		 <li><a href="leaderboard.php">Leaderboard</a></li>
		   	<?php
				$query=mysqli_query($conn,"SELECT * FROM `user_notification` WHERE `user_id`='$userid';");
				$result=mysqli_fetch_array($query,MYSQLI_NUM);
				$count=mysqli_num_rows($query);
			?>
			<li id="refresh2"><a href="./notification.php"><big><span class="glyphicon glyphicon-globe"></big></span> <span class="badge"><?php echo $count;?></span></a></li>
	 <li><a href="./message.php"><span class="glyphicon glyphicon-envelope"></a></li>
	
	  </ul>
      <form class="navbar-form navbar-right" method="post" action="#">
        <div class="form-group input-group navbar-form navbar-right"  >
          <input type="text" name="divid" id="divid" class="form-control" placeholder="Search.." >
         
		<!--  <span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span> -->       
        </div>
      </form>
	   <div id="here">
		  </div>
	  <!-- <div class="col-sm-2"  style="float:right; " ng-repeat="res in result" ng-show="showstartcard" >
        <div >
            <p>{{res.username}}</p>
            <p>{{res.email}}</p>
            <p><a href=""><cite></cite></a></p>
        </div>
            
                
    </div>-->
      <ul class="nav navbar-nav navbar-right">
       
  
  
		<li><a href="profile.php"><span class="glyphicon glyphicon-user"></span><?php echo "$name";?></a></li>
		
		<li class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-wrench"></span>Settings
		<span class="caret"></span>
		</a>
		<ul class="dropdown-menu">
          <li><a href="accountsettings.php">Account Settings</a></li>
		   <li><a href="submissionhistory.php">My Submissions</a></li>
          <li><a href="feedback.php">Feedback</a></li>
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

<script>
	function time_get()
	{
		d = new Date();
		mon = d.getMonth()+1;
		time = d.getDate()+"-"+mon+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes();
		Reg.fb_join_time.value=time;
		return Reg.fb_join_time.value;
	}
</script>

<div class="container-fluid" >    
  <div class="row">
    <div class="col-sm-2 well" >
      <div class="well well-lg">
        <p><a href="#"><?php echo $name;?></a></p>
       <?php
	//$query=mysqli_query($conn,"SELECT * FROM `users` where `user_id`='$userid';");
	//$fetch=mysqli_fetch_array($query,MYSQLI_NUM);
	//$userid=$fetch[0];
		//$userid=intval($_POST['userid']);
		
		$query=mysqli_query($conn,"SELECT * from `user_profile_pic` WHERE `user_id`='$userid';");
		$result=mysqli_fetch_assoc($query);
		$image_path=$result['image_path'];
		if ($image_path==null)
			$image_path="default.jpg";
	?> 
		<img class="img-circle" height="140" width="140"  src="<?php echo $image_path;?>" alt="D.P" />
		
		</br>
		</br>
<!--<input type="file" id="img" name="img" style="background-color:blue;float:right;" placeholder="Upload Your image">-->
	
	</div>
      <div class="well" style="">
          <p><a href="newsfeed.php"> News Feed</a></p>
	  <p><a href="timeline.php"> Timeline</a></p>
	   <p><a href="photos.php"> Gallery</a></p>
	    <p><a href="group_chat.php"> Group Discussion</a></p>
          <p><a href="usernotice.php"> Notice</a></p>
		  <p><a href="friends.php"> Friends </a></p>
		  
	  </div>
	  
	  
	  <div class="well" style="">
        
      
           <?php
	   $query100=mysqli_query($conn,"SELECT * FROM `user_notification` where `user_id`='$userid';");
	   if (mysqli_num_rows($query100)>0)
	   {
	   ?> 
      
      <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <p><strong>Hey!</strong></p>
        There are many notification pending in your account.
      </div>
	  <?php
	   }
	  ?>
	  <h4>These are the places where you can learn new things</h4>
      <p><a href="http://www.w3schools.com/" target="_blank">w3schools.com</a></p>
      <p><a href="http://www.tutorialspoint.com/" target="_blank">tutorialspoint.com</a></p>
      <p><a href="http://www.javatpoint.com/" target="_blank">javatpoint.com</a></p>
    </div>
</div>
  <?php
//$userid1=$_SESSION['uid'];
 
$sql = mysqli_query($conn,"SELECT * FROM  `user_question` where `uid`='$userid' ;"); 
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

$sql2 = "SELECT * FROM `user_question`";
$sql2 .= " WHERE `uid`='$userid'  limit $start ,$limit ";
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


echo "<div class=\"col-sm-8\">";
echo'<div class="row">
        <div class="col-sm-12">
          
            <div class="well">
     		  <p><center><h3 style="color:#436D9A;">SUBMISSION HISTORY</h3></center></p>
			   
     		  
           
          </div>
        </div>
      </div>
	  <div class="row">
	  
	  </div>';

//echo'<div class="table table-bordered">';
/*echo '<table class="table">
<thead>
<tr>
<th>Q.NO</th>
<th>QUESTION</th>
<th>CORRECT ANSWER</th>
<th>YOUR ANSWER</th>
<th>NO OF USERS GIVEN CORRECT ANSWER</th>
<th>NO OF USERS GIVEN WRONG ANSWER</th>
</tr>
</thead>';
*/
//$query=mysqli_query($conn,"SELECT * FROM `users` order by `score` desc limit $start,$limit;");
//$sql2 = "SELECT * FROM `users`";
//$sql2 .= "LIMIT $start,$limit ";
//$sql_query = mysqli_query($conn,$sql2);
//$question_no=1;
//$no_of_question=mysqli_num_rows($sql_query);

//while($row=mysqli_fetch_array($sql_query,MYSQLI_NUM) and ($question_no<=$no_of_question))
//{   
	
	//$qid=$row[1];
	//$answergiven=$row[3];
	//$query1=mysqli_query($conn,"SELECT * FROM `questions` where `qid`='$qid';");
	//$fetchquery1=mysqli_fetch_assoc($query1);
	//$user_question=$fetchquery1['question'];
	//$correct_answer=$fetchquery1['answer'];
	//$query2=mysqli_query($conn,"SELECT * FROM `user_question` where `qid`='$qid';");
	//$query3=mysqli_query($conn,"SELECT * FROM `user_question` where `qid`='$qid' and `answer`='$correct_answer';");
	//$no_of_attempts=mysqli_num_rows($query2);
	//$no_of_correct_answer=mysqli_num_rows($query3);
	//$no_of_wrong_answer=$no_of_attempts-$no_of_correct_answer;
	//$username=$row['username'];
	//$score=$row['score'];
	//$level=$row['level'];
//echo '<tbody>';
//echo '<tr>';
//echo '<td>'.$question_no.'</td>';
//echo '<td>'.$user_question.'</td>';
//echo '<td>'.$correct_answer.'</td>';
//echo '<td>'.$answergiven.'</td>';
//echo '<td>'.$no_of_correct_answer.'</td>';
//echo '<td>'.$no_of_wrong_answer.'</td>';
//echo'</tr>';
//++$question_no;
//}
//echo '</tbody>';
/*echo'</table>
</div>
<div class="pagination">
<ul class="pagination">'
 .$pagination.
 '</ul>

</div>*/
$query9=mysqli_query($conn,"SELECT * FROM `user_slambook` where `userid`='$userid';");


while($resultset=mysqli_fetch_assoc($query9))
{
$filename=$resultset['filename'];
echo'<div class="well">
<ul><li><a href="uploads/'.$filename.'" target="_blank">SEE THIS SLAMPAGE '.$filename.' </li></ul>
</div>';

}
echo'</div>';
?>

<!--<div class="col-sm-8">
    
      <div class="row">
        <div class="col-sm-12">
          
            <div class="well">
     		  <p><center><h3 style="color:#436D9A;">SUBMISSION HISTORY</h3></center></p>
			   
     		  
           
          </div>
        </div>
      </div>
	  <div class="row">
	  
	  </div>
	 
  	  
    </div>-->
	
   <div class="col-sm-2 well" >
  <!--    <div class="thumbnail" >
        <p>Upcoming Events:</p>
        <img src="paris.jpg" alt="Paris" width="400" height="300">
        <p><strong>CODE-VITA</strong></p>
        <p>Fri. 27 November 2015</p>
        <button class="btn btn-primary">Info</button>
      </div>-->      
      <div class="well" style="overflow-y:scroll;height:400px;" >
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
if ($user_pic==null)
	$user_pic="default.jpg";
?>
	   <div class="row">
    	<div class="col-sm-1 col-sm-offset-1" style="padding:5px;" > <img src="<?php echo $user_pic;?>" height="40" width="35">  </div>
        <div class="col-sm-4 col-sm-offset-1"> <a href="./message_reply.php?id=<?php echo $online_user_id?>" onMouseOver="post_name_underLine(<?php echo $online_user_id ?>)" onMouseOut="post_name_NounderLine(<?php echo $online_user_id ?>)"style="text-transform:capitalize; text-decoration:none; color:#003399;" target="_blank"> <?php echo $online_user_name;?> </a>   </div>
       
    </div>
<?php
}
?>   
   </div>
	</div>
  </div>
</div>
<script>
	$(document).ready(function(){update();});
function update() {
    $.get("response_ajax.php", function(data) {
	//	alert(data);
		
		var count=data;
       $("#refresh2").html("<a href=\"./notification.php\"><big><span class=\"glyphicon glyphicon-globe\"> </big></span><span class=\"badge\">"+count+"</span></a>");
    });
    window.setTimeout(update,5000);
}
	</script>
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
	echo "<meta content=\"0;home.php\" http-equiv=\"refresh\">";
?>