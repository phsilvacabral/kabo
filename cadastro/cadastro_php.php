<?php
    include("connection.php");
    
    $Nome = $_POST['txtNome'];
    $CPF = $_POST['txtCPF'];
    $Genero = $_POST['selectGenero'];
    $Data_Nasc = $_POST['dateData_Nasc'];
    $dateData_Nasc = date('Y-m-d', strtotime($Data_Nasc));
    $Email = $_POST['email'];
    $Senha = $_POST['txtSenha'];
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
            $sql = "INSERT INTO Usuario (Nome, CPF, Email, Senha, Genero, Dt_Nascimento, Tipo_Usuario) VALUES ('$Nome', '$CPF', '$Email', '$Senha', '$Genero', '$dateData_Nasc', $Tipo_Usuario)";
            if ($conn->query($sql) === TRUE) {
                $sqlC = "SELECT Cod_Usuario, Tipo_Usuario FROM Usuario WHERE CPF = '$CPF'";
                $resultC = $conn->query($sqlC);
                $row = $resultC->fetch_assoc();
                session_start();
                $_SESSION["Cod_Usuario"] = $row["Cod_Usuario"];
                $_SESSION["Tipo_Usuario"] = $row["Tipo_Usuario"];
                $sqlE = "INSERT INTO Endereco (CEP, Logradouro, Numero, Bairro, Cidade, Estado, fk_Usuario_Cod_Usuario) VALUES ('$CEP', '$Logradouro', '$Numero', '$Bairro', '$Cidade', '$Estado', {$_SESSION['Cod_Usuario']})";
                if ($conn->query($sqlE) === TRUE) {
                    header("Location: /kabo/");
                    exit;
                } else {
                    throw new Exception('Ocorreu um erro ao executar a operação.');
                }
            } else {
                throw new Exception('Ocorreu um erro ao executar a operação.');
            }
        } 
    } catch (Exception $e) {
        echo '<script>alert("'.$e->getMessage().'"); history.go(-1);</script>';
        exit;
    }
    
?>
