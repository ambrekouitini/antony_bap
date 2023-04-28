<?php
    session_start();
    require_once 'object/connection.php';
    require_once 'object/user.php';

    if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
        $autorisation = 1;
        $connection = new Connection();
        $feedbacks = $connection->GetAllFeedbacks();
    }

    if(isset($_POST['logout'])){
        session_destroy();
        header('Location: index.php');
    }

    if($autorisation != 1){
        header('Location: login.php');
    }

    if(isset($_POST["dateAsc"])){
        $feedbacks = $connection->GetFeedbackByDateAsc();
    }
    if(isset($_POST["dateDesc"])){
        $feedbacks = $connection->GetFeedbackByDateDesc();
    }

    if(isset($_POST['delete'])){
        $connection->DeleteFeedback($_POST['id']);
        header('Location: dashboard-feedback.php');
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
        <div class="firstRow">
            <h1>Dashboard des feedbacks</h1>
            <form class="sort" method="POST">
                <input type="submit" name="dateAsc" value="Date croissante">
                <input type="submit" name="dateDesc" value="Date décroissante">
            </form>
        </div>

        <div class="tableHeader">
            <div class="header">Coordonées</div>
            <div class="header">Etablissement</div>
            <div class="header">Message</div>
            <div class="header">Date</div>
        </div>

        <div class="allFeedbacks">
            <?php foreach ($feedbacks as $feedback): ?>
                <div class="feedback">
                    <div class="feedbackInfo">
                        <p><?= $feedback['name'] ?></p>
                        <p><?= $feedback['mail'] ?></p>
                    </div>
                    <div class="feedbackEstablishment">
                        <p><?= $feedback['establishment'] ?></p>
                    </div>
                    <div class="feedbackMessage">
                        <p><?= $feedback['comment'] ?></p>
                    </div>
                    <div class="feedbackDate">
                        <p><?= date('Y-m-d', strtotime($feedback['send_at'])) ?></p>
                        <div class="option">
                            <form method="POST">
                                <input type="hidden" name="id" value="<?= $feedback['id'] ?>">
                                <button type="submit" name="delete" class="delete-btn"><img src="images/trash.svg" alt="Supprimer"></button>
                                <a href="mailto:<?= $feedback['mail'] ?>" class="reply-btn"><img src="images/reply.svg" alt="Répondre"></a>
                            </form>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>