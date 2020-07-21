<?php
require('../connect.php');

//$strHMArray = array();
$strHoras = "";
$strMesas = "";

$haDatas = 0;
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

while($hora = mysqli_fetch_array($horarios)){ //'fabrica' para cada resultado encontrado uma variável relacionada
    $horarioDisp = date('H:i', strtotime($hora['hora']));

    
    /*
    if($verifHora == $horaFechamento){
        //Horas ja preenchidas anteriormente
        $HorasPre = explode("/", $strHoras);

        foreach($HorasPre as $verVazia){
            if($verVazia == "vazia"){

            }
        }
        //for(i=0;i )
    }*/

    while($verifHora <= $horaFechamento){
        //echo "hora Disp: $horarioDisp<br>";     
        
        if($verifHora != $horarioDisp){//se o horário estiver disponível
            $strHoras = $strHoras.$verifHora."/";
            $strMesas = $strMesas."vazia/";
        }else{ 
            $j = 1; //iniciando variável para  verificação das mesas

            $mesas = mysqli_query($con,"SELECT * FROM `tb_reserva` 
                WHERE `data` = '$data' 
                AND `hora` = '$hora[hora]' ");
                
                while($mesa = mysqli_fetch_array($mesas)){
                    
                    if($mesa['IdMesa'] != ""){
                        
                        if($j >= 2){
                            $strMesas = substr(trim($strMesas), 0, -1).",";
                            $strMesas = $strMesas.$mesa['IdMesa']."/";
                            $j++;
                            
                        }else{
                            $strMesas = $strMesas.$mesa['IdMesa']."/";
                            $j++;
                        }
                    }
                    $haMesas = 1;//caso este while for executado pelo menos uma vez, há dados nele.                   
                }
                //echo $j;
                if($j > $qtdMesas){
                    $strMesas = substr($strMesas, 0, -$qtdMesas*2);
                    //echo "TODAS AS MESAS OCUPADAS AS $hora[hora]";
                }else{
                    $strHoras = $strHoras.$verifHora."/";
                }
                
        }  
        $verifHora = date('H:i', strtotime($verifHora) + 3600);   
    }

    $haDatas = 1;//caso este while for executado pelo menos uma vez, há dados nele.
};


$strHoras = substr(trim($strHoras), 0, -1);
$strMesas = substr(trim($strMesas), 0, -1);

if($haDatas == 0){
    $strHoras = "09:00/10:00/11:00/12:00/13:00/14:00/15:00/16:00/17:00";
}

if($haMesas == 0){
    $strMesas = "vazia/vazia/vazia/vazia/vazia/vazia/vazia/vazia/vazia";
}

echo $strHoras;
echo ".";
echo $strMesas;

?>