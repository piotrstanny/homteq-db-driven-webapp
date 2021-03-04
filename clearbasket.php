<?php
session_start();
include ("db.php");

$pagename="Clear Smart Basket"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title

echo "<body>";
include ("headfile.html"); //include header layout file
include ("detect_login.php"); // Display user if logged in

echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

unset($_SESSION['basket']);
echo "<p>Your basket has been cleared!</p>";

include ("footfile.html"); //include head layout
echo "</body>";
?>