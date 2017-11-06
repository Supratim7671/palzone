<?php
include "configuration.php";
?>
<?php

if ($_SESSION['admin'])
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

	if (isset($_POST['save_question']))
	{	
		$quesid=test_input($_POST['quesid']);
		$question=test_input($_POST['question']);
		$opt1=test_input($_POST['opt1']);
		$opt2=test_input($_POST['opt2']);
		$opt3=test_input($_POST['opt3']);
		$opt4=test_input($_POST['opt4']);
		$answer=test_input($_POST['answer']);
		$level=test_input($_POST['level']);
		$cate=intval($_POST['category']);
		 
			if (mysqli_query($conn,"INSERT INTO `questions` (`qid`,`cid`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `level`) VALUES ('$quesid','$cate', '$question', '$opt1', '$opt2', '$opt3', '$opt4', '$answer', '$level');"))
			echo "Your question has been inserted successfully";
		else
			echo "Something went wrong";
		
	}
	
	if (isset($_POST['save_category']))
	{
		$category=test_input($_POST['category_name']);
		mysqli_query($conn,"INSERT INTO `category` (`category`) VALUES ('$category');");
		
		$query=mysqli_query($conn,"SELECT * FROM `users`;");
		while($result=mysqli_fetch_array($query,MYSQLI_NUM))
		{	$message="A NEW CATEGORY WAS INTRODUCED IN THE QUIZ PORTAL";
			$userid=$result[0];
			mysqli_query($conn,"INSERT INTO `user_notification` (`user_id`,`notification`) VALUES ('$userid','$message');");
		}
	}
	if (isset ($_POST['edit_question_no']))
	{
		$qid=test_input($_POST['qid']);
		$questionid=test_input($_POST['questionid']);
		mysqli_query($conn,"UPDATE `questions` SET `qid`='$questionid' WHERE `qid`='$qid';");
	}
	
	if (isset ($_POST['edit_question']))
	{
		$qid=test_input($_POST['qid']);
		$question=test_input($_POST['question']);
		mysqli_query($conn,"UPDATE `questions` SET `question`='$question' WHERE `qid`='$qid';");
	}
	if (isset ($_POST['edit_category']))
	{
		$qid=test_input($_POST['qid']);
		$categoryid=intval($_POST['categoryid']);
		mysqli_query($conn,"UPDATE `questions` SET `cid`='$categoryid' WHERE `qid`='$qid';");
	}
		
		if (isset ($_POST['edit_question_opt1']))
	{
		$qid=test_input($_POST['qid']);
		$questionopt1=test_input($_POST['questionopt1']);
		mysqli_query($conn,"UPDATE `questions` SET `opt1`='$questionopt1' WHERE `qid`='$qid';");
	}
	if (isset ($_POST['edit_question_opt2']))
	{
		$qid=test_input($_POST['qid']);
		$questionopt2=test_input($_POST['questionopt2']);
		mysqli_query($conn,"UPDATE `questions` SET `opt2`='$questionopt2' WHERE `qid`='$qid';");
	}
	if (isset ($_POST['edit_question_opt3']))
	{
		$qid=test_input($_POST['qid']);
		$questionopt3=test_input($_POST['questionopt3']);
		mysqli_query($conn,"UPDATE `questions` SET `opt3`='$questionopt3' WHERE `qid`='$qid';");
	}
	if (isset ($_POST['edit_question_opt4']))
	{
		$qid=test_input($_POST['qid']);
		$questionopt4=test_input($_POST['questionopt4']);
		mysqli_query($conn,"UPDATE `questions` SET `opt4`='$questionopt4' WHERE `qid`='$qid';");
	}
	if (isset ($_POST['edit_question_answer']))
	{
		$qid=test_input($_POST['qid']);
		$answer=test_input($_POST['answer']);
		mysqli_query($conn,"UPDATE `questions` SET `answer`='$answer' WHERE `qid`='$qid';");
	}
	
	if (isset($_POST['delete_question']))
	{
		$qid=$_POST['deleteid'];
		mysqli_query($conn,"DELETE FROM `questions` WHERE `qid`='$qid';");
		
	}
	
	 
$sql = mysqli_query($conn,"select * from `questions` ;"); 
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

$sql2 = "SELECT * FROM `questions`";
$sql2 .= " limit $start ,$limit ";
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
	
