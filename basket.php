<?php
session_start();
include ("db.php");

$pagename="Smart Basket"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title

echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

if (isset($_POST['h_prodid'])) {
  $newprodid = $_POST['h_prodid'];
  $reququantity = $_POST['p_quantity'];


  echo "<p>ID: ".$newprodid;
  echo "<p>Quantity: ".$reququantity;

  //create a new cell in the basket session array. Index this cell with the new product id.
  //Inside the cell store the required product quantity
  $_SESSION['basket'][$newprodid]=$reququantity;
  echo "<p>1 item added";
} else {
  echo "<p>Current basket unchanged";
};

echo "<table style='border: 0px'>";
echo "<tr>
    <th>Product name</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Subtotal</th>
    </tr>";

if (isset($_SESSION['basket'])) {
  foreach($_SESSION['basket'] as $index => $value) {
    
    echo "<p>Id: ".$index."quantity: ".$value;
  }
} else {
  echo "<p>Basket is empty";
}


echo "</table>";



include ("footfile.html"); //include head layout
echo "</body>";
?>