<?php 

if(isset($_POST['submit']) && $_POST['recherche'] != NULL)
{
    $recherche = htmlspecialchars($_POST['recherche']);
    
    $requete = $bdd->query("SELECT * FROM projet WHERE libelle LIKE '%$recherche%'");
    
    $tableau = $requete->fetch();
    
    if($tableau != NULL)
    {        
        
        $url = $tableau['url'];
        $libelle = $tableau['libelle'];
        $description_pro = $tableau['description_pro'];
        $screenshot = $tableau['screenshot'];
        $date_debut = $tableau['date_debut'];
        $date_fin = $tableau['date_fin'];
        $id_c = $tableau['id_c']; 

        foreach($tableau as $element) 
        {
            echo '<div class="row">
        <div class="col-4 offset-md-1">
            <a class="zoombox" href="pictures/'.$screenshot.'"> <img src="./pictures/'.$screenshot.'" width="500"></a>
        </div>
        <div class="col-4 offset-md-2">
            <div class="card" style="width: 30rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="'.$url.'" class="list-group-item list-group-item-action active">Consulter le projet</a></li>
                    <li class="list-group-item">Libelle du projet : '.$libelle.'</li>
                    <li class="list-group-item">'.$description_pro.'</li>
                    <li class="list-group-item">Date de du début projet : '.$date_debut.'</li>
                    <li class="list-group-item">Date de du fin projet : '.$date_fin.'</li>
                    <li class="list-group-item">Ce projet appatient à la catégorie '.$id_c.'</li>
                </ul>
        </div>
        </div>
        </div>';
        }
    }
    else 
    {
        echo "Aucune correspondance";
    }
}
else 
{
    echo "Entrer une valeur svp";
}
?>