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

    if(isset($_GET['searchTerm'])) {
        $searchTerm = $_GET['searchTerm'];
        $orders = $connection->searchEstablishment($searchTerm);
    }

    require_once 'headerAdmin.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/output.css">
    <title>Dashboard Admin</title>
</head>


<body>
<main class="dashboardAdmin">
    <h1>Dashboard liste des établissements labelisés</h1>
    <div class="optionBar">
        <form method="get">
            <div class="search">
                <img src="images/search.svg" alt="">
                <input type="text" name="searchTerm" placeholder="Rechercher un nom d'établissement...">
            </div>
            <button type="submit">Rechercher</button>
        </form>
    </div>

    <div class="allcard">
        <?php foreach ($establishmentsLabeled as $labeled): ?>
            <div class="card">
                <div class="card-header">
                    <?php if($labeled['pictures'] != null): ?>
                        <img src="<?= $labeled['pictures']?>" alt="">
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <div class="name">
                        <h2><?= $labeled['establishment_name'] ?></h2>
                        <p><?= $labeled['establishment_adress'] ?></p>
                    </div>
                    <div class="info">
                        <div class="tel">
                            <img src="images/phone.svg" alt="">
                            <p>: <?= $labeled['owner_number'] ?></p>
                        </div>
                        <div class="button">
                            <a href="dashboard-admin.php?id=<?= $labeled['id'] ?>">Afficher Plus
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