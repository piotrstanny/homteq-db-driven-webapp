<?php
session_start();
include ("db.php");

$pagename="Smart Basket"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title

echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page


// This checks whether there is a product selected to be removed.
if (isset($_POST['todelete_prodid'])) {
  //Remove item from the SESSION array
  $delprodid = $_POST['todelete_prodid'];
  unset($_SESSION['basket'][$delprodid]);
  echo "<p>1 item removed from the basket</p>";
};


// This checks whether there is a product to be added to the session, therefore to the basket.
if (isset($_POST['h_prodid'])) {
  $newprodid = $_POST['h_prodid'];
  $reququantity = $_POST['p_quantity'];
  //create a new cell in the basket session array. Index this cell with the new product id.
  //Inside the cell store the required product quantity
  $_SESSION['basket'][$newprodid]=$reququantity;
  echo "<p><strong>1 item added</strong></p>";
} else {
  echo "<p><strong>Current basket unchanged</strong></p>";
};

echo "<table id='baskettable'>";
echo "<tr>
    <th>Product name</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Subtotal</th>
    <th>Remove Item</th>
    </tr>";

$total = 0;
if (isset($_SESSION['basket'])) {
  foreach($_SESSION['basket'] as $index => $value) {
    $SQL="SELECT prodId, prodName, prodPrice FROM Product WHERE prodId =".$index;
    $exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
    $arrayp=mysqli_fetch_array($exeSQL);
    $subtotal = $value * $arrayp['prodPrice'];

    echo "<tr>
    <td>".$arrayp['prodName']."</td>
    <td>&pound".number_format($arrayp['prodPrice'],2)."</td>
    <td>".$value."</td>
    <td>&pound".number_format($subtotal, 2)."</td>
    <td>
    <form action=basket.php method=POST>";
    echo "<input type=submit name='submitbtn' value='REMOVE' id='submitbtn'>";
    echo "<input type=hidden name=todelete_prodid value=".$arrayp['prodId'].">";
    echo "</form>";
    echo "</tr>";
    $total += $subtotal;
  }
} else {
  echo "<p>Basket is empty";
}

echo "<tr>
    <th colspan=\"3\" style='text-align: right'>TOTAL:</th>
    <th>&pound".number_format($total, 2)."</th>
    <th></th>

    </tr>";

echo "</table>";
echo "<p><a href=clearbasket.php>CLEAR BASKET</a></p>";

echo "<p>New Homteq customers: <a href=signup.php>Sign Up</a></p>";
echo "<p>Returning Homteq customers: <a href=login.php>Log In</a></p>";

include ("footfile.html"); //include head layout
echo "</body>";
?>