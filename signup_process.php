<?php
session_start();
include ("db.php");

$pagename="Sign Up Results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title

echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

// Create local variables and assign the values from POST
$fname = $_POST['r_firstname'];
$sname = $_POST['r_surname'];
$address = $_POST['r_address'];
$postcode = $_POST['r_postcode'];
$telno = $_POST['r_telno'];
$email = $_POST['r_email'];
$pwd1 = $_POST['r_password1'];
$pwd2 = $_POST['r_password2'];

echo "<p>Values entered:</p>";
echo "<p>- ".$fname."</p>";
echo "<p>- ".$sname."</p>";
echo "<p>- ".$address."</p>";
echo "<p>- ".$postcode."</p>";
echo "<p>- ".$telno."</p>";
echo "<p>- ".$email."</p>";
echo "<p>- ".$pwd1."</p>";
echo "<p>- ".$pwd2."</p>";

$SQL = "insert into
Users (userType, userFName, userSName, userAddress, userPostCode, userTelNo, userEmail, userPassword)
values ('C', '".$fname."', '".$sname."', '".$address."', '".$postcode."', '".$telno."', '".$email."', '".$pwd1."')";




include ("footfile.html"); //include head layout
echo "</body>";
?>