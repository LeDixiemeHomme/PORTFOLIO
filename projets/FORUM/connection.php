<?php include "includes/header.php";


	if(isset($_POST['submit']))
	{
		$mdp = sha1($_POST['mdp']);
		$login = $_POST['login'];


		
		$requete = $bdd->query("SELECT * FROM users WHERE login = '$login' AND mdp = '$mdp'");//J'interroge la bdd
		
		if($reponse = $requete->fetch()) //recupere le resultat de la requete
		{
			$_SESSION['connecte'] = true;
			$_SESSION['id_u'] = $reponse['id_u'];
			$_SESSION['login'] = $_POST['login'];
			$_SESSION['lvl'] = $reponse['lvl'];
            $_SESSION['email'] = $reponse['email'];
			header('refresh:2;url=compte.php');
			echo "<p>Redirection automatique...</p>";

		}
		else
		{
			echo "<p>Veuillez verifiez les informations saisie.</p>";
		}
	}


    if(isset($_POST['submit']))
    {
        $requete = $bdd->query("SELECT id_u FROM users WHERE lvl = 9");
		$_SESSION['id_u'] = $reponse['id_u'];
        // Interdire l'accès au site à l'utilisateur specifié
        if($_SESSION['id_u'] == 4)
        {

                header('Location:deconnection.php');

        }
    }

    if(isset($_POST['submit']))
    {
        $requete = $bdd->query("UPDATE users SET datelastco = CURDATE() WHERE login = '$login'");
    }

?>

<div class="loginhead">
	<img class="lock" src="datas/ic_lock_black_48px.svg">
<form class="connection" action="#" method="post">
	<label for="mail"><p class="texte2">Login :</p></label><br>
		<input type="text" name="login" htmlspecialchars required placeholder="*login"><br>
		<label for="mail"><p class="texte1">Mot de passe :</p></label><br>
		<input type="password" name="mdp" htmlspecialchars required placeholder="*****"><br>
		<input class="texte1" type="submit" name="submit"/><br>
</form>
	</div>
	<a href="inscription.php"><p class="ins">Inscription</p></a> 
	<a href="motdepasseoublier.php"><p class="ins2">Oublie de mot de passe ?</p></a>
    <div class="hidden">
        <input class="texte1" type="datetime-local" name="date"><br>
    </div>
	

<?php include "includes/footer.php" ?>
