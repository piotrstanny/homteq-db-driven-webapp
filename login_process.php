<?php
include ("db.php");

$pagename="Signing In Results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title

echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

// Capture POST details as local variables
$loginEmail = $_POST['l_email'];
$loginPassword = $_POST['l_password'];

// Displaying values to confirm catching them correctly
echo "<p>Values entered:</p>";
echo "<p>- ".$loginEmail."</p>";
echo "<p>- ".$loginPassword."</p>";

include ("footfile.html"); //include head layout
echo "</body>";
?>