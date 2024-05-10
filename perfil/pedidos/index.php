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

    $sql = "SELECT 
            DATE_FORMAT(Dt_Pedido, '%e de ') as Dia,
            CASE 
                WHEN MONTHNAME(Dt_Pedido) = 'January' THEN 'Janeiro'
                WHEN MONTHNAME(Dt_Pedido) = 'February' THEN 'Fevereiro'
                WHEN MONTHNAME(Dt_Pedido) = 'March' THEN 'Março'
                WHEN MONTHNAME(Dt_Pedido) = 'April' THEN 'Abril'
                WHEN MONTHNAME(Dt_Pedido) = 'May' THEN 'Maio'
                WHEN MONTHNAME(Dt_Pedido) = 'June' THEN 'Junho'
                WHEN MONTHNAME(Dt_Pedido) = 'July' THEN 'Julho'
                WHEN MONTHNAME(Dt_Pedido) = 'August' THEN 'Agosto'
                WHEN MONTHNAME(Dt_Pedido) = 'September' THEN 'Setembro'
                WHEN MONTHNAME(Dt_Pedido) = 'October' THEN 'Outubro'
                WHEN MONTHNAME(Dt_Pedido) = 'November' THEN 'Novembro'
                WHEN MONTHNAME(Dt_Pedido) = 'December' THEN 'Dezembro'
            END AS Mes,
            DATE_FORMAT(Dt_Pedido, '%Y') as Ano,
            Forma_Pagamento,
            Status,
            Valor_total,
            Cod_Pedido 
        FROM Pedido 
        WHERE fk_Cod_Usuario = '{$_SESSION['Cod_Usuario']}'";
    $result = $conn->query($sql);
    ?>
    <iframe src="../../barrasNav.php" class="iframenav"></iframe>
    <section id="info">
        <div id="pneuMurcho">
            <img src="../../img/history.png" alt="icone quero ir">
            <p id="infoP1">HISTÓRICO DE PEDIDOS</p>
            <p id="infoP2"><?php echo $result->num_rows;?> pedidos feitos</p>
        </div>
        <form action="" method="get">
            <input type="text" name="busca" id="busca" placeholder="Pesquisar todos os pedidos">
            <input type="submit" value="Buscar" style="display: none;">
        </form>
    </section>

    <section id="pedidos">
        <?php 
            $i = 0;
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $i++;
                    $data_formatada = $row['Dia'] . $row['Mes'] . ' de ' . $row['Ano'];
                    echo '<div id="caixa_pedidos">';
                    echo '<div id="textoInfo">';
                    echo '<div class="alignStatusPedido">';
                    echo '<div class="alignPedido">';
                    echo '<p id="pedidoP1">Pedido realizado</p>';
                    echo '<p id="statusP1">' . $data_formatada . '</p>';
                    echo '</div>';
                    echo '<div class="alignPedido">';
                    echo '<p id="pedidoP2">Valor total</p>';
                    echo '<p id="statusP2">R$ ' . $row['Valor_total'] . '</p>';
                    echo '</div>';
                    echo '<div class="alignPedido">';
                    echo '<p id="pedidoP3">Status</p>';
                    echo '<p id="statusP3">' . $row['Status'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '<p id="pedidoP4">Pedido Nº' . $i .'</p>';
                    echo '</div>';
                    $sqlT = "SELECT fk_Cod_Produto_Tipo, Quantidade FROM Tem WHERE fk_Cod_Pedido = '{$row['Cod_Pedido']}'";
                    $resultT = $conn->query($sqlT);
                    if ($resultT && $resultT->num_rows > 0) {
                        while ($rowT = $resultT->fetch_assoc()) {
                            $sqlP = "SELECT Marca, Modelo, Imagem FROM Produto_Tipo WHERE Cod_Produto = '{$rowT['fk_Cod_Produto_Tipo']}'";
                            $resultP = $conn->query($sqlP);
                            $rowP = $resultP->fetch_assoc();
                            echo '<div id="produto_caixa">';
                            echo '<img src="data:image/jpeg;base64, ' . base64_encode($rowP['Imagem']) . ' " alt="">';
                            echo '<div>';
                            echo '<p id="caixaP1">' . $rowP['Marca'] . ' ' . $rowP['Modelo'] . '</p>';
                            echo '<p id="caixaP2">Quantidade: <span id="quantidade">' . $rowT['Quantidade'] .'</span></p>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                    echo '</div>';
                }
            } else {
                echo '<div class="avisoPerigoso">';
                echo '<p id="avisoPesquisa">Nenhum há pedidos</p>';
                echo '</div>';
            }
        ?>
    </section>
</body>

</html>