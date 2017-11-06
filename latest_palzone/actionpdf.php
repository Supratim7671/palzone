<?php
//include "configuration.php";
//include "./template/header.php";
?>

<?php

	
	$name=$_POST['input20'];
	$petname=$_POST['input21'];
	$address=$_POST['input22'];
	$zodiac_sign=$_POST['input'];
	$date_of_birth=$_POST['date'];
	$fav_movies=$_POST['input1'];
	$fav_singer=$_POST['input23'];
	$siblings=$_POST['input24'];
	$fav_actor=$_POST['input25'];
	$fav_actoress=$_POST['input26'];
	$fav_food=$_POST['input2'];
	$fav_passtime=$_POST['input6'];
	$friends=$_POST['input5'];
	$fav_personality=$_POST['input4'];
	$fav_place=$_POST['input3'];
	$fav_sports=$_POST['input13'];
	$fav_sports_personality=$_POST['input12'];
	$fav_song=$_POST['input11'];
	$motto_in_life=$_POST['input10'];
	$happy_moments=$_POST['input9'];
	$embarrasing_moments=$_POST['input8'];
	$crush=$_POST['input7'];
	$places_visited=$_POST['input14'];
	$fear=$_POST['input15'];
	$strength=$_POST['input16'];
	$dont_like_at_all=$_POST['input17'];
	$say_love=$_POST['textarea3'];
	$say_college=$_POST['textarea2'];
	$say_to_me=$_POST['textarea'];
	//$rating=$_POST['rating'];


require('WriteHTML.php');

$pdf=new PDF_HTML();

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 18);

$pdf->AddPage();
//$pdf->Image('logo.png',18,13,33);
$pdf->SetFont('Arial','B',20);

$pdf->WriteHTML('<h1>Welcome To the Slambook</h1>');

$pdf->SetFont('Arial','B',12); 
$htmlTable='</br></br><table class=".table">
<tr>
<td></br>You are Known As</br></td> <td></br>'.$name.'</br></td><td></br>Loved One\'s Call You </br></td><td></br>'.$petname.'</br></td>
</tr>
<tr>
<td>Home Sweet Home</br></td><td></br>'.$address.'</br></td><td></br>Your Zodiac Sign</br></td><td></br>'.$zodiac_sign.'</br></td>
</tr>
<tr>
<td>You Landed Earth On</td><td>'.$date_of_birth.'</td><td>Favorate Movies</td><td>'.$fav_movies.'</td>
</tr>
<tr>
<td>Favorate Singers</td><td>'.$fav_singer.'</td><td>Your Siblings</td><td>'.$siblings.'</td>
</tr>
<tr>
<td>Favorate Actor</td><td>'.$fav_actor.'</td><td>Favorate Actoress</td><td>'.$fav_actoress.'</td>
</tr>
<tr>
<td>Your Ummiest Delight</td><td>'.$fav_food.'</td><td>Your Favorate Passtime</td><td>'.$fav_passtime.'</td>
</tr>
<tr>
<td>Your Companions</td><td>'.$friends.'</td><td>Favorate Personality</td><td>'.$fav_personality.'</td>
</tr>
<tr>
<td>Favorate Place</td><td>'.$fav_place.'</td><td>Favorate Sports</td><td>'.$fav_sports.'</td>
</tr>
<tr>
<td>Favorate Sports Personality</td><td>'.$fav_sports_personality.'</td><td>Favorate Song</td><td>'.$fav_song.'</td>
</tr>
<tr>
<td>Your Motto in Life</td><td>'.$motto_in_life.'</td>
<td>Most Happy Moments in Life</td><td>'.$happy_moments.'</td>
</tr>
<tr>
<td>Most Embarrasing Moments in your Life </td><td>'.$embarrasing_moments.'</td>
<td>Any Crush Till Now</td><td>'.$crush.'</td>
</tr>
<tr>
<td>Places You Have Visisted</td><td>'.$places_visited.'</td><td>Your Deepest Fear</td><td>'.$fear.'</td>
</tr>
<tr>
<td>Your Strength</td><td>'.$strength.'</td><td>You Dont Like It At all</td><td>'.$dont_like_at_all.'</td>
</tr>
<tr>
<td>Say Something About Love</td><td>'.$say_love.'</td><td>Say Something About College</td><td>'.$say_college.'</td>
</tr>
<tr>
<td>Say at least 2 things about me</td><td>'.$say_to_me.'</td><td>You have given Rating</td><td></td>
</tr>
</table>';
$pdf->setfillcolor(45,53,73);
$pdf->WriteHTML2("<br><br><br>$htmlTable");
$pdf->SetFont('Arial','B',12);
$pdf->Output(); 
?>