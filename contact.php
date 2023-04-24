<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Contact</title>
</head>
<body class="index ">
<?php
require_once 'header.php';
?>

<main class="contactBody">
<section class="contactPres">
    <h1 class="contactTitle">Nous contacter</h1>
    <div class="contactText">Nous apprécions votre opinion ! N'hésitez pas à partager votre expérience avec nous !</div>
</section>
    <form action="POST" class="contactForm">
        <div class="contactInputs">
            <div class="contactFormPart1">
                <div class="contactFormPart1_1">
                    <label for="etablissement">Selectionner un établissement</label>
                    <input type="text" name="etablissement" placeholder="Nom de l’établissement ...">
                </div>
                <div class="contactFormPart1_2">
                    <label for="nom">Votre nom</label>
                    <input type="text" name="nom" placeholder="Votre nom ...">
                </div>
            </div>
            <div class="contactFormPart2">
                <label for="retour">Ecrivez votre retour</label>
                <textarea rows="5" cols="33" name="retour" placeholder="Ecrivez votre retour"></textarea>
            </div>
        </div>
        <button type="submit" value="contactForm">Envoyer</button>
    </form>
</main>
<?php
require_once 'footer.php';
?>
</body>
<script src="public/js/script.js"></script>
<script src="public/js/accessbilite.js"></script>
</html>