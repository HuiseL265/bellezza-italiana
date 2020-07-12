<?php
require('connect.php');

//define a timezone para São Paulo
ini_set('date.timezone', 'America/Sao_Paulo');

//pega a data de hoje e hora atual
$hora = date('h:i:s');
$dataHoje = date('d/m/Y');
//criação de data para formato de inclusao no nome do arquivo
$dataArquivo = date('dmY');

$nomeArquivo = "docs/registro$dataArquivo.txt";

//se o arquivo de registro existir, apenas adicionar mais conteúdo
if(file_exists($nomeArquivo)){
    file_put_contents("$nomeArquivo","\nVitor Pereira;vitor-per@hotmail.com;19;50576009812;1129644576",FILE_APPEND);
}else{
    file_put_contents("$nomeArquivo",
                    "Data: $dataHoje \nHorario: $hora \n\nNome;Email;Idade;CPF;Telefone");
}

?>