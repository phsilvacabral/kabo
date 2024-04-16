
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../../img/logo_neon.png" type="image/x-icon">
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

    $sqlN = "SELECT Nome, Email, Senha, CPF, Dt_Nascimento, Genero FROM Usuario WHERE Cod_Usuario = '{$_SESSION['Cod_Usuario']}'";
    $resultN = $conn->query($sqlN);
    $rowN = $resultN->fetch_assoc();
    $Nome = $rowN['Nome'];
    $Email = $rowN['Email'];
    $Senha = $rowN['Senha'];
    $CPF= $rowN['CPF'];
    $Dt_Nascimento = $rowN['Dt_Nascimento'];
    $Genero = $rowN['Genero'];

    $sqlE = "SELECT CEP, Logradouro, Numero, Bairro, Estado, Cidade FROM Endereco WHERE fk_Cod_Usuario = '{$_SESSION['Cod_Usuario']}'";
    $resultE = $conn->query($sqlE);
    $rowE = $resultE->fetch_assoc();
    $CEP = $rowE['CEP'];
    $Logradouro = $rowE['Logradouro'];
    $Numero = $rowE['Numero'];
    $Bairro = $rowE['Bairro'];
    $Estado = $rowE['Estado'];
    $Cidade = $rowE['Cidade'];

    if (isset($_GET['senha_excluir'])) {
        $sqlS = "SELECT Senha FROM Usuario WHERE Cod_Usuario = '{$_SESSION['Cod_Usuario']}'";
        $resultS = $conn->query($sqlS);
        $rowS = $resultS->fetch_assoc();
        if ($rowS['Senha'] == $_GET['senha_excluir']) {
            if ($_SESSION['Tipo_Usuario'] == 1) {
                $ERROR = 'Não é possível deletar contas administadoras';
            } else {
                $sqlE = "DELETE FROM Endereco WHERE fk_Cod_Usuario = {$_SESSION['Cod_Usuario']}";
                $conn->query($sqlE);
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
    <main>
        <section class="box">
            <span id="X"><a href="../">&times;</a></span>

            <div class="alinharelementos">
                <img src="../../img/logo_neon.png" alt="logo" id="logo">
            </div>

            <div class="alinharelementosescrita">
                <p id="elemento1">Editar perfil</p>
                <p id="elemento2">Edite seu nome, e-mail, senha, CEP e interesses</p>
            </div>

            <form id="form1" name="form1" method="post" action="edit_php.php" onsubmit="return verificar()">
                <div class="espacodentrobox">

                    <input type="text" name="txtNome" value="<?php echo $Nome ?>" maxlength="100" id="primeiroinput" placeholder="Nome" class="campocheio" required>

                    <input type="text" placeholder="CPF" id="cpf" name="txtCPF" value="<?php echo $CPF ?>" maxlength="14" class="campomedio" readonly>
                    <select name="selectGenero" id="genero" class="campomedio" required>
                        <option value="genero">Gênero</option>
                        <option value="M" <?php if ($Genero == 'M') echo 'selected'; ?>>Masculino</option>
                        <option value="F" <?php if ($Genero == 'F') echo 'selected'; ?>>Feminino</option>
                        <option value="O" <?php if ($Genero == 'O') echo 'selected'; ?>>Outro</option>
                    </select>

                    <input type="date" placeholder="Data de nascimento" id="nascimento" name="dateData_Nasc" value="<?php echo date('Y-m-d', strtotime($Dt_Nascimento))?>" class="campomedio" readonly>
                    <input type="text" placeholder="CEP" id="CEP" name="txtCEP" value="<?php echo $CEP ?>" oninput="this.value = maskCEP(this.value); buscarCEP(this.value);" maxlength="9" class="campomedio" required>

                    <input type="text" placeholder="Logradouro" id="logradouro" name="txtLogradouro" value="<?php echo $Logradouro ?>" class="campocheio" maxlength="150" required>
                    <input type="text" placeholder="Bairro" id="bairro" name="txtBairro" value="<?php echo $Bairro ?>" class="campomedio" maxlength="50" required>
                    <input type="number" placeholder="Numero" id="numero" name="txtNumero" value="<?php echo $Numero ?>" class="campomedio" oninput="limitarNumero(this)" min="0" required>
                    <input type="text" placeholder="Cidade" id="cidade" name="txtCidade" value="<?php echo $Cidade ?>" class="campomedio" maxlength="50" required>
                    <input type="text" placeholder="Estado" id="estado" name="txtEstado" value="<?php echo $Estado ?>" class="campomedio" maxlength="2" required>

                    <input type="email" name="email" id="email" value="<?php echo $Email ?>" placeholder="E-mail" maxlength="100" class="campocheio" readonly>

                    <input type="password" name="txtSenha" value="<?php echo $Senha ?>" id="senha" placeholder="Senha" class="campocheio" maxlength="20" required>

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

    <script>
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

        function verificar() {
            if (isNomeValido(txtNome.value)) {
                    if (isCEPValido(txtCEP.value)) {
                        if (isEmailValido(email.value)) {
                            if(isNomeValido(txtLogradouro.value)){
                                if(isNomeValido(txtBairro.value)){
                                    if(isNomeValido(txtCidade.value)){
                                        if(isNomeValido(txtEstado.value)){
                                            return true;
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

        function maskCEP(cep) {
            return cep.trim().replace(/^(\d{5})(\d{3})$/, '$1-$2')
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
