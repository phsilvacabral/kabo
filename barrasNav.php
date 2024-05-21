<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title></title>
</head>

<body>
    <?php
    include('connection.php');
    session_start();
    ?>
    <header class="navegar">
        <nav>
            <div class="barranav">
                <div src="img/menu.png" alt="" class="menu" onclick="notifyParent()"></div>
                <script>
                    function notifyParent() {
                        window.parent.postMessage("openPopup", "*");
                    }
                </script>

                <a><img src="img/logo_branco.png" alt="logo_kabo" class="logo"></a>

                <div class="divbusca"><span>Busque aqui</span><img src="img/lupa.png" alt="Buscar" id="lupa_busca">
                </div>

                <div class="spaceperfil">
                    <a href="carrinho/" target="_parent"><img src="img/carrinho.png" alt="carrinho" class="carrinho"></a>
                    <?php if (!isset($_SESSION['Cod_Usuario'])) : ?>
                        <a href="login/" target="_parent">
                            <figure>
                                <img src="img/perfil_padrao.png" alt="Perfil" class="perfil">
                                <figcaption>Login</figcaption>
                            </figure>
                        </a>
                    <?php else : ?>
                        <?php
                        $sqlP = "SELECT Nome, Imagem FROM Usuario WHERE Cod_Usuario = '{$_SESSION['Cod_Usuario']}'";
                        $resultP = $conn->query($sqlP);
                        $rowP = $resultP->fetch_assoc();
                        $nomeCompleto = $rowP['Nome'];
                        $partesNome = explode(' ', $nomeCompleto);
                        $_clienteLogado = $partesNome[0];
                        $imgPerfil = $rowP['Imagem'];
                        if ($imgPerfil == null) { ?>
                            <a href="perfil/" target="_parent">
                                <figure>
                                    <img src="img/perfil_padrao.png" alt="Perfil" class="perfil">
                                    <figcaption><?php echo $_clienteLogado ?></figcaption>
                                </figure>
                            </a>
                        <?php } else {
                            $imagemBase64 = base64_encode($imgPerfil); ?>
                            <a href="perfil/" target="_parent">
                                <figure>
                                    <img src="data:image/jpeg;base64,<?php echo $imagemBase64 ?>" alt="Perfil" class="perfil">
                                    <figcaption><?php echo $_clienteLogado ?></figcaption>
                                </figure>
                            </a>
                        <?php }
                    endif; ?>
                </div>
            </div>
            <div class="divbusca"><span>Busque aqui</span><img src="img/lupa.png" alt="Buscar" id="lupa_busca"></div>
        </nav>

        <section class="secondnavbar">
            <a href=""><button class="boxsecondnavbar">Monte seu PC</button></a>
            <button class="boxsecondnavbar">PC pré-montado</button>
            <a href="cpu/" target="_parent"><button class="boxsecondnavbar">Processador</button></a>
            <a href="gpu/" target="_parent"><button class="boxsecondnavbar">Placa de Vídeo</button></a>
            <a href="armazenamento/" target="_parent"><button class="boxsecondnavbar">Armazenamento</button></a>
            <a href="memoriaRam/" target="_parent"><button class="boxsecondnavbar">Memória</button></a>
            <a href="placaMae/" target="_parent"><button class="boxsecondnavbar">Placa Mãe</button></a>
            <a href="gabinete/" target="_parent"><button class="boxsecondnavbar">Gabinete</button></a>
        </section>
    </header>
</body>

</html>
