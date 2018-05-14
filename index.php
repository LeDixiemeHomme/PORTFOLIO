<?php include"includes/header.php"; ?>
<?php 

    if($content != NULL)
    { ?>
<?= $content; 
    }
    else
    {
        if(isset($_POST['recherche']))
             {
                 include"includes/recherche.php";
             }
        else
           {
               include"includes/presentation.php";
        }
    }?>


    </div>
    <!-- div de fin du container -->

    <?php include"includes/footer.php"; ?>