<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <?php
    include ('connection.php');
    session_start();
    $tipo = $_GET['tipo'];

    ?>
    <iframe src="barrasNav.php" frameborder="0" class="iframenav"></iframe>

    <?php if ($tipo == "CPU") {
        include ('./cpu/index.php');
    }
    if ($tipo == "GPU") {
        include ('./gpu/index.php');
    }
    if ($tipo == "Placa_Mae") {
        include ('./placaMae/index.php');
    }
    if ($tipo == "Memoria_Ram") {
        include ('./memoriaRam/index.php');
    }
    if ($tipo == "Armazenamento") {
        include ('./armazenamento/index.php');
    }
    if ($tipo == "Fonte") {
        include ('./fonte/index.php');
    }
    if ($tipo == "Gabinete") {
        include ('./gabinete/index.php');
    }
    if ($tipo == "Monitor") {
        include ('./monitor/index.php');
    }
    if ($tipo == "Mouse") {
        include ('./mouse/index.php');
    }
    if ($tipo == "Headset") {
        include ('./headset/index.php');
    }
    if ($tipo == "Teclado") {
        include ('./teclado/index.php');
    }
    ?>

    <iframe src="Rodape.php" frameborder="0" class="iframefooter"></iframe>

</body>

</html>