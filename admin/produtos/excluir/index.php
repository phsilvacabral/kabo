<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../../style.css">
    <title>Excluir produto</title>
</head>

<body>
    <?php
    include('../../../connection.php');
    session_start();
    ?>
    <nav>
        <div id="voltar" onclick="voltarPagina()"><a href="../">Cancelar</a></div>

        <div id="area_atual">
            <p>Excluir produto</p>
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
        <p id="caminho">administrar recursos &nbsp; > &nbsp; produtos &nbsp; > &nbsp; excluir</p>

        <section id="pesquisa">
            <form action="" method="post">
                <input type="text" name="busca" id="busca" placeholder="Buscar produto">
                <input type="submit" value="Buscar" style="display: none;">
            </form>

            <div id="resultado_pesquisa">
                <div class="caixa_produto">
                    <div class="botao_excluir_produto" id="cpu">Excluir</div>
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
                    <div class="botao_excluir_produto" id="cpu">Excluir</div>
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
                    <div class="botao_excluir_produto" id="cpu">Excluir</div>
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
                    <div class="botao_excluir_produto" id="cpu">Excluir</div>
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
                    <div class="botao_excluir_produto" id="cpu">Excluir</div>
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
                    <div class="botao_excluir_produto" id="cpu">Excluir</div>
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
                    <div class="botao_excluir_produto" id="cpu">Excluir</div>
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
                    <div class="botao_excluir_produto" id="cpu">Excluir</div>
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
                    <div class="botao_excluir_produto" id="cpu">Excluir</div>
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
        </section>

    </main>

    <script>
        // Função para voltar à página anterior
        function voltarPagina() {
            window.history.back();
        }


        // Função para mostrar a div "resultado_pesquisa" ao submeter o formulário
        document.querySelector('#pesquisa form').addEventListener('submit', function(e) {
            e.preventDefault(); // Impede que o formulário seja submetido normalmente
            // Mostra a div "resultado_pesquisa"
            document.getElementById('resultado_pesquisa').style.visibility = 'visible';
        });
    </script>
</body>

</html>