<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/test.css">
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    <title>Accessibilité</title>
</head>

<body class="index">
    <?php
    require_once 'header.php';
    ?>
    <p class="tempMarg"></p>

    <section class="sectionSearchBar">
        <div class="accessSearchBar">
            <img src="images/material-symbols_search-rounded.png" alt="searchIcon">
            <input type="text" placeholder="Rechercher..." class="accessSearchInput">
        </div>
    </section>
    <button class="FilterIcon">
        <img src="images/settings.png" alt="" class="">
    </button>

    <section class="AccessMap">
        <div class="map" id="map"></div>

            <div class="FilterMap">
                <div class="FilterMapTitle">
                    <button class="CloseFilter">
                        >
                    </button>
                    <h2 class="">
                        Options
                    </h2>
                </div>
                <div class="FilterMapSection">
                    <div class="FilterMapSectionTitle">
                        <h3>Filtre</h3>
                    </div>
                    <div class="FilterMapFilterSectionIcons">
                        <div class="FilterMapFilterSectionIcon"></div>
                        <div class="FilterMapFilterSectionIcon"></div>
                        <div class="FilterMapFilterSectionIcon"></div>
                        <div class="FilterMapFilterSectionIcon"></div>
                        <div class="FilterMapFilterSectionIcon"></div>
                        <div class="FilterMapFilterSectionIcon"></div>
                        <div class="FilterMapFilterSectionIcon"></div>
                        <div class="FilterMapFilterSectionIcon"></div>
                    </div>
                </div>

                <div class="FilterMapSection">
                    <div class="FilterMapSectionTitle">
                        <h3>Rayon</h3>
                    </div>
                    <div class="FilterMapRadiusSectionSlider">
                        <input type="range" id="cowbell" name="cowbell"
                               min="0" max="300" value="90" step="10" class="progress">
                    </div>
                </div>

            </div>
        <div id="map"></div>
    </section>




    <button class="LocationBtn">
        <img src="images/Google_Maps_Pin.png" alt="">
    </button>
    <div class="Location">
        <img src="images/AuchanLocation.png" alt="Auchan">
        <div class="LocationPres">
            <div class="LocationTitle">
                Auchan
            </div>
            <div class="LocationTabs">
                <div class="Tab activeTab">Accessibilité</div>
                <div class="Tab">Contact</div>
                <div class="Tab">Informations</div>
            </div>
            <ol class="LocationText">
                <li>Les magasins Auchan sont généralement accessibles aux personnes à mobilité réduite grâce à des rampes d'accès et des ascenseurs.</li>
                <li>Les parkings des magasins Auchan sont souvent équipés de places de parking réservées aux personnes à mobilité réduite.</li>
                <li>Les allées du magasin sont larges et bien éclairées pour faciliter la circulation des clients.</li>
            </ol>
        </div>
    </div>
    <?php
    require_once 'footer.php';
    ?>
    <script src="public/js/script.js"></script>
    <script src="public/js/accessbilite.js"></script>
    <script src='http://www.bing.com/api/maps/mapcontrol?callback=getMap' async></script>
</body>

</html>