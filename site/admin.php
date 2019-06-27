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

    <link rel="stylesheet" type="text/css" media="screen" href="adminStyle.css">

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
        <p class="menu"><a href="detailAdmin.php" alt="Mathieu Caselles" title="Présentation détaillé"> Présentation détaillée </a></p>
        <p class="menu"><a href="projetAdmin.php" alt="Mathieu Caselles" title="Réalisations/Projets"> Réalisations/Projets </a></p>
        <p class="menu"><a href="contactAdmin.php" alt="Mathieu Caselles" title="Contact">Contact</a></p>
        <p class="menu"><a href="logout.php" alt="Mathieu Caselles" title="Contact">Déconexion</a></p>    </nav>

    <div class="container">

        <header>
            
            <img src="<?php echo $presentation['avatar']; ?>" alt="avatar" title="avatar" id="avatar">
            <form method="post">
            <div>
                <textarea name="avatar"><?php
                                            echo $presentation['avatar'];
                                        ?></textarea>
            </div>
            <h1 style="margin-bottom: 32px;">CV de <br>

            <div>
                <textarea name="cv_prenom"><?php
                                            echo $presentation['prenom_cv'];
                                        ?></textarea>
            </div>
            <div>
                <textarea name="cv_nom"><?php
                                            echo $presentation['nom_cv'];
                                        ?></textarea>
            </div>
            </h1>

        </header>


        <hr width= 530px>

        
            <div>
                <textarea id="description" name="cv_description"><?php
                                                                    echo $presentation['description_cv'];
                                                                ?></textarea>
            </div>
            <div>
                    <button type="submit" name="submit_maj">Mettre à jour</button>
                </div>


        <div class="competences">
            <div class="competence">
                <div class="matiere">

                <?php
                    $compteur = 0;
                    $matieres = array();
                    $comparateur = ceil((count($notes1)/2));
                    $comparateurMax = count($notes1);
                    foreach ($notes1 as $note1)
                    {
                        if ($compteur >= $comparateur)
                        {
                            array_push($matieres, $note1['nom_skill_info']);
                            $compteur +=1;
                            if ($compteur == $comparateurMax)
                            {
                                break;
                            }
                            continue;
                        }
                        echo '<p>' . $note1['nom_skill_info'] . "</p>";
                        $compteur += 1;
                    }
                ?>
                </div>

                <div class="note">
                <?php
                    $compteur = 0;
                    $notes2 = array();
                    foreach ($notes1 as $note1)
                    {
                        if ($compteur >= $comparateur)
                        {
                            array_push($notes2, $note1['note']);
                            $compteur +=1;
                            if ($compteur == $comparateurMax)
                            {
                                break;
                            }
                            continue;
                        }
                        echo '<p>' . $note1['note'] . "/5</p>";
                        $compteur += 1;
                    }
                ?>
                </div>
            </div>

            <div class="competence">
                <div class="matiere">
                <?php
                    foreach ($matieres as $matiere)
                    {
                        echo '<p>' . $matiere . "</p>";
                    }
                ?>
                </div>

                <div class="note">
                <?php
                    foreach ($notes2 as $note2)
                    {
                        echo '<p>' . $note2 . "/5</p>";
                    }
                ?>
                </div>
            </div>
        </div>
    
    </div>

    <div class="container">



        <div>
            <textarea name="langage">langage</textarea>
        </div>
        <div>
            <textarea name="note">note</textarea>
        </div>
        <div>
                <button type="submit" name="submit_ajou" >Ajouter</button>
            </div>


    <div>
        <textarea name="langage_a_modifier">langage a modifier</textarea>
    </div>
    <div>
        <textarea name="langage2">langage</textarea>
    </div>
    <div>
        <textarea name="note2">note</textarea>
    </div>
    <div>
            <button type="submit" name="submit_modif">Modifier</button>
        </div>


    <div>
        <textarea name="langage_a_supprimer">langage a supprimer</textarea>
    </div>
    <div>
            <button type="submit" name="submit_suppr">supprimer</button>
        </div>
    </form>

<?php

    if(isset($_POST['submit_maj']))
    {
        $majAvatar = $_POST['avatar'];
        $majNom = $_POST['cv_nom'];
        $majPrenom = $_POST['cv_prenom'];
        $majDescription = $_POST['cv_description'];
        $query = $pdo->prepare("UPDATE cv SET avatar = '" . $majAvatar . "', nom_cv = '" . $majNom . "', prenom_cv = '" . $majPrenom . "', description_cv = \"" . $majDescription . "\" WHERE id_cv = 1");
        $query->execute();
        header('Location: admin.php');
    }

    if(isset($_POST['submit_ajou']))
    {
        $ajoutLangage = $_POST['langage'];
        $ajoutNote = $_POST['note'];
        $query = $pdo->prepare("INSERT INTO competence_informatique(nom_skill_info, note) VALUES('" . $ajoutLangage . "', " . $ajoutNote . ")");
        $query->execute();
        header('Location: admin.php');
    }

    if(isset($_POST['submit_modif']))
    {
        $langageBase = $_POST['langage_a_modifier'];
        $modifLangage = $_POST['langage2'];
        $query = $pdo->prepare("UPDATE competence_informatique SET nom_skill_info ='" . $modifLangage . "' WHERE nom_skill_info ='" . $langageBase . "'");
        $query->execute();
        header('Location: admin.php');
    }

    if(isset($_POST['submit_suppr']))
    {
        $supprLangage = $_POST['langage_a_supprimer'];
        $query = $pdo->prepare("DELETE FROM competence_informatique WHERE nom_skill_info ='" . $supprLangage . "'");
        $query->execute();
        header('Location: admin.php');
    }

?>

    
    </div>


</body>

</html>