<?php 
    require_once 'object/connection.php';
    require_once 'object/user.php';

    $connection = new Connection();

    if ($_POST) {
        $establishment = new Establishment(
                $_POST['owner_firstname'],
                $_POST['owner_lastname'],
                $_POST['owner_email'],
                $_POST['owner_number'],
                $_POST['establishment_name'],
                $_POST['establishment_adress'],
        );

        if ($establishment->verify()) {
            $connection->InsertEstablishment($establishment);
            header('Location: label_request.php');
        } else {
            echo 'Veuillez remplir tous les champs';
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande de label</title>
</head>
<body>

    <h1>Demande de label</h1>
    <form method="POST">
        <label for="owner_firstname">Nom du representant</label>
        <input type="text" name="owner_firstname" id="owner_firstname">

        <label for="owner_lastname">Prénom du representant</label>
        <input type="text" name="owner_lastname" id="owner_lastname">

        <label for="owner_email">Email du representant</label>
        <input type="text" name="owner_email" id="owner_email">

        <label for="owner_number">Numéro de télephone du representant</label>
        <input type="text" name="owner_number" id="owner_number">

        <label for="establishment_name">Nom de l'établissement</label>
        <input type="text" name="establishment_name" id="establishment_name">

        <label for="establishment_adress">Adresse de l'établissement</label>
        <input type="text" name="establishment_adress" id="establishment_adress">

        <button type="submit">Envoyer</button>
    </form>

</body>
</html>