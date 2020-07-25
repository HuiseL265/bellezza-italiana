<?php 
require('../connect.php');

$strMesasOcupadas = "";
$horaSelecionada = $_GET['hora'];
$dataSelecionada = $_GET['data'];

$mesasOcupadas = mysqli_query($con,"SELECT * FROM `tb_reserva` 
                        WHERE `data` = '$dataSelecionada' 
                        AND `hora` = '$horaSelecionada' AND `status` = 'Pendente'");


if(mysqli_num_rows($mesasOcupadas) > 0){
    while($mesa = mysqli_fetch_array($mesasOcupadas)){
        $strMesasOcupadas = $strMesasOcupadas.$mesa['IdMesa'].",";
    }    
    echo $strMesasOcupadas;
}
?>