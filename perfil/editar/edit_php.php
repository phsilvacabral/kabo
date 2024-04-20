<?php
    include("../../connection.php");
    session_start();
    
    $Nome = $_POST['txtNome'];
    $Genero = $_POST['selectGenero'];
    $Senha = $_POST['txtSenha'];
    $senhaCriptografada = md5($Senha);
    $CEP = $_POST['txtCEP'];
    $Logradouro = $_POST['txtLogradouro'];
    $Bairro = $_POST['txtBairro'];
    $Numero = $_POST['txtNumero'];
    $Cidade = $_POST['txtCidade'];
    $Estado = $_POST['txtEstado'];

    if (empty($Senha)){
        try {
            // Verificar se o endereço já existe
            $sqlE = "SELECT Cod_Endereco FROM Endereco WHERE CEP = '$CEP' AND Logradouro = '$Logradouro' AND Bairro = '$Bairro' AND Cidade = '$Cidade' AND Estado = '$Estado' AND Numero = $Numero";
            $resultE = $conn->query($sqlE);
            if ($resultE->num_rows > 0) {
                // O endereço já existe, obter o Cod_Endereco
                $row = $resultE->fetch_assoc();
                $Cod_Endereco = $row['Cod_Endereco'];
            } else {
                // O endereço não existe, inserir novo endereço
                $sqlE = "INSERT INTO Endereco (CEP, Logradouro, Bairro, Cidade, Estado, Numero) VALUES ('$CEP', '$Logradouro', '$Bairro', '$Cidade', '$Estado', $Numero)";
                if ($conn->query($sqlE) === TRUE) {
                    // Obter o Cod_Endereco do novo endereço
                    $Cod_Endereco = $conn->insert_id;
                } else {
                    throw new Exception('Ocorreu um erro ao inserir o novo endereço.');
                }
            }
            // Atualizar o usuário
            $sql = "UPDATE Usuario SET Nome = '$Nome', Genero = '$Genero', fk_Cod_Endereco = $Cod_Endereco WHERE Cod_Usuario = {$_SESSION['Cod_Usuario']}";
            if ($conn->query($sql) === TRUE) {
                header("Location: /kabo/perfil/");
                exit;
            } else {
                throw new Exception('Ocorreu um erro ao atualizar o usuário.');
            }
        } catch (Exception $e) {
            echo '<script>alert("'.$e->getMessage().'"); history.go(-1);</script>';
            exit;
        }
    } else {
        try {
            $sql = "UPDATE Usuario SET Nome = '$Nome', Genero = '$Genero', Senha = '$senhaCriptografada' WHERE Cod_Usuario = {$_SESSION['Cod_Usuario']}";
            if ($conn->query($sql) === TRUE) {
                $sqlC = "SELECT Cod_Usuario FROM Usuario WHERE CPF = '$CPF'";
                $resultC = $conn->query($sqlC);
                $row = $resultC->fetch_assoc();
                $sqlE = "UPDATE Endereco SET CEP = '$CEP', Logradouro = '$Logradouro', Bairro = '$Bairro', Cidade = '$Cidade', Estado = '$Estado', Numero = $Numero WHERE fk_Cod_Usuario = {$_SESSION['Cod_Usuario']}";
                if ($conn->query($sqlE) === TRUE) {
                    header("Location: /kabo/perfil/");
                    exit;
                } else {
                    throw new Exception('Ocorreu um erro ao executar a operação.');
                }
            } else {
                throw new Exception('Ocorreu um erro ao executar a operação.');
            }
        } catch (Exception $e) {
            echo '<script>alert("'.$e->getMessage().'"); history.go(-1);</script>';
            exit;
        }
    }
?>
