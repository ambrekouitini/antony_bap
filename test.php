<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Bing Maps Api</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='maps.css'>
</head>
<body>
    <?php
    require_once 'header.php';
    ?>
    <main>
        <div id="map"></div>
    </main>
    <?php
    require_once 'footer.php';
    ?>
    <script src="maps.js"></script>
    <script src='http://www.bing.com/api/maps/mapcontrol?callback=getMap' async></script>
</body>
</html>