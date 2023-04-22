<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
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
    <img src="images/Placeholder.png" alt="placeholder" class="Placeholder">
    <button class="AccessMapFilter">
        <img src="images/settings.png" alt="z" class="">
    </button>

</section>

<?php
require_once 'footer.php';
?>
</body>
<script src="public/js/script.js"></script>

</html>