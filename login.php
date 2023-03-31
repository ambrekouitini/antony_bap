<?php
    session_start();
    require_once 'object/connection.php';
    require_once 'object/user.php';

    $connection = new Connection();

    if ($_POST) {
        $user = new User(
            '',
            $_POST['email'],
            $_POST['password'],
            ''
        );

        $connection = new Connection;
        $verify = $connection->LoginVerify($user);

        if ($verify === true) {
            if ($_SESSION['role'] === 'admin') {
                header('Location: dashboard-admin.php');
            } else {
                header('Location: login.php?error=1');
            }
        } else {
            header('Location: login.php?error=1');
        };
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Changa:wght@200;300;400;500;600;700;800&family=Press+Start+2P&display=swap" rel="stylesheet">
    <title>Connexion</title>
</head>
<body class="login">

    <div class="containerLeft">
        <div class="title">
            <img src="/images/antonyLogo.png" alt="logo ville antony">
            <h1>Access'Tony</h1>
        </div>
    </div>
    <div class="containerRight">
        <div class="mainContainer">
            <h2>Connexion</h2>
            <p>Connectez-vous pour accéder à votre espace admin.</p>
        </div>
        <div class="formContainer">
            <form method="POST">
                <div class="labelContainer">
                    <!-- <label for="email">Email</label> -->
                    <input type="email" name="email" id="email" placeholder="adresse mail">
                </div>
                <div class="labelContainer">
                    <!-- <label for="password">Mot de passe</label> -->
                    <input type="password" name="password" id="password" placeholder="mot de passe">
                </div>

                <?php if(isset($_GET['error']) && $_GET['error'] == 1) { ?>
                    <div class="errorLog">
                        <h3>Mot de passe ou email incorrect !</h3>
                        <p>Entrez un mot de passe et un email correspondant</p>
                    </div>
                <?php } ?>

                <button type="submit">Se connecter</button>
            </form>
        </div>
    </div>



    
</body>
</html>