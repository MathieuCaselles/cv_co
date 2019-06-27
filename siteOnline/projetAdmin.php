<?php include 'bdd.php'; 

session_name();
session_start();
if(empty($_SESSION['admin']))
{
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>CV connecté</title>

    <link rel="stylesheet" type="text/css" media="screen" href="projetAdminStyle.css">

    <?php
            $query = $pdo->prepare("SELECT * FROM cv");
            $query->execute();
            $presentation = $query->fetch();
        ?>

    <?php
            $query = $pdo->prepare("SELECT * FROM competence_informatique");
            $query->execute();
            $notes1 = $query->fetchAll();
        ?>


</head>



<body>

    <nav>
        <p class="menu"><a href="admin.php" alt="Mathieu Caselles" title="Présentation détaillé">Accueil</a></p>
        <p class="menu"><a href="detailAdmin.php" alt="Mathieu Caselles" title="Réalisations/Projets"> Présentation détaillée </a></p>
        <p class="menu"><a href="contactAdmin.php" alt="Mathieu Caselles" title="Contact">Contact</a></p>    
    </nav>


    <div class="container">
    <form method="post">
    <p>loisir</p>
    <div>
        <textarea name="titre">titre</textarea>
    </div>
    <div>
        <textarea name="description">description</textarea>
    </div>
    <div>
        <textarea name="lien_image">lien image</textarea>
    </div>
    <div>
        <textarea name="lien_git">lien git</textarea>
    </div>
    <div>
        <textarea name="fini">fini (booleen)</textarea>
    </div>
    <div>
            <button type="submit" name="submit_add">ajouter</button>
        </div>
        <div>
        <textarea name="titre2">titre</textarea>
    </div>
    <div>
            <button type="submit" name="submit_suppr">supprimer</button>
        </div>
    </form>



<?php

    if(isset($_POST['submit_add']))
    {
        $addTitre = $_POST['titre'];
        $addDescription = $_POST['description'];
        $addImage = $_POST['lien_image'];
        $addGit = $_POST['lien_git'];
        $addFini = $_POST['fini'];
        $query = $pdo->prepare("INSERT INTO projets(titre_projet, description_projet, lien_image, lien_git, fini) VALUES('" . $addTitre . "', '" . $addDescription . "', '" . $addImage ."', '" . $addGit . "', " . $addFini . ")");
        $query->execute();
    }

    if(isset($_POST['submit_suppr']))
    {
        $supprProjet = $_POST['titre2'];
        $query = $pdo->prepare("DELETE FROM projets WHERE titre_projet ='" . $supprProjet . "'");
        $query->execute();
    }

?>

    
    </div>


</body>

</html>