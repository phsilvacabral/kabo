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
        include('connection.php');
        session_start();
    ?>
    <header class="navegar">
        <nav class="barranav">
            <div class="logodentro">
                <button src="img_principais\Component2.png" alt="" class="menu"></button>
                <a href=""><img src="img_principais\Component 1.png" alt="logo 123 folhas" class="logo"></a>
            </div>

            <button src="img_principais\Component2.png" alt="" class="menu"></button>
            <a href=""><img src="img_principais\Component 1.png" alt="logo 123 folhas" class="logo"></a>

            <div id="divbusca"><span>Busque aqui</span><img src="img_principais/lupa.png" alt="Buscar" id="lupa_busca">
            </div>

            <div class="spaceperfil">
                <?php if (!isset($_SESSION['Cod_Usuario'])): ?>
                    <a href="login/" target="_parent">
                        <figure>
                            <img src="img_principais/perfil_padrao.jpg" alt="logo 123 folhas" class="perfil">
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
                            <img src="img_principais/perfil_padrao.jpg" alt="Foto do Usuário" class="perfil">
                            <figcaption><?php echo $_clienteLogado ?></figcaption>
                        </figure>
                    </a>
                <?php endif; ?>
            </div>
            <div id="divbusca"><span>Busque aqui</span><img src="img_principais/lupa.png" alt="Buscar" id="lupa_busca">
            </div>
        </nav>

        <section class="secondnavbar">
            <button class="boxsecondnavbar">Monte seu PC</button>
            <button class="boxsecondnavbar">PC pré-montado</button>
            <button class="boxsecondnavbar">Notebook</button>
            <button class="boxsecondnavbar">Placa de Vídeo</button>
            <button class="boxsecondnavbar">Processador</button>
            <button class="boxsecondnavbar">Memórias</button>
            <button class="boxsecondnavbar">Placa Mãe</button>
            <button class="boxsecondnavbar">Gabinete</button>

        </section>
    </header>
</body>

</html>