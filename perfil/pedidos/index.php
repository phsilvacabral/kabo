<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Histórico de Pedidos</title>
</head>

<body>
    <?php
    include('../../connection.php');
    session_start();
    ?>
    <iframe src="../../barrasNav.php" class="iframenav"></iframe>
    <section id="info">
        <div id="pneuMurcho">
            <img src="../../img/history.png" alt="icone quero ir">
            <p id="infoP1">HISTÓRICO DE PEDIDOS</p>
            <p id="infoP2">123 pedidos feitos</p>
        </div>
        <form action="" method="get">
            <input type="text" name="busca" id="busca" placeholder="Pesquisar todos os pedidos">
            <input type="submit" value="Buscar" style="display: none;">
        </form>
    </section>

    <section id="pedidos">
        <div id="caixa_pedidos">
            <div id="textoInfo">
                <div class="alignStatusPedido">
                    <div class="alignPedido">
                        <p id="pedidoP1">Pedido realizado</p>
                        <p id="statusP1">10 de janeiro de 2020</p>
                    </div>
                    <div class="alignPedido">
                        <p id="pedidoP2">Valor total</p>
                        <p id="statusP2">R$ 123,45</p>
                    </div>
                    <div class="alignPedido">
                        <p id="pedidoP3">Status</p>
                        <p id="statusP3">Entregue</p>
                    </div>
                </div>
                <p id="pedidoP4">Pedido Nº2</p>
            </div>
            <div id="produto_caixa">
                <img src="../../img/produto-2615-cadeira-gamer-75495.jpg" alt="">
                <div>
                    <p id="caixaP1">PC Gamer AMD Ryzen 5 5600G 6 Núcleos 4.40Ghz, Gráficos</p>
                    <p id="caixaP2">Quantidade: <span id="quantidade">1</span></p>
                </div>
            </div>
        </div>
        <div id="caixa_pedidos">
            <div id="textoInfo">
                <div class="alignStatusPedido">
                    <div class="alignPedido">
                        <p id="pedidoP1">Pedido realizado</p>
                        <p id="statusP1">10 de janeiro de 2020</p>
                    </div>
                    <div class="alignPedido">
                        <p id="pedidoP2">Valor total</p>
                        <p id="statusP2">R$ 123,45</p>
                    </div>
                    <div class="alignPedido">
                        <p id="pedidoP3">Status</p>
                        <p id="statusP3">Entregue</p>
                    </div>
                </div>
                <p id="pedidoP4">Pedido Nº2</p>
            </div>

            <div id="produto_caixa">
                <img src="../../img/produto-2615-cadeira-gamer-75495.jpg" alt="">
                <div>
                    <p id="caixaP1">PC Gamer AMD Ryzen 5 5600G 6 Núcleos 4.40Ghz, Gráficos</p>
                    <p id="caixaP2">Quantidade: <span id="quantidade">1</span></p>
                </div>
            </div>
            <div id="produto_caixa">
                <img src="../../img/produto-2615-cadeira-gamer-75495.jpg" alt="">
                <div>
                    <p id="caixaP1">PC Gamer AMD Ryzen 5 5600G 6 Núcleos 4.40Ghz, Gráficos</p>
                    <p id="caixaP2">Quantidade: <span id="quantidade">2</span></p>
                </div>
            </div>
        </div>

    </section>
</body>

</html>