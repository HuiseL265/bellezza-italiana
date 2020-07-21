<?php
require('connect.php');

$clienteID = $_GET['codigo'];

if(mysqli_query($con, "DELETE FROM `tb_clientes` WHERE `codCliente` = '$clienteID';")){
    echo "Registro $clienteID excluido";
}

?>