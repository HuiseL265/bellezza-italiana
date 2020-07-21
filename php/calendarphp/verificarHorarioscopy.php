<?php
require('../connect.php');

//$strHMArray = array();
$strHoras = "";
$strMesas = "";

$haHoras = 0;
$haMesas = 0;

$qtdMesas = 3; //qtd de mesas no restaurante
$horaAbertura = '09:00:00'; //hora de abertura do restaurante
$horaFechamento = '17:00:00'; //hora de fechamento do restaurante

$ano = $_GET['ano'];
$mes = $_GET['mes'];
$dia = $_GET['dia'];

$data = $ano."-".$mes."-".$dia;
//echo "$data<br>";

$horarios = mysqli_query($con,"SELECT * FROM `tb_reserva` 
                WHERE `data` = '$data' 
                AND `hora` BETWEEN  '$horaAbertura' AND '$horaFechamento'");


$verifHora = date('H:i', strtotime($horaAbertura));

$j=0;

$horariosArray = [];
while($horariosC = mysqli_fetch_array($horarios)){
    array_push($horariosArray, $horariosC);
    $j++;
};


while($verifHora < $horaFechamento){
    
    //echo $verifHora;
    for($i=0; $i < count($horariosArray); $i++){
        echo $horariosArray[$i];
        if($verifHora == $horariosArray[$i]){
           echo $horariosArray[$i];
           echo "<br>ok";
        }
    }
    $verifHora = date('H:i', strtotime($verifHora) + 3600);
}



$strHoras = substr(trim($strHoras), 0, -1);
$strMesas = substr(trim($strMesas), 0, -1);

if($haHoras == 0){
    $strHoras = "09:00/10:00/11:00/12:00/13:00/14:00/15:00/16:00/17:00";
}

if($haMesas == 0){
    $strMesas = "vazia/vazia/vazia/vazia/vazia/vazia/vazia/vazia/vazia";
}

echo $strHoras;
echo ".";
echo $strMesas;

?>