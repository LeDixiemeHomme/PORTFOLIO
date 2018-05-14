<?php
    session_start();

	try//connexion à la bdd
	{
		$bdd = new PDO("mysql:host=localhost;dbname=forumbis","root","root");
	}
	catch(Exception $e)
	{
		die("bdd non trouvé");
	}


    $requete = $bdd->query("SELECT lvl FROM users");
    if($reponse = $requete->fetch())
    {
        $_lvl = FALSE;
    }


?>

<head>
    <meta charset="utf-8">
    <title>Post</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>

<header>

<nav>
	<ul>
		<li><a class="menu" href="index.php">Acceuil</a></li>
		<li class="icons"><a class="menu" href="topic.php">Categorie<i class="fas fa-angle-down"></i></a>
            <ul class="sousmenu">
                <li><a class="hovera" href="Action.php">Action</a></li>
                <li><a class="hovera" href="Aventure.php">Aventure</a></li>
                <li><a class="hovera" href="FPS.php">FPS</a></li>
                <li><a class="hovera" href="MMORPG.php">MMORPG</a></li>
            </ul>
        </li>
		<li><a class="menu" href="connection.php">Connection/Inscription</a></li>
		<li><a class="menu" href="contacter.php">Contacter</a></li>
		<?php 
		if ($_SESSION == TRUE){ ?>
		<li><a class="menu" href="compte.php">Compte</a></li>
        <li><a class="menu" href="deconnection.php">Deconnection</a></li>
		<?php } ?>
		<?php
		if ($_SESSION || $_lvl = FALSE ){ ?>
			<li><a class="menu" href="admin.php">Admin</a></li>
		<?php } ?>
	</ul>
</nav>

</header>