<div class="admrea">
<h3 class="sous-titre">Admin réalisation</h3>

<?php
if(isset($_POST['ajoutrea']))
{
    if(($_POST['libelle']) == true && ($_POST['url']) == true && ($_POST['description_pro']) == true && ($_POST['screenshot']) == true && ($_POST['date_debut']) == true && ($_POST['date_fin']) == true && ($_POST['id_c']) == true)
    {
    $libelle = ($_POST['libelle']);
    $url = ($_POST['url']);
    $description_pro = ($_POST['description_pro']);
    $screenshot = ($_POST['screenshot']);
    $date_debut = ($_POST['date_debut']);
    $date_fin = ($_POST['date_fin']);
    $id_c = ($_POST['id_c']);
    
    $requete = $bdd->query("INSERT INTO projet (url,libelle,description_pro,screenshot,date_debut,date_fin,id_c) VALUES ('$url','$libelle','$description_pro','$screenshot','$date_debut','$date_fin','$id_c')");
    
        echo '<div class="messa"> Réalisation ajoutée avec succès ! </div> ' ;
    }
    else
    {
        echo '<div class="messa"> Veuillez remplir tout les champs ! </div> ';
    }
}
?>
    <?php

if(isset($_POST['modifrea']))
{    
    $libelle = ($_POST['libelle']);
    $nvlibelle = ($_POST['nvlibelle']);
    $nvurl = ($_POST['nvurl']);
    $nvscreenshot = ($_POST['nvscreenshot']);
    $nvdate_debut = ($_POST['nvdate_debut']);
    $nvdate_fin = ($_POST['nvdate_fin']);
    $nvid_c = ($_POST['nvid_c']);
    $nvdes = ($_POST['nvdes']);
    
    $requete = $bdd->query("SELECT * FROM projet WHERE libelle = '$libelle'");    
    
    if($reponse = $requete->fetch())
    {
    
    $requete = $bdd->query("UPDATE projet SET  url = '$nvurl', libelle = '$nvlibelle', description_pro = '$nvdes', screenshot = '$nvscreenshot', date_debut = '$nvdate_debut', date_fin = '$nvdate_fin', id_c = '$nvid_c' WHERE libelle = '$libelle'");
    
        echo ' <div class="messa"> Réalisation modifiée avec succès !</div>';
    }
    else
    {
        echo ' <div class="messa"> Erreur dans la selection de la réalisation </div>';
    }
}
?>
        <?php

if(isset($_POST['supprea']))
{    
    $libelle = ($_POST['libelle']);
    
    $requete = $bdd->query("SELECT * FROM projet WHERE libelle = '$libelle'");    
    
    if($reponse = $requete->fetch())
    {
    
    $requete = $bdd->query("DELETE FROM projet WHERE libelle = '$libelle'");
        
        echo ' <div class="messa"> Réalisation supprimée avec succès !</div>';
    }
    else
    {
        echo ' <div class="messa"> Erreur dans la selection de la réalisation </div>';
    }
}
?>
            
                <div class="row">
                    <div class="col-5 offset-md-1">
                        <div class="formulaire">
                            <form class="form_ajout_rea" action="#" method="post">
                                <label>Pour ajouter une nouvelle réalisation :</label><br>
                                <label>Nom de la nouvelle réalisation</label>
                                <input class="text" type="text" name="libelle" required /> <br>
                                <label>URL/</label>
                                <input class="text" type="text" name="url" required /> <br>
                                <label>Description</label>
                                <input class="text" type="text" name="description_pro" required /> <br>
                                <label>Screenshot</label>
                                <input class="text" type="text" name="screenshot" required /> <br>
                                <label>Date de début</label>
                                <input class="text" type="text" name="date_debut" required /> <br>
                                <label>Date de fin</label>
                                <input class="text" type="text" name="date_fin" required /> <br>
                                <label>Id de la catégorie</label>
                                <input class="text" type="text" name="id_c" required /> <br>

                                <input class="button" type="submit" name="ajoutrea" value="Ajouter une réalisation" /> <br>
                            </form>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="formulaire">
                            <form class="form_modif_rea" action="#" method="post">
                                <label>Pour modifier une réalisation :</label><br>
                                <label>Ancien nom de la réalisation</label>
                                <input class="text" type="text" name="libelle" required /> <br>
                                <label>Nouveau URL/</label>
                                <input class="text" type="text" name="nvurl" required /> <br>
                                <label>Nouveau libelle de la réalisation</label>
                                <input class="text" type="text" name="nvlibelle" required /> <br>
                                <label>Nouvelle description de la réalisation</label>
                                <input class="text" type="text" name="nvdes" required /> <br>
                                <label>Nouveeau screenshot</label>
                                <input class="text" type="text" name="nvscreenshot" required /> <br>
                                <label>Nouvelle date de début</label>
                                <input class="text" type="date" name="nvdate_debut" required /> <br>
                                <label>Nouvelle date de fin</label>
                                <input class="text" type="date" name="nvdate_fin" required /> <br>
                                <label>Nouvelle catégorie</label>
                                <input class="text" type="text" name="nvid_c" required /> <br>

                                <input class="button" type="submit" name="modifrea" value="Modifier une réalisation" /> <br>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 offset-md-4">
                        <div class="formulaire">
                            <form class="form_supp_rea" action="#" method="post">
                                <label>Pour supprimer une réalisation :</label><br>
                                <label>Nom de la réalisation</label>
                                <input class="text" type="text" name="libelle" required /> <br>

                                <input class="button" type="submit" name="supprea" value="Supprimer une réalisation" /> <br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>