<?php 
    if(!isset($_GET['p']) || $_GET['p'] == "")
        $page = "index";
    else
    {
        if(!file_exists("content/".$_GET['p'].".php"))
            $page = "page404";
        else
        $page = $_GET['p'];
    }

    ob_start(); //arrete l'affichage
        include "content/{$page}.php";
        $content = ob_get_contents();//recupere la page appelé
    ob_end_clean();//relance l'affichage

    include"layout.php"; 

?>