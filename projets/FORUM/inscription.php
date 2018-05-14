<?php include "includes/header.php";

// ip
$add = $_SERVER['REMOTE_ADDR'];



	if(isset($_POST['submit']))
	{
		$login = htmlspecialchars($_POST['login']);
		$mdp = sha1($_POST['mdp']);
        $email = $_POST['email'];
		$avatar = htmlspecialchars($_POST['avatar']);
        
		$requete = $bdd->query("INSERT INTO users(login,mdp,email,avatar,date_inscription,ip) VALUES('$login','$mdp','$email','$avatar',CURDATE(),'$add')");
		echo "<p>Inscription effectué, vous pouvez vous connecter</p>";
	}
?>
	<form class="connection" action="#" method="post">
		<label for="mail"><p class="login1">Login :</p></label><br>
		<input type="text" name="login" htmlspecialchars required placeholder="*login123"><br>
		<label for="mail"><p class="login23">Pseudo :</p></label><br>
		<input type="text" name="avatar" htmlspecialchars required placeholder="*avatar123"><br>
	<label for="mail"><p class="texte23">Mail :</p></label><br>
		<input type="email" name="email" htmlspecialchars required placeholder="*exemple@mail.com"><br>
		<label for="mail"><p class="texte1">Mot de passe :</p></label><br>
		<input type="password" name="mdp" htmlspecialchars required placeholder="*****"><br>
        <div class="hidden">
        <input class="texte1" type="datetime-local" name="date"><br>
        </div>
		<input class="texte1" type="submit" name="submit"/><br>
</form>
