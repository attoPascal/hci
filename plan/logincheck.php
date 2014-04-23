<?php
  session_start();
  if(!isset($_POST["login"])){
    header("Location: login.php");
  } else {
    if ($_POST["username"] != "a1234567")
      header("Location: login.php?message=1");
    else if ($_POST["passwort"] != "passwort")
      header("Location: login.php?message=2");
    else {
      $_SESSION["sessionUser"] = TRUE;
      header("Location: index.php");
    }
  }
?>