echo '<div class="col-sm-10">
<div class="well">
<button class="btn btn-primary btn-md" type="submit"  data-toggle="modal"  data-target="#categories">
ADD CATEGORY</button>
<button class="btn btn-primary btn-md" type="submit" style="float:right"  data-toggle="modal"  data-target="#question">
ADD QUESTION</button>
</div>
<div class="well">
<table class="table table-bordered">
<thead>
<tr>
<div>
<td>QNo.
<button style="float:right;" type="submit" class="btn btn-default btn-sm" name="" id="" data-toggle="modal" data-target="#modify_question_id">
 <span class="glyphicon glyphicon-pencil"></span> 
</button>
</div>
</td>
<td>CATEGORY
<button style="float:right;" type="submit" class="btn btn-default btn-sm" name="" id="" data-toggle="modal" data-target="#modify_category">
 <span class="glyphicon glyphicon-pencil"></span> 
</button>
</td>
<td>QUESTION
<button style="float:right;" type="submit" class="btn btn-default btn-sm" name="" id="" data-toggle="modal" data-target="#modify_question">
 <span class="glyphicon glyphicon-pencil"></span> 
</button>
</td>
<td>A
<button style="float:right;" type="submit" class="btn btn-default btn-sm" name="" id="" data-toggle="modal" data-target="#modify_question_opt1">
 <span class="glyphicon glyphicon-pencil"></span> 
</button>
</td>
<td>B
<button style="float:right;" type="submit" class="btn btn-default btn-sm" name="" id="" data-toggle="modal" data-target="#modify_question_opt2">
 <span class="glyphicon glyphicon-pencil"></span> 
</button>
</td>
<td>C
<button style="float:right;" type="submit" class="btn btn-default btn-sm" name="" id="" data-toggle="modal" data-target="#modify_question_opt3">
 <span class="glyphicon glyphicon-pencil"></span> 
</button>
</td>
<td>D
<button style="float:right;" type="submit" class="btn btn-default btn-sm" name="" id="" data-toggle="modal" data-target="#modify_question_opt4">
 <span class="glyphicon glyphicon-pencil"></span> 
</button>
</td>
<td>ANSWER
<button style="float:right" type="submit" class="btn btn-default btn-sm" name="" id="" data-toggle="modal" data-target="#modify_question_answer">
 <span class="glyphicon glyphicon-pencil"></span> 
</button>
</td>
<td>DELETE</td>
</tr>
<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
</thead>
<tbody>';

//$query=mysqli_query($conn,"SELECT * FROM `questions`;");
while($row=mysqli_fetch_array($sql_query,MYSQLI_NUM))
{
$qid=$row[0];
$cid=$row[1];
$question=$row[2];
$opt1=$row[3];
$opt2=$row[4];
$opt3=$row[5];	
$opt4=$row[6];
$answer=$row[7];
$query=mysqli_query($conn,"SELECT * FROM `category` where `cid`='$cid';");
$result=mysqli_fetch_assoc($query);
$category_name=$result['category'];
echo '<tr>';

echo '<td>' .$qid.'</td>';
echo'<td>'.$category_name.'</td>';
echo '<td>'.$question.'</td>';
echo'<td>'.$opt1.'</td>';
echo'<td>'.$opt2.'</td>';
echo '<td>' .$opt3.'</td>';
echo '<td>'.$opt4.'</td>';
echo'<td>'.$answer.'</td>';

echo '<td>

    <form class="form-inline" role="form" method="post" >
  <div class="form-group has-success has-feedback" style="width:100px;">
    <label class="control-label" for="inputSuccess4"></label>
	<input type="hidden" name="deleteid" value="'.$qid.'" style="width:100px;">
	<button type="submit" class="btn btn-default btn-sm" name="delete_question" id="delete_question">
 <span class="glyphicon glyphicon-trash"></span>
  </button>
  </div>
</form>

</td>
</tr>
</tbody>';
}
echo '</table>
</div>
<div class="pagination">
<ul class="pagination">'
 .$pagination.
'</ul>

</div>
</div>';
?>




