<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../img/icon.png" type="image/x-icon">
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
            <img src="../../../img/perfil_padrao.png" alt="perfil">
            <p>Usuário</p>
        </div>
    </nav>

    <main>
        <p id="caminho">administrar recursos &nbsp; > &nbsp; produtos &nbsp; > &nbsp; editar</p>

        <section id="pesquisa">
            <form action="" method="post">
                <input type="text" name="busca" id="busca" placeholder="Buscar produto"  onclick="createPopup('title', 'text', 'button1Text', 'button2Text')">
                <input type="submit" value="Buscar" style="display: none;">
            </form>

            <div id="resultado_pesquisa" style="display: none;">
                <div class="caixa_produto">
                    <div class="botao_editar_produto" id="cpu">Editar</div>
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



        // Função para mostrar a div "resultado_pesquisa" ao submeter o formulário
        document.querySelector('#pesquisa form').addEventListener('submit', function(e) {
            e.preventDefault(); // Impede que o formulário seja submetido normalmente
            // Mostra a div "resultado_pesquisa"
            document.getElementById('resultado_pesquisa').style.display = 'block';
            document.getElementById('campo_cpu').style.display = 'none';
        });



        // Função para mostrar a seção correspondente ao clique do usuário
        document.getElementById('cpu').addEventListener('click', function() {
            // Ocultar todas as seções e limpar os valores
            document.querySelectorAll('.campo_inputs').forEach(function(campo) {
                campo.style.display = 'none';
                campo.querySelectorAll('input').forEach(function(input) {
                    input.value = '';
                });
            });
            // Mostrar a seção correspondente ao clique do usuário
            var tipo = this.id;
            if (tipo) {
                document.getElementById('campo_' + tipo).style.display = 'block';
            }
            // Ocultar a div "resultado_pesquisa"
            document.getElementById('resultado_pesquisa').style.display = 'none';
        });



        // Função para tornar os inputs somente para leitura após o envio do formulário
        var forms = document.querySelectorAll('.form_cadastro');
        // Adiciona um ouvinte de evento a cada formulário
        forms.forEach(function(form) {
            form.addEventListener('submit', function(e) {
                // Percorre todos os inputs do formulário
                var inputs = form.querySelectorAll('input');
                inputs.forEach(function(input) {
                    // Torna o input somente para leitura
                    input.readOnly = true;
                });
            });
        });



        // Função para criar um pop-up
        function createPopup(title, text, button1Text, button2Text = null) {
            // Cria o pop-up
            let popup = document.createElement('div');
            popup.style.position = 'fixed';
            popup.style.top = '50%';
            popup.style.left = '50%';
            popup.style.transform = 'translate(-50%, -50%)';
            popup.style.backgroundColor = '#1e1e1e';
            popup.style.color = '#ffffff';
            popup.style.width = '300px';
            popup.style.height = '200px';
            popup.style.boxShadow = 'inset 0 0 20px #663234, 5px 5px 50px #rgba(0, 0, 0, 0.3)';
            popup.style.border= '1px solid #f33333'
            popup.style.padding = '20px';
            popup.style.borderRadius = '2px';
            popup.style.zIndex = '1000';
        
            // Cria o título
            let popupTitle = document.createElement('h1');
            popupTitle.textContent = title;
            popup.appendChild(popupTitle);
        
            // Cria o texto
            let popupText = document.createElement('p');
            popupText.textContent = text;
            popup.appendChild(popupText);
        
            // Cria o primeiro botão
            let button1 = document.createElement('button');
            button1.textContent = button1Text;
            button1.addEventListener('click', function() {
                document.body.removeChild(popup);
            });
            popup.appendChild(button1);
        
            // Cria o segundo botão, se fornecido
            if (button2Text) {
                let button2 = document.createElement('button');
                button2.textContent = button2Text;
                popup.appendChild(button2);
            }
        
            // Adiciona o pop-up ao corpo do documento
            document.body.appendChild(popup);
        }



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