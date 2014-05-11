<!DOCTYPE html>
<html lang="de">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8"> 
    <title>eCurriculum</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles -->
    <link href="../../css/ecurriculum.css" rel="stylesheet">
  </head>

  <body>
  
    <header class="page-header-ecurriculum">
      <div class="container">
	<div class="row">
	  <!-- Page Title -->
	  <div class="col-md-6"><h1 class="page-header-ecurriculum-title">BSc Medieninformatik</h1></div>
	  <!-- Page Logo -->
	  <div class="col-md-6">
	    <div class="page-header-ecurriculum-logo">
	      <a href="../../"><img src="../../img/logo-uni-wien.jpg" alt="logo"></a>
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
            <li><a href="../bachelor">Allgemeines</a></li>
            <li class="active"><a href="aufbau.php">Aufbau</a></li>
            <li><a href="ausland.php">Auslandsaufenthalt</a></li>
            <li><a href="einteilung.php">Arten von LVs</a></li>
            <li><a href="bachelorarbeit.php">Bachelorarbeit</a></li>
            <li><a href="lvspruefungen.php">LVs und Prüfungen</a></li>
            <li><a href="rechtliches.php">Rechtliches zum Curriculum</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../../plan/">
            <span class="glyphicon glyphicon-arrow-right"></span>
            Persönlicher Plan</a></li>
          </ul>
        </div> <!--/.nav-collapse -->
      </div> <!-- /container -->
    </div>

    <!-- 2nd Navbar -->
    <div class="container">
    <h1>Aufbau des Studiums</h1>
    <h2>§ 5 Aufbau – Module mit ECTS-Punktezuweisung</h2>
      <ul class="nav nav-pills">
	<li><h4>Sortieren nach: </h4></li>
	<li <?php if ($_GET["sortieren"] == "modul")
	echo "class='active'";?> ><a href="aufbau.php?sortieren=modul">Modulgruppen</a></li>
	<li <?php if (($_GET["sortieren"] == "semester") OR (!isset($_GET["sortieren"])))
	echo "class='active'";?> ><a href="aufbau.php?sortieren=semester">Semestereinteilung</a></li>
      </ul>
    </div> <!-- /container -->
    
    <!-- Content -->
    <div class="container">
    <h3>Information zur STEOP</h3>
    <div class="panel-group" id="accordion2">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion2" href="#collapseSteop">
          Einheitliche Beurteilungsstandards
        </a>
      </h4>
    </div>
    <div id="collapseSteop" class="panel-collapse collapse in">
      <div class="panel-body">
        <p>Für die prüfungsimmanenten Lehrveranstaltungen im
	    Rahmen der StEOP legt das studienrechtlich
	    zuständige Organ zur Sicherstellung von einheitlichen Beurteilungsstandards (nach Anhörung der
	    Lehrenden dieser Veranstaltungen) die Inha
	    lte und Form der Leis
	    tungsüberprüfung, die
	    Beurteilungskriterien und die Fristen für die sa
	    nktionslose Abmeldung von prüfungsimmanenten
	    Lehrveranstaltungen verbindlich fest. Diese Festlegung ist rechtzeitig vor Beginn der
	    Lehrveranstaltungen in Form einer Ankündigung,
	    insb. durch Eintragung in das elektronische
	    Vorlesungsverzeichnis und durch Veröffentlichun
	    g auf der Website der St
	    udienprogrammleitung,
	    bekannt zu geben.</p><p>
	    Die positive Absolvierung der STEOP ist Vorau
	    ssetzung für das weitere Studium. An folgenden
	    Lehrveranstaltungen darf vor er
	    folgreicher Absolvierung der ST
	    EOP teilgenommen werden: VU
	    Informatik und Gesellschaft, VU Projektmanagement und UE Mathematische Basistechniken. </p>
      </div>
    </div>
  </div>
  </div>


    
