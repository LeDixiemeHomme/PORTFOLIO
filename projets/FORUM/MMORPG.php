<?php include "includes/header.php" ?>
<body>
	<img class="adventure" src="datas/fortress.svg">
	<div class="maindiv">
		<div class="toptextediv4">
		<h5 class="datetimepost">Date dernier post ↓</h5>
		<h2 class="mainsub">DERNIERS SUJETS DE DISCUSTIONS</h2>
			
		</div>
<?php
$requete = $bdd->query("SELECT titre FROM topics WHERE id_cat = 4");
if($reponse = $requete->fetch())
{
    $titre = $reponse;
    echo "<h2>- ".$titre['titre']."</h2>";
}
?>
        <a href="3mmorpg.php"><p class="voir">Voir...</p></a>
</body>
<?php include "includes/footer.php" ?>
