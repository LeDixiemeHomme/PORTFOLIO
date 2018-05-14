<?php session_start(); 

	try//connexion à la bdd
	{
		$bdd = new PDO("mysql:host=localhost;dbname=portfolio;charset=utf8","root","root");
	}
	catch(Exception $e)
	{ 
		die("Base de données non trouvé");
	}

?>
<!doctype html>
<html lang="en">
  <head>
                
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"> 
    
    <link href="js/zoombox/zoombox.css" rel="stylesheet" type="text/css" media="screen" /> 
    
    <link href="style.css" rel="stylesheet">  

    <title>PORTFOLIO</title>
  </head>
  <body>
    <header>
          
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="projets/CV_EN_LIGNE/index CV.html">Portfolio</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <?php if(isset($_SESSION['connecte']))
{ ?>
    <li class="nav-item">
        <a class="nav-link" href="admin.php">Page admin</a>
      </li>
    <li class="nav-item">
        <a class="nav-link" href="deconnexion.php">Se deconnecter</a>
      </li>
<?php
}
else
{ ?>
    <li class="nav-item">
        <a class="nav-link" href="connexion.php">Connexion</a>
      </li>
<?php
} ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Catégories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Réseaux</a>
          <a class="dropdown-item" href="#">Système</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Développement web</a>
          <a class="dropdown-item" href="#">Programmation</a>
        </div>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="Post">
      <input class="form-control mr-sm-2" type="search" name="recherche" placeholder="Projet recherché" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" name="submit" type="submit">Rechercher</button>
    </form>
  </div>
</nav>
      </header> 