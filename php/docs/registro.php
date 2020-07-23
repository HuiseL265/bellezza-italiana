<?php

//Este código de registro tem por sua finalidade emitir as reservas
//que estão marcadas e com status 'Pendente'.

require('../connect.php');

//define a timezone para São Paulo
ini_set('date.timezone', 'America/Sao_Paulo');

//pega a data de hoje e hora atual
$hora = date('h:i:s');
$dataHoje = date('d/m/Y');
//criação de data para formato de inclusao no nome do arquivo
$dataArquivo = date('dmY');

$nomeArquivo = "registro$dataArquivo.txt";

$dadosReserva = mysqli_query($con, "SELECT * FROM `tb_reserva` WHERE `status` = 'Pendente'");

while($dados = mysqli_fetch_array($dadosReserva)){

    //se o arquivo de registro existir, apenas adicionar mais conteúdo
    if(file_exists($nomeArquivo)){
        file_put_contents("$nomeArquivo",
                         "\n$dados[IdMesa];$dados[codCliente];$dados[nomeCliente];$dados[data];$dados[hora];$dados[status]",
                         FILE_APPEND);
    }else{
        file_put_contents("$nomeArquivo",
                        "Data: $dataHoje \nHorario do Registro: $hora \n\nIdMesa;codCliente;Nome do Cliente;Data;Hora;Status
                        \n$dados[IdMesa];$dados[codCliente];$dados[codCliente];$dados[data];$dados[hora];$dados[status]");
    }
}

?>