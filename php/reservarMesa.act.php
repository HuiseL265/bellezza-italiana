<?php
require('connect.php');
session_start();

//define a timezone para São Paulo
ini_set('date.timezone', 'America/Sao_Paulo');

//pega a data de hoje e hora atual
$horaHoje = date('h:i:s');
$dataHoje = date('d/m/Y');

//extrai os dados da reserva
extract($_POST);
$IdMesa = $_POST['IdMesa'];
$data = $_POST['data'];
$hora = $_POST['hora'];

$horaStr = substr($hora,0,2);
//caso não esteja no horário de funcionamento, não executar o resto do código
if(!($horaStr >= 8 and $horaStr <= 17)){
    echo "A hora está fora do funcionamento do restaurante";
    exit;
}


//puxa a mesa solicitada: dia,hora e a mesa. 
$mesaSolicitada = mysqli_query($con,"SELECT * FROM `tb_reserva` WHERE (`IdMesa` = $IdMesa AND `data` = '$data' AND `hora` = '$hora')");

//há uma solicitação no mesmo dia, mesma hora e mesma mesa?
if(mysqli_num_rows($mesaSolicitada)>0){
    echo "<br>Mesa Indisponível";
}else{
    echo "<br>Mesa Disponível";

    //verifica se o usuário está logado
    if(isset($_SESSION['email'])){
        $email = $_SESSION['email'];
        
        //pega os dados a partir do email logado na SESSION
        $usuario = mysqli_query($con, "SELECT * FROM `tb_clientes` WHERE `email` = '$email'");
        //As dimensiona em um Array()
        $usuario = mysqli_fetch_array($usuario);

        //Pega o cod e o nome do cliente
        $clienteID = $usuario['cod'];
        $nomeCliente = $usuario['nome'];

        if(mysqli_query($con, "INSERT INTO `tb_reserva`(`IdMesa`, `clienteID`, `nomeCliente`, `hora`, `data`, `status`)
                                 VALUES ($IdMesa,'$clienteID','$nomeCliente','$hora','$data','Pendente')")){
                                     header('location:../agendar');
                            echo "<br>Mesa reservada com sucesso!";
                        }else{
                            echo "<br>Erro ao reservar mesa";
                        }
    }else{
        header('location:../home');
    }
    
};


