<?php
require('../connect.php');

$strHoras = "";
$haDatas = 0;

$horaAbertura = '09:00:00';
$horaFechamento = '17:00:00';

$ano = $_GET['ano'];
$mes = $_GET['mes'];
$dia = $_GET['dia'];

$data = $ano."-".$mes."-".$dia;
//echo "$data<br>";

$horarios = mysqli_query($con,"SELECT * FROM `tb_reserva` 
                WHERE `data` = '$data' 
                AND `hora` BETWEEN  '$horaAbertura' AND '$horaFechamento'");

$verifHora = date('H:i', strtotime($horaAbertura));

while($hora = mysqli_fetch_array($horarios)){
    $horarioDisp = date('H:i', strtotime($hora['hora']));
    
    while($verifHora <= $horaFechamento){

        if($verifHora != $horarioDisp){
            $strHoras = $strHoras.$verifHora."/";
        }
    
        $verifHora = date('H:i', strtotime($verifHora) + 3600);   
    }

    $haDatas = 1;
};

$strHoras = substr(trim($strHoras), 0, -1);

if($haDatas == 0){
    $strHoras = "09:00/10:00/11:00/12:00/13:00/14:00/15:00/16:00/17:00";
}

echo $strHoras;

?>