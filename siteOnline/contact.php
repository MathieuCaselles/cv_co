<?php include 'bdd.php'; ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Contact CV</title>

    <link rel="stylesheet" type="text/css" media="screen" href="formulaireStyle.css">


</head>



<body>

    <nav>
        <p class="menu"><a href="index.php" alt="Mathieu Caselles" title="Retour à l'accueil">Accueil</a></p>
        <p class="menu"><a href="detail.php" alt="Mathieu Caselles" title="Présentation détaillé"> Présentation détaillée </a></p>
        <p class="menu"><a href="projet.php" alt="Mathieu Caselles" title="Réalisations/Projets"> Réalisations/Projets </a></p>
    </nav>

    <div class="container">

        <h1>Contact</h1>

        <form method="post">
            <div>
                <input type="text" id="name" name="user_name" value="Nom">
            </div>
            <div>
                <input type="email" id="mail" name="user_mail" value="Email">
            </div>
            <div>
                <textarea name="user_message">Message</textarea>
            </div>
            <div class="button">
                    <button type="submit"  class="button">Envoyer</button>
                </div>
        </form>
        
    </div>

    <?php

    if(isset($_POST['button']))
    {
        $addNom = $_POST['user_name'];
        $addMail = $_POST['user_mail'];
        $addMessage = $_POST['user_message'];
        $query = $pdo->prepare("INSERT INTO formulaire(nom_formulaire, email, message) VALUES('" . $addNom . "', '" . $addMail . "', '" . $addMessage . "')");
        $query->execute();
    }
?>


</body>

</html>