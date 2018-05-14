<?php include "includes/header.php" ?>
<?php
if(isset($_POST['submit']))
{
    $id_u = $_SESSION['id_u'];
    $login = $_SESSION['login'];
    $contenue = $_POST['message'];

    $requete = $bdd->query("SELECT id_t FROM topics WHERE id_t = 3");
    if($reponse = $requete->fetch())
    {

        $id_t = $reponse['id_t'];
    }

    $requete = $bdd->query("INSERT INTO posts(contenu,date_p,id_u,id_t) VALUES ('$contenue',CURDATE(),'$id_u','$id_t')");

}


if(isset($_POST['submit']) && ($_POST['supprimer']))

?>
<div class="posts">
<?php
$requete = $bdd->query("SELECT COUNT(*) id_p FROM posts");
$reponse = $requete->fetch();
$nb = $reponse['id_p'];//nombre de posts en bdd
$perPage = 1; //nombre de posts souhaités par page

if(isset($_GET['page']))
{
    $page = $_GET['page'];
    $deb = ($_GET['page']-1)*$perPage;//on multiplie par le nombre d'articles par page pour aller de 2 en 2
}
else
{
    $page = $deb = 0;//au debut on commence a 0
}


$requete = $bdd->query("SELECT titre FROM topics WHERE id_t = 3 ");
if($reponse = $requete->fetch())
{
  $titre= $reponse['titre'];
  echo "<h2>" .$titre. "</h2>";
}


$requete = $bdd->query("SELECT contenu FROM posts");
if($reponse = $requete->fetch())
{
     $contenu = $reponse['contenu'];
}



$requete = $bdd->query("SELECT id_u FROM posts WHERE contenu = '$contenu'");
while($reponse = $requete->fetch())
{
  $posteur = $reponse['id_u'];
  echo "<h4>Message posté par l'utilisateur n° " .$posteur. " !</h4>";
}
$requete = $bdd->query("SELECT date_p FROM posts WHERE contenu = '$contenu'");
while($reponse = $requete->fetch())
{
  $date = $reponse['date_p'];
  echo "<h4>Le " .$date. "</h4>";
}
$requete = $bdd->query("SELECT * FROM posts LIMIT ".$deb.",".$perPage);
$pages = $bdd->query("SELECT * FROM posts");
if($reponse = $requete->fetch())
{
     $contenu = $reponse['contenu'];
    echo "<p>".$contenu."</p>";
}

$pages = ceil($nb/$perPage);//calcul le nombre de pages
if($page != 1)
{
    echo "<a href='3fps.php?page=".($page-1)."'><span>&lt;&lt;</span></a> ";
}
for($i = 1; $i <= $pages; $i++)//autant de tour que de pages
{
    echo "<a href='3fps.php?page=".$i."'>".$i."</a> ";
}
if($page != $pages)
{
    echo " <a href='3fps.php?page=".($page+1)."'><span>&gt;&gt;</span></a>";
}
?>
</div>
<body>
  <?php
  if ($_SESSION == TRUE){ ?>
<form action="#" method="post">
    <label for="subject"><p>Post</p></label>
    <textarea class="subject" name="message" placeholder="Votre message..." style="height:200px"></textarea>
    <input type="submit" name="submit"/>
</form>
<?php } ?>
</body>
<?php include "includes/footer.php" ?>
