<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Cartões</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <?php
    include ('../../connection.php');
    session_start();

    
    if (!isset($_SESSION['Cod_Usuario'])) {
        echo "<iframe src='../../barrasNav.php' frameborder='0' class='iframenav'></iframe>
        <p id='semLogin'>Por favor, faça o login ou cadastre-se para visualizar seus cartões.</p>
        <iframe src='../../Rodape.php' frameborder='0' class='iframefooter'></iframe>";
    } else {
        $codUsuario = $_SESSION['Cod_Usuario'];
        $cartao = "SELECT * FROM Cartao_pagamento WHERE fk_Cod_Usuario = $codUsuario";
        $resultCartao = $conn->query($cartao);


        if ($resultCartao === false) {
            echo "Erro na consulta SQL: " . $conn->error;
        } elseif ($resultCartao->num_rows >= 0) {
            ?>
            <iframe src="../../barrasNav.php" frameborder="0" class="iframenav"></iframe>
            <section id="sectionCartoes">
                <div class="titulo">
                    <img src="../../img/card.png" alt="">
                    <p>Cartões de Pagamento</p>
                    <p><?php echo $resultCartao->num_rows; ?> adicionados</p>
                </div>

                <div class="alignCartoes">
                    <?php while ($row = $resultCartao->fetch_assoc()) { ?>

                        <div class="caixasCartao">
                            <div class="cartao">
                                <img src="../../img/mc_symbol.svg" alt="">
                                <div class="dadosInsideCartao">
                                    <p>**** <?php echo substr($row['Numero'], -4); ?></p>
                                    <p><?php echo $row['Nome_Titular']; ?></p>
                                </div>
                            </div>
                            <form method="post" action="delete.php" class="dadosCartao">

                                <p id="nomeTitular"><?php echo $row['Nome_Titular']; ?></p>
                                <p id="numCartao"><?php echo $row['Numero'] ?></p>
                                <p id="dataVencimento"><?php echo $row['Dt_Vencimento'] ?></p>
                                <input type="button" class="editar" name="editar" value="Editar" onclick="abrirPopUp(<?php echo $row['Cod_Cartao']; ?>)">
                                <input type="button" name="lixeira" id="lixeira" value="Excluir" onclick="abrirPopUpExcluir(<?php echo $row['Cod_Cartao']; ?>)">
                            </form>
                        </div>

                    <?php } ?>
                </div>

            </section>
            <!-- <iframe src="../../Rodape.php" frameborder="0" class="iframefooter"></iframe> -->
            <?php
        } else {
            echo "<iframe src='../../barrasNav.php' frameborder='0' class='iframenav'></iframe>
            <p id='semCartoes'>Você não possui cartões cadastrados. Por favor, cadastre um novo cartão.</p>
            <iframe src='../../Rodape.php' frameborder='0' class='iframefooter'></iframe>";
        }
    }
    ?>

    <dialog id="popUp" class="dialog">
        <form method="post" action="editar.php">
            <section>
                <div>
                    <label for="titularCartao">Titular do Cartão</label>
                    <input type="text" id="titularCartao" name="titular_cartao" />
                </div>

                <div>
                    <label for="dataVencimento">Data Vencimento</label>
                    <input type="text" id="dataVencimentoPopUp" name="data_vencimento" />
                </div>
            </section>
            <menu>
                <input type="hidden" name="cod_cartao" value="" id="hiddenInputEditar">
                <button id="cancel" type="reset" onclick="fecharPopUp()">Cancel</button>
                <button type="submit" id="enviarSubmit" name="enviarSubmit">Enviar</button>

            </menu>
        </form>
    </dialog>


    <dialog id="popUpExcluir" class="dialog">
        <form method="post" action="delete.php">
            <p id="textoExcluir">Excluir Cartão?</p>
            <menu>
                <input type="hidden" name="cod_cartao" value="" id="hiddenInput">
                <button id="cancel" type="reset" onclick="fecharPopUpExcluir()">Cancel</button>
                <button type="submit" id="confirmarSubmit" name="confirmarExcluir">Confirmar</button>
            </menu>
        </form>
    </dialog>

    <script>
        function abrirPopUp(idEditar) {
            var favDialog = document.getElementById("popUp");
            favDialog.showModal();
            $("#hiddenInputEditar").val(idEditar);

        }

        function fecharPopUp() {
            var favDialog = document.getElementById("popUp");
            favDialog.close();
        }

        function abrirPopUpExcluir(id) {
            var excluir = document.getElementById("popUpExcluir");
            $("#hiddenInput").val(id);
            excluir.showModal();
        }

        function fecharPopUpExcluir() {
            var excluir = document.getElementById("popUpExcluir");
            excluir.close();
        }

    </script>
</body>

</html>