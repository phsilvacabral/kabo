<?php
    include("../../connection.php");

    session_start();
    if (!isset($_SESSION["Cod_Usuario"])) {
        header("Location: /kabo/");
        exit();
    }

    if ($_SESSION["Tipo_Usuario"] == 0) {
        header("Location: ../db0/erro.php");
        exit();
    }

    $tipo_cat = $_POST['tipo_cat'];

    if ($tipo_cat == "CPU"){
        $Descricao = $_POST['descricaoCPU'];
        $Modelo = $_POST['modeloCPU'];
        $Marca = $_POST['marcaCPU'];
        $Preco = $_POST['precoCPU'];
        $Quantidade = $_POST['quantidadeCPU'];
        $Soquete = $_POST['soqueteCPU'];
        $Nucleos = $_POST['nucleosCPU'];
        $Threads = $_POST['threadsCPU'];
        $Frequencia = $_POST['frequenciaCPU'];
        $TDP = $_POST['tdpCPU'];
        $Tipo_mem = $_POST['tipo_memCPU'];
        $Vel_mem = $_POST['vel_memCPU'];
        $GPUs = $_POST['GPUsCPU'];

        try {
            $sql = "INSERT INTO CPU (Soquete, Frequencia, Nucleos, Threads, TDP, Tipo_Mem, Vel_Mem, GPUs) VALUES ('$Soquete', $Frequencia, $Nucleos, $Threads, $TDP, '$Tipo_mem', $Vel_mem, '$GPUs')";
            if ($conn->query($sql) === TRUE) {
                $sqlCod = "SELECT Cod_CPU FROM CPU WHERE Soquete = '$Soquete' AND Frequencia >= $Frequencia AND Nucleos = $Nucleos AND Threads = $Threads AND TDP = $TDP AND Tipo_Mem = '$Tipo_mem' AND Vel_Mem = $Vel_mem AND GPUs = '$GPUs'";
                $resultCod = $conn->query($sqlCod);
                $row = $resultCod->fetch_assoc();
                $sqlP = "INSERT INTO Produto_Tipo (Descricao, Preco, Modelo, Marca, Qtd_estoque, fk_Cod_CPU) VALUES ('$Descricao', $Preco, '$Modelo', '$Marca', $Quantidade, {$row['Cod_CPU']})";
                if ($conn->query($sqlP) === TRUE) {
                    header("Location: /kabo/admin/produtos");
                    exit;
                } else {
                    throw new Exception('Ocorreu um erro ao executar a operação.');
                }
                exit;
            } else {
                throw new Exception('Ocorreu um erro ao executar a operação.');
            }
        } catch (Exception $e) {
            echo '<script>alert("'.$e->getMessage().'"); history.go(-1);</script>';
            exit;
        }
    }

?>
