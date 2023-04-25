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
                $_POST['pictures'],
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
    <link rel="stylesheet" href="public/css/style.css">
    
    <title>Contact</title>
</head>
<body>
<?php
require_once 'header.php';
?>
<main class="contact">
<h1>Demande de label</h1>

<div class="sectionFormLabel">
        <form class="formLabel" method="POST">
            <div class="splitForm">
            <div class="part1">
            <label class="labelForm" for="owner_firstname">Nom du representant</label>
            <input class="inputForm" type="text" name="owner_firstname" id="owner_firstname">

            <label class="labelForm" for="owner_lastname">Prénom du representant</label>
            <input class="inputForm" type="text" name="owner_lastname" id="owner_lastname">

            <label class="labelForm" for="owner_email">Email du representant</label>
            <input class="inputForm" type="text" name="owner_email" id="owner_email">

            <label class="labelForm" for="owner_number">Numéro de télephone du representant</label>
            <input class="inputForm" type="text" name="owner_number" id="owner_number">
            </div>
            

            <div class="part2">
            <label class="labelForm" for="establishment_name">Nom de l'établissement</label>
            <input class="inputForm" type="text" name="establishment_name" id="establishment_name">

            <label class="labelForm" for="establishment_adress">Adresse de l'établissement</label>
            <input class="inputForm" type="text" name="establishment_adress" id="establishment_adress">

            <label class="otherLabelForm" for="pictures">Sélectionner une image :</label>
            <input class="otherInputForm" type="file" id="imageInput" name="pictures" accept="image/*">
            </div>

            </div>
            <div class="checkbox">
            <label class="otherLabelForm" for="checkboxInput">J'accepte les conditions :</label>
            <input class="checkInputForm" type="checkbox" id="checkboxInput" name="checkboxInput" required>
            </div>
            
            <button class="labelBtn" type="submit">Envoyer</button>
        </form>
</div>
</main>

<?php
require_once 'footer.php';
?>
</body>
<script src="public/js/script.js"></script>
<script src="public/js/accessbilite.js"></script>
</html>