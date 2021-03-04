<?php

if (isset($_SESSION['userid'])) {
  echo "<p align=right>Logged in as: ".$_SESSION['fname']." ".$_SESSION['sname']."</p>";
}

?>