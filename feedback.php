<?php
    session_start();
    require_once 'object/connection.php';
    require_once 'object/user.php';

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main class="feedback">

    </main>
</body>
</html>