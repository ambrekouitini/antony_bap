<?php
    require_once 'object/connection.php';
    require_once 'object/contact.php';

    $connection = new Connection();

    if ($_POST) {
        $contact = new Contact(
            $_POST['etablissement'],
            $_POST['nom'],
            $_POST['retour'],
        );

        if ($contact->verify()) {
            $connection->InsertContact($contact);
            header('Location: index.php');
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
<body class="index ">
<?php
require_once 'header.php';
?>

<main class="contactBody">
<section class="contactPres">
    <h1 class="contactTitle">Nous contacter</h1>
    <div class="contactText">Nous apprécions votre opinion ! N'hésitez pas à partager votre expérience avec nous !</div>
</section>

    <form method="POST" class="contactForm">
        <div class="contactInputs">
            <div class="contactFormLeftSide">
                <div>
                    <label for="etablissement">Selectionner un établissement</label>
                    <input type="text" name="etablissement" placeholder="Nom de l’établissement ...">
                </div>
                <div>
                    <label for="nom">Votre nom</label>
                    <input type="text" name="nom" placeholder="Votre nom ...">
                </div>
            </div>
            <div class="contactFormRightSide">
                <label for="retour">Ecrivez votre retour</label>
                <input type="text" name="retour" >
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

</html>