<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password,"992367");
//$db_name = "chat_db"; 

//$conn1 = new mysqli($servername,$username,$password,$db_name,true);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else
	
	//echo "Connection successfully done....Please wait while you are redirected...";
session_start();

function test_input($data)
{
$data=trim($data);

$data=stripslashes($data);
$data=htmlspecialchars($data);
$data=htmlspecialchars($data,ENT_QUOTES);
return $data;
}
function formatDate($date)
{
	return date('g:i a', strtotime($date));
}



?>