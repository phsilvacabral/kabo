<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../../style.css">
    <title>Exibir produtos</title>
</head>

<body>
    <?php
    include('../../../connection.php');
    session_start();
    ?>
    <nav>
        <div id="voltar" onclick="voltarPagina()"><a href="../">Cancelar</a></div>

        <div id="area_atual">
            <p>Exibir produtos</p>
        </div>

        <div id="perfil">
            <?php
            $sqlP = "SELECT Nome, Imagem FROM Usuario WHERE Cod_Usuario = '{$_SESSION['Cod_Usuario']}'";
            $resultP = $conn->query($sqlP);
            $rowP = $resultP->fetch_assoc();
            $nomeCompleto = $rowP['Nome'];
            $partesNome = explode(' ', $nomeCompleto);
            $_clienteLogado = $partesNome[0];
            $imgPerfil = $rowP['Imagem'];
            if ($imgPerfil == null) { ?>
                <img src="../../../img/perfil_padrao.png" alt="perfil">
                <p><?php echo $_clienteLogado ?></p>
            <?php } else {
                $imagemBase64 = base64_encode($imgPerfil); ?>
                <img src="data:image/jpeg;base64,<?php echo $imagemBase64 ?>" alt="Perfil">
                <p><?php echo $_clienteLogado ?></p>
            <?php } ?>
        </div>
    </nav>

    <main>
        <p id="caminho">administrar recursos &nbsp; > &nbsp; produtos &nbsp; > &nbsp; exibir</p>

        <div id="div_exibicao" style="visibility: visible; margin: 0 0 40px 0;">
            <div class="caixa_produto">
                <div class="imagem_produto"><img src="../../img/logo_neon.png" alt=""></div>
                <div class="nome_produto">
                    <p>PC Gamer AMD Ryzen 5 5600G 6 Núcleos 4.40Ghz, Gráficos
                </div>
                <div class="preco_produto">
                    <p>R$1.900,00</p>
                </div>
                <div class="qtd_produto">
                    <p>25 unidades</p>
                </div>
            </div>


            <div class="caixa_produto">
                <div class="imagem_produto"><img src="../../img/logo_neon.png" alt=""></div>
                <div class="nome_produto">
                    <p>PC Gamer AMD Ryzen 5 5600G 6 Núcleos 4.40Ghz, Gráficos
                </div>
                <div class="preco_produto">
                    <p>R$1.900,00</p>
                </div>
                <div class="qtd_produto">
                    <p>25 unidades</p>
                </div>
            </div>


            <div class="caixa_produto">
                <div class="imagem_produto"><img src="../../img/logo_neon.png" alt=""></div>
                <div class="nome_produto">
                    <p>PC Gamer AMD Ryzen 5 5600G 6 Núcleos 4.40Ghz, Gráficos
                </div>
                <div class="preco_produto">
                    <p>R$1.900,00</p>
                </div>
                <div class="qtd_produto">
                    <p>25 unidades</p>
                </div>
            </div>

        </div>

    </main>
</body>

</html>