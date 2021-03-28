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
  $lastOrderNo = $arrayOrderNo['max(orderNo)'];
  echo "<br><p> Order Ref No: ".$lastOrderNo."</p>";

  echo "<table id='baskettable'>";
  echo "<tr>
    <th>Product name</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Subtotal</th>
    </tr>";

    // Make sure basket is not empty
  $total = 0;
  if (isset($_SESSION['basket'])) {
    // Iterate through basket items to insert records into Order Lines table
    foreach($_SESSION['basket'] as $index => $value) {

      // Retrieve product details from DB for the display of the confirmation
      $SQL="SELECT prodId, prodName, prodPrice 
            FROM Product 
            WHERE prodId =".$index;
      $exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
      $arrayp=mysqli_fetch_array($exeSQL);
      $subtotal = $value * $arrayp['prodPrice'];

      echo "<tr>
      <td>".$arrayp['prodName']."</td>
      <td>&pound".number_format($arrayp['prodPrice'],2)."</td>
      <td>".$value."</td>
      <td>&pound".number_format($subtotal, 2)."</td>";
      $total += $subtotal;

      // Insert Order Line into DB
      $orderLineSQL = "Insert into
                      Order_Line (orderNo, prodId, quantityOrdered, subTotal)
                      values (".$lastOrderNo.", ".$index.", ".$value.", ".$subtotal.")
                      ";
      $exeOrderLineSQL = mysqli_query($conn, $orderLineSQL) or die (mysqli_error($conn));
    }
  } else {
    echo "<p>Whoops! Empty order has been placed.</p>";
  }
  echo "<tr>
      <th colspan=\"3\" style='text-align: right'>TOTAL:</th>
      <th>&pound".number_format($total, 2)."</th>
      </tr>";

  echo "</table>";

  // Update the Order total value in DB
  $updateOrderSQL = "update Orders
                    set orderTotal = ".$total."
                    where orderNo = ".$lastOrderNo;
  $exeUpdateOrderSQL = mysqli_query($conn, $updateOrderSQL) or die (mysqli_error($conn));
}

include ("footfile.html"); //include head layout
echo "</body>";
?>