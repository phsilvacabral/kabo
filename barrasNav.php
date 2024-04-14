<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>pgnav</title>

</head>

<body>
    <?php
    include ('connection.php');
    session_start();
    ?>
    <header class="navegar">
        <nav>
            <div class="barranav">
                <button src="img/Component 2.png" alt="" class="menu"></button>
                <a href=""><img src="img/Component 1.png" alt="logo 123 folhas" class="logo"></a>

                <div class="divbusca"><span>Busque aqui</span><img src="img/lupa.png" alt="Buscar" id="lupa_busca">
                </div>

                <div class="spaceperfil">
                    <a href=""><img src="img/Imagem1 1.png" alt="" class="carrinho"></a>
                    <?php if (!isset($_SESSION['Cod_Usuario'])): ?>
                        <a href="login/" target="_parent">
                            <figure>
                                <img src="img/Ellipse 1.png" alt="logo 123 folhas" class="perfil">
                                <figcaption>Login</figcaption>
                            </figure>
                        </a>
                    <?php else: ?>
                        <?php
                        $sqlP = "SELECT Nome FROM Usuario WHERE Cod_Usuario = '{$_SESSION['Cod_Usuario']}'";
                        $resultP = $conn->query($sqlP);
                        $rowP = $resultP->fetch_assoc();
                        $nomeCompleto = $rowP['Nome'];
                        $partesNome = explode(' ', $nomeCompleto);
                        $_clienteLogado = $partesNome[0];
                        ?>
                        <a href="perfil/" target="_parent">
                            <figure>
                                <img src="img/perfil_padrao.jpg" alt="Foto do Usuário" class="perfil">
                                <figcaption><?php echo $_clienteLogado ?></figcaption>
                            </figure>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="divbusca"><span>Busque aqui</span><img src="img/lupa.png" alt="Buscar"
                    id="lupa_busca"></div>
        </nav>

        <section class="secondnavbar">
            <a href=""><button class="boxsecondnavbar">Monte seu PC</button></a>
            <button class="boxsecondnavbar">PC pré-montado</button>
            <button class="boxsecondnavbar">CPU</button>
            <button class="boxsecondnavbar">Placa de Vídeo</button>
            <button class="boxsecondnavbar">Processador</button>
            <button class="boxsecondnavbar">Memórias</button>
            <button class="boxsecondnavbar">Placa Mãe</button>
            <button class="boxsecondnavbar">Gabinete</button>

        </section>
    </header>
</body>

</html>