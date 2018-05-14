<?php 

$requete = $bdd->query("SELECT * FROM projet");

while ($reponse = $requete->fetch()) 

{
        
        $url = $reponse['url'];
        $id_p = $reponse['id_p'];
        $libelle = $reponse['libelle'];
        $description_pro = $reponse['description_pro'];
        $screenshot = $reponse['screenshot'];
        $date_debut = $reponse['date_debut'];
        $date_fin = $reponse['date_fin'];
        $id_c = $reponse['id_c']; 
    if($id_p % 2 == 1)
    {
        echo '<div class="row">
        <div class="col-4 offset-md-1">
            <a class="zoombox" href="pictures/'.$screenshot.'"> <img class="rounded-bottom" src="pictures/'.$screenshot.'" width="500"></a>
        </div>
        <div class="col-5 offset-md-1">
            <div class="card" style="width: 30rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Libelle du projet : '.$libelle.'</li>
                    <li class="list-group-item">'.$description_pro.'</li>
                    <li class="list-group-item">Date de du début projet : '.$date_debut.'</li>
                    <li class="list-group-item">Date de du fin projet : '.$date_fin.'</li>
                    <li class="list-group-item">Ce projet appatient à la catégorie '.$id_c.'</li>
                    <li class="list-group-item"><a href="'.$url.'" class="list-group-item list-group-item-action active">Consulter le projet</a></li>
                </ul>
        </div>
        </div>
        </div>';
    }
    else
    {
    echo '<div class="row">
        <div class="col-4 offset-md-1">
            <div class="card" style="width: 30rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Libelle du projet : '.$libelle.'</li>
                    <li class="list-group-item">'.$description_pro.'</li>
                    <li class="list-group-item">Date de du début projet : '.$date_debut.'</li>
                    <li class="list-group-item">Date de du fin projet : '.$date_fin.'</li>
                    <li class="list-group-item">Ce projet appatient à la catégorie '.$id_c.'</li>
                    <li class="list-group-item"><a href="'.$url.'" class="list-group-item list-group-item-action active">Consulter le projet</a></li>
                </ul>
                </div>
        </div>
        <div class="col-4 offset-md-1">
            <a class="zoombox" href="pictures/'.$screenshot.'"> <img class="rounded-bottom" src="pictures/'.$screenshot.'" width="500"></a>
        </div>
        </div>'; 
    }
}?>