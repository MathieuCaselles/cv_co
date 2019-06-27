<?php include 'bdd.php'; ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Projets CV</title>

    <link rel="stylesheet" type="text/css" media="screen" href="projetStyle.css">

    <?php
        $query = $pdo->prepare("SELECT * FROM projets");
        $query->execute();
        $projets = $query->fetchAll();
    ?>


</head>



<body>

    <nav>
        <p class="menu"><a href="index.php" alt="Mathieu Caselles" title="Retour à l'accueil">Accueil</a></p>
        <p class="menu"><a href="detail.php" alt="Mathieu Caselles" title="Présentation détaillé"> Présentation détaillée </a></p>
        <p class="menu"><a href="contact.php" alt="Mathieu Caselles" title="Contact">Contact</a></p>    </nav>

    <div class="container">

        <h2>Mes projets Réalisés</h2>

        <div class="sousContainer">

            <?php
                foreach ($projets as $projet)
                    {
                        if($projet['fini'])
                        {
                            echo "<div class=\"etiquette\">
                            <div class=\"containerImage\">
                                <img src=\"" . $projet['lien_image'] . "\" alt=\"" . $projet['titre_projet'] . "\" title=\"" . $projet['titre_projet'] . "\" class=\"image\">
                            </div>
            
                            <div class=\"containerDescription\">
                                <div class=\"titreDescription\">
                                    <h3>" . $projet['titre_projet'] . "</h3>
                                </div>
            
                                <div class=\"description\">
                                    <p>" . $projet['description_projet'] . "</p> 
                                            
                                </div>
            
                                <a href=\"" . $projet['lien_git'] ."\" target=\"_blank\">
                                    <input type=\"button\" value=\"Lien GitHub\" class=\"button\"> 
                                </a>
            
                            </div>
                        </div>";

                        }

                    }
            ?>
            
        </div>

      
    </div>

    <div class="container">

        <h2>Mes projets en cours</h2>

        <div class="sousContainer">

        <?php
            foreach ($projets as $projet)
                {
                    if(!$projet['fini'])
                    {
                        echo "<div class=\"etiquette\">
                        <div class=\"containerImage\">
                            <img src=\"" . $projet['lien_image'] . "\" alt=\"" . $projet['titre_projet'] . "\" title=\"" . $projet['titre_projet'] . "\" class=\"image\">
                        </div>
        
                        <div class=\"containerDescription\">
                            <div class=\"titreDescription\">
                                <h3>" . $projet['titre_projet'] . "</h3>
                            </div>
        
                            <div class=\"description\">
                                <p>" . $projet['description_projet'] . "</p> 
                                        
                            </div>
        
                            <a href=\"" . $projet['lien_git'] ."\" target=\"_blank\">
                                <input type=\"button\" value=\"Lien GitHub\" class=\"button\"> 
                            </a>
        
                        </div>
                    </div>";

                    }

                }
        ?>
            
        </div>

        
    </div>

</body>

</html>