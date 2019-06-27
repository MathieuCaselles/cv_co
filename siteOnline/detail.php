<?php include 'bdd.php'; ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Détail CV</title>

    <link rel="stylesheet" type="text/css" media="screen" href="detailStyle.css">
              
    <?php
        $query = $pdo->prepare("SELECT * FROM competence_informatique");
        $query->execute();
        $notes1 = $query->fetchAll();
    ?>

    <?php
        $query = $pdo->prepare("SELECT * FROM parcours_scolaire");
        $query->execute();
        $parcourScolaire = $query->fetchAll();
    ?>

    <?php
        $query = $pdo->prepare("SELECT * FROM experience_pro");
        $query->execute();
        $parcoursPro = $query->fetchAll();
    ?>

    <?php
        $query = $pdo->prepare("SELECT * FROM loisir");
        $query->execute();
        $loisirs = $query->fetchAll();
    ?>

    <?php
        $query = $pdo->prepare("SELECT * FROM autre_competence");
        $query->execute();
        $skills = $query->fetchAll();
    ?>

</head>



<body>

    <nav>
        <p class="menu"><a href="index.php" alt="Mathieu Caselles" title="Retour à l'accueil">Accueil</a></p>
        <p class="menu"><a href="projet.php" alt="Mathieu Caselles" title="Réalisations/Projets"> Réalisations/Projets </a></p>
        <p class="menu"><a href="contact.php" alt="Mathieu Caselles" title="Contact">Contact</a></p>
    </nav>

    <div class="container">

        <header>
            <p>CASELLES Mathieu</p>
    
            <p>Étudiant B1 Informatique</p>
        </header>


        <hr width= 982px>

        
        <div class="etage">
            <section >
                <h2>Compétences Informatique</h2> 

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
            </section>

            <div class="borderRightEtage1"></div>

            <section>
                <h2>Parcours Scolaire</h2>
                <div class="parcourScolaire">
                <ul>
                    <?php
                    foreach ($parcourScolaire as $parcourSco)
                                {
                                    echo '<li>' . $parcourSco['diplome'] . ' (' . $parcourSco['date_scolaire'] . ') ' . 'via ' . $parcourSco['ecole'] . "</li>";
                                }
                    ?>
                </ul>
                </div>

            </section>
        </div>

        <hr width= 982px>

        <section class="etageMilieu">
            <h2>Expérience Professionnelle</h2>

            <div class="listeMilieu">
            <ul>

                <?php
                    foreach ($parcoursPro as $parcourPro)
                        {
                            echo '<li> <h3>' . '(' . $parcourPro['date_pro'] . ') ' . $parcourPro['titre_pro'] . '</h3>' . '<p>' . $parcourPro['decription_pro'] . "</p></li>";
                        }
                ?>

            </ul>
            </div>
        </section>

        <hr width= 982px>

        <div class="etage3">
            <section class="borderRightEtage3">
                <div class="containerEtage3">
                <h2>Loisirs</h2>

                <ul class="etage3overflow">
                <?php
                    foreach ($loisirs as $loisir)
                        {
                            echo '<li>' . $loisir['nom_loisir'] . "</li>";
                        }
                ?>
                </ul>
            </div>
            </section>

            <section class="borderRightEtage3v2">
                <div class="containerEtage3">
                <h2>Autres compétences</h2>

                <ul class="formatLi2">
                <?php
                    foreach ($skills as $skill)
                        {
                            echo '<li>' . $skill['nom_skill'] . "</li>";
                        }
                ?>
                </ul>
                </div>

            </section>

            <section class="containerEtage3">
                <h2>Page GitHub</h2>

                <a href="https://github.com/MathieuCaselles" alt="Mathieu Caselles" title="GitHub" target="_blank"><img src="image_index/GitHub.png" alt="GitHub" title="GitHub" id="imageGit"></a>
                
            </section>

        </div>

    </div>
</body>

</html>