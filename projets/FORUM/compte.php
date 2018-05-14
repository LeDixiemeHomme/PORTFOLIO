<?php include "includes/header.php" ?>

<?php
    /*Lien direct */
    $lien = '<a href="deconnection.php"><br>Deconnection ?</a><br>';
    $lien2 = '<a href ="inscription.php">Inscrit-toi</a>';
    $lien3 = '<a href="connection.php">Connecte-toi !</a>';
    /*Si l'utilisateur est connecter, on affiche son login */
    if ($_SESSION == TRUE)
    {
        echo "<p>Bienvenue</p> <p>" . $_SESSION['login'] . " !</p> ";
        echo $lien;
    }
        /*Si l'utilisateur n'es pas connecté on lui suggère de de le faire ou de s'inscrire */
        if ($_SESSION == FALSE)
        {
            echo "<p>Tu n'a pas accès à cette page ! </p><br>" . $lien2 . " ou " . $lien3 . "";
        }

     //Je demande à la BDD le login et l'id de celui connecté
    $requete = $bdd->query("SELECT login FROM users");
    $requete = $bdd->query("SELECT id_u FROM users");
    //Je recupere l'id et l'user de celui connecté et le sauvegarde dans une variable
    $requete->execute(array($_SESSION['id_u']));
    $id = $requete->fetch();
    $id = $_SESSION['id_u'];

    if (isset($_POST['newlogin']))
    {
        $login = $_POST['newlogin'];$id = $_SESSION['id_u'];
        $requete = $bdd->query("UPDATE users SET login = '$login' WHERE id_u = '$id'");
        echo "Login modifié<br>";
    }

    if (isset($_POST['newemail']))
    {
        $email = $_POST['newemail'];
        $requete = $bdd->query("UPDATE users SET email = '$email' WHERE id_u = '$id'");
        echo "Email modifier";
    }

    if (isset($_POST['newpassword1']) AND !empty($_POST['newpassword1']) AND isset($_POST['newpassword2']) AND !empty($_POST['newpassword2']))
    {
        $mdp1 = sha1($_POST['newpassword1']);
        $mdp2 = sha1($_POST['newpassword2']);

        if($mdp1 == $mdp2 )
        {
            $requete = $bdd->query("UPDATE users SET mdp = '$mdp1' WHERE id_u = '$id'");
            echo "Mot de passe modifié";
        }
    }

?>
<?php
if ($_SESSION == TRUE){ ?>
<body>
<div align="center">
<h2>Edition de compte</h2>
<form method="post" action="#">
    <label>Login</label>
<input type="text" name="newlogin" placeholder="Login"  /><br /><br />
    <label>Email</label>
<input type="email" name="newemail" placeholder="Mail"  /><br /><br />
    <label>Mot de passe</label>
<input type="password" name="newpassword1" placeholder="Mot de passe" /><br /><br />
<input type="password" name="newpassword2" placeholder="Confirmation" /><br /><br />
<input type="submit" value="Mette à jour" />
</form>
</div>
</body>
<?php } ?>
<?php include "includes/footer.php" ?>
