<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://use.typekit.net/leo4oek.css">
    <title>Accueil</title>
    <link rel="stylesheet" href="public/css/pages/style.css">
    <title>Document</title>
</head>
<body class="index">
    <?php
    require_once 'header.php';
    ?>
    <div class ="accueil-content">
        <img src="images/fond.png" alt="fond">
        <div class="accueil-text">
            <h1>Bienvenue sur Antony Accessibilité</h1>
            <h2>La carte qui montre où tous les accès sont possibles !</h2>
            <div>
                <a href="#"><h3 class="button">Voir la carte</h3></a>
            </div>
        </div>
    </div>
    <div class="presentation-content">
        <h2>Qui sommes-nous ?</h2>
        <h3>Notre site propose un répertoire interactif, sous forme de carte,  permettant de voir quelles infrastructures de la ville d’Antony sont répertoriées comme accessibles, selon les besoins et conditions de l’utilisateur.
Vous pourrez trouver rapidement les stations de bus et de métro, les places de parking handicapé, les passages
piétons adaptés et bien plus encore.</h3>
    </div>
    <div class="objectif-content">
        <div class="objectif">
            <h2>NOTRE OBJECTIF</h2>
            <h3>Nous voulons donner à toute personne à mobilité réduite ou autre situation, les meilleurs itinéraires et informations les plus adaptées à leur profil, dans la ville d’Antony.</h3>
        </div>
        <div class="access">
            <h2>Signaler un lieu non accessible ?</h2>
            <h3>Vous pouvez nous aider en signalant des lieux non répertoriés.</h3>
            <div><a href="#"><h3>SIGNALER</h3></a></div>
        </div>
    </div>
    <div class="global-frise">
    <div class="frise-content-bis">
        <div class="frise">
            <div class="point">1 <div class="stick-top"></div></div>
            <div class="point">2 <div class="stick-bottom"></div></div>
            <div class="point">3 <div class="stick-top"></div></div>
            <div class="point">4</div>
        </div>
    </div>

    <div class="text-frise-block">
    <div class="text-top-frise">
        <div class="first-text">
            <h2>Un problème, des solutions</h2>
            <h3>Parcourez le site afin de trouver les solutions les plus adaptées à vos problèmes</h3>
        </div>
        <div class="second-text">
            <h2>Informez-vous sur les infrastructures adaptées</h2>
            <h3>Les infrastructures vous seront données pour vous permettre de vous adapter</h3>
        </div>
    </div>
    <div class="frise-content">
        <div class="frise">
            <div class="point">1 <div class="stick-top"></div></div>
            <div class="point">2 <div class="stick-bottom"></div></div>
            <div class="point">3 <div class="stick-top"></div></div>
            <div class="point">4 <div class="stick-bottom"></div></div>
        </div>
    </div>
    <div class="text-bottom-frise">
        <div class="first-text">
            <h2>Parcourez la map</h2>
            <h3>Notre map interactive vous permettra d’assurer la disponibilité et de faciliter vos déplacements</h3>
        </div>
        <div class="second-text">
            <h2>Profitez de la ville sans soucis</h2>
            <h3>La ville d’Antony n’a jamais été aussi plaisante pour se déplacer.</h3>
        </div>
    </div>
    </div>
</div>

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


<div class="contactBody">
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
</div>





    <?php
    require_once 'footer.php';
    ?>
    <script src="public/js/script.js"></script>
</body>
</html>