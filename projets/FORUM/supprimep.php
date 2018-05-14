<?php include "includes/header.php" ?>
<?php
if(isset($_GET['submit']))
{
    $requete = $bdd->query("SELECT * FROM POSTS");
    $contenu = $_GET['contenu'];
    $requete = $bdd->query("DELETE FROM POSTS WHERE contenu = '$contenu'");
    if($reponse = $requete->fetch())
    {
        echo "Post supprimer";
    }
}

?>
<p class="admintexte2">Supprimer un post</p>
<form class="connection" action="#" method="get">
    <label>**Veuillez inscrire le contenue du post que vous souhaitez supprimer**</label><input type="text" name="contenu">
    <input type="submit" name="submit">
</form>

<?php include "includes/footer.php" ?>