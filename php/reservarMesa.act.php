<?php
require('connect.php');
extract($_POST);
$IdMesa = $_POST['IdMesa'];
$data = $_POST['data'];
$hora = $_POST['hora'];

echo $data;

//puxa a mesa solicitada: dia,hora e a mesa. 
$mesaSolicitada = mysqli_query($con,"SELECT * FROM `tb_reserva` WHERE (`IdMesa` = $IdMesa AND `data` = '$data' AND `hora` = '$hora')");

//há uma solicitação no mesmo dia, mesma hora e mesma mesa?
if(mysqli_num_rows($mesaSolicitada)>0){
    echo "Mesa Indisponível";
}else{
    echo "Mesa Disponível";

    //verifica se o usuário está logado
    if(isset($_SESSION['email'])){
        $usuario = mysqli_query($con, "SELECT * FROM `tb_clientes` WHERE `email` = ". $_SESSION['email']);
        echo $usuario['email'];
        if(!mysqli_query($con, "INSERT INTO `tb_reserva`(`IdMesa`, `clienteID`, `nomeCliente`, `hora`, `data`, `status`)
                                 VALUES ($IdMesa,$usuario['clienteID'],'$usuario[nomeCliente]','$hora','$data','Pendente')")){
                            echo "erroReserva";
                        };
    }else{
        header('location:../home');
    }
    
};


