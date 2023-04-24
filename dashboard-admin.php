<?php
    session_start();
    require_once 'object/connection.php';
    require_once 'object/user.php';
    require_once 'object/establishment.php';

    if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
        $autorisation = 1;
        $connection = new Connection();
        $establishmentsLabeled = $connection->GetLabeledEstablishment();
    }

    if(isset($_POST['logout'])){
        session_destroy();
        header('Location: index.php');
    }

    if($autorisation != 1){
        header('Location: login.php');
    }

    require_once 'headerAdmin.php';
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
    <main class="dashboardAdmin">
    <nav>
        <ul>
            <li><a href="dashboard-admin.php">Tous les établissement</a></li>
            <li><a href="dashboard-request.php">Demandes de label</a></li>
        </ul>
    </nav>

    <form method="POST">
        <input type="hidden" name="deconnection" ?>
        <input type="submit" name="deconnection" value="Se deconnecter">
    </form>
    <?php 
        if(isset($_POST["deconnection"])){
            session_destroy();
            header('Location: login.php');
        }
    ?>

    <h1>Tous les établissements labelisés</h1>

    <?php foreach ($establishmentsLabeled as $labeled): ?>
        <p> Nom de l'établissement : <?= $labeled['establishment_name'] ?></p>
        <p> Adresse de l'établissement : <?= $labeled['establishment_adress'] ?></p>
    <?php endforeach; ?>

    </main>




</body>
</html>