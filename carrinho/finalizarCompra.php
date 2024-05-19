<?php 
include('../connection.php');
session_start();

$Cod_Usuario = $_SESSION['Cod_Usuario'];
$desconto = $_POST['desconto'];
$codCupom = $_POST['codCupom'];
$valorCompra = $_POST['valorTotal'];
$cartaoSelecionado = $_POST['cartaoSelecionado'];

echo 'Compra finalizada'
?>