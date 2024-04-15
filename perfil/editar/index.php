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
    include('connection.php');
    session_start();

    if (!isset($_SESSION["Cod_Cliente"])) {
        header("Location: /kabo/");
        exit();
    }

    $ERROR = '';

    $sqlN = "SELECT Nome, CEP, Email, Senha_login, Inter_Nacional, Faixa_preco FROM Cliente WHERE Cod_Cliente = '{$_SESSION['Cod_Cliente']}'";
    $resultN = $conn->query($sqlN);
    $rowN = $resultN->fetch_assoc();
    $Nome = $rowN['Nome'];
    $CEP = $rowN['CEP'];
    $Email = $rowN['Email'];
    $Senha_login = $rowN['Senha_login'];
    $Faixa_preco = $rowN['Faixa_preco'];
    $Inter_Nacional = $rowN['Inter_Nacional'];

    if (isset($_GET['senha_excluir'])) {
        $sqlS = "SELECT Senha_login FROM Cliente WHERE Cod_Cliente = '{$_SESSION['Cod_Cliente']}'";
        $resultS = $conn->query($sqlS);
        $rowS = $resultS->fetch_assoc();
        if ($rowS['Senha_login'] == $_GET['senha_excluir']) {
            if ($_SESSION['Cod_Cliente'] <= 13) {
                $ERROR = 'Não é possível deletar contas administadoras';
            } else {
                $sql = "DELETE FROM cliente WHERE Cod_Cliente = {$_SESSION['Cod_Cliente']}";
                $conn->query($sql);
                session_destroy();
                header("Location: /123folhas/");
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

                    <input type="text" name="txtNome" value="" maxlength="100" id="primeiroinput" placeholder="Nome" class="campocheio" required>

                    <input type="text" placeholder="CPF" id="cpf" name="txtCPF" value="" oninput="this.value = maskCPF(this.value)" maxlength="14" class="campomedio" required>
                    <select name="selectGenero" id="genero" class="campomedio" required>
                        <option value="genero" disabled selected>Gênero</option>
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                        <option value="O">Outro</option>
                    </select>

                    <input type="date" placeholder="Data de nascimento" id="nascimento" name="dateData_Nasc" oninput="this.value = maskData(this.value)" class="campomedio" required>
                    <input type="text" placeholder="CEP" id="CEP" name="txtCEP" value="" oninput="this.value = maskCEP(this.value); buscarCEP(this.value);" maxlength="9" class="campomedio" required>

                    <input type="text" placeholder="Logradouro" id="logradouro" name="txtLogradouro" value="" class="campocheio" maxlength="150" required>
                    <input type="text" placeholder="Bairro" id="bairro" name="txtBairro" value="" class="campomedio" maxlength="50" required>
                    <input type="number" placeholder="Numero" id="numero" name="txtNumero" value="" class="campomedio" oninput="limitarNumero(this)" min="0" required>
                    <input type="text" placeholder="Cidade" id="cidade" name="txtCidade" value="" class="campomedio" maxlength="50" required>
                    <input type="text" placeholder="Estado" id="estado" name="txtEstado" value="" class="campomedio" maxlength="2" required>

                    <input type="email" name="email" id="email" value="" placeholder="E-mail" maxlength="100" class="campocheio" required>

                    <input type="password" name="txtSenha" value="" id="senha" placeholder="Senha" class="campocheio" maxlength="20" required>

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
        const email = document.getElementById('email')

        function verificar() {
            if (isNomeValido(txtNome.value)) {
                if (isCEPValido(txtCEP.value)) {
                    if (isEmailValido(email.value)) {
                        return true
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
    </script>

</body>

</html>