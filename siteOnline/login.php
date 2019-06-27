<?php include 'bdd.php';


session_name();
session_start();

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>CV Login</title>

    <link rel="stylesheet" type="text/css" media="screen" href="loginStyle.css">

    <?php

        $user = $_POST['user'] ?? false;
        $password = $_POST['password'] ?? false;
        if ($user && $password)

	{
        $query = $pdo->prepare("SELECT * FROM admin");
        $query->execute();
        $presentation = $query->fetch();

        $query = 'SELECT id_admin, user FROM admin WHERE user = :user AND password = :password';

		$query = $pdo->prepare($query);

		$query->execute([

			'user' => $user,

			'password' => $password,

		]);



		$user_exist = (bool) $query->fetchAll();

        if ($user_exist)

        {
            $_SESSION['admin'] = true;
        }

    }

    if (!empty($_SESSION['admin']))

    {
        header('Location: ./admin.php');
    }

    ?>


</head>



<body>

<div class="container">

    <h1>Connexion administration</h1>

    <form method="POST">

        <label>

            Login :<br/>

            <input type="text" name="user" />

        </label>

        <br/>

        <br/>

        <label>

            Password :<br/>

            <input type="password" name="password" />

        </label>

        <br/>

        <br/>

        <input type="submit" value="Connexion" />

    </form>

</div>

</body>

</html>