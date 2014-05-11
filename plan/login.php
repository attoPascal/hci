<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8"> 
    <title>Persönlicher Plan - Login</title>

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
	      <a href=""><img src="../img/logo-uni-wien.jpg" alt="logo"></a>
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
      <div class="row">
      <p>Um auf Ihren persönlichen Plan zugreifen zu können, müssen Sie sich als Student
	  mit Ihrer Matrikelnummer und Ihrem Passwort einloggen.</p>
	<?php
	  if ($_GET["message"] == 1)
	    echo "<div class='alert alert-danger'>Diese Matrikelnummer existiert nicht. Eine gültige Matrikelnummer besteht aus a + 7 Ziffern (z.B. a1234567).</div>";
	  if ($_GET["message"] == 2)  
	    echo "<div class='alert alert-danger'>Das Passwort ist falsch. Wenn Sie Ihr Passwort vergessen haben, wenden Sie sich bitte an den <a href='https://zid.univie.ac.at/passwort/#vergessen'>ZID</a>.</div>";
	?>
	<div class="col-md-4">
	  <form class="form-signin" role="form" action="logincheck.php" method="post">
	    <h4 class="form-signin-heading">Bitte einloggen:</h4>
	    <input name="username" type="text" class="form-control" placeholder="Matrikelnummer" required autofocus>
	    <input name="passwort" type="password" class="form-control" placeholder="Passwort" required>
	    <button name="login" class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
	  </form>
	</div>
      </div>
    </div> <!-- /container -->
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
