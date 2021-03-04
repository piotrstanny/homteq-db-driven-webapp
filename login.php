<?php
session_start();
include ("db.php");

$pagename="Sign In"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title

echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page


//display a sign in form
echo "<form action=login_process.php method=POST>";
echo "<table id='baskettable'>";

  echo "<tr>";
    echo "<td>*Email</td>";
    echo "<td><input type=text name=r_email size=40></td>";
  echo "</tr>";
  echo "<tr>";
    echo "<td>*Password</td>";
    echo "<td><input type=password name=r_password1 size=40></td>";
  echo "</tr>";
  echo "<tr>";
    echo "<td><input type=reset value='Clear Form' id='submitbtn'></td>";
    echo "<td><input type=submit value='Sign In' id='submitbtn'></td>";
  echo "</tr>";

echo "</table>";
echo "</form>";

include ("footfile.html"); //include head layout
echo "</body>";
?>