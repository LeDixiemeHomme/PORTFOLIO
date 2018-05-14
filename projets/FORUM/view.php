<?php include "includes/header.php";

        $requete = $bdd->query("SELECT titre FROM topics WHERE id_cat = 3");
        if($reponse = $requete->fetch())
        {
            $titre = $reponse;
            echo "<h2>".$titre['titre']."</h2>";
        }

	  $requete = $bdd->query("SELECT * FROM posts WHERE id_p = ".$_GET['id_p']);
	  $reponse = $requete->fetch();

	  echo "<p>".$reponse['contenu']."</p>";

	  include "includes/footer.php"; ?>