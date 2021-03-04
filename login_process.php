<?php
session_start();
include ("db.php");

$pagename="Login Results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title

echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

// Capture POST details as local variables
$loginEmail = $_POST['l_email'];
$loginPassword = $_POST['l_password'];

// Displaying values to confirm catching them correctly
// echo "<p>Values entered:</p>";
// echo "<p>- ".$loginEmail."</p>";
// echo "<p>- ".$loginPassword."</p>";

// Validate user input
if (empty($loginEmail) or empty($loginPassword))
{
  echo "<p><b>Log in failed!</b></p>";
  echo "<p>Login details entered are incorrect!<br>Try again.</p>";
  echo "<p>Try again: <a href='login.php'>Sign In</a></p>";
}
else
{
  $loginSQL = "SELECT *
              FROM Users
              WHERE userEmail='".$loginEmail."'";
  $exeLoginSQL = mysqli_query($conn, $loginSQL) or die (mysqli_error($conn));

  // Determine number of records retrieved by SQL query
  $noRecs = mysqli_num_rows($exeLoginSQL);

  if ($noRecs == 0) {
    echo "<p><b>Log in failed!</b></p>";
    echo "<p>Email address was not recognised.</p>";
    echo "<p>Try again: <a href='login.php'>Sign In</a></p>";
  }
  else {
    $userArray = mysqli_fetch_array($exeLoginSQL);
    if ($userArray['userPassword'] != $loginPassword) {
      echo "<p><b>Log in failed!</b></p>";
      echo "<p>The password was incorrect.</p>";
      echo "<p>Try again: <a href='login.php'>Sign In</a></p>";
    }
    else {
      echo "<p><b>Log in sucess!</b></p>";
      
      // Create variables for the current session user details
      $_SESSION['userid'] = $userArray['userId'];
      $_SESSION['fname'] = $userArray['userFName'];
      $_SESSION['sname'] = $userArray['userSName'];
      $_SESSION['usertype'] = $userArray['userType'];

      echo "<p>Welcome ".$_SESSION['fname']."!</p>";

      if ($_SESSION['usertype'] == "C") {
        echo "<p>Please continue shopping or finalise your order!</p>";
      }
    }
  }

}

include ("footfile.html"); //include head layout
echo "</body>";
?>