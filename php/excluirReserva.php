<?php
require('connect.php');

$idReserva = $_GET['codigo'];

if(mysqli_query($con, "DELETE FROM `tb_pratopedido` WHERE `idReserva` = $idReserva") && 
    mysqli_query($con, "DELETE FROM `tb_reserva` WHERE `idReserva` = $idReserva")){
    echo "Reserva cancelada com sucesso.";
}else{
    echo "Erro ao cancelar a reserva, por favor entre em contato com o restaurante.";
}

?>