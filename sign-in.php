<?php
    require_once 'object/connection.php';
    require_once 'object/user.php';

    $connection = new Connection();

    if ($_POST) {
        $user = new User(
                $_POST['name'],
                $_POST['email'],
                $_POST['password'],
                $_POST['role'],
        );

        if ($user->verify()) {
            $connection->InsertUser($user);
            header('Location: login.php');
        } else {
            echo 'Veuillez remplir tous les champs';
        }
        
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>

    <form method="POST">
        <label for="name">Nom</label>
        <input type="text" name="name" id="name">

        <label for="email">Email</label>
        <input type="email" name="email" id="email">

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password">

        <label for="role">Fonction</label>
        <select name="role" id="role">
            <option value="admin">Administrateur</option>
        </select>

        <button type="submit">S'inscrire</button>
    </form>

</body>
</html>