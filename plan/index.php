<?php
  session_start();
  if(!$_SESSION["sessionUser"]) {
      header("Location: login.php");
      exit;
  }
?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
	  <div class="col-md-6"><h1 class="page-header-ecurriculum-title">Persönlicher Plan</h1></div>
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
            <li class="active"><a href="">Bachelor Medieninformatik</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Max Mustermann (a1234567)</a></li>
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
    <?php  ?>
      
    
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

printCalculatedGrades($plan);
echo "<div class='table-responsive'><table class='table table-bordered'>";

for ($i=1; $i < 7; $i++)
  printModulSemester($plan, $i);
  
echo "</table></div>";

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
  function printModulSemester($plan, $semester) {
    $count = count($plan);
    echo "<tr height='100px'>";
    echo "<th>".$semester.".&nbsp;Semester</th>";
      for ($i=1; $i < $count; $i++) {
	if (($plan[$i][6] == "Medieninformatik") AND ($plan[$i][7] == $semester)) {
	  if ($plan[$i][8] AND  $plan[$i][8] < 5) {
	    echo "<td width='18%' bgcolor=#e7e7e7>
	      <a href='modul.php?modulid=".$plan[$i][0]."'>".$plan[$i][1]."</a>\n  
	      <div align='right'>
	      <span class='label label-primary'>".$plan[$i][8]."</span>
	      <span class='glyphicon glyphicon-ok' title='abgeschlossen'></span>";
	    if (strtotime($plan[$i][9]) == strtotime("04/23/2014"))
	      echo "</br></br><span class='label label-default'>neue Note</span>";
	    echo "</div></td>";
	  }
	  else {
	    if ($plan[$i][10] == "teilweise") {
	      echo "<td width='18%' bgcolor=#f8f8f8>
	      <a href='modul.php?modulid=".$plan[$i][0]."'>".$plan[$i][1]."</a>\n 
	      <div align='right'>
	      <span class='glyphicon glyphicon-saved' title='teilweise abgeschlossen'></span>";
	      if (strtotime($plan[$i][9]) == strtotime("04/23/2014"))
		echo "</br></br><span class='label label-default'>neue Note</span>";
	      echo "</div></td>";
	    }
	    else
	      echo "<td width='18%'><a href='modul.php?modulid=".$plan[$i][0]."'>".$plan[$i][1]."</a></td>";
	  }
	}
    }
    echo "</tr>";
  } 
  
  function printCalculatedGrades($plan) {
    $count = count($plan);
    $noteects = 0;
    $gesamtects = 0;
    $notensum = 0;
    for ($note = 1; $note < 6; $note++) {
	  $noten[$note] = 0;
	}
    for ($i = 0; $i < $count; $i++) {
      if (($plan[$i][6] != "Medieninformatik") AND ($plan[$i][8] != "")) {
	$gesamtects = $gesamtects + $plan[$i][3];
	$noteects = $noteects + $plan[$i][3]*$plan[$i][8];
	for ($note = 1; $note < 6; $note++) {
	  if ($plan[$i][8] == $note) {
	    $noten[$note]++;
	    $notensum++;
	  }
	}
      }
    }
    $prozent = round($gesamtects/180*100, 2);
    $notendurchschnitt = round($noteects/$gesamtects, 2);
    echo "<div class='panel panel-default'>
    <div class='panel-heading'>
    <h4 class='panel-title'><a data-toggle='collapse' data-parent='#accordion' href='#statistik'><span class='glyphicon glyphicon-list'></span> Statistik</a></h4>
    </div>
    <div class='panel-collapse collapse' id='statistik'>
      <div class='panel-body'>
	<dl class='dl-horizontal'><dt>Notendurchschnitt:</dt><dd>".$notendurchschnitt."</dd><hr>";
    for ($note = 1; $note < 6; $note++) {
      echo "<dt>".$note.":</dt><dd>".$noten[$note]." von ".$notensum."</dd>";
    }
    echo "</dl>
      </div>
    </div>
    </div>
    <div class='progress'>
      <div class='progress-bar' role='progressbar' aria-valuenow='".$prozent."' aria-valuemin='0' aria-valuemax='100' style='width: ".$prozent."%;'>".$prozent."% - ".$gesamtects."/180 ECTS</div>
    </div>";
  }
?>