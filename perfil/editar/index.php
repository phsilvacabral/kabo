<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../../img/icon.png" type="image/x-icon">
    <title>Editar perfil</title>
</head>

<body>
    <?php
    include('../../connection.php');
    session_start();

    if (!isset($_SESSION["Cod_Usuario"])) {
        header("Location: /kabo/");
        exit();
    }

    $ERROR = '';

    $sql = "SELECT u.Nome, u.Email, u.Senha, u.CPF, u.Dt_Nascimento, u.Genero, e.CEP, e.Logradouro, e.Numero, e.Bairro, e.Estado, e.Cidade 
        FROM Usuario u
        INNER JOIN Endereco e ON u.fk_Cod_Endereco = e.Cod_Endereco
        WHERE u.Cod_Usuario = '{$_SESSION['Cod_Usuario']}'";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $Nome = $row['Nome'];
    $Email = $row['Email'];
    $Senha = $row['Senha'];
    $CPF = $row['CPF'];
    $Dt_Nascimento = $row['Dt_Nascimento'];
    $Genero = $row['Genero'];
    $CEP = $row['CEP'];
    $Logradouro = $row['Logradouro'];
    $Numero = $row['Numero'];
    $Bairro = $row['Bairro'];
    $Estado = $row['Estado'];
    $Cidade = $row['Cidade'];

    if (isset($_GET['senha_excluir'])) {
        $sqlS = "SELECT Senha FROM Usuario WHERE Cod_Usuario = '{$_SESSION['Cod_Usuario']}'";
        $resultS = $conn->query($sqlS);
        $rowS = $resultS->fetch_assoc();
        if ($rowS['Senha'] == md5($_GET['senha_excluir'])) {
            if ($_SESSION['Tipo_Usuario'] == 1) {
                $ERROR = 'Não é possível deletar contas administadoras';
            } else {
                $sql = "DELETE FROM Usuario WHERE Cod_Usuario = {$_SESSION['Cod_Usuario']}";
                $conn->query($sql);
                session_destroy();
                header("Location: /kabo/");
                exit();
            }
        } else {
            $ERROR = 'Senha Incorreta';
        }
    }

    ?>

    <script>
        // Máscara para o CEP
        function maskCEP(cep) {
            return cep.trim().replace(/^(\d{5})(\d{3})$/, '$1-$2')
        }


        // API correios
        function buscarCEP(cep) {
            // Verifica se o CEP possui o formato correto
            if (/^\d{5}-\d{3}$/.test(cep)) {
                // Faz a requisição para a API do ViaCEP
                fetch(`https://viacep.com.br/ws/${cep}/json/`)
                    .then(response => response.json())
                    .then(data => {
                        if (!data.erro) {
                            // Preenche os campos de endereço com os dados retornados pela API
                            document.getElementById('logradouro').value = data.logradouro;
                            document.getElementById('bairro').value = data.bairro;
                            document.getElementById('cidade').value = data.localidade;
                            document.getElementById('estado').value = data.uf;
                        } else {
                            alert('CEP não encontrado');
                        }
                    })
                    .catch(error => console.error('Erro ao buscar CEP:', error));
            }
        }



        // Função para mostrar a imagem selecionada na edição do perfil
        function validaImagem(input) {
            var caminho = input.value;

            if (caminho) {
                var comecoCaminho = (caminho.indexOf('\\') >= 0 ? caminho.lastIndexOf('\\') : caminho.lastIndexOf('/'));
                var nomeArquivo = caminho.substring(comecoCaminho);

                if (nomeArquivo.indexOf('\\') === 0 || nomeArquivo.indexOf('/') === 0) {
                    nomeArquivo = nomeArquivo.substring(1);
                }

                var extensaoArquivo = nomeArquivo.indexOf('.') < 1 ? '' : nomeArquivo.split('.').pop();

                if (extensaoArquivo != 'gif' &&
                    extensaoArquivo != 'png' &&
                    extensaoArquivo != 'jpg' &&
                    extensaoArquivo != 'jpeg') {
                    input.value = '';
                    alert("É preciso selecionar um arquivo de imagem (gif, png, jpg ou jpeg)");
                }
            } else {
                input.value = '';
                alert("Selecione um caminho de arquivo válido");
            }
            if (input.files && input.files[0]) {
                var arquivoTam = input.files[0].size / 1024 / 1024;
                if (arquivoTam < 16) {
                    var reader = new FileReader();
                    reader.onload = function(e) {

                        document.getElementById(`imagemCadastro`).style.visibility = "visible";
                        document.getElementById(`imagemCadastro`).setAttribute('src', e.target.result);


                    };
                    reader.readAsDataURL(input.files[0]);
                } else {
                    input.value = '';
                    alert("O arquivo precisa ser uma imagem com menos de 16 MB");
                }
            } else {

                document.getElementById(`imagemCadastro`).setAttribute('src', '#');
            }
        }
    </script>

    <main>
        <section class="box">
            <span id="X" onclick="voltarPagina()"><a href="../">&times;</a></span>

            <div class="alinharelementos">
                <img src="../../img/logo_neon.png" alt="logo" id="logo">
            </div>

            <div class="alinharelementosescrita">
                <p id="elemento1">Editar perfil</p>
                <p id="elemento2">Edite seu nome, e-mail, senha, CEP e interesses</p>
            </div>

            <form id="form1" name="form1" method="post" action="edit_php.php" onsubmit="return verificar()">
                <div class="espacodentrobox">

                    <div class="div_input_imagem">
                        <label for="input_file" class="label_input_file">Foto perfil</label>
                        <input type="file" id="input_file" class="input_file" onchange="validaImagem(this);">
                        <img src="" id="imagemCadastro" class="imagePreview" alt="Foto perfil">
                    </div>

                    <input type="text" name="txtNome" value="<?php echo $Nome ?>" maxlength="100" id="primeiroinput" placeholder="Nome" class="campocheio" required>

                    <input type="text" placeholder="CPF" id="cpf" name="txtCPF" value="<?php echo $CPF ?>" maxlength="14" class="campomedio" readonly>
                    <select name="selectGenero" id="genero" class="campomedio" required>
                        <option value="genero">Gênero</option>
                        <option value="M" <?php if ($Genero == 'M') echo 'selected'; ?>>Masculino</option>
                        <option value="F" <?php if ($Genero == 'F') echo 'selected'; ?>>Feminino</option>
                        <option value="O" <?php if ($Genero == 'O') echo 'selected'; ?>>Outro</option>
                    </select>

                    <input type="date" placeholder="Data de nascimento" id="nascimento" name="dateData_Nasc" value="<?php echo date('Y-m-d', strtotime($Dt_Nascimento)) ?>" class="campomedio" readonly>
                    <input type="text" placeholder="CEP" id="CEP" name="txtCEP" value="<?php echo $CEP ?>" oninput="this.value = maskCEP(this.value); buscarCEP(this.value);" maxlength="9" class="campomedio" required>

                    <input type="text" placeholder="Logradouro" id="logradouro" name="txtLogradouro" value="<?php echo $Logradouro ?>" class="campocheio" maxlength="150" required>
                    <input type="text" placeholder="Bairro" id="bairro" name="txtBairro" value="<?php echo $Bairro ?>" class="campomedio" maxlength="50" required>
                    <input type="number" placeholder="Numero" id="numero" name="txtNumero" value="<?php echo $Numero ?>" class="campomedio" oninput="limitarNumero(this)" min="0" required>
                    <input type="text" placeholder="Cidade" id="cidade" name="txtCidade" value="<?php echo $Cidade ?>" class="campomedio" maxlength="50" required>
                    <input type="text" placeholder="Estado" id="estado" name="txtEstado" value="<?php echo $Estado ?>" class="campomedio" maxlength="2" required>

                    <input type="email" name="email" id="email" value="<?php echo $Email ?>" placeholder="E-mail" maxlength="100" class="campocheio" readonly>

                    <input type="password" name="txtSenhaAtual" value="" id="senhaAtual" placeholder="Digite a senha atual" class="campocheio" maxlength="20" required>
                    <input type="password" name="txtSenhaNova" value="" id="senhaNova" placeholder="Digite a nova senha" class="campocheio" maxlength="20">
                    <input type="password" name="txtSenha" value="" id="senhaConfirmar" placeholder="Confirme a nova senha" class="campocheio" maxlength="20">

                </div>

                <div id="botoes">
                    <input type="button" value="Excluir conta" id="excluirsubmit">
                    <input type="submit" value="Atualizar" id="enviarsubmit">
                </div>
                <span id="erro_senha"><?php echo $ERROR ?></span>

            </form>

            <p id="folhascopy"><a href="../../">&copy;Kabo</a></p>
        </section>



        <div id="popup" class="popup">
            <span class="close" id="closePopup">&times;</span>
            <div id="titulo_div">

                <div class="popup-content">
                    <span id="titulo">Excluir</span>

                    <form action="" id="form_senha" method="get">

                        <div style="display: flex; align-items: center;">
                            <input type="password" id="senha_excluir" name="senha_excluir" placeholder="Confirme com sua senha" required>
                        </div>

                        <input type="submit" value="Excluir" id="botao_excluir_popup">

                    </form>
                </div>
            </div>
        </div>

    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/md5.js"></script>
    <script>
        const txtSenhaAtual = document.getElementById('senhaAtual')
        const txtSenhaNova = document.getElementById('senhaNova')
        const txtSenhaConfirmar = document.getElementById('senhaConfirmar')
        const txtNome = document.getElementById('primeiroinput')
        const txtCEP = document.getElementById('CEP')
        const txtLogradouro = document.getElementById('logradouro')
        const txtBairro = document.getElementById('bairro')
        const txtCidade = document.getElementById('cidade')
        const txtestado = document.getElementById('estado')
        const email = document.getElementById('email')

        function limitarNumero(input) {
            var maxLength = 5;
            var valor = input.value;
            if (valor.length > maxLength) {
                input.value = valor.slice(0, maxLength);
            }
        }



        function verificar() {
            if (isNomeValido(txtNome.value)) {
                if (isCEPValido(txtCEP.value)) {
                    if (isEmailValido(email.value)) {
                        if (isNomeValido(txtLogradouro.value)) {
                            if (isNomeValido(txtBairro.value)) {
                                if (isNomeValido(txtCidade.value)) {
                                    if (isNomeValido(txtestado.value)) {
                                        if (CryptoJS.MD5(txtSenhaAtual.value).toString() === '<?php echo $rowN['Senha']; ?>') {
                                            if (txtSenhaNova.value === txtSenhaConfirmar.value) {
                                                return true;
                                            } else {
                                                window.alert('As senhas não combinam!')
                                                return false
                                            }
                                        } else {
                                            window.alert('Senha atual incorreta!')
                                            return false
                                        }
                                    } else {
                                        window.alert('Estado inválido!')
                                        return false
                                    }
                                } else {
                                    window.alert('Cidade inválido!')
                                    return false
                                }
                            } else {
                                window.alert('Bairro inválido!')
                                return false
                            }
                        } else {
                            window.alert('Logradouro inválido!')
                            return false
                        }
                    } else {
                        window.alert('Email inválido!')
                        return false
                    }
                } else {
                    window.alert('CEP inválido!')
                    return false
                }
            } else {
                window.alert('Nome inválido!')
                return false
            }
        }

        function isNomeValido(nome) {
            const reN = /^\w*[a-zA-ZÀ-ú\s]+$/
            return reN.test(nome)
        }

        function isCEPValido(cep) {
            const reCE = /^\d{5}-\d{3}$/
            return reCE.test(cep)
        }

        function isEmailValido(email) {
            const reEM = /^\w.+@\w{3}.*\.\w{2,3}$/
            return reEM.test(email)
        }



        document.getElementById("excluirsubmit").addEventListener("click", function() {
            document.getElementById("popup").style.display = "block";
        });

        document.getElementById("closePopup").addEventListener("click", function() {
            document.getElementById("popup").style.display = "none";
        });

        document.getElementById("botao_excluir_popup").addEventListener("click", function() {
            document.getElementById("popup").style.display = "none";
        });

        function voltarPagina() {
            window.history.back();
        }
    </script>


</body>

</html>