<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../style.css">
    <title>Produtos</title>
</head>
<body>
    <?php
        include("../connection.php");

        session_start();
        if (!isset($_SESSION["Cod_Usuario"])) {
            header("Location: /kabo/index.php");
            exit();
        }

        if ($_SESSION["Tipo_Usuario"] == 0) {
            header("Location: ../db0/erro.php");
            exit();
        }

        if (isset($_GET['busca'])) {
            $busca = $_GET['busca'];
            if (!empty($busca)) {
                $sql = "SELECT Cod_Produto, Descricao, Preco, Modelo, Marca, Qtd_Estoque, fk_Cod_PlacaMae, fk_Cod_GPU, 
                fk_Cod_Fonte, fk_Cod_Gabinete, fk_Cod_KitProduto, fk_Cod_Monitor, fk_Cod_Mouse, fk_Cod_Headset, fk_Cod_MemRAM, 
                fk_Cod_Armazenamento, fk_Cod_Teclado, fk_Cod_CPU, Imagem FROM Produto_Tipo WHERE Modelo LIKE '%$busca%' OR Marca LIKE'%$busca%'";
                $result = $conn->query($sql);
            }
        } else {
            $sql = "SELECT Cod_Produto, Descricao, Preco, Modelo, Marca, Qtd_Estoque, fk_Cod_PlacaMae, fk_Cod_GPU, 
            fk_Cod_Fonte, fk_Cod_Gabinete, fk_Cod_KitProduto, fk_Cod_Monitor, fk_Cod_Mouse, fk_Cod_Headset, fk_Cod_MemRAM, 
            fk_Cod_Armazenamento, fk_Cod_Teclado, fk_Cod_CPU, Imagem FROM Produto_Tipo";
            $result = $conn->query($sql);
        }
    ?>
    <nav>
        <div id="voltar"><a href="../">Voltar</a></div>

        <div id="area_atual"><p>Produtos</p></div>

        <div id="perfil">
            <?php
                $sqlP = "SELECT Nome, Imagem FROM Usuario WHERE Cod_Usuario = '{$_SESSION['Cod_Usuario']}'";
                $resultP = $conn->query($sqlP);
                $rowP = $resultP->fetch_assoc();
                $nomeCompleto = $rowP['Nome'];
                $partesNome = explode(' ', $nomeCompleto);
                $_clienteLogado = $partesNome[0];
                $imgPerfil = $rowP['Imagem'];
                if ($imgPerfil == null) {
            ?>
                    <img src="../img/perfil_padrao.png" alt="">
                    <p><?php echo $_clienteLogado ?></p>
                <?php 
                } else {
                    $imagemBase64 = base64_encode($imgPerfil); ?>
                    <img src="data:image/jpeg;base64,<?php echo $imagemBase64 ?>"  alt="Perfil">
                    <p><?php echo $_clienteLogado ?></p>
                <?php
                }
                ?>
        </div>
    </nav>

    <main>
        <p id="caminho">administrar recursos &nbsp; > &nbsp;  produtos  &nbsp; > </p>

        <section id="menu">
            <div class="opcoes_menu"><a href="cadastrar/">Cadastrar</a></div>
            <div class="opcoes_menu"><a href="editar/">Editar</a></div>
            <div class="opcoes_menu"><a href="excluir/">Excluir</a></div>
            <div class="opcoes_menu"><a href="exibir/">Exibir todos</a></div>
        </section>

        <section id="pesquisa">
            <form action="" method="get">
                <input type="text" name="busca" id="busca" placeholder="Buscar produto">
                <input type="submit" value="Buscar" style="display: none;">
            </form>

            <div id="resultado_pesquisa" style="display: none;">
                <?php
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="caixa_produto">';
                        echo '<div class="imagem_produto"><img src="data:image/jpeg;base64, ' . base64_encode($row['Imagem']) . ' " alt=""></div>';
                        echo '<div class="nome_produto"><p>' . $row['Marca'] . " " . $row['Modelo'] . '</p></div>';
                        echo '<div class="preco_produto"><p>R$' . $row['Preco'] . '</p></div>';
                        echo '<div class="qtd_produto"><p>' . $row['Qtd_Estoque'] . ' unidades</p></div>';
                        echo '</div>';
                    }
                } else {
                    echo '<div class="caixa_produto">';
                    echo '<p>Nenhum resultado encontrado.</p>';
                    echo '</div>';
                }
                ?>
            </div>
        </section>
    </main>
    
    <script>
                // Função para mostrar a div "resultado_pesquisa" ao submeter o formulário
        document.querySelector('#pesquisa form').addEventListener('submit', function(e) {
            e.preventDefault(); // Impede que o formulário seja submetido normalmente
            var searchTerm = document.getElementById('busca').value.trim(); // Obtém o termo de pesquisa
            if (searchTerm !== '') {
                // Se o termo de pesquisa não estiver vazio, redireciona a página para incluir o termo na URL
                window.location.href = window.location.pathname + '?busca=' + encodeURIComponent(searchTerm);
            }
        });

        // Função para mostrar a div "resultado_pesquisa" se houver um termo de busca na URL
        window.addEventListener('DOMContentLoaded', function() {
            var searchTerm = new URLSearchParams(window.location.search).get('busca');
            if (searchTerm) {
                // Se houver um termo de busca na URL, exibe a div "resultado_pesquisa"
                document.getElementById('resultado_pesquisa').style.display = 'block';
            }
        });

    </script>
</body>
</html>
