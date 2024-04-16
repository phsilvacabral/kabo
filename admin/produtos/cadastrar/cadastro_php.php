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
            $checkQuery = "SELECT * FROM Produto_Tipo WHERE Modelo = '$Modelo'";
            $checkResult = $conn->query($checkQuery);
            if ($checkResult && $checkResult->num_rows > 0) {
                throw new Exception('Modelo de produto já existente!');
            } else {
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
                } else {
                    throw new Exception('Ocorreu um erro ao executar a operação.');
                }
            }
        } catch (Exception $e) {
            echo '<script>alert("'.$e->getMessage().'"); history.go(-1);</script>';
            exit;
        }
    } else if ($tipo_cat == "GPU") {

    } else if ($tipo_cat == "PlacaMae") {
        $Descricao = $_POST['descricaoPM'];
        $Modelo = $_POST['modeloPM'];
        $Marca = $_POST['marcaPM'];
        $Preco = $_POST['precoPM'];
        $Quantidade = $_POST['quantidadePM'];
        $Tamanho = $_POST['tamanhoPM'];
        $Soquete = $_POST['soquetePM'];
        $Chipset = $_POST['chipsetPM'];
        $Tipo_mem = $_POST['tipo_memPM'];
        $Vel_mem = $_POST['vel_memPM'];
        $PCIe = $_POST['PCIePM'];
        $M2 = $_POST['M2PM'];
        $SATA = $_POST['sataPM'];


        try {
            $checkQuery = "SELECT * FROM Produto_Tipo WHERE Modelo = '$Modelo'";
            $checkResult = $conn->query($checkQuery);
            if ($checkResult && $checkResult->num_rows > 0) {
                throw new Exception('Modelo de produto já existente!');
            } else {
                $sql = "INSERT INTO Placa_Mae (Soquete, Tipo_Mem, Vel_Mem, PCIe, M2, SATA, Tamanho, Chipset) VALUES ('$Soquete', '$Tipo_mem', $Vel_mem, $PCIe, $M2, $SATA, '$Tamanho', '$Chipset')";
                if ($conn->query($sql) === TRUE) {
                    $sqlCod = "SELECT Cod_PlacaMae FROM Placa_Mae WHERE Soquete = '$Soquete' AND PCIe >= $PCIe AND Tipo_Mem = '$Tipo_mem' AND Vel_Mem = $Vel_mem AND M2 = $M2 AND SATA = $SATA AND Tamanho = '$Tamanho' AND Chipset = '$Chipset'";
                    $resultCod = $conn->query($sqlCod);
                    $row = $resultCod->fetch_assoc();
                    $sqlP = "INSERT INTO Produto_Tipo (Descricao, Preco, Modelo, Marca, Qtd_estoque, fk_Cod_PlacaMae) VALUES ('$Descricao', $Preco, '$Modelo', '$Marca', $Quantidade, {$row['Cod_PlacaMae']})";
                    if ($conn->query($sqlP) === TRUE) {
                        header("Location: /kabo/admin/produtos");
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
    }

?>
