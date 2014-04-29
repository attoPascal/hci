<?php
  session_start();
  if(!$_SESSION["sessionUser"]) {
      header("Location: login.php");
      exit;
  }
    
$modulid = $_GET["modulid"];
?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8"> 
    <title>Persönlicher Plan</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles -->
    <link href="../css/ecurriculum.css" rel="stylesheet">
  </head>

  <body>
  
    <header class="page-header-ecurriculum">
      <div class="container">
	<div class="row">
	  <!-- Page Title -->
	  <div class="col-md-6"><h1 class="page-header-ecurriculum-title">Persönlicher Plan - Max Mustermann (a1234567)</div>
	  <!-- Page Logo -->
	  <div class="col-md-6">
	    <div class="page-header-ecurriculum-logo">
	      <a href="../"><img src="../img/logo-uni-wien.jpg" alt="logo"></a>
	    </div>
	  </div> 
	</div> <!-- /row -->
      </div> <!-- /container -->
    </header>
    
    <!-- Navbar -->
    <div class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="../plan/">Bachelor Medieninformatik</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
	    <li><a href="logout.php">
            <span class="glyphicon glyphicon-log-out"></span>
            Logout</a></li>
            <li><a href="../">
            <span class="glyphicon glyphicon-arrow-right"></span>
            eCurriculum</a></li>
          </ul>
        </div> <!--/.nav-collapse -->
      </div> <!-- /container -->
    </div>
    
    <!-- Content -->
    <div class="container">
      
    
<?php
  $plan = array();
  if (($handle = fopen("eCurriculum_Bachelor_Informatik_Plan.csv", "r")) !== FALSE) {
      $key = 0;    // Set the array key.
      while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
	  $count = count($data);  //get the total keys in row
	  //insert data to our array
	  for ($i=0; $i < $count; $i++) {
	      $plan[$key][$i] = $data[$i];
	  }
	  $key++;
      }
      fclose($handle);    //close file handle
  } 
  printModul($plan, $modulid);
?>

    </div> <!-- /container -->
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>

<?php
  function printModul($plan, $modulid) {
    $count = count($plan);
    $exists = 0;
    for ($i; $i < $count; $i++) {
      if (($plan[$i][6] == "Medieninformatik") AND ($plan[$i][0] == $modulid)) {
	echo "<h1>".$modulid." ".$plan[$i][1]." (".$plan[$i][3]." ECTS)</h1>";
	echo "<p>".$plan[$i][12]."</p><hr>";
	$exists = 1;
	$modulnote = $plan[$i][8];
	$modulerbracht = $plan[$i][9];
      }
      if ($plan[$i][11] == $modulid) { // wenn mehr Noten dann einen Zähler einfügen
	echo "<div class='row'>";
	echo "<div class='col-md-6'><table class='table table-bordered'><tr><td>";
	echo $plan[$i][1]." (".$plan[$i][3]." ECTS)";
	echo "</table></td></tr></div>";
	echo "<div class='col-md-2'><table class='table table-bordered'><tr><td>";
	echo "Note: ".$plan[$i][8];
	echo "</table></td></tr></div>";
	echo "<div class='col-md-4'><table class='table table-bordered'><tr><td>";
	if ($plan[$i][8] == "")
	  $antritte = 4;
	else {
	  $antritte = 3;
	}
	echo "Verbleibende Antritte: ".$antritte;
	echo "</table></td></tr></div>";
	echo "</div>";
	if ($antritte < 4) {
	  echo "<ul><li>";
	  echo $plan[$i][0].", erbracht am: ".$plan[$i][9].", Prüfer: Erika Musterfrau, Note: ".$plan[$i][8];
	  echo "</li></ul>";
	  echo "<hr>";
	}
      }
    }
    if ($exists == 0)
      echo "Das Modul mit der Modulnummer ".$modulid." existiert nicht.";
    else {
      echo "<dl class='dl-horizontal'>
      <dt>Abgeschlossen am:</dt><dd>".$modulerbracht."</dd>
      <dt>Note:</dt><dd>".$modulnote."</dd></dl>";
    }


  } 
?>