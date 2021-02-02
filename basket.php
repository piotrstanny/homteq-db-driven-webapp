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

  //create a new cell in the basket session array. Index this cell with the new product id.
  //Inside the cell store the required product quantity
  $_SESSION['basket'][$newprodid]=$reququantity;
  echo "<p><strong>1 item added</strong></p><br>";
} else {
  echo "<p><strong>Current basket unchanged</strong></p><br>";
};

echo "<table id='baskettable'>";
echo "<tr>
    <th>Product name</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Subtotal</th>
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
    <td>&pound".$arrayp['prodPrice']."</td>
    <td>".$value."</td>
    <td>&pound".$subtotal."</td>
    </tr>";
    $total += $subtotal;
  }
} else {
  echo "<p>Basket is empty";
}

echo "<tr>
    <th colspan=\"3\" style='text-align: right'>TOTAL:</th>
    <th>&pound".$total."</th>
    </tr>";

echo "</table>";
echo "<a href=clearbasket.php>CLEAR BASKET</a>";

include ("footfile.html"); //include head layout
echo "</body>";
?>