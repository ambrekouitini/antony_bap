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

    if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
        $autorisation = 1;
    }
    
    if($autorisation != 1){
        header('Location: login.php');
    }

    if(isset($_POST['logout'])){
        session_destroy();
        header('Location: index.php');
    }

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

<main class="manageEstablishment">
    <h1>Information de l'établissement</h1>

    <div class="all">
        <div class="status">
            <h2>Statut de la demande</h2>
            <div class="container">
                <div class="statusInfo">
                    <p> Statut de la demande : <?= $establishment['status'] ?></p>
                    <p> Date de la demande : <?= $establishment['asked_at'] ?></p>
                </div>
                <?php if ($establishment['status'] === 'En attente') : ?>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $establishment['id']; ?>">
                        <button class="accept"type="submit" name="action" value="accepter">Accepter</button>
                        <button class="refuse" type="submit" name="action" value="refuser">Refuser</button>
                    </form>
                <?php endif;
                ?>
            </div>
        </div>

        <div class="secondRow">
            <div class="owner">
                <h2>Propriétaire</h2>
                <div class="ownerInfo">
                    <div class="info">
                        <h3>Nom : </h3>
                        <p> <?= $establishment['owner_firstname'] ?> <?= $establishment['owner_lastname'] ?></p>
                    </div>
                    <div class="info">
                        <h3>Email : </h3>
                        <p> <?= $establishment['owner_email'] ?></p>
                    </div>
                    <div class="info">
                        <h3>Numéro : </h3>
                        <p> <?= $establishment['owner_number'] ?></p>
                    </div>
                </div>
            </div>

            <div class="infoEsta">
                <h2>Informations sur l'établissement</h2>
                <div class="infoContainer">
                    <div class="info">
                        <h3>Nom : </h3>
                        <p> <?= $establishment['establishment_name'] ?></p>
                    </div>
                    <div class="info">
                        <h3>Adresse : </h3>
                        <p> <?= $establishment['establishment_adress'] ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="photoContainer">
            <h2> Photos de l'établissement : </h2>
            <div class="picture">
                <img src="<?= $establishment['pictures'] ?>" alt="photo1">
            </div>
        </div>
    </div>

</main>
</body>
</html>