<!-- Add Question-->
<div class="modal fade" id="question" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document" style="width:800px;">
    <div class="modal-content" >
      <div class="modal-header" style="background-color:#006600;height:80px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 style="color:#fff;"class="modal-title" id="myModalLabel">ADD QUESTION</h2>
      </div><!--modal header -->
	  <div class="modal-body">
				<form class="form"  action="" method="post">
				<div class="form-group">
				<label for="name">Q.No.</label></td><td><input id="quesid" type="number" class="form-control" name="quesid"  title="Enter The Question" placeholder="Enter The Question Number You Want To " required>
				</div>
				<div class="form-group">
				<label for="name">Question:</label></td><td><input id="question" type="text" class="form-control" name="question"  title="Enter The Question" placeholder="Enter The Question"required>
				</div><!-- NAME form group -->
					<div class="form-group">
				<label for="name">A:</label></td><td><input id="opt1" type="text" class="form-control" name="opt1" title="Enter the first Option " placeholder="Enter the first Option " required>
				</div>
				<div class="form-group">
				<label for="name">B:</label></td><td><input id="opt2" type="text" class="form-control" name="opt2" title="Enter the Second Option" placeholder="Enter the Second Option" required>
				</div>
				<div class="form-group">
				<label for="name">C:</label></td><td><input id="opt3" type="text" class="form-control" name="opt3" title="Enter the third Option" placeholder="Enter the third Option" required>
				</div>
				<div class="form-group">
				<label for="name">D:</label></td><td><input id="opt4" type="text" class="form-control" name="opt4" title="Enter the fourth Option" placeholder="Enter the fourth Option" required>
				</div>
				<div class="form-group">
				<label for="name">Correct ANSWER:</label></td><td><input id="answer" type="text" class="form-control" name="answer" title="Enter the correct answer" placeholder="Enter the correct answer" required>
				</div>
				<div class="form-group">
				<label for="name">Level:</label></td><td><input id="level" type="number" class="form-control" name="level" title="Enter The Level" placeholder="Enter The Level" required>
				</div>
				<div class="form-group">
					<label  for="year">Category : </label></td>
					</br>
						<div class="col-sm-2" style="color:#808080;">
						<select name="category" id="category" style="width:250%;border-radius:4px;">
								<option value="0" selected>Select...</option>
							<option value="1">C</option>
							<option value="2">C++</option>
							<option value="3">JAVA</option>
							<option value="4">PYTHON</option>
							<option value="5">BOOTSTRAP</option>
							<option value="6">JAVASCIPT</option>
							<option value="7">PHP</option>
						</select>
						</div>
					</div>
				
				</div><!-- CONFIRM Password form group -->
				<div class="modal-footer" style="background-color: #034f84;height:100px;">
				<p class="help-block" style="color:red"><strong> BY SUBMITTING YOUR ARE GOING TO ADD A New Question</strong> </p>
				<button type="submit" id="save_question" name="save_question" class="btn btn-primary btn-lg" style="color:white;background-color:red;">SAVE</button>
				</div><!-- modal footer"-->
		  </form><!-- form "-->
	  </div><!-- modal body"-->
	</div><!-- modal content "-->
</div>
<!-- Add Category-->
<div class="modal fade" id="categories" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#006600;height:80px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 style="color:#fff;"class="modal-title" id="myModalLabel">ADD Category</h2>
      </div><!--modal header -->
	  <div class="modal-body">
				<form class="form"  action="" method="post">
				<div class="form-group">
				<label for="name">Name of Category:</label></td><td><input id="category_name" type="text" class="form-control" name="category_name"  title="Enter Your Category Name" placeholder="Enter Your Category Name" required>
				</div><!-- NAME form group -->
					
				
				</div><!-- CONFIRM Password form group -->
				<div class="modal-footer" style="background-color: #034f84;height:100px;">
				<p class="help-block" style="color:red"><strong> BY SUBMITTING YOUR ARE GOING TO ADD A NEW CATEGORY</strong> </p>
				<button type="submit" id="save_category" name="save_category" class="btn btn-primary btn-lg" style="color:white;background-color:red;">SAVE</button>
				</div><!-- modal footer"-->
		  </form><!-- form "-->
	  </div><!-- modal body"-->
	</div><!-- modal content "-->
</div>

