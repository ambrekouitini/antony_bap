<?php
    session_start();
    require_once 'object/connection.php';
    require_once 'object/user.php';

    if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
        $autorisation = 1;
    }

    if($autorisation != 1){
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Dashboard Admin</title>
</head>
<body>
    <h1>Dashboard Admin</h1>
    <h2>Bienvenue</h2>
    <form action="login.php" method="POST">
        <button type="submit">Se deconnecter</button>
    </form>
</body>
</html>