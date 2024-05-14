<div class="moveboxfundo">
    <div class="boxfundo2">
        <div class="alignConteudo">

            <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM Produto_Tipo JOIN Fonte ON fk_Cod_Fonte = Fonte.Cod_Fonte WHERE Cod_Produto = $id";
            $result = $conn->query($sql);
            $sqlEndereco = "SELECT * FROM Endereco";
            $resultEndereco = $conn->query($sqlEndereco);
            $sqlUsuario = "SELECT * FROM Usuario";
            $resultUsuario = $conn->query($sqlUsuario);
            ?>

            <?php while ($row = $result->fetch_assoc() and $rowEndereco = $resultEndereco->fetch_assoc() and $rowUsuario = $resultUsuario->fetch_assoc()) { ?>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['Imagem']); ?>" alt="" id="fotoProduto">
                <div class="alignTexts">
                    <p id="descricaoMarcaModelo">
                        <?php
                        echo 'Fonte ' . $row['Marca'] . ' ' . $row['Modelo'] . ' ' . $row['Potencia'] . 'W ' . $row['Voltagem'] . ' VCA, ' . $row['Certificacao']
                        ?>
                    </p>

                    <div class="alignImgTitleDescricao">
                        <img src="img/escrita.png" alt="">
                        <p id="titleDescricao">DESCRIÇÃO</p>
                    </div>
                    <p id="descricao"><?php echo $row['Descricao'] ?></p>
                    <div class="alignImgTitleDescricao">
                        <img src="img/chip.png" alt="">
                        <p id="titleespecificacoes">ESPECIFICAÇÕES TÉCNICAS</p>
                    </div>

                    <p id="especificacoes"></p>
                    <div class="alignInRow">
                        <p>Marca</p>
                        <p><?php echo $row['Marca'] ?></p>
                    </div>
                    <div class="alignInRow">
                        <p>Modelo</p>
                        <p><?php echo $row['Modelo'] ?></p>
                    </div>
                    <div class="alignInRow">
                        <p>Potencia</p>
                        <p><?php echo $row['Potencia'] ?></p>
                    </div>
                    <div class="alignInRow">
                        <p>Voltagem</p>
                        <p><?php echo $row['Voltagem'] ?></p>
                    </div>
                    <div class="alignInRow">
                        <p>Corrente</p>
                        <p><?php echo $row['Corrente'] ?></p>
                    </div>
                    <div class="alignInRow">
                        <p>Certificacao</p>
                        <p><?php echo $row['Certificacao'] ?></p>
                    </div>
                    <div class="alignInRow">
                        <p>Modular</p>
                        <p><?php echo $row['Modular'] ?></p>
                    </div>
                    <div class="alignInRow">
                        <p>Tamanho</p>
                        <p><?php echo $row['Tamanho'] ?></p>
                    </div>
                </div>

                <div class="areaAddCarrinho">
                    <div class="alignPreco">
                        <p>R$ <?php echo $row['Preco'] ?> </p>
                        <p>&ensp;á vista</p>
                    </div>
                    <p id="textSemJuros">10 x <?php echo $row['Preco'] / 10 ?> sem juros no cartão de crédito</p>

                    <div class="alignDados">
                        <p>Enviar para <?php echo $rowUsuario['Nome'] ?> - <?php echo $rowEndereco['Cidade'] ?> -
                            <?php echo $rowEndereco['CEP'] ?>
                        </p>
                    </div>
                    <p id="entregaGratis">Entrega Grátis</p>

                    <?php if ($row['Qtd_estoque'] == 0) { ?>
                        <script>
                            var elements = document.getElementsByClassName('areaAddCarrinho');
                            for (var i = 0; i < elements.length; i++) {
                                elements[i].style.display = 'none';
                                elements[i].insertAdjacentHTML('afterend', "<p id='esgotado'>Esgotado!</p>");
                            }
                        </script>
                    <?php } ?>
                    <div class="quantidade">
                        <p>Quantidade:</p>
                    </div>
                    <div class="number-control">
                        <div class="number-left" onclick="diminuirValor()"></div>
                        <input type="number" name="number" id="numberInput" class="number-quantity" min="1" max="10"
                            value="1" step="1">
                        <div class="number-right" onclick="incrementarValor()"></div>
                    </div>

                    <script>
                        function incrementarValor() {
                            var input = document.getElementById('numberInput');
                            var currentValue = parseInt(input.value);
                            var maxValue = parseInt(input.max);
                            if (currentValue < maxValue) {
                                input.value = currentValue + 1;
                            }
                        }

                        function diminuirValor() {
                            var input = document.getElementById('numberInput');
                            var currentValue = parseInt(input.value);
                            var minValue = parseInt(input.min);
                            if (currentValue > minValue) {
                                input.value = currentValue - 1;
                            }
                        }


                        // buttonAdd.getElementsByTagName('p')[0]
                        function addToCart() {
                            var addButton = document.querySelector('.buttonAdd');
                            var addedMessage = document.querySelector('.buttonAdded');

                            addButton.style.display = 'none';
                            addedMessage.style.visibility = 'visible';
                        }
                    </script>

                    <div class="buttonAdd" onclick="addToCart()">
                        <img src="img/carrinho.png" alt="" id="imgCarrinho">
                        <p>Adicionar ao Carrinho</p>
                    </div>

                    <div class="buttonAdded" style="visibility:hidden;">
                        <p>✓ Adicionado com Sucesso</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php } ?>