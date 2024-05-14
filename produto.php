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
        include ('./cpu/cpu.php');
    }
    if ($tipo == "GPU") {
        include ('./gpu/gpu.php');
    }
    if ($tipo == "Placa_Mae") {
        include ('./placaMae/placaMae.php');
    }
    if ($tipo == "Memoria_Ram") {
        include ('./memoriaRam/memoriaRam.php');
    }
    if ($tipo == "Armazenamento") {
        include ('./armazenamento/armazenamento.php');
    }
    if ($tipo == "Fonte") {
        include ('./fonte/fonte.php');
    }
    if ($tipo == "Gabinete") {
        include ('./gabinete/gabinete.php');
    }
    if ($tipo == "Monitor") {
        include ('./monitor/monitor.php');
    }
    if ($tipo == "Mouse") {
        include ('./mouse/mouse.php');
    }
    if ($tipo == "Headset") {
        include ('./headset/headset.php');
    }
    if ($tipo == "Teclado") {
        include ('./teclado/teclado.php');
    }
    ?>

    <iframe src="Rodape.php" frameborder="0" class="iframefooter"></iframe>

</body>

</html>