<!-- EDIT Question ID-->
<div class="modal fade" id="modify_question_id" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document" style="width:800px;">
    <div class="modal-content" >
      <div class="modal-header" style="background-color:#006600;height:80px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 style="color:#fff;"class="modal-title" id="myModalLabel">EDIT QUESTION NO</h2>
      </div><!--modal header -->
	  <div class="modal-body">
				<form class="form"  action="" method="post">
				<div class="form-group">
				<label for="name">Q.No.</label></td><td><input id="qid" type="number" class="form-control" name="qid"  title="Enter The Question" placeholder="Enter The Question Number You Want To Edit">
				</div>
				<div class="form-group">
				<label for="name">New Question No</label></td><td><input id="questionid" type="text" class="form-control" name="questionid"  title="Enter The Question" placeholder="Enter The Question No You Want To Change">
				</div><!-- NAME form group -->
					
				<!--<div class="form-group">
				<label for="name"></label></td><td>
				<input type="hidden" name="editqid" value="<?php echo $qid; ?>" style="width:100px;">
				</div>-->
				</div><!-- CONFIRM Password form group -->
				<div class="modal-footer" style="background-color: #034f84;height:100px;">
				<p class="help-block" style="color:red"><strong> BY SUBMITTING YOUR ARE GOING TO EDIT A NEW QUESTION NO</strong> </p>
				<button type="submit" id="edit_question" name="edit_question_no" class="btn btn-primary btn-lg" style="color:white;background-color:red;">SAVE</button>
				</div><!-- modal footer"-->
		  </form><!-- form "-->
	  </div><!-- modal body"-->
	</div><!-- modal content "-->
</div>
<!-- EDIT CATEGORY-->
<div class="modal fade" id="modify_category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document" style="width:800px;">
    <div class="modal-content" >
      <div class="modal-header" style="background-color:#006600;height:80px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 style="color:#fff;"class="modal-title" id="myModalLabel">EDIT CATEGORY</h2>
      </div><!--modal header -->
	  <div class="modal-body">
				<form class="form"  action="" method="post">
				<div class="form-group">
				<label for="name">Q.No.</label></td><td><input id="qid" type="number" class="form-control" name="qid"  title="Enter The Question" placeholder="Enter The Question Number You Want To Edit">
				</div>
				<div class="form-group">
					<label  for="year">Category : </label></td>
					</br>
						<div class="col-sm-2" style="color:#808080;">
						<select name="categoryid" id="categoryid" style="width:250%;border-radius:4px;">
							<option value="0" selected>Select...</option>
							<option value="1">C</option>
							<option value="2">C++</option>
							<option value="3">JAVA</option>
							<option value="4">PYTHON</option>
							<option value="5">BOOTSTRAP</option>
							<option value="6">JAVASCIPT</option>
							<option value="7">PHP</option>
						</select>
						</div>
					</div><!-- NAME form group -->
					
				<div class="form-group">
				<label for="name"></label></td><td>
				<input type="hidden" name="editqid" value="<?php echo $qid; ?>" style="width:100px;">
				</div>
				</div><!-- CONFIRM Password form group -->
				<div class="modal-footer" style="background-color: #034f84;height:100px;">
				<p class="help-block" style="color:red"><strong> BY SUBMITTING YOUR ARE GOING TO EDIT A CATEGORY</strong> </p>
				<button type="submit" id="edit_category" name="edit_category" class="btn btn-primary btn-lg" style="color:white;background-color:red;">SAVE</button>
				</div><!-- modal footer"-->
		  </form><!-- form "-->
	  </div><!-- modal body"-->
	</div><!-- modal content "-->
</div>
<!-- EDIT Question -->
<div class="modal fade" id="modify_question" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document" style="width:800px;">
    <div class="modal-content" >
      <div class="modal-header" style="background-color:#006600;height:80px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 style="color:#fff;"class="modal-title" id="myModalLabel">EDIT QUESTION</h2>
      </div><!--modal header -->
	  <div class="modal-body">
				<form class="form"  action="" method="post">
				<div class="form-group">
				<label for="name">Q.No.</label></td><td><input id="qid" type="number" class="form-control" name="qid"  title="Enter The Question" placeholder="Enter The Question Number You Want To Edit">
				</div>
				<div class="form-group">
				<label for="name">Question</label></td><td><input id="question" type="text" class="form-control" name="question"  title="Enter The Question" placeholder="Enter The Question You Want To Change">
				</div><!-- NAME form group -->
					
				<div class="form-group">
				<label for="name"></label></td><td>
				<input type="hidden" name="editqid" value="<?php echo $qid; ?>" style="width:100px;">
				</div>
				</div><!-- CONFIRM Password form group -->
				<div class="modal-footer" style="background-color: #034f84;height:100px;">
				<p class="help-block" style="color:red"><strong> BY SUBMITTING YOUR ARE GOING TO EDIT A New QUESTION</strong> </p>
				<button type="submit" id="edit_question" name="edit_question" class="btn btn-primary btn-lg" style="color:white;background-color:red;">SAVE</button>
				</div><!-- modal footer"-->
		  </form><!-- form "-->
	  </div><!-- modal body"-->
	</div><!-- modal content "-->
