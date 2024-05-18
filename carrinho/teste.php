<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/cart.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Carrinho</title>
</head>

<body>

    <nav>
        <div id="divNav1">
            <span id="setaVoltar" onclick="voltar()">&#10094;</span>
            <img src="../img/logo_neon.png" alt="logo" id="logo">
        </div>
        <div id="divNav2">
            <h1 id="tituloCarrinho">Carrinho</h1>
        </div>
        <div id="divNav3">
            <?php
            if ($imgPerfil == null) { ?>
                <a href="../perfil/">
                    <div><img src="../img/perfil_padrao.png" alt="perfil" id="imgPerfil">
                        <p id="nomePerfil"><?php echo $clienteLogado; ?></p>
                    </div>
                </a>
            <?php } else {
                $imagemBase64 = base64_encode($imgPerfil); ?>
                <a href="../perfil/">
                    <div><img src="data:image/jpeg;base64,<?php echo $imagemBase64; ?>" alt="perfil" id="imgPerfil">
                        <p id="nomePerfil"><?php echo $clienteLogado; ?></p>
                    </div>
                </a>
            <?php } ?>
        </div>
    </nav>

    <main>
        <div id="divCestaProdutos">
            <div id="cestaEsvaziar">
                <img src="../img/cesta.png" alt="cesta" id="iconCesta">
                <h2 id="tituloCesta">CESTA DE PRODUTOS</h2>
                <p id="qtdCarrinho">x itens</p>
                <p id="esvaziarCarrinho">Esvaziar carrinho</p>
            </div>
            <div id="itensCesta">
                <?php
                $stmt = $conn->prepare('SELECT ac.*, pt.* 
                FROM AdicionaCarrinho ac 
                JOIN Produto_Tipo pt ON ac.fk_Cod_Produto_Tipo = pt.Cod_Produto
                WHERE ac.fk_Cod_Usuario = ?');
                $stmt->bind_param('i', $Cod_Usuario);
                $stmt->execute();
                $result = $stmt->get_result();
                $subTotal = 0;
                while ($row = $result->fetch_assoc()) {
                    $imagemProduto = base64_encode($row['Imagem']);
                    $descricao = $row['Descricao'];
                    $preco = $row['Preco'];
                    $quantidade = $row['Quantidade'];
                    $Cod_Produto = $row['Cod_Produto'];
                    $estoque = $row['Qtd_estoque'];
                    $subTotal += $preco * $quantidade;
                    $tipo = '';

                ?>
                    <div class="itemCesta">
                        <div class="divImagemItem">
                            <img src="data:image/jpeg;base64,<?php echo $imagemProduto; ?>" alt="produto">
                        </div>
                        <div class="divNomeQuantidade">
                            <a href="../" class="nomeItem"><?php echo $descricao; ?></a>
                            <div class="quantidade">Quantidade:
                                <form action="" method="">
                                    <div class="number-control">
                                        <input type="hidden" name="Cod_Produto" value="<?php echo $Cod_Produto; ?>">
                                        <div class="number-left"></div>
                                        <input type="number" name="quantidadeProduto" class="number-quantity" min="0" max="<?php echo ($estoque >= 10) ? 10 : $estoque; ?>" value="<?php echo $quantidade; ?>" readonly>
                                        <div class="number-right"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="divPrecoRemover">
                            <p class="precoInvisivel" style="display: none; height: 0px"><?php echo $preco;?></p>
                            <p class="precoItem">R$ </p>
                            <p class="parcelamentoCesta">10 x  sem juros no cartão</p>
                            <p class="removerItem">Remover</p>
                        </div>
                    </div><?php } ?>
            </div>

            <div id="divBotaoFinalizarCesta">
                <div id="botaoFinalizarCesta">Continuar</div>
            </div>
        </div>


        <div id="divEntregaResumo">
            <div id="divEntrega">
                <div class="divImagemTitulo">
                    <img src="../img/caminhao.png" alt="entrega" id="iconEntrega">
                    <h2 id="tituloEntrega">ENTREGA</h2>
                </div>
                <div id="divEndereco">
                    <?php
                    $stmt = $conn->prepare('SELECT e.* FROM Endereco e JOIN Usuario u ON e.Cod_Endereco = u.fk_Cod_Endereco WHERE u.Cod_Usuario = ?');
                    $stmt->bind_param('i', $Cod_Usuario);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        while ($rowE = $result->fetch_assoc()) {
                            echo '<p>' . $rowE['Logradouro'] . ' Nº' . $rowE['Numero'] . '</p>';
                            echo '<p>CEP ' . $rowE['CEP'] . ' | ' . $rowE['Cidade'] . ', ' . $rowE['Estado'] . '</p>';
                        }
                    } else {
                        echo "Nenhum endereço encontrado";
                    }
                    $conn->close();
                    ?>
                    <a href="../perfil/editar/" id="editarEndereco">Editar</a>
                </div>

                <div id="divFrete">
                    <input type="radio" name="frete" id="radioFrete" checked>
                    <div id="divEntregaPrazo">
                        <p id="tipoEntrega">Entrega econômica</p>
                        <?php
                        $prazoEntrega = date('d/m/Y', strtotime('+10 days'));
                        echo "<p id='prazoEntrega'>Chegará até: $prazoEntrega</p>";
                        ?>
                    </div>
                    <p id="valorFrete">grátis</p>
                </div>
            </div>


            <div id="divResumo">
                <div class="divImagemTitulo">
                    <img src="../img/resumo.png" alt="resumo" id="iconResumo">
                    <h2 id="tituloResumo">RESUMO</h2>
                </div>

                <div id="divSubtotal" class="divsResumo">
                    <p id="textoSubtotal" class="textosResumo">Subtotal: </p>
                    <p id="valorSubtotal">R$ ></p>
                </div>

                <div id="divCupom" class="divsResumo">
                    <p id="textoCupom" class="textosResumo">Cupom de desconto: </p>
                    <span id="maisCupom">+</span>

                    <form action="" id="formCupom">
                        <input type="text" name="cupom" id="cupom" placeholder="Adicionar cupom">
                        <button id="botaoCupom">Aplicar</button>
                    </form>
                </div>

                <div id="divFreteResumo" class="divsResumo">
                    <p id="textoFrete" class="textosResumo">Frete: </p>
                    <p id="valorFreteResumo">grátis</p>
                </div>

                <div id="divCartaoPagamento" class="divsResumo">
                    <p id="textoCartao" class="textosResumo">Cartão de pagamento: </p>
                    <div id="selectCartoes">
                        <select name="cartao" id="selectCartao">
                            <option value="">Cartão 1</option>
                            <option value="">Cadastrar novo cartão</option>
                        </select>
                    </div>
                </div>

                <div id="divParcelamento" class="divsResumo">
                    <p id="textoParcelamento" class="textosResumo">Parcelamento: </p>
                    <select name="parcelamento" id="selectParcelamento">
                        <option value="">1x R$ 3.999,00 sem juros</option>
                        <option value="">2x R$ 1.999,50 sem juros</option>
                        <option value="">3x R$ 1.333,00 sem juros</option>
                        <option value="">4x R$ 999,75 sem juros</option>
                        <option value="">5x R$ 799,80 sem juros</option>
                        <option value="">6x R$ 666,50 sem juros</option>
                        <option value="">7x R$ 571,29 sem juros</option>
                        <option value="">8x R$ 499,88 sem juros</option>
                        <option value="">9x R$ 444,33 sem juros</option>
                        <option value="">10x R$ 399,90 sem juros</option>
                    </select>
                </div>

                <div id="divValorTotal">
                    <p id="textoValorTotal" class="textosResumo">Valor total: </p>
                    <p id="valorTotalFinal">R$ 3.999,00</p>
                    <p id="textParceFinalizar">10 x 190,00 sem juros no cartão de crédito</p>
                </div>

                <div id="botaoFinalizarCompra"><img src="../img/cestaBranca.png" alt=""> Finalizar compra</div>
            </div>
        </div>
    </main>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        /* função voltar */
        function voltar() {
            window.history.back();
        }


        /* função para aparecer divEntregaResumo quando clicar em continuar */
        $(document).ready(function() {
            $('#botaoFinalizarCesta').click(function() {
                var parentWidth = $('#divCestaProdutos').parent().width();
                var newCestaWidth = parentWidth * 0.666;
                var newResumoWidth = parentWidth * 0.333;
                var buttonHeight = $(this).outerHeight(true);
                var currentCestaHeight = $('#divCestaProdutos').outerHeight();
                var newCestaHeight = currentCestaHeight - buttonHeight;

                $('#divCestaProdutos').animate({
                    width: newCestaWidth,
                    height: newCestaHeight
                }, 650);

                $('#divEntregaResumo').css({
                    display: 'block',
                    width: '0px'
                }).animate({
                    width: newResumoWidth + 'px'
                }, 0);

                $(this).fadeOut('fast');
            });
        });


        /* função para aparecer adicionar cupom */
        document.getElementById('maisCupom').addEventListener('click', function() {
            var formCupom = document.getElementById('formCupom');
            var maisCupom = document.getElementById('maisCupom');
            if (formCupom.style.display === 'none' || formCupom.style.display === '') {
                $(formCupom).fadeIn(200);
                formCupom.style.display = 'flex';
                $(maisCupom).fadeOut(0);
            } else {
                $(formCupom).fadeOut('fast');
                $(maisCupom).fadeIn('fast');
            }
        });


        /* crud carrinho */
        $(document).ready(function() {
            function atualizarSoma() {
                var soma = 0;
                $('.number-quantity').each(function() {
                    soma += parseInt($(this).val());
                });
                $('#qtdCarrinho').text(soma + ' itens');
            }
        
            $('.number-quantity').change(function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
                $.ajax({
                    url: 'quantidadeCarrinho.php',
                    type: 'post',
                    data: form.serialize(),
                    success: function(response) {
                        console.log(response);
                    }
                });
        
                if ($(this).val() == 0) {
                    $(this).closest('.itemCesta').fadeOut(200);
                }
        
                atualizarSoma();
            });
        
            $('.removerItem').click(function() {
                $(this).closest('.itemCesta').find('.number-quantity').val(0).trigger('change');
            });
        
            atualizarSoma();
        });


        /* função pra aumentar a quantidade do item */
        $(document).ready(function() {
            $('.number-right').click(function() {
                var input = $(this).siblings('.number-quantity');
                var valorAtual = parseInt(input.val());
                var valorMaximo = parseInt(input.attr('max'));

                if (valorAtual < valorMaximo) {
                    input.val(valorAtual + 1).trigger('change');
                }

                if (valorAtual + 1 >= valorMaximo) {
                    $(this).css('display', 'none');
                }
            });
        });


        /* função para diminuir a quantidade do item */
        $('.number-left').click(function() {
            var input = $(this).siblings('.number-quantity');
            var valorAtual = parseInt(input.val());
            var valorMinimo = parseInt(input.attr('min'));

            if (valorAtual > valorMinimo) {
                input.val(valorAtual - 1).trigger('change');
            }

            if (valorAtual - 1 < parseInt(input.attr('max'))) {
                $(this).siblings('.number-right').css('display', 'block');
            }
        });


        /* função para atualizar subtotal de acordo com o preço dos itens */
        $(document).ready(function() {
            function atualizarSubtotal() {
                var subtotal = 0;
                $('.precoItem').each(function() {
                    var precoItemText = $(this).text().replace('R$', '').replace(',', '.');
                    var precoItem = parseFloat(precoItemText);
                    if (!isNaN(precoItem)) {
                        subtotal += precoItem;
                    }
                });
                $('#valorSubtotal').text('R$ ' + subtotal.toFixed(2).replace('.', ','));
            }
        
            /* função para atualizar o preço dos itens */
            $(document).ready(function() {
            $('.number-quantity').on('change keyup', function() {
                var quantidade = parseInt($(this).val());
                var precoUnitarioText = $(this).closest('.itemCesta').find('.precoInvisivel').text().replace('R$', '').replace(',', '.');
                var precoUnitario = parseFloat(precoUnitarioText);
                if (!isNaN(quantidade) && !isNaN(precoUnitario)) {
                    var precoTotal = (precoUnitario * quantidade).toFixed(2);
                    $(this).closest('.itemCesta').find('.precoItem').text('R$ ' + precoTotal.replace('.', ','));
                    var parcelamento = (precoTotal / 10).toFixed(2);
                    $(this).closest('.itemCesta').find('.parcelamentoCesta').text('10 x R$ ' + parcelamento.replace('.', ',') + ' sem juros no cartão');
                }
                atualizarSubtotal();
            }).trigger('change');
        });
        
            /* função para esvaziar carrinho */
            $('#esvaziarCarrinho').click(function() {
                $('.number-quantity').val(0).trigger('change');
                setTimeout(function() {
                    window.location.href = "../carrinho/";
                }, 200);
            });
        
            /* função para remover item individual */
            $('.removerItem').click(function() {
                $(this).closest('.itemCesta').find('.number-quantity').val(0).trigger('change');
                var existeItem = false;
                $('.number-quantity').each(function() {
                    if (parseInt($(this).val()) > 0) {
                        existeItem = true;
                        return false;
                    }
                });
                if (!existeItem) {
                    setTimeout(function() {
                        window.location.href = "../carrinho/";
                    }, 200);
                }
            });
        
            // Atualiza o subtotal quando a página é carregada
            atualizarSubtotal();
        });


        /* função para adicionar cupom de desconto */
        $(document).ready(function() {
            $('#formCupom').submit(function(e) {
                e.preventDefault();
                var dadosFormulario = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: 'addCupom.php',
                    data: dadosFormulario,
                    success: function(response) {
                        var desconto = parseFloat(response);
                        if (desconto > 0) {
                            var valorTotalFinalText = $('#valorTotalFinal').text().replace('R$', '').replace('.', '').replace(',', '.');
                            var valorTotalFinal = parseFloat(valorTotalFinalText);
                            if (!isNaN(valorTotalFinal)) {
                                var valorComDesconto = valorTotalFinal - (valorTotalFinal * (desconto / 100));
                                $('#valorTotalFinal').text('R$ ' + valorComDesconto.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                            }
                        } else {
                            // Código para lidar com a situação em que o cupom não é válido
                        }
                    }
                });
            });
        });
    </script>


</body>

</html>