<div class="moveboxfundo">
    <div class="boxfundo2">
        <div class="alignConteudo">

            <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM Produto_Tipo JOIN GPU ON fk_Cod_GPU = GPU.Cod_GPU WHERE Cod_Produto = $id";
            $result = $conn->query($sql);
            $sqlEndereco = "SELECT * FROM Endereco WHERE Cod_Endereco = '{$_SESSION['Cod_Usuario']}'";
            $resultEndereco = $conn->query($sqlEndereco);
            $sqlUsuario = "SELECT * FROM Usuario WHERE Cod_Usuario = '{$_SESSION['Cod_Usuario']}'";
            $resultUsuario = $conn->query($sqlUsuario);
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $selectItem = "SELECT * FROM AdicionaCarrinho WHERE fk_Cod_Produto_Tipo = $id";
                $resultItem = $conn->query($selectItem);
                if ($resultItem->num_rows > 0) {
                    $quantidade = isset($_POST['quantidade']) ? $_POST['quantidade'] : 1;
                    $sqlCarrinho = "UPDATE AdicionaCarrinho SET Quantidade = $quantidade WHERE fk_Cod_Produto_Tipo = $id and fk_Cod_Usuario = '{$_SESSION['Cod_Usuario']}'";
                    $stmt = $conn->prepare($sqlCarrinho);
                    $stmt->execute();
                } else {
                    $quantidade = isset($_POST['quantidade']) ? $_POST['quantidade'] : 1;
                    $sqlCarrinho = "INSERT INTO AdicionaCarrinho VALUES ('{$_SESSION['Cod_Usuario']}', '$id', '$quantidade')";
                    $stmt = $conn->prepare($sqlCarrinho);
                    $stmt->execute();
                }

            }
            ?>

            <?php while ($row = $result->fetch_assoc() and $rowEndereco = $resultEndereco->fetch_assoc() and $rowUsuario = $resultUsuario->fetch_assoc()) { ?>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['Imagem']); ?>" alt="" id="fotoProduto">
                <div class="alignTexts">
                    <p id="descricaoMarcaModelo">
                        <?php
                        echo 'GPU ' . $row['Marca'] . ' ' . $row['Modelo'] . ' ' . $row['Tam_Memoria'] . 'GB ' . $row['Tipo_Mem'] . ' ' . $row['Nucleos'] . ' núcleos';
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
                        <p>PCIE</p>
                        <p><?php echo $row['PCIe'] ?></p>
                    </div>
                    <div class="alignInRow">
                        <p>Núcleos</p>
                        <p><?php echo $row['Nucleos'] ?></p>
                    </div>
                    <div class="alignInRow">
                        <p>Tamanho Memória</p>
                        <p><?php echo $row['Tam_Memoria'] ?></p>
                    </div>
                    <div class="alignInRow">
                        <p>Velocidade Memória</p>
                        <p><?php echo $row['Vel_Mem'] ?></p>
                    </div>
                    <div class="alignInRow">
                        <p>TDP</p>
                        <p><?php echo $row['TDP'] ?></p>
                    </div>
                    <div class="alignInRow">
                        <p>SLOT</p>
                        <p><?php echo $row['Slot'] ?></p>
                    </div>
                    <div class="alignInRow">
                        <p>Tamanho</p>
                        <p><?php echo $row['Tamanho'] ?></p>
                    </div>
                    <div class="alignInRow">
                        <p>Tipo Memória</p>
                        <p><?php echo $row['Tipo_Mem'] ?></p>
                    </div>
                    <div class="alignInRow">
                        <p>Velocidade Memória Compatível</p>
                        <p><?php echo $row['Vel_Mem'] ?></p>
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
                    <form action="" method="post">
                        <div class="number-control">
                            <div class="number-left" onclick="diminuirValor()"></div>
                            <input type="number" name="quantidade" id="numberInput" class="number-quantity" min="1" max="10"
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
                            } function addToCart(event) {
                                event.preventDefault(); // Impede o envio do formulário

                                var form = event.target.closest('form');
                                var formData = new FormData(form);

                                var xhr = new XMLHttpRequest();
                                xhr.onreadystatechange = function () {
                                    if (xhr.readyState == 4 && xhr.status == 200) {
                                        // Exibir resposta ou fazer outras operações após o sucesso
                                        var response = xhr.responseText;
                                        console.log(response); // Exemplo: exibir a resposta no console
                                    }
                                };
                                xhr.open(form.method, form.action, true);
                                xhr.send(formData);
                            }
                        </script>

                        <input type="submit" value="Adicionar ao Carrinho" class="buttonAdd">

                        <div class="buttonAdded" style="visibility:hidden;">
                            <p>✓ Adicionado com Sucesso</p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>

<?php } ?>