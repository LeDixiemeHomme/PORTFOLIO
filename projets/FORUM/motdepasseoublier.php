<?php include "includes/header.php" ?>
<?php

if(isset($_POST['submit'])){
    $chaine = "ABCDEFGTUVWXYZabcdefKILJklmnopqrstuvwxyz0123456189ao84ka";
    $mdp = $chaine[rand(0,25)];
    $mdp .= $chaine[rand(0,25)];
    $mdp .= $chaine[rand(26,51)];
	$mdp .= $chaine[rand(52,61)];
    $mdp = str_shuffle($mdp);

    echo "Nouveau mot de passe: ".$mdp. " <br>";
    echo "Mot de passe modifier avec succès.";

    $requete = $bdd->query("UPDATE users SET mdp = '".sha1($mdp)."' WHERE login = '".$_POST['login']."'");
}

?>

<form class="mdpmodif3" action="#" method="post">
    <p class="loginmdp">Login:</p><p class="gene">*Génération d'un mot de passe aléatoire.</p> <input class="mdpmodif" type="text" name="login"/><br />
    <input class="mdpmodif2" type="submit" value="modifier" name="submit"/>
	<label><p class="checkbox1">Êtes vous sûr de vous ?</p></label><input class="checkbox1" type="checkbox" value="validation" name="validation" required />
</form>
<?php include "includes/footer.php" ?>
