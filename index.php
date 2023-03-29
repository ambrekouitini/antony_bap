<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Accueil</title>
</head>
<body class="index">
    <?php
    require_once 'header.php';
    ?>
    <p class="tempMarg"></p>
    <hr>

<section class="refParticuliers">
    <div class="refParticuliersBox">
        <div class="refParticuliersDesc">
            <div class="refParticuliersTitle">
                Réferencement de particuliers
            </div>
            <div class="refParticuliersText">
                Vous voulez que votre bâtiment soit référencé comme accessible à tous sur nos services. Faites votre demande ici !
            </div>
        </div>
        <div class="refParticuliersButtonBox">
            <a class="refParticuliersButton" href="#">Accéder</a>
        </div>
    </div>

</section>







<section class="contactSection">
    <h3 class="contactTitle">Nous contacter</h3>
    <form action="POST" class="contactForm">
        <div class="contactFormUpperSide">
                <div class="contactFormUpperLeftSide">
                    <input type="text" name="nom" placeholder="Nom">
                    <input type="text" name="email" placeholder="Email">
                </div>
                <div class="contactFormUpperRightSide">
                    <input type="text" name="prenom" placeholder="Prénom">
                    <input type="text" name="telephone" placeholder="Téléphone">
                </div>
            </div>
        <div class="contactFormBottomSide">
            <textarea rows="5" cols="33" name="retour" placeholder="Description"></textarea>
        </div>
        <button type="submit" value="contactForm">Envoyer</button>
    </form>
</section>



    <?php
    require_once 'footer.php';
    ?>
</body>
<script src="public/js/script.js"></script>

</html>