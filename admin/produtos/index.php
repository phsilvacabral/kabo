<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../style.css">
    <title>Produtos</title>
</head>
<body>
    <nav>
        <div id="voltar"><a href="../">Voltar</a></div>

        <div id="area_atual"><p>Produtos</p></div>

        <div id="perfil">
            <img src="../img/perfil.png" alt="">
            <p>Usuário</p>
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
            <form action="" method="post">
                <input type="text" name="busca" id="busca" placeholder="Buscar produto">
                <input type="submit" value="Buscar" style="display: none;">
            </form>

            <div id="resultado_pesquisa">
                <div class="caixa_produto">
                    <div class="imagem_produto"><img src="../../img/logo_neon.png" alt=""></div>
                    <div class="nome_produto"><p>PC Gamer AMD Ryzen 5 5600G 6 Núcleos 4.40Ghz, Gráficos</div>
                    <div class="preco_produto"><p>R$1.900,00</p></div>
                    <div class="qtd_produto"><p>25 unidades</p></div>
                </div>
            </div>
        </section>
    </main>
    
    <script>
        document.getElementById('voltar').addEventListener('click', function(e) {
    e.preventDefault();
    history.back();
});
    </script>
</body>
</html>