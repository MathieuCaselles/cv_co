<?php include 'bdd.php'; ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>CV connecté</title>

    <link rel="stylesheet" type="text/css" media="screen" href="style.css">

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
        <p class="menu"><a href="detail.php" alt="Mathieu Caselles" title="Présentation détaillé"> Présentation détaillée </a></p>
        <p class="menu"><a href="projet.php" alt="Mathieu Caselles" title="Réalisations/Projets"> Réalisations/Projets </a></p>
        <p class="menu"><a href="contact.php" alt="Mathieu Caselles" title="Contact">Contact</a></p>    </nav>

    <div class="container">

        <header>
            <img src="<?php echo $presentation['avatar']; ?>" alt="avatar" title="avatar" id="avatar">

            <h1 style="margin-bottom: 32px;">CV de <br>
                <?php
                    echo $presentation['prenom_cv'] . ' ' . $presentation['nom_cv'];
                ?>
            </h1>

        </header>


        <hr width= 530px>


        <p id="description">
        <?php
            echo $presentation['description_cv'];
        ?></p>



        <div class="competences">
            <div class="competence">
                <div class="matiere">

            <?php
            $compteur = 0;
            $matieres = array();
            foreach ($notes1 as $note1)
            {
                if ($compteur >= 3)
                {
                    array_push($matieres, $note1['nom_skill_info']);
                    $compteur +=1;
                    if ($compteur == 6)
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
                        if ($compteur >= 3)
                        {
                            array_push($notes2, $note1['note']);
                            $compteur +=1;
                            if ($compteur == 6)
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
                    $compteur = 0;
                    foreach ($matieres as $matiere)
                    {
                        echo '<p>' . $matiere . "</p>";
                        $compteur += 1;
                        if ($compteur == 3)
                        {
                            break;
                        }
                    }
                ?>
                </div>

                <div class="note">
                <?php
                    $compteur = 0;
                    foreach ($notes2 as $note2)
                    {
                        echo '<p>' . $note2 . "/5</p>";
                        $compteur += 1;
                        if ($compteur == 3)
                        {
                            break;
                        }
                    }
                ?>
                </div>
            </div>
        </div>
    
    </div>

</body>

</html>