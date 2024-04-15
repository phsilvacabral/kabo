<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../img/icon_logo.png" type="image/x-icon">
    <title>Perfil</title>
</head>

<html>

<body>
    <?php
    include('../connection.php');
    session_start();
    $sqlN = "SELECT Nome FROM Usuario WHERE Cod_Usuario = '{$_SESSION['Cod_Usuario']}'";
    $resultN = $conn->query($sqlN);
    $rowN = $resultN->fetch_assoc();
    $nomeCompleto = $rowN['Nome'];

    $sqlE = "SELECT Email FROM Usuario WHERE Cod_Usuario = '{$_SESSION['Cod_Usuario']}'";
    $resultE = $conn->query($sqlE);
    $rowE = $resultE->fetch_assoc();
    $EmailCompleto = $rowE['Email'];

    if (!isset($_SESSION["Cod_Usuario"])) {
        header("Location: /kabo/");
        exit();
    }
    ?>
    <div id="div_perfil">

        <span id="voltar_home" onclick="voltarPagina()"><a>&times;</a></span>

        <a title="Voltar à Home" href="../"><img src="../img/logo_neon.png" alt="Logo 123 Folhas" id="logo"></a>

        <div id="user_name">
            <img src="../img_principais/perfil_padrao.jpg" alt="foto de perfil" id="foto_perfil">

            <div id="nome_email">
                <p id="nome_completo"><?php echo $nomeCompleto ?></p>
                <p id="email_user"><?php echo $EmailCompleto ?></p>
                <?php if ($_SESSION['Cod_Usuario'] < 13) : ?>
                    <div id="botoes_editar_admin">
                        <a href="editar/" id="botao_editar">Editar</a>
                        <a href="admin/db0/inicio.php" id="botao_admin">Admin</a>
                    </div>
                <?php else : ?>
                    <div id="botoes_editar_admin">
                        <a href="editar/" id="botao_editar">Editar</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div id="destinos_salvos">
            <span id="titulo_destinos">Dados</span>

            <a href="queroir/">
                <div class="quero_fui"><img src="../img_principais/icone_queroir.png" alt="icone quero ir">
                    <p>Histórico de pedidos</p><span><?php echo $InteresseCompleto ?> pedidos</span>
                </div>
            </a>

            <a href="../carrinho/">
                <div class="quero_fui"><img src="../img_principais/icone_jafui.png" alt="icone já fui">
                    <p>Carrinho</p><span><?php echo $ViajaCompleto ?> itens</span>
                </div>
            </a>

            <a href="../carrinho/">
                <div class="quero_fui"><img src="../img_principais/icone_jafui.png" alt="icone já fui">
                    <p>Meus cartões</p><span><?php echo $ViajaCompleto ?> adicionados</span>
                </div>
            </a>
        </div>

        <span id="botao_sair"><a href="../admin/login/logout.php">Sair</a></span>

        <p id="text123"><a href="../">&copy;kabo</a></p>
    </div>

    <script>
        function voltarPagina() {
            window.history.back();
        }
    </script>
</body>

</html>