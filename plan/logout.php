<?php
  session_start();
  $_SESSION["sessionUser"] = FALSE;
  header("Location: login.php");
?>
