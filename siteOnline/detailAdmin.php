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

    <link rel="stylesheet" type="text/css" media="screen" href="detailAdminStyle.css">

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
        <p class="menu"><a href="projetAdmin.php" alt="Mathieu Caselles" title="Réalisations/Projets"> Réalisations/Projets </a></p>
        <p class="menu"><a href="contactAdmin.php" alt="Mathieu Caselles" title="Contact">Contact</a></p>    </nav>

    <div class="container">

    <form method="post">
        <p>Parcours scolaire</p>
    <div>
        <textarea name="diplome">diplome</textarea>
    </div>
    <div>
        <textarea name="date">date</textarea>
    </div>
    <div>
        <textarea name="ecole">ecole</textarea>
    </div>
    <div>
            <button type="submit" name="submit_add" >Ajouter</button>
        </div>
        <div>
        <textarea name="diplome_suppr">diplome a supprimer</textarea>
    </div>
    <div>
            <button type="submit" name="submit_suppr" >Supprimer</button>
        </div>

    <p>Expérience pro</p>
    <div>
        <textarea name="date_pro">date</textarea>
    </div>
    <div>
        <textarea name="titre_pro">sujet</textarea>
    </div>
    <div>
        <textarea name="description_pro">description</textarea>
    </div>
    <div>
            <button type="submit" name="submit_add2">Ajouter</button>
        </div>
        <div>
        <textarea name="date_pro_suppr">date</textarea>
    </div>
    <div>
            <button type="submit" name="submit_suppr2">supprimer</button>
        </div>
    
    </div>

    <div class="container">
    <p>loisir</p>
    <div>
        <textarea name="loisir">loisir</textarea>
    </div>
    <div>
            <button type="submit" name="submit_add3">ajouter</button>
        </div>
        <div>
        <textarea name="loisir2">loisir</textarea>
    </div>
    <div>
            <button type="submit" name="submit_suppr3">supprimer</button>
        </div>


        <p>autre competence</p>
    <div>
        <textarea name="autre">autre competence</textarea>
    </div>
    <div>
            <button type="submit" name="submit_add4">ajouter</button>
        </div>
        <div>
        <textarea name="autre2">autre competence</textarea>
    </div>
    <div>
            <button type="submit" name="submit_suppr4">supprimer</button>
        </div>
    </form>



<?php

    if(isset($_POST['submit_add']))
    {
        $addDiplome = $_POST['diplome'];
        $addDate = $_POST['date'];
        $addEcole = $_POST['ecole'];
        $query = $pdo->prepare("INSERT INTO parcours_scolaire(diplome, date_scolaire, ecole) VALUES('" . $addDiplome . "', '" . $addDate . "', '" . $addEcole ."')");
        $query->execute();
    }

    if(isset($_POST['submit_suppr']))
    {
        $supprDiplome = $_POST['diplome_suppr'];
        $query = $pdo->prepare("DELETE FROM parcours_scolaire WHERE diplome ='" . $supprDiplome . "'");
        $query->execute();
    }

    if(isset($_POST['submit_add2']))
    {
        $addDate = $_POST['date_pro'];
        $addTitre = $_POST['titre_pro'];
        $addDescription = $_POST['description_pro'];
        $query = $pdo->prepare("INSERT INTO experience_pro(date_pro, titre_pro, decription_pro) VALUES('" . $addDate . "', '" . $addTitre . "', '" . $addDescription ."')");
        $query->execute();
    }

    if(isset($_POST['submit_suppr2']))
    {
        $supprDate = $_POST['date_pro_suppr'];
        $query = $pdo->prepare("DELETE FROM experience_pro WHERE date_pro ='" . $supprDate . "'");
        $query->execute();
    }

    if(isset($_POST['submit_add3']))
    {
        $addloisir = $_POST['loisir'];
        $query = $pdo->prepare("INSERT INTO loisir(nom_loisir) VALUES('" . $addloisir ."')");
        $query->execute();
    }

    if(isset($_POST['submit_suppr3']))
    {
        $supprLoisir = $_POST['loisir2'];
        $query = $pdo->prepare("DELETE FROM loisir WHERE nom_loisir ='" . $supprLoisir . "'");
        $query->execute();
    }

    if(isset($_POST['submit_add4']))
    {
        $addAutre = $_POST['autre'];
        $query = $pdo->prepare("INSERT INTO autre_competence(nom_skill) VALUES('" . $addAutre ."')");
        $query->execute();
    }

    if(isset($_POST['submit_suppr4']))
    {
        $supprAutre = $_POST['autre2'];
        $query = $pdo->prepare("DELETE FROM autre_competence WHERE nom_skill ='" . $supprAutre . "'");
        $query->execute();
    }

?>

    
    </div>


</body>

</html>