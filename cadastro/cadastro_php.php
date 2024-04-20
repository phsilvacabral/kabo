<?php
    include("connection.php");
    
    $Nome = $_POST['txtNome'];
    $CPF = $_POST['txtCPF'];
    $Genero = $_POST['selectGenero'];
    $Data_Nasc = $_POST['dateData_Nasc'];
    $dateData_Nasc = date('Y-m-d', strtotime($Data_Nasc));
    $Email = $_POST['email'];
    $Senha = $_POST['txtSenha'];
    $senhaCriptografada = md5($Senha);
    $Tipo_Usuario = 0;
    $CEP = $_POST['txtCEP'];
    $Logradouro = $_POST['txtLogradouro'];
    $Bairro = $_POST['txtBairro'];
    $Numero = $_POST['txtNumero'];
    $Cidade = $_POST['txtCidade'];
    $Estado = $_POST['txtEstado'];

    try {
        $checkQuery = "SELECT * FROM Usuario WHERE Email = '$Email' OR CPF = '$CPF'";
        $checkResult = $conn->query($checkQuery);
        if ($checkResult && $checkResult->num_rows > 0) {
            throw new Exception('Ocorreu um erro ao executar a operação.');
        } else {
            // Verifica se o endereço já existe
            $sqlCheckEndereco = "SELECT Cod_Endereco FROM Endereco WHERE CEP = '$CEP' AND Logradouro = '$Logradouro' AND Numero = '$Numero' AND Bairro = '$Bairro' AND Cidade = '$Cidade' AND Estado = '$Estado'";
            $resultCheckEndereco = $conn->query($sqlCheckEndereco);
            if ($resultCheckEndereco && $resultCheckEndereco->num_rows > 0) {
                // Se o endereço já existir, usa o Cod_Endereco existente
                $rowEndereco = $resultCheckEndereco->fetch_assoc();
                $Cod_Endereco = $rowEndereco["Cod_Endereco"];
            } else {
                // Se o endereço não existir, insere um novo e usa o Cod_Endereco do novo endereço
                $sqlE = "INSERT INTO Endereco (CEP, Logradouro, Numero, Bairro, Cidade, Estado) VALUES ('$CEP', '$Logradouro', '$Numero', '$Bairro', '$Cidade', '$Estado')";
                if ($conn->query($sqlE) === TRUE) {
                    $Cod_Endereco = $conn->insert_id;
                } else {
                    throw new Exception('Ocorreu um erro ao executar a operação.');
                }
            }

            $sql = "INSERT INTO Usuario (Nome, CPF, Email, Senha, Genero, Dt_Nascimento, Tipo_Usuario, fk_Cod_Endereco) VALUES ('$Nome', '$CPF', '$Email', '$senhaCriptografada', '$Genero', '$dateData_Nasc', $Tipo_Usuario, $Cod_Endereco)";
            if ($conn->query($sql) === TRUE) {
                $sqlC = "SELECT Cod_Usuario, Tipo_Usuario FROM Usuario WHERE CPF = '$CPF'";
                $resultC = $conn->query($sqlC);
                $row = $resultC->fetch_assoc();
                session_start();
                $_SESSION["Cod_Usuario"] = $row["Cod_Usuario"];
                $_SESSION["Tipo_Usuario"] = $row["Tipo_Usuario"];
                
                header("Location: /kabo/");
                exit;
            } else {
                throw new Exception('Ocorreu um erro ao executar a operação.');
            }
        } 
    } catch (Exception $e) {
        echo '<script>alert("'.$e->getMessage().'"); history.go(-1);</script>';
        exit;
    }
    
?>