<?php
session_start();
include ("db.php");

$pagename="Purchase Order Confirmation"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title

echo "<body>";
include ("headfile.html"); //include header layout file
include ("detect_login.php"); // Display user if logged in
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

$currentDateTime = date('Y-m-d H:i:s');
// Insert new order into database
$sqlQuery = "insert into
            Orders (userId, orderDateTime, orderTotal, orderStatus)
            values (".$_SESSION['userid'].", '".$currentDateTime."', 0, 'Placed')
            ";
// Execute SQL query
$exeSQL = mysqli_query($conn, $sqlQuery);

// Check if execution was successful
if (mysqli_errno($conn) != 0) {
  echo "<p>There was an issue with placing the order!</p>";
} else {
  echo "<p>Your order has been placed successfully!</p>";

  $lastOrderSQL = "select max(orderNo) as lastOrder
            from Orders
            where userId = ".$_SESSION['userid'];
  // Execute or display error msg
  $exelastOrderSQL = mysqli_query($conn, $lastOrderSQL) or die(mysqli_error($conn));
  // Create array of records containing one value - the last order number
  $arrayOrderNo = mysqli_fetch_array($exelastOrderSQL);
  // Create local variable to assign the last order number to it
  $lastOrderNo = $arrayOrderNo['lastOrder'];
  echo "<br><p> Order Ref No: ".$lastOrderNo."</p>";
}

include ("footfile.html"); //include head layout
echo "</body>";
?>