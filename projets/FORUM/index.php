<?php include "includes/header.php" ?>
<img class="group" src="datas/group.svg">
<div class="posts">
<?php

	$requete = $bdd->query("SELECT count(*) AS nb FROM posts");
	$reponse = $requete->fetch();
	$nb = $reponse['nb'];//nombre d'articles en bdd
	$perPage = 2; //nombre d'articles souhaités par page
	
	if(isset($_GET['page']))
	{
		$page = $_GET['page'];
		$deb = ($_GET['page']-1)*$perPage;//on multiplie par le nombre d'articles par page pour aller de 2 en 2
	}
	else
	{
		$page = $deb = 0;//au debut on commence a 0
	}
	
	$requete = $bdd->query("SELECT * FROM posts LIMIT ".$deb.",".$perPage);
	
	while($reponse = $requete->fetch())
	{
		echo "Recents posts";
		
		if(strlen($reponse['contenu']) > 200)
		{
			$contenu = substr($reponse['contenu'],0,200)."... <a href='view.php?id_a=".$reponse['id_t']."'>Lire la suite</a>";
		}
		else
		{
			$contenu = $reponse['contenu'];
		}
		
		echo "<p>".$contenu."</p>";
	}
	
	$pages = ceil($nb/$perPage);//calcul le nombre de pages
	if($page != 1)
	{
		echo "<a href='index.php?page=".($page-1)."'>&lt;&lt;</a> ";
	}
	for($i = 1; $i <= $pages; $i++)//autant de tour que de pages
	{
		echo "<a href='index.php?page=".$i."'>".$i."</a> ";
	}
	if($page != $pages)
	{
		echo " <a href='index.php?page=".($page+1)."'><span>&gt;&gt;</span></a>";
	}
	?>
</div>	
<?php include "includes/footer.php"; ?>