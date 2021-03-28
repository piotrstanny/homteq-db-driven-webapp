<?php
include("db.php");
echo "<html>";
echo "<body>";
echo "<h1>Following Page</h1>";

$albumCode = $_GET['u_id'];

$SQL="
SELECT ac.copyCode, ac.purchaseDate, ac.condition, a.albumTitle, a.artist, a.yearOfRelease
FROM Album_Copy ac
JOIN Album a ON a.albumCode = ac.albumCode
AND a.albumCode = ".$albumCode;

$exeSQL=mysqli_query($conn, $SQL) or die(mysqli_error($conn));
$results=mysqli_fetch_array($exeSQL);

echo "<h2>Album details:</h2>";
echo "Artist: ".$results['a.artist']."||";
echo "Album Title: ".$results['a.albumTitle']."||";
echo "Year of release: ".$results['a.yearOfRelease']."||"; 

echo "<h2>Album copies:</h2>";
while ($results=mysqli_fetch_array($exeSQL)) {
  echo "<br><p>";

  echo "Copy Code: ".$results['ac.copyCode']."||";
  echo "Purchase Date: ".$results['ac.purchaseDate']."||"; 
  echo "Condition: ".$results['ac.condition']."||"; 
  echo "</p>";
}

echo "</body>";
echo "</html>";
?>


<!-- When clicking on a link located on initialpage.php, the user should be able to access followingpage.php which should read from the database table Album_Copy and display a list of items related to the one item selected by the user on initialpage.php. -->