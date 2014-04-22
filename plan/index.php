<!DOCTYPE html>
<html lang="de">
  <head>
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
	  <div class="col-md-6"><h1 class="page-header-ecurriculum-title">Persönlicher Plan - Max Mustermann (a1234567)</h1></div>
	  <!-- Page Logo -->
	  <div class="col-md-6">
	    <div class="page-header-ecurriculum-logo">
	      <a href="index.html"><img src="img/logo-uni-wien.jpg" alt="logo"></a>
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
            <li class="active"><a href="/">Bachelor Medieninformatik</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../">
            <span class="glyphicon glyphicon-arrow-right"></span>
            eCurriculum</a></li>
          </ul>
        </div> <!--/.nav-collapse -->
      </div> <!-- /container -->
    </div>
    
    <!-- Content -->
    <div class="container">
      <table class="table table-bordered">
    
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

for ($i=1; $i < 7; $i++)
  printModulSemester($plan, $i);

?>
      </table>

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
    echo "<tr>";
    echo "<th>".$semester.". Semester</th>";
      for ($i=1; $i < $count; $i++) {
	if (($plan[$i][6] == "Medieninformatik") AND ($plan[$i][7] == $semester)) {
	  if ($plan[$i][8] AND  $plan[$i][8] < 5)
	    echo "<td bgcolor=#e7e7e7>".
	      $plan[$i][1]."\n 
	      <span class='glyphicon glyphicon-ok'></span>
	      <span class='badge'> ".$plan[$i][8]."</span></td>";
	  else
	    echo "<td>".$plan[$i][1]."</td>";
	}
    }
    echo "</tr>";
  } 
?>