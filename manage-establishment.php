<?php
    session_start();
    require_once 'object/connection.php';
    require_once 'object/user.php';
    require_once 'object/establishment.php';

    if (isset($_GET['id'])) {
        $connection = new Connection;
        $establishmentId = $_GET['id'];
        $establishment = $connection->GetEstablishmentById($establishmentId);
        $found = true;
    } else {
        $found = false;
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

    <?php
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
            $autorisation = 1;
        }
        
        if($autorisation != 1){
            header('Location: login.php');
        }
    ?>

    <h1>Afficher Etablissement</h1>

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
    
    <h2> Information de l'établissement </h2>
    <p> Nom de l'établissement : <?= $establishment['establishment_name'] ?></p>
    <p> Adresse de l'établissement : <?= $establishment['establishment_adress'] ?></p>
    <p> Nom du propriétaire : <?= $establishment['owner_firstname'] ?> <?= $establishment['owner_lastname'] ?></p>
    <p> Email du propriétaire : <?= $establishment['owner_email'] ?></p>
    <p> Numéro du propriétaire : <?= $establishment['owner_number'] ?></p>
    <p> Photos de l'établissement : </p>
    <img src="public/img/<?= $establishment['establishment_photo1'] ?>" alt="photo1">

    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $establishment['id']; ?>">
        <button type="submit" name="action" value="accepter">Accepter</button>
        <button type="submit" name="action" value="refuser">Refuser</button>
    </form>

    <?php
        if(isset($_POST['action']) && $_POST['action'] === 'refuser') {
            $id = $_POST['id'];
            $connection = new Connection();
            $connection->RefuseEstablishment($id);
            header('Location: dashboard-request.php');
        }
        if(isset($_POST['action']) && $_POST['action'] === 'accepter') {
            $id = $_POST['id'];
            $connection = new Connection();
            $connection->AcceptEstablishment($id);
            header('Location: dashboard-request.php');
        }
    ?>



</body>
</html>