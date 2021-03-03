<?php
include ("db.php");

$pagename="Sign Up"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title

echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

//display a sign up form
echo "<form action=signup_process.php method=POST>";
echo "<table id='baskettable'>";

  echo "<tr>";
    echo "<td>*First Name</td>";
    echo "<td><input type=text name=r_firstname size=40></td>";
  echo "</tr>";
  echo "<tr>";
    echo "<td>*Surname</td>";
    echo "<td><input type=text name=r_surname size=40></td>";
  echo "</tr>";
  echo "<tr>";
    echo "<td>*Address</td>";
    echo "<td><input type=text name=r_address size=40></td>";
  echo "</tr>";
  echo "<tr>";
    echo "<td>*Post Code</td>";
    echo "<td><input type=text name=r_postcode size=40></td>";
  echo "</tr>";
  echo "<tr>";
    echo "<td>*Telephone No</td>";
    echo "<td><input type=text name=r_telno size=40></td>";
  echo "</tr>";
  echo "<tr>";
    echo "<td>*Email</td>";
    echo "<td><input type=text name=r_email size=40></td>";
  echo "</tr>";
  echo "<tr>";
    echo "<td>*Password</td>";
    echo "<td><input type=password name=r_password1 size=40></td>";
  echo "</tr>";
  echo "<tr>";
    echo "<td>*Confirm Password</td>";
    echo "<td><input type=password name=r_password2 size=40></td>";
  echo "</tr>";
  echo "<tr>";
    echo "<td><input type=submit value='Sign Up' id='submitbtn'></td>";
    echo "<td><input type=reset value='Clear Form' id='submitbtn'></td>";
  echo "</tr>";

echo "</table>";
echo "</form>";

include ("footfile.html"); //include head layout
echo "</body>";
?>