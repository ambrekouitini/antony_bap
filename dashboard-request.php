<?php
    session_start();
    require_once 'object/connection.php';
    require_once 'object/user.php';
    require_once 'object/establishment.php';
    if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
        $autorisation = 1;
        $connection = new Connection();
        $establishments = $connection->GetEstablishment();
    }

    if($autorisation != 1){
        header('Location: login.php');
    }

    if(isset($_POST['logout'])){
        session_destroy();
        header('Location: index.php');
    }

    if(isset($_POST["statusFilter"])){
        $status = $_POST["status"];
        if($status == "Tous"){
            $establishments = $connection->GetEstablishment();
        }else{
            $establishments = $connection->GetEstablishmentByStatus($status);
        }
    }

    if(isset($_POST["dateAsc"])){
        $establishments = $connection->GetEstablishmentByDateAsc();
    }
    if(isset($_POST["dateDesc"])){
        $establishments = $connection->GetEstablishmentByDateDesc();
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
    <title>Dashboard - Demandes</title>
</head>


<body>
<main class="dashboardRequest">
    <h1>Dashboard demandes de label</h1>
    
    <div class="option">
            <form class="sort" method="POST">
                <input type="submit" name="dateAsc" value="Date croissante">
                <input type="submit" name="dateDesc" value="Date décroissante">
            </form>

            <form class="filter" method="POST">
                <select name="status">
                    <option value="Tous">Tous</option>
                    <option value="En attente">En attente</option>
                    <option value="Accepté">Accepté</option>
                    <option value="Refusé">Refusé</option>
                </select>
                <input type="submit" name="statusFilter" value="Filtrer">
            </form>
    </div>

    <div class="allcard">
        <?php foreach ($establishments as $establishment): ?>
            <div class="card">
                <div class="card-header">
                    <?php if($establishment['pictures'] != null): ?>
                        <img src="<?= $establishment['pictures']?>" alt="">
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <div class="firstRow">
                        <div class="name">
                            <span><?= date("d/m/Y", strtotime($establishment['asked_at']))?></span>
                            <div class="space">
                                <h2><?= $establishment['establishment_name'] ?></h2>
                                <p><?= $establishment['establishment_adress'] ?></p>
                            </div>
                        </div>
                        <div class="status">
                            <p><?= $establishment['status'] ?></p>
                            <?php if ($establishment['status'] == 'En attente'): ?>
                                <img src="images/wait.svg" alt="">
                            <?php elseif ($establishment['status'] == 'Accepté'): ?>
                                <img src="images/accept.svg" alt="">
                            <?php elseif ($establishment['status'] == 'Refusé'): ?>
                                <img src="images/refuse.svg" alt="">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="info">
                        <div class="tel">
                            <img src="images/phone.svg" alt="">
                            <p>: <?= $establishment['owner_number'] ?></p>
                        </div>
                        <div class="button">
                            <a href="manage-establishment.php?id=<?php echo $establishment['id']?>">Gerer</a>
                            <img src="images/arrow.svg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>
</body>
</html>