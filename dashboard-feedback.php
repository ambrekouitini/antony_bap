<?php
    session_start();
    require_once 'object/connection.php';
    require_once 'object/user.php';
    require_once 'object/feedback.php';

    if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
        $autorisation = 1;
        $connection = new Connection();
        $feedbacks = $connection->GetAllFeedbacks();
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
    <title>Document</title>
</head>

<body>
    <main class="dashboardFeedback">
        <h1> Dashboard Feedbacks </h1>
        
        <?php foreach ($feedbacks as $feedback): ?>
            <div class="card">
                <div class="card-header">
                    <p> <?= $feedback['establishment'] ?> </p>
                    <p> <?= $feedback['name'] ?> </p>
                    <p> <?= $feedback['mail'] ?> </p>
                    <p> <?= $feedback['comment'] ?> </p>
                </div>
            </div>
        <?php endforeach; ?>

    </main>
</body>
</html>