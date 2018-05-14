<?php include "includes/header.php" ?>

<?php
if(isset($_POST['submit']))
{
    $login = $_POST['login'];
    $requete = $bdd->query("SELECT * FROM users WHERE login = '$login'");
    if($reponse = $requete->fetch())
    {
        $login = $_POST['login'];
        $requete = $bdd->query("DELETE FROM users WHERE login = '$login'");
        echo "<p>L'utilisateur à été supprimé</p>";
    }
    else
        {
            echo "<p>Erreur, l'utilisateur n'existe pas !<br> Vérifiez vos informations et recommencez.</p>";
        }
}
if(isset($_GET['submit']))
{
    $email = $_GET['email'];
    $requete = $bdd->query("SELECT * FROM users WHERE email = '$email'");
    if($reponse = $requete->fetch())
    {
        $email = $_GET['email'];
        $requete = $bdd->query("UPDATE users set lvl = 9 WHERE email = '$email'");
        echo "<p>L'utilisateur à été banni</p>";
    }
    else
    {
        echo "<p>Erreur, l'adresse mail de l'utilisateur saisie n'existe pas !<br> Vérifiez l'information et recommencez.</p>";
    }
}
?>
<?php
//Si quelqu'un de non connecté arrive sur la page admin.php, elle est rediriger directement vers connection.php
if ($_SESSION['login'] == false)
{
    header("Location:connection.php");
}//Si l'utilisateur à un niveau 1 et qu'il essaie d'aller vers la page admin.php il sera rediriger directement vers compte.php
elseif ($_SESSION['lvl'] == 1 )
    {
        header("Location:compte.php");
    }
?>
<?php

$requete = $bdd->query("SELECT COUNT(*)id_u FROM users");
if($reponse = $requete->fetch())
{

    $inscrit = $reponse;
    echo " Il y a : " .$inscrit['id_u']. " membre inscrit sur le forum.";
}

?>
<br>
<?php
$requete = $bdd->query("SELECT COUNT(*)id_u FROM users WHERE lvl = 9");
if($reponse = $requete->fetch())
{
    $banni = $reponse;
    echo $banni['id_u']. " membre(s) (sont) banni.";
}
?>

<br><a href="supprimep.php">Pour supprimer un post(clique)</a>
<form class="connection" action="#" method="post">
    <p class="admintexte1">Supprimer un utilisateur</p>
    <input type="text" name="login">
    <input type="submit" name="submit">
</form><br>
<p class="admintexte2">Bannir un utilisateur</p>
<form class="connection" action="#" method="get">
    <input type="email" name="email">
    <input type="submit" name="submit">
</form>


<?php include "includes/footer.php" ?>
