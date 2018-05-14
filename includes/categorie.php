<div class="admcat">
<h3 class="sous-titre">Admin catégorie</h3>

<?php
if(isset($_POST['ajoutcat']))
{
    if(($_POST['nom_cat']) == true && ($_POST['description_cat']) == true)
    {
    $nom_cat = ($_POST['nom_cat']);
    $description_cat = ($_POST['description_cat']);
    
    $requete = $bdd->query("INSERT INTO categorie (nom_cat,description_cat) VALUES ('$nom_cat','$description_cat')");
    
        echo '<div class="messa"> Catégorie ajoutée avec succès ! </div> ' ;
    }
    else
    {
        echo '<div class="messa"> Veuillez remplir tout les champs ! </div> ';
    }
}
?>
    <?php

if(isset($_POST['modifcat']))
{    
    $nom_cat = ($_POST['nom_cat']);
    $nvnom = ($_POST['nvnom']);
    $nvdesc = ($_POST['nvdesc']);
    
    $requete = $bdd->query("SELECT * FROM categorie WHERE nom_cat = '$nom_cat'");    
    
    if($reponse = $requete->fetch())
    {
    
    $requete = $bdd->query("UPDATE categorie SET nom_cat = '$nvnom', description_cat = '$nvdesc' WHERE nom_cat = '$nom_cat'");
    
        echo ' <div class="messa"> Catégorie modifiée avec succès !</div>';
    }
    else
    {
        echo ' <div class="messa"> Erreur dans la selection de la catégorie </div>';
    }
}
?>
        <?php

if(isset($_POST['suppcat']))
{    
    $nom_cat = ($_POST['nom_cat']);
    
    $requete = $bdd->query("SELECT * FROM categorie WHERE nom_cat = '$nom_cat'");    
    
    if($reponse = $requete->fetch())
    {
    
    $requete = $bdd->query("DELETE FROM categorie WHERE nom_cat = '$nom_cat'");
        
        echo ' <div class="messa"> Catégorie supprimée avec succès !</div>';
    }
    else
    {
        echo ' <div class="messa"> Erreur dans la selection de la catégorie </div>';
    }
}
?>
            <div class="row">
                <div class="col-5 offset-md-1">
                    <div class="formulaire">
                        <form class="form_ajout_cat" action="#" method="post">
                            <label>Pour ajouter une nouvelle catégorie :</label><br>
                            <label>Nom de la nouvelle catégorie</label>
                            <input class="text" type="text" name="nom_cat" required /> <br>
                            <label>Description de la nouvelle catégorie</label>
                            <input class="text" type="text" name="description_cat" required /> <br>

                            <input class="button" type="submit" name="ajoutcat" value="Ajouter une catégorie" /> <br>
                        </form>
                    </div>
                </div>
                <div class="col-5">
                    <div class="formulaire">
                        <form class="form_modif_cat" action="#" method="post">
                            <label>Pour modifier une catégorie :</label><br>
                            <label>Ancien nom de la catégorie</label>
                            <input class="text" type="text" name="nom_cat" required /> <br>
                            <label>Nouveau nom de la catégorie</label>
                            <input class="text" type="text" name="nvnom" required /> <br>
                            <label>Nouvelle description de la catégorie</label>
                            <input class="text" type="text" name="nvdesc" required /> <br>

                            <input class="button" type="submit" name="modifcat" value="Modifier une catégorie" /> <br>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4 offset-md-4">
                    <div class="formulaire">
                        <form class="form_supp_cat" action="#" method="post">
                            <label>Pour supprimer une catégorie :</label><br>
                            <label>Nom de la catégorie</label>
                            <input class="text" type="text" name="nom_cat" required /> <br>

                            <input class="button" type="submit" name="suppcat" value="Supprimer une catégorie" /> <br>
                        </form>
                    </div>
                </div>
            </div>
</div>