</div>
<!-- EDIT FIRST   OPTION -->
<div class="modal fade" id="modify_question_opt1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document" style="width:800px;">
    <div class="modal-content" >
      <div class="modal-header" style="background-color:#006600;height:80px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 style="color:#fff;"class="modal-title" id="myModalLabel">EDIT OPTION1</h2>
      </div><!--modal header -->
	  <div class="modal-body">
				<form class="form"  action="" method="post">
				<div class="form-group">
				<label for="name">Q.No.</label></td><td><input id="qid" type="number" class="form-control" name="qid"  title="Enter The Question" placeholder="Enter The Question Number You Want To Edit">
				</div>
				<div class="form-group">
				<label for="name">OPTION 1</label></td><td><input id="questionopt1" type="text" class="form-control" name="questionopt1"  title="Enter The Question" placeholder="Enter The OPTION">
				</div><!-- NAME form group -->
					
				<!--<div class="form-group">
				<label for="name"></label></td><td>
				<input type="hidden" name="editqid" value="<?php echo $qid; ?>" style="width:100px;">
				</div>-->
				</div><!-- CONFIRM Password form group -->
				<div class="modal-footer" style="background-color: #034f84;height:100px;">
				<p class="help-block" style="color:red"><strong> BY SUBMITTING YOUR ARE GOING TO CHANGE THIS OPTION</strong> </p>
				<button type="submit" id="edit_question_opt1" name="edit_question_opt1" class="btn btn-primary btn-lg" style="color:white;background-color:red;">SAVE</button>
				</div><!-- modal footer"-->
		  </form><!-- form "-->
	  </div><!-- modal body"-->
	</div><!-- modal content "-->
</div>
<!-- EDIT SECOND OPTION-->
<div class="modal fade" id="modify_question_opt2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document" style="width:800px;">
    <div class="modal-content" >
      <div class="modal-header" style="background-color:#006600;height:80px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 style="color:#fff;"class="modal-title" id="myModalLabel">EDIT OPTION 2</h2>
      </div><!--modal header -->
	  <div class="modal-body">
				<form class="form"  action="" method="post">
				<div class="form-group">
				<label for="name">Q.No.</label></td><td><input id="qid" type="number" class="form-control" name="qid"  title="Enter The Question" placeholder="Enter The Question Number You Want To Edit">
				</div>
				<div class="form-group">
				<label for="name">OPTION 2</label></td><td><input id="questionopt2" type="text" class="form-control" name="questionopt2"  title="Enter The Question" placeholder="Enter The Option">
				</div><!-- NAME form group -->
					
				<div class="form-group">
				<label for="name"></label></td><td>
				<input type="hidden" name="editqid" value="<?php echo $qid; ?>" style="width:100px;">
				</div>
				</div><!-- CONFIRM Password form group -->
				<div class="modal-footer" style="background-color: #034f84;height:100px;">
				<p class="help-block" style="color:red"><strong> BY SUBMITTING YOUR ARE GOING TO CHANGE THIS OPTION</strong> </p>
				<button type="submit" id="edit_question_opt2" name="edit_question_opt2" class="btn btn-primary btn-lg" style="color:white;background-color:red;">SAVE</button>
				</div><!-- modal footer"-->
		  </form><!-- form "-->
	  </div><!-- modal body"-->
	</div><!-- modal content "-->
