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
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>

    <form method="POST">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password">

        <?php if(isset($_GET['error']) && $_GET['error'] == 1) { ?>
            <div class="errorLog">
                <h3>Incorrect mail or password !</h3>
                <p>Please enter an email address and a corresponding password</p>
            </div>
        <?php } ?>

        <button type="submit">Se connecter</button>
    </form>
    
</body>
</html>