<?php
    session_start();
    require_once 'object/connection.php';
    require_once 'object/user.php';
    require_once 'object/establishment.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Dashboard - Demandes</title>
</head>
<body>

    <?php
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
            $autorisation = 1;
            $connection = new Connection();
            $establishments = $connection->GetEstablishment();
        }
    
        if($autorisation != 1){
            header('Location: login.php');
        }
    ?>

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

    <h1>Toutes les demandes de label</h1>

    <?php 
        if(isset($_POST["deconnection"])){
            session_destroy();
            header('Location: login.php');
        }
    ?>

    <form method="POST">
        <input type="submit" name="dateAsc" value="Date croissante">
        <input type="submit" name="dateDesc" value="Date décroissante">
    </form>

    <form method="POST">
        <select name="status">
            <option value="Tous">Tous</option>
            <option value="En attente">En attente</option>
            <option value="Accepté">Accepté</option>
            <option value="Refusé">Refusé</option>
        </select>
        <input type="submit" name="statusFilter" value="Filtrer">
    </form>

    <?php 
        if(isset($_POST["statusFilter"])){
            $status = $_POST["status"];
            if($status == "Tous"){
                $establishments = $connection->GetEstablishment();
            }else{
                $establishments = $connection->GetEstablishmentByStatus($status);
            }
        }
    ?>

    <?php
        if(isset($_POST["dateAsc"])){
            $establishments = $connection->GetEstablishmentByDateAsc();
        }
        if(isset($_POST["dateDesc"])){
            $establishments = $connection->GetEstablishmentByDateDesc();
        }
    ?>

    <?php foreach ($establishments as $establishment): ?>
        <div>
            <h3><?= $establishment['owner_firstname'] ?></h3>
            <h3><?= $establishment['owner_lastname']?></h3>
            <h3><?= $establishment['owner_email'] ?></h3>
            <h3><?= $establishment['owner_number'] ?></h3>
            <h3><?= $establishment['establishment_name'] ?></h3>
            <h3><?= $establishment['establishment_adress'] ?></h3>
            <h3><?= date("d/m/Y", strtotime($establishment['asked_at']))?></h3>
            <h3><?= $establishment['status'] ?></h3>
            <a href="manage-establishment.php?id=<?php echo $establishment['id']?>">Gerer la demande</a>
        </div>
    <?php endforeach; ?>
</body>
</html>