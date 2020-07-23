<?php
require('connect.php');

$idPedido = $_GET['idPedido'];

if(mysqli_query($con, "DELETE FROM `tb_pratopedido` WHERE `idPedido` = $idPedido")){
    echo "Prato removido com sucesso.";
}else{
    echo "Erro ao excluir o prato em questão, por favor entre em contato com o restaurante.";
}

?>