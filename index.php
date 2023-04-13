<?php
    require_once 'object/connection.php';
    require_once 'object/warn.php';

    $connection = new Connection();

    if ($_POST) {
        $warn = new Warn(
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['phone'],
            $_POST['retour'],
        );

        if ($warn->verify()) {
            $connection->InsertWarn($warn);
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
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://use.typekit.net/leo4oek.css">
    <title>Accueil</title>
</head>
<body class="index">
    <?php
    require_once 'header.php';
    ?>
    <!--------------------- Marge de Ryan pour pouvoir coder A ENLEVER QUAND LA PAGE ACCUEIL EST FINI--------------------------->
    <p class="tempMarg"></p>
    <hr>
    <!---------------------- -A ENLEVER QUAND LA PAGE ACCUEIL EST FINI---------------------------->

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




<section class="CarouselAvis">
    <h3>Nos utilisateurs nous font confiance</h3>
    <div class="appear" data-delai="0">
        <div class="bloc">
            <div class="diapo"><!-- mise en place de la div pour la diapo -->
                <div class="elements"><!-- mise en place de la div qui contient tout les slides -->
                    <div class="element active"><!-- mise en place de la div qui contient le premier slides -->
                        <div class="AvisCard">
                            <div class="AvisName">John</div>
                            <div class="AvisFlex">
                                <div class="AvisText">
                                    <div class="AvisTitle">Super accessible !</div>
                                    <div class="AvisComment">Super accueil, personnel très poli. Je recommande si vous cherchez un point relais !</div>
                                </div>
                                <div class="AvisDate"><p>12/02/23</p></div>
                            </div>
                        </div>
                    </div>
                    <div class="element"><!-- mise en place de la div qui contient le deuxieme slides -->
                        <div class="AvisCard">
                            <div class="AvisName">John</div>
                            <div class="AvisFlex">
                                <div class="AvisText">
                                    <div class="AvisTitle">Super accessible !</div>
                                    <div class="AvisComment">Super accueil, personnel très poli. Je recommande si vous cherchez un point relais !</div>
                                </div>
                                <div class="AvisDate"><p>12/02/23</p></div>
                            </div>
                        </div>
                    </div>
                    <div class="element"><!-- mise en place de la div qui contient le troisieme slides -->
                        <div class="AvisCard">
                            <div class="AvisName">John</div>
                            <div class="AvisFlex">
                                <div class="AvisText">
                                    <div class="AvisTitle">Super accessible !</div>
                                    <div class="AvisComment">Super accueil, personnel très poli. Je recommande si vous cherchez un point relais !</div>
                                </div>
                                <div class="AvisDate"><p>12/02/23</p></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!---->
                <i id="nav-gauche" class="las la-chevron-left"></i><!-- pour defiler a gauche -->
                <i id="nav-droite" class="las la-chevron-right"></i><!-- pour defiler a droite -->
            </div>
        </div>
    </div>
</section>




<section class="partenaires">
    <h3 class="partenairesTitle">Nos partenaires</h3>
    <div class="partenairesLogos">
        <img src="images/SNCF logo.png" alt="SNCF logo" class=" img1">
        <img src="images/RATP logo.png" alt="RATP logo" class=" img2">
        <img src="images/Anthony Voyages logo.png" alt="Anthony Voyages logo" class=" img3">
        <img src="images/Croix Rouge logo.png" alt="Croix Rouge logo" class=" img4">
        <img src="images/MONOPRIX logo.png" alt="MONOPRIX logo" class=" img5">
        <img src="images/Citya logo.png" alt="Citya logo" class=" img6">
    </div>
</section>


<section class="contactSection">
    <h3 class="contactTitle">Nous contacter</h3>
    <form method="POST" class="contactForm">
        <div class="contactFormUpperSide">
                <div class="contactFormUpperLeftSide">
                    <input type="text" name="nom" placeholder="Nom">
                    <input type="text" name="prenom" placeholder="Prénom">
                </div>
                <div class="contactFormUpperRightSide">
                    <input type="text" name="email" placeholder="Email">
                    <input type="text" name="phone" placeholder="Téléphone">
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
    <script src="public/js/script.js"></script>
</body>
</html>