<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= $cssPath; ?>">
    <title><?= $sPageTitle; ?></title>
    <?php
    if ($_SERVER['PHP_SELF'] == '/impereal-estate/index.php') {
        echo '<script src="https://api.mapbox.com/mapbox-gl-js/v1.2.0/mapbox-gl.js"></script>
              <link href="https://api.mapbox.com/mapbox-gl-js/v1.2.0/mapbox-gl.css" rel="stylesheet"/>';
    }

    ?>
</head>

<body>