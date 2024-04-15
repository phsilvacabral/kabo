<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../style.css">
    <title>Cadastrar produto</title>
</head>

<body>
    <?php
        include("../../connection.php");

        session_start();
        if (!isset($_SESSION["Cod_Usuario"])) {
            header("Location: /kabo/index.php");
            exit();
        }

        if ($_SESSION["Tipo_Usuario"] == 0) {
            header("Location: ../db0/erro.php");
            exit();
        }
    ?>
    <nav>
        <div id="voltar"><a href="../">Cancelar</a></div>

        <div id="area_atual">
            <p>Cadastrar produto</p>
        </div>

        <div id="perfil">
            <?php
                $sqlP = "SELECT Nome FROM Usuario WHERE Cod_Usuario = '{$_SESSION['Cod_Usuario']}'";
                $resultP = $conn->query($sqlP);
                $rowP = $resultP->fetch_assoc();
                $nomeCompleto = $rowP['Nome'];
                $partesNome = explode(' ', $nomeCompleto);
                $_clienteLogado = $partesNome[0];
            ?>
            <img src="../img/perfil.png" alt="">
            <p><?php echo $_clienteLogado ?></p>
        </div>
    </nav>

    <main>
        <p id="caminho">administrar recursos &nbsp; > &nbsp; produtos &nbsp; > &nbsp; cadastrar</p>

        <section class="campo_tipo">
            <select name="tipo" id="tipo">
                <option value="" selected>Selecione um tipo</option>
                <option value="cpu">CPU</option>
                <option value="gpu">GPU</option>
                <option value="placa_mae">Placa mãe</option>
                <option value="ram">Memória RAM</option>
                <option value="armazenamento">Armazenamento</option>
                <option value="fonte">Fonte</option>
                <option value="gabinete">Gabinete</option>
                <option value="monitor">Monitor</option>
                <option value="teclado">Teclado</option>
                <option value="mouse">Mouse</option>
                <option value="headset">Headset</option>
            </select>
        </section>

        <section class="campo_inputs" id="campo_cpu" style="display: none;">
            <p class="titulo_tipo">Cadastrar CPU</p>
            <form id="formCPU" name="formCPU" method="post" action="CPU_cadastro.php" enctype="multipart/form-data" class="form_cadastro">
                <div class="div_input_imagem">
                    <input type="text" id="nome_arquivo0" class="nome_arquivo" readonly>
                    <button type="button" id="botao_upload0" class="botao_upload" onclick="uploadImg(0)">Upload</button>
                    <input type="file" id="input_file0" class="input_file" style="display: none;">
                    <div id="imagePreview0" class="imagePreview"></div>
                </div>
                <div class="input_textos">
                    <input type="hidden" name="tipo_cat" value="CPU">
                    <input class="input_grande" type="text" name="descricaoCPU" id="descricaoCPU" placeholder="Descrição" maxlength="300" required>
                    <input class="input_medio" type="text" name="modeloCPU" id="modeloCPU" placeholder="Modelo" maxlength="100" required>
                    <input class="input_medio" type="text" name="marcaCPU" id="marcaCPU" placeholder="Marca" maxlength="25" required>
                    <input class="input_pequeno" type="text" name="soqueteCPU" id="soqueteCPU" placeholder="Soquete" maxlength="10" required>
                    <input class="input_pequeno" type="number" name="nucleosCPU" id="nucleosCPU" placeholder="Núcleos" max="2147483647" required>
                    <input class="input_pequeno" type="number" name="threadsCPU" id="threadsCPU" placeholder="Threads" max="2147483647" required>
                    <input class="input_pequeno" type="number" step="0.01" name="frequenciaCPU" id="frequenciaCPU" placeholder="Frequência" max="2147483647" required>
                    <input class="input_pequeno" type="number" name="tdpCPU" id="tdpCPU" placeholder="TDP" max="2147483647" required>
                    <input class="input_pequeno" type="text" name="tipo_mem"CPU id="tipo_memCPU" placeholder="Tipo da memória compatível" maxlength="4" required>
                    <input class="input_pequeno" type="number" name="vel_memCPU" id="vel_memCPU" placeholder="Velocidade da memória compatível" oninput="limitarNumero(this)" required>
                    <input class="input_pequeno" type="text" name="GPUsCPU" id="GPUsCPU" placeholder="Placa de vídeo integrada" maxlength="100" required>
                    <input class="input_pequeno" type="number" step="0.01" name="precoCPU" id="precoCPU" placeholder="Preço" max="2147483647" required>
                    <input class="input_pequeno" type="number" name="quantidadeCPU" id="quantidadeCPU" placeholder="Quantidade" max="2147483647" required>
                    <button type="submit">Cadastrar</button>
                </div>
            </form>
        </section>

        <section class="campo_inputs" id="campo_gpu" style="display: none;">
            <p class="titulo_tipo">Cadastrar GPU</p>
            <form action="" method="post" enctype="multipart/form-data" class="form_cadastro">
                <div class="div_input_imagem">
                    <input type="text" id="nome_arquivo1" class="nome_arquivo" readonly>
                    <button type="button" id="botao_upload1" class="botao_upload" onclick="uploadImg(1)">Upload</button>
                    <input type="file" id="input_file1" class="input_file" style="display: none;">
                    <div id="imagePreview1" class="imagePreview"></div>
                </div>
                <div class="input_textos">
                    <input class="input_grande" type="text" name="descricao" placeholder="Descrição">
                    <input class="input_medio" type="text" name="modelo" placeholder="Modelo">
                    <input class="input_medio" type="text" name="marca" placeholder="Marca">
                    <input class="input_pequeno" type="text" name="memoria" placeholder="Memória">
                    <input class="input_pequeno" type="text" name="frequencia" placeholder="Frequência">
                    <input class="input_pequeno" type="text" name="tdp" placeholder="TDP">
                    <input class="input_pequeno" type="number" name="preco" placeholder="Preço">
                    <input class="input_pequeno" type="text" name="estoque" placeholder="Estoque">
                    <button type="submit">Cadastrar</button>
                </div>
            </form>
        </section>

        <section class="campo_inputs" id="campo_placa_mae" style="display: none;">
            <p class="titulo_tipo">Cadastrar placa mãe</p>
            <form action="" method="post" enctype="multipart/form-data" class="form_cadastro">
                <div class="div_input_imagem">
                    <input type="text" id="nome_arquivo2" class="nome_arquivo" readonly>
                    <button type="button" id="botao_upload2" class="botao_upload" onclick="uploadImg(2)">Upload</button>
                    <input type="file" id="input_file2" class="input_file" style="display: none;">
                    <div id="imagePreview2" class="imagePreview"></div>
                </div>
                <div class="input_textos">
                    <input class="input_grande" type="text" name="descricao" placeholder="Descrição">
                    <input class="input_medio" type="text" name="modelo" placeholder="Modelo">
                    <input class="input_medio" type="text" name="marca" placeholder="Marca">
                    <input class="input_pequeno" type="text" name="soquete" placeholder="Soquete">
                    <input class="input_pequeno" type="text" name="memoria" placeholder="Memória">
                    <input class="input_pequeno" type="text" name="frequencia" placeholder="Frequência">
                    <input class="input_pequeno" type="text" name="tdp" placeholder="TDP">
                    <input class="input_pequeno" type="number" name="preco" placeholder="Preço">
                    <input class="input_pequeno" type="text" name="estoque" placeholder="Estoque">
                    <button type="submit">Cadastrar</button>
                </div>
            </form>
        </section>

        <section class="campo_inputs" id="campo_ram" style="display: none;">
            <p class="titulo_tipo">Cadastrar memória RAM</p>
            <form action="" method="post" enctype="multipart/form-data" class="form_cadastro">
                <div class="div_input_imagem">
                    <input type="text" id="nome_arquivo3" class="nome_arquivo" readonly>
                    <button type="button" id="botao_upload3" class="botao_upload" onclick="uploadImg(3)">Upload</button>
                    <input type="file" id="input_file3" class="input_file" style="display: none;">
                    <div id="imagePreview3" class="imagePreview"></div>
                </div>
                <div class="input_textos">
                    <input class="input_grande" type="text" name="descricao" placeholder="Descrição">
                    <input class="input_medio" type="text" name="modelo" placeholder="Modelo">
                    <input class="input_medio" type="text" name="marca" placeholder="Marca">
                    <input class="input_pequeno" type="text" name="memoria" placeholder="Memória">
                    <input class="input_pequeno" type="text" name="frequencia" placeholder="Frequência">
                    <input class="input_pequeno" type="text" name="latencia" placeholder="Latência">
                    <input class="input_pequeno" type="number" name="preco" placeholder="Preço">
                    <input class="input_pequeno" type="text" name="estoque" placeholder="Estoque">
                    <button type="submit">Cadastrar</button>
                </div>
            </form>
        </section>

        <section class="campo_inputs" id="campo_armazenamento" style="display: none;">
            <p class="titulo_tipo">Cadastrar armazenamento</p>
            <form action="" method="post" enctype="multipart/form-data" class="form_cadastro">
                <div class="div_input_imagem">
                    <input type="text" id="nome_arquivo4" class="nome_arquivo" readonly>
                    <button type="button" id="botao_upload4" class="botao_upload" onclick="uploadImg(4)">Upload</button>
                    <input type="file" id="input_file4" class="input_file" style="display: none;">
                    <div id="imagePreview4" class="imagePreview"></div>
                </div>
                <div class="input_textos">
                    <input class="input_grande" type="text" name="descricao" placeholder="Descrição">
                    <input class="input_medio" type="text" name="modelo" placeholder="Modelo">
                    <input class="input_medio" type="text" name="marca" placeholder="Marca">
                    <input class="input_pequeno" type="text" name="capacidade" placeholder="Capacidade">
                    <input class="input_pequeno" type="text" name="tipo" placeholder="Tipo">
                    <input class="input_pequeno" type="text" name="interface" placeholder="Interface">
                    <input class="input_pequeno" type="number" name="preco" placeholder="Preço">
                    <input class="input_pequeno" type="text" name="estoque" placeholder="Estoque">
                    <button type="submit">Cadastrar</button>
                </div>
            </form>
        </section>

        <section class="campo_inputs" id="campo_fonte" style="display: none;">
            <p class="titulo_tipo">Cadastrar fonte</p>
            <form action="" method="post" enctype="multipart/form-data" class="form_cadastro">
                <div class="div_input_imagem">
                    <input type="text" id="nome_arquivo5" class="nome_arquivo" readonly>
                    <button type="button" id="botao_upload5" class="botao_upload" onclick="uploadImg(5)">Upload</button>
                    <input type="file" id="input_file5" class="input_file" style="display: none;">
                    <div id="imagePreview5" class="imagePreview"></div>
                </div>
                <div class="input_textos">
                    <input class="input_grande" type="text" name="descricao" placeholder="Descrição">
                    <input class="input_medio" type="text" name="modelo" placeholder="Modelo">
                    <input class="input_medio" type="text" name="marca" placeholder="Marca">
                    <input class="input_pequeno" type="text" name="potencia" placeholder="Potência">
                    <input class="input_pequeno" type="text" name="certificado" placeholder="Certificado">
                    <input class="input_pequeno" type="number" name="preco" placeholder="Preço">
                    <input class="input_pequeno" type="text" name="estoque" placeholder="Estoque">
                    <button type="submit">Cadastrar</button>
                </div>
            </form>
        </section>

        <section class="campo_inputs" id="campo_gabinete" style="display: none;">
            <p class="titulo_tipo">Cadastrar gabinete</p>
            <form action="" method="post" enctype="multipart/form-data" class="form_cadastro">
                <div class="div_input_imagem">
                    <input type="text" id="nome_arquivo6" class="nome_arquivo" readonly>
                    <button type="button" id="botao_upload6" class="botao_upload" onclick="uploadImg(6)">Upload</button>
                    <input type="file" id="input_file6" class="input_file" style="display: none;">
                    <div id="imagePreview6" class="imagePreview"></div>
                </div>
                <div class="input_textos">
                    <input class="input_grande" type="text" name="descricao" placeholder="Descrição">
                    <input class="input_medio" type="text" name="modelo" placeholder="Modelo">
                    <input class="input_medio" type="text" name="marca" placeholder="Marca">
                    <input class="input_pequeno" type="text" name="tipo" placeholder="Tipo">
                    <input class="input_pequeno" type="text" name="fonte" placeholder="Fonte">
                    <input class="input_pequeno" type="number" name="preco" placeholder="Preço">
                    <input class="input_pequeno" type="text" name="estoque" placeholder="Estoque">
                    <button type="submit">Cadastrar</button>
                </div>
            </form>
        </section>

        <section class="campo_inputs" id="campo_monitor" style="display: none;">
            <p class="titulo_tipo">Cadastrar monitor</p>
            <form action="" method="post" enctype="multipart/form-data" class="form_cadastro">
                <div class="div_input_imagem">
                    <input type="text" id="nome_arquivo7" class="nome_arquivo" readonly>
                    <button type="button" id="botao_upload7" class="botao_upload" onclick="uploadImg(7)">Upload</button>
                    <input type="file" id="input_file7" class="input_file" style="display: none;">
                    <div id="imagePreview7" class="imagePreview"></div>
                </div>
                <div class="input_textos">
                    <input class="input_grande" type="text" name="descricao" placeholder="Descrição">
                    <input class="input_medio" type="text" name="modelo" placeholder="Modelo">
                    <input class="input_medio" type="text" name="marca" placeholder="Marca">
                    <input class="input_pequeno" type="text" name="tamanho" placeholder="Tamanho">
                    <input class="input_pequeno" type="text" name="resolucao" placeholder="Resolução">
                    <input class="input_pequeno" type="text" name="taxa_atualizacao" placeholder="Taxa de atualização">
                    <input class="input_pequeno" type="number" name="preco" placeholder="Preço">
                    <input class="input_pequeno" type="text" name="estoque" placeholder="Estoque">
                    <button type="submit">Cadastrar</button>
                </div>
            </form>
        </section>

        <section class="campo_inputs" id="campo_teclado" style="display: none;">
            <p class="titulo_tipo">Cadastrar teclado</p>
            <form action="" method="post" enctype="multipart/form-data" class="form_cadastro">
                <div class="div_input_imagem">
                    <input type="text" id="nome_arquivo8" class="nome_arquivo" readonly>
                    <button type="button" id="botao_upload8" class="botao_upload" onclick="uploadImg(8)">Upload</button>
                    <input type="file" id="input_file8" class="input_file" style="display: none;">
                    <div id="imagePreview8" class="imagePreview"></div>
                </div>
                <div class="input_textos">
                    <input class="input_grande" type="text" name="descricao" placeholder="Descrição">
                    <input class="input_medio" type="text" name="modelo" placeholder="Modelo">
                    <input class="input_medio" type="text" name="marca" placeholder="Marca">
                    <input class="input_pequeno" type="text" name="tipo" placeholder="Tipo">
                    <input class="input_pequeno" type="text" name="conexão" placeholder="Conexão">
                    <input class="input_pequeno" type="number" name="preco" placeholder="Preço">
                    <input class="input_pequeno" type="text" name="estoque" placeholder="Estoque">
                    <button type="submit">Cadastrar</button>
                </div>
            </form>
        </section>

        <section class="campo_inputs" id="campo_mouse" style="display: none;">
            <p class="titulo_tipo">Cadastrar mouse</p>
            <form action="" method="post" enctype="multipart/form-data" class="form_cadastro">
                <div class="div_input_imagem">
                    <input type="text" id="nome_arquivo9" class="nome_arquivo" readonly>
                    <button type="button" id="botao_upload9" class="botao_upload" onclick="uploadImg(9)">Upload</button>
                    <input type="file" id="input_file9" class="input_file" style="display: none;">
                    <div id="imagePreview9" class="imagePreview"></div>
                </div>
                <div class="input_textos">
                    <input class="input_grande" type="text" name="descricao" placeholder="Descrição">
                    <input class="input_medio" type="text" name="modelo" placeholder="Modelo">
                    <input class="input_medio" type="text" name="marca" placeholder="Marca">
                    <input class="input_pequeno" type="text" name="tipo" placeholder="Tipo">
                    <input class="input_pequeno" type="text" name="conexão" placeholder="Conexão">
                    <input class="input_pequeno" type="number" name="preco" placeholder="Preço">
                    <input class="input_pequeno" type="text" name="estoque" placeholder="Estoque">
                    <button type="submit">Cadastrar</button>
                </div>
            </form>
        </section>

        <section class="campo_inputs" id="campo_headset" style="display: none;">
            <p class="titulo_tipo">Cadastrar headset</p>
            <form action="" method="post" enctype="multipart/form-data" class="form_cadastro">
                <div class="div_input_imagem">
                    <input type="text" id="nome_arquivo10" class="nome_arquivo" readonly>
                    <button type="button" id="botao_upload10" class="botao_upload" onclick="uploadImg(10)">Upload</button>
                    <input type="file" id="input_file10" class="input_file" style="display: none;">
                    <div id="imagePreview10" class="imagePreview"></div>
                </div>
                <div class="input_textos">
                    <input class="input_grande" type="text" name="descricao" placeholder="Descrição">
                    <input class="input_medio" type="text" name="modelo" placeholder="Modelo">
                    <input class="input_medio" type="text" name="marca" placeholder="Marca">
                    <input class="input_pequeno" type="text" name="tipo" placeholder="Tipo">
                    <input class="input_pequeno" type="text" name="conexão" placeholder="Conexão">
                    <input class="input_pequeno" type="number" name="preco" placeholder="Preço">
                    <input class="input_pequeno" type="text" name="estoque" placeholder="Estoque">
                    <button type="submit">Cadastrar</button>
                </div>
            </form>
        </section>

    </main>

    <script>
        // Função para voltar à página anterior
        document.getElementById('voltar').addEventListener('click', function(e) {
            e.preventDefault();
            history.back();
        });


        // Função para mostrar o campo de entrada correspondente à seleção do usuário
        document.getElementById('tipo').addEventListener('change', function() {
            // Ocultar todos os campos de entrada e limpar os valores
            document.querySelectorAll('.campo_inputs').forEach(function(campo) {
                campo.style.display = 'none';
                campo.querySelectorAll('input').forEach(function(input) {
                    input.value = '';
                });
            });
            // Mostrar o campo de entrada correspondente à seleção do usuário
            var tipo = this.value;
            if (tipo) {
                document.getElementById('campo_' + tipo).style.display = 'block';
            }
        });


        // Função para mostrar a imagem selecionada no cadastro
        function uploadImg(index) {
            document.getElementById(`botao_upload${index}`).addEventListener('click', function() {
                document.getElementById(`input_file${index}`).click();
            });

            document.getElementById(`input_file${index}`).addEventListener('change', function(e) {
                var nome_arquivo = e.target.files[0].name;
                document.getElementById(`nome_arquivo${index}`).value = nome_arquivo;

                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById(`imagePreview${index}`).innerHTML = '<img src="' + e.target.result + '">';
                };
                reader.readAsDataURL(e.target.files[0]);
            });
        }
    </script>
</body>

</html>
