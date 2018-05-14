<?php include "includes/header.php" ?>
<body>
	<img class="adventure" src="datas/swords.svg">
	<div class="maindiv">
		<div class="toptextediv">
		<h5 class="datetimepost">Date dernier post ↓</h5>
		<h2 class="mainsub">DERNIERS SUJETS DE DISCUSTIONS</h2>
			
		</div>
<?php
$requete = $bdd->query("SELECT titre FROM topics WHERE id_cat = 1");
if($reponse = $requete->fetch())
{
    $titre = $reponse;
    echo "<h3>- ".$titre['titre']."</h3>";
}
?>
        <a href="3action.php"><p class="voir">Voir...</p></a>
	</div>
</body>
<?php include "includes/footer.php" ?>
