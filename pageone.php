<?php
session_start();
include ("db.php");
$words="A Lovely Page";

echo "<link rel=stylesheet type=text/css href=lovelysheet.css>";
echo "<title>".$words."</title>";

include ("headfile.html");
echo "<h2>".$words."</h2>";

$this="select itemId, itemName, itemPicName, itemPrice from item";
$dothis=mysqli_query($this) or die (mysqli_error($conn));

while ($them=mysqli_fetch_array($dothis))
{
	echo "<p><a href=pagetwo.php?thenb=".$them['itemId'].">";
	echo $them['itemName'];
	echo "</a>";
	echo "<br>";
	echo "<img src=images/".$them['itemPicName'].">";
	echo "<br>£".$them['itemPrice'];
	echo "<br>";
	echo "<hr>";
}

include ("footfile.html");
?>

<!--##### PAGETWO.PHP ######-->
<?php
session_start();
include ("db.php");
$words="A Pretty Page";

echo "<link rel=stylesheet type=text/css href=lovelysheet.css>";
echo "<title>".$words"</title>";

include ("headfile.html");
echo "<h2>".$words."</h2>";

$thevalue=$_GET['thenb'];

$that="select * from item where itemId=".$thevalue;
$dothat=mysqli_query($that) or die (mysqli_error($conn));
$it=mysqli_fetch_array($dothat);

echo "<p><b>".$it['itemName']."</b>";
echo "<br><img src=images/".$it['itemPicName'].">";
echo "<br>".$it['itemDescrip'];
echo "<p>£ ".$it['itemPrice'];
echo "<p>Available: ".$it['itemStock'];

echo "<form action=pagethree.php method=post>";
echo "<p>select stuff: ";
echo "<select name=qu>";
for ($j=1; $j<=$it['itemStock']; $j++)
{
		echo "<option value=".$j.">".$j."</option>";	
}
echo "</select>";
echo "<input type=hidden name=nb value=".$thevalue.">";
echo "<input type=submit value='Add'>";
echo "</form>";

include ("footfile.html");
?>


<!--##### PAGETHREE.PHP ######-->
<?php
session_start();
include ("db.php");
$words="A Gorgeous Page";

echo "<link rel=stylesheet type=text/css href=lovelysheet.css>";
echo "<title>".$words"</title>";

include ("headfile.html");
echo "<h2>".$words."</h2>";

$to=0;
if (isset($_POST['nb']))
{
	$newitemid=$_POST['nb'];
	$thequ=$_POST['qu'];
	$_SESSION['cart'][$newitemid]=$thequ;
}

if (isset($_POST['delnb']))
{
	$delitemid=$_POST['delnb'];
	unset($_SESSION['cart'][$delitemid]);	
}

echo "<p><table border=1 cellpadding=5>";

if (isset($_SESSION['cart']))
{
	foreach($_SESSION['cart'] as $key => $value)
	{
		$getit="select * from Item where itemId=".$key;
		$runit=mysqli_query($getit) or die (mysqli_error($conn));
		$recs=mysqli_fetch_array($runit);
		echo "<tr>";
		echo "<td>".$recs['itemName']."</td>";
		echo "<td>£".number_format($recs['itemPrice'],2)."</td>";
		echo "<td>".$value."</td>";
		$subto=$recs['itemPrice'] * $value;
		$to=$to+$subto;
		echo "<td>£".number_format($subto,2)."</td>";

		echo "<form action=pagethree.php method=post>";
		echo "<td>";
		echo "<input type=submit value='Remove'>";	
		echo "</td>";
		echo "<input type=hidden name=delnb value=".$recs['itemId'].">";
		echo "</form>";
		echo "</tr>";
	}
}
else 
{
	echo "<p>Empty basket";
}		
echo "<tr><td colspan=4>Total: £."number_format($to,2)."</td></tr>";
echo "</table>";	

include ("footfile.html");
?>