<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../style.css">
    <title>Editar produto</title>
</head>

<body>
    <nav>
        <div id="voltar"><a href="../">Cancelar</a></div>

        <div id="area_atual">
            <p>Editar produto</p>
        </div>

        <div id="perfil">
            <img src="../img/perfil.png" alt="">
            <p>Usuário</p>
        </div>
    </nav>

    <main>
        <p id="caminho">administrar recursos &nbsp; > &nbsp; produtos &nbsp; > &nbsp; editar</p>

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
            <p class="titulo_tipo">Editar CPU</p>
            <form action="" method="post" enctype="multipart/form-data" class="form_cadastro">
                <div class="div_input_imagem">
                    <input type="text" id="nome_arquivo0" class="nome_arquivo" readonly>
                    <button type="button" id="botao_upload0" class="botao_upload" onclick="uploadImg(0)">Upload</button>
                    <input type="file" id="input_file0" class="input_file" style="display: none;">
                    <div id="imagePreview0" class="imagePreview"></div>
                </div>
                <div class="input_textos">
                    <input class="input_grande" type="text" name="descricao" placeholder="Descrição">
                    <input class="input_medio" type="text" name="modelo" placeholder="Modelo">
                    <input class="input_medio" type="text" name="marca" placeholder="Marca">
                    <input class="input_pequeno" type="text" name="soquete" placeholder="Soquete">
                    <input class="input_pequeno" type="text" name="nucleos" placeholder="Núcleos">
                    <input class="input_pequeno" type="text" name="threads" placeholder="Threads">
                    <input class="input_pequeno" type="text" name="frequencia" placeholder="Frequência">
                    <input class="input_pequeno" type="text" name="tdp" placeholder="TDP">
                    <input class="input_pequeno" type="number" name="preco" placeholder="Preço">
                    <input class="input_pequeno" type="text" name="estoque" placeholder="Estoque">
                    <button type="submit">Atualizar</button>
                </div>
            </form>
        </section>

        <section class="campo_inputs" id="campo_gpu" style="display: none;">
            <p class="titulo_tipo">Editar GPU</p>
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
                    <button type="submit">Atualizar</button>
                </div>
            </form>
        </section>

        <section class="campo_inputs" id="campo_placa_mae" style="display: none;">
            <p class="titulo_tipo">Editar placa mãe</p>
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
                    <button type="submit">Atualizar</button>
                </div>
            </form>
        </section>

        <section class="campo_inputs" id="campo_ram" style="display: none;">
            <p class="titulo_tipo">Editar memória RAM</p>
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
                    <button type="submit">Atualizar</button>
                </div>
            </form>
        </section>

        <section class="campo_inputs" id="campo_armazenamento" style="display: none;">
            <p class="titulo_tipo">Editar armazenamento</p>
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
                    <button type="submit">Atualizar</button>
                </div>
            </form>
        </section>

        <section class="campo_inputs" id="campo_fonte" style="display: none;">
            <p class="titulo_tipo">Editar fonte</p>
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
                    <button type="submit">Atualizar</button>
                </div>
            </form>
        </section>

        <section class="campo_inputs" id="campo_gabinete" style="display: none;">
            <p class="titulo_tipo">Editar gabinete</p>
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
                    <button type="submit">Atualizar</button>
                </div>
            </form>
        </section>

        <section class="campo_inputs" id="campo_monitor" style="display: none;">
            <p class="titulo_tipo">Editar monitor</p>
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
                    <button type="submit">Atualizar</button>
                </div>
            </form>
        </section>

        <section class="campo_inputs" id="campo_teclado" style="display: none;">
            <p class="titulo_tipo">Editar teclado</p>
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
                    <button type="submit">Atualizar</button>
                </div>
            </form>
        </section>

        <section class="campo_inputs" id="campo_mouse" style="display: none;">
            <p class="titulo_tipo">Editar mouse</p>
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
                    <button type="submit">Atualizar</button>
                </div>
            </form>
        </section>

        <section class="campo_inputs" id="campo_headset" style="display: none;">
            <p class="titulo_tipo">Editar headset</p>
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
                    <button type="submit">Atualizar</button>
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