</div>
<!-- EDIT THIRD OPTION -->
<div class="modal fade" id="modify_question_opt3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document" style="width:800px;">
    <div class="modal-content" >
      <div class="modal-header" style="background-color:#006600;height:80px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 style="color:#fff;"class="modal-title" id="myModalLabel">EDIT OPTION 3</h2>
      </div><!--modal header -->
	  <div class="modal-body">
				<form class="form"  action="" method="post">
				<div class="form-group">
				<label for="name">Q.No.</label></td><td><input id="qid" type="number" class="form-control" name="qid"  title="Enter The Question" placeholder="Enter The Question Number You Want To Edit">
				</div>
				<div class="form-group">
				<label for="name">OPTION 3</label></td><td><input id="questionopt3" type="text" class="form-control" name="questionopt3"  title="Enter The Question" placeholder="Enter The Option">
				</div><!-- NAME form group -->
					
				<div class="form-group">
				<label for="name"></label></td><td>
				<input type="hidden" name="editqid" value="<?php echo $qid; ?>" style="width:100px;">
				</div>
				</div><!-- CONFIRM Password form group -->
				<div class="modal-footer" style="background-color: #034f84;height:100px;">
				<p class="help-block" style="color:red"><strong> BY SUBMITTING YOUR ARE GOING TO CHANGE THIS OPTION</strong> </p>
				<button type="submit" id="edit_question_opt3" name="edit_question_opt3" class="btn btn-primary btn-lg" style="color:white;background-color:red;">SAVE</button>
				</div><!-- modal footer"-->
		  </form><!-- form "-->
	  </div><!-- modal body"-->
	</div><!-- modal content "-->
</div>
<!-- EDIT OPTION 4-->
<div class="modal fade" id="modify_question_opt4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document" style="width:800px;">
    <div class="modal-content" >
      <div class="modal-header" style="background-color:#006600;height:80px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 style="color:#fff;"class="modal-title" id="myModalLabel">EDIT OPTION 4</h2>
      </div><!--modal header -->
	  <div class="modal-body">
				<form class="form"  action="" method="post">
				<div class="form-group">
				<label for="name">Q.No.</label></td><td><input id="qid" type="number" class="form-control" name="qid"  title="Enter The Question" placeholder="Enter The Question Number You Want To Edit">
				</div>
				<div class="form-group">
				<label for="name">OPTION 4</label></td><td><input id="questionopt4" type="text" class="form-control" name="questionopt4"  title="Enter The Question" placeholder="Enter The Option">
				</div><!-- NAME form group -->
					
				<!--<div class="form-group">
				<label for="name"></label></td><td>
				<input type="hidden" name="editqid" value="<?php echo $qid; ?>" style="width:100px;">
				</div>-->
				</div><!-- CONFIRM Password form group -->
				<div class="modal-footer" style="background-color: #034f84;height:100px;">
				<p class="help-block" style="color:red"><strong> BY SUBMITTING YOUR ARE GOING TO CHANGE THIS OPTION</strong> </p>
				<button type="submit" id="edit_question" name="edit_question_opt4" class="btn btn-primary btn-lg" style="color:white;background-color:red;">SAVE</button>
				</div><!-- modal footer"-->
		  </form><!-- form "-->
	  </div><!-- modal body"-->
	</div><!-- modal content "-->
</div>
<!--EDIT ANSWER -->
<div class="modal fade" id="modify_question_answer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document" style="width:800px;">
    <div class="modal-content" >
      <div class="modal-header" style="background-color:#006600;height:80px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 style="color:#fff;"class="modal-title" id="myModalLabel">EDIT ANSWER</h2>
      </div><!--modal header -->
	  <div class="modal-body">
				<form class="form"  action="" method="post">
				<div class="form-group">
				<label for="name">Q.No.</label></td><td><input id="qid" type="number" class="form-control" name="qid"  title="Enter The Question" placeholder="Enter The Question Number You Want To ADD">
				</div>
				<div class="form-group">
				<label for="name">ANSWER</label></td><td><input id="answer" type="text" class="form-control" name="answer"  title="Enter The Question" placeholder="Enter The Answer">
				</div><!-- NAME form group -->
					
				<div class="form-group">
				<label for="name"></label></td><td>
				<input type="hidden" name="editqid" value="<?php echo $qid; ?>" style="width:100px;">
				</div>
				</div><!-- CONFIRM Password form group -->
				<div class="modal-footer" style="background-color: #034f84;height:100px;">
				<p class="help-block" style="color:red"><strong> BY SUBMITTING YOUR ARE GOING TO CHANGE THIS ANSWER</strong> </p>
				<button type="submit" id="edit_question" name="edit_question_answer" class="btn btn-primary btn-lg" style="color:white;background-color:red;">SAVE</button>
				</div><!-- modal footer"-->
		  </form><!-- form "-->
	  </div><!-- modal body"-->
	</div><!-- modal content "-->
</div>




<?php
}
else
	echo "<meta content=\"0;admin_index.php\" http-equiv=\"refresh\">";
?>