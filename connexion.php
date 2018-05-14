<?php include"includes/header.php"; ?>

<h1 class="titre"> Page de connexion </h1>

<?php 
	if(isset($_POST['connexion']))
	{
		$mdp = ($_POST['mdp']);
		$login = $_POST['login'];
		
		$requete = $bdd->query("SELECT * FROM users WHERE login = '$login' AND mdp = '$mdp'");//J'interroge la bdd
		
		if($reponse = $requete->fetch())//recupere le resultat de la requete
		{
				$_SESSION['connecte'] = true;
				$_SESSION['login'] = $reponse['login'];
				header("Location:index.php");
		}
		else
		{
			echo "Mauvais identifiant";
		}
	}

?>
    <div class="row">
        <div class="col-8 offset-md-2">
            <div class="formulaire">
                <form class="form_conn" action="#" method="post">
                    <label>Entrez les identifiants :</label><br>
                    <label>Login</label>
                    <input class="text" type="text" name="login" required /> <br>
                    <label>Mot de passe</label>
                    <input class="text" type="password" name="mdp" required /> <br>

                    <input class="button" type="submit" name="connexion" value="Se connecter" /> <br>
                </form>
            </div>
        </div>
    </div>
</div>



    <?php include"includes/footer.php"; ?>