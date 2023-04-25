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


    <section class="AccessMap">
        <div class="map" id="map"></div>
        <input type="checkbox" name="" id="Open">
        <label for="Open" class="FilterIcon">
            <div class="test">
                <img src="images/settings.png" alt="z" class="">
            </div>
        </label>
        <div id="FilterMap">
        </div>
        <div id="map"></div>
    </section>

    <?php
    require_once 'footer.php';
    ?>
    <script src="public/js/script.js"></script>
    <script src="public/js/accessbilite.js"></script>
    <script src='http://www.bing.com/api/maps/mapcontrol?callback=getMap' async></script>
</body>

</html>