<?php
  $plan = array();
  if (($handle = fopen("../../plan/eCurriculum_Bachelor_Informatik_Plan.csv", "r")) !== FALSE) {
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

  if ($_GET["sortieren"] == "modul") {
    echo "<h3>(1) Studieneingangs- und Orientierungsphase (STEOP) (18 ECTS)</h4>";
    printModuls($plan, "(1) Studieneingangs- und Orientierungsphase (STEOP) (18 ECTS)", 13);
    echo "<h3>(2) Pflichtmodulgruppen ( 84 ECTS)</h4>";
    echo "<h4>Pflichtmodulgruppe A Informationstechnologie (36 ECTS)</h4>";
    printModuls($plan, "Pflichtmodulgruppe A Informationstechnologie (36 ECTS)", 13);
    echo "<h4>Pflichtmodulgruppe B. Allgemeine Grundlagen (18 ECTS)</h4>";
    printModuls($plan, "Pflichtmodulgruppe B. Allgemeine Grundlagen (18 ECTS)", 13);
    echo "<h4>Pflichtmodulgruppe C Strukturwissenschaften (24 ECTS)</h4>";
    printModuls($plan, "Pflichtmodulgruppe C Strukturwissenschaften (24 ECTS)", 13);
    echo "<h4>Pflichtmodul D Kompetenzerweiterung (6 ECTS)</h4>";
    printModuls($plan, "Pflichtmodul D Kompetenzerweiterung (6 ECTS)", 13);
    echo "<h3>(3) Alternative Pflichtmodulgruppen Ausprägungsfach (zu je 72 ECTS)</h4>";
    echo "<h4>APMgruppe Medieninformatik und Medien- und Kommunikationswissenschaften (72 ECTS)</h4>";
    printModuls($plan, "APMgruppe Medieninformatik und Medien- und Kommunikationswissenschaften (72 ECTS)", 13);
    echo "<h4>(4) Pflichtmodul „Freifächer“ (6 ECTS)</h4>";
    printModuls($plan, "(4) Pflichtmodul „Freifächer“ (6 ECTS)", 13);
  }
  else {
    for ($i = 1; $i < 7; $i++) {
      echo "<h3>".$i.". Semester</h3>";
      printModuls($plan, $i, 7);
    }  
  }
?>

<ul class="pager">
  <li class="previous"><a href="../bachelor">&larr; Allgemeines</a></li>
  <li class="next"><a href="ausland.php">Auslandsaufenthalt &rarr; </a></li>
</ul>

    </div> <!-- /container -->
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
  </body>
</html>

<?php
  function printModuls($plan, $sortieren, $column) {
    $count = count($plan);
    for ($i=1; $i < $count; $i++) {
      if ($plan[$i][$column] == $sortieren) {
	echo '<div class="panel-group" id="accordion">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">
	      <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$plan[$i][0].'">
		'.$plan[$i][1].'
	      </a>
	    </h3>
	  </div>
	  <div id="collapse'.$plan[$i][0].'" class="panel-collapse collapse">
	    <div class="panel-body">
		'.$plan[$i][12];
	echo '<hr>';
	echo '<table class="table table-bordered"><tr><th>Lehrveranstaltung</th><th>ECTS</th></tr>';
	printModul($plan, $plan[$i][0]);
	echo '</table>';
	echo '<hr>';
	echo '<p><b>Verpflichtende Voraussetzungen: </b>'.$plan[$i][14].'</p>
	<p><b>Empfohlende Voraussetzungen: </b>'.$plan[$i][15].'</p>';
	echo '<hr>';
	echo '<p><b>Leistungsnachweis: </b>'.$plan[$i][16].'</p>
	    </div>
	  </div>
	</div>';
	
      }
    }
  }
  function printModul($plan, $modulid) {
    $count = count($plan);
    for ($i=1; $i < $count; $i++) {
      if ($plan[$i][11] == $modulid)
	echo '<tr><td>'.$plan[$i][1].'</td><td>'.$plan[$i][3].'</td></tr>';
    }
  
  }
?>
