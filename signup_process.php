<?php
session_start();
include ("db.php");

$pagename="Sign Up Results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title

echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

// Create local variables and assign the values from POST
$fname = $_POST['r_firstname'];
$sname = $_POST['r_surname'];
$address = $_POST['r_address'];
$postcode = $_POST['r_postcode'];
$telno = $_POST['r_telno'];
$email = $_POST['r_email'];
$pwd1 = $_POST['r_password1'];
$pwd2 = $_POST['r_password2'];

// Displaying values to confirm catching them correctly
// echo "<p>Values entered:</p>";
// echo "<p>- ".$fname."</p>";
// echo "<p>- ".$sname."</p>";
// echo "<p>- ".$address."</p>";
// echo "<p>- ".$postcode."</p>";
// echo "<p>- ".$telno."</p>";
// echo "<p>- ".$email."</p>";
// echo "<p>- ".$pwd1."</p>";
// echo "<p>- ".$pwd2."</p>";

// Create regular expression variable
$reg = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";

// Validate that all of the fields have values
if (empty($fname) or empty($sname) or empty($address) or empty($postcode) or empty($telno) or empty($email) or empty($pwd1) or empty($pwd2)) 
{
  echo "<p><b>Sign up failed!</b></p>";
  echo "<p>All field must be filled.</p>";
}
elseif ($pwd1 != $pwd2)
{
  echo "<p><b>Sign up failed!</b></p>";
  echo "<p>Ensure you enter the same password twice.</p>";
}
elseif (!preg_match($reg, $email))
{
  echo "<p><b>Sign up failed!</b></p>";
  echo "<p>Ensure you enter correct email address.</p>";
}
else
{
  $SQL = "insert into
  Users (userType, userFName, userSName, userAddress, userPostCode, userTelNo, userEmail, userPassword)
  values ('C', '".$fname."', '".$sname."', '".$address."', '".$postcode."', '".$telno."', '".$email."', '".$pwd1."')";

  $exeSQL = mysqli_query($conn, $SQL) or die (mysqli_error($conn));
  if (mysqli_errno($conn) == 0)
  {
    echo "<p><b>Sign up successful!</b></p>";
    echo "<p>Your Homteq account has been created</p>";
  }
  else
  {
    if (mysqli_errno($conn) == 1062)
    {
      echo "<p><b>Sign up failed!</b></p>";
      // echo "<p>Error code: ".mysqli_errno($conn)."</p>";
      echo "<p>Account with this email already exists!</p>";
    }
    
  }

}


include ("footfile.html"); //include head layout
echo "</body>";
?>