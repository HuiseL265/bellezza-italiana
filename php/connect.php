<?php

$con = mysqli_connect("localhost:3308","root","");

if(!$con){
    echo "<b>Erro</b>: Não foi possível se conectar ao banco." . PHP_EOL;
    echo "<br>";
    echo "<b>Debugging error:</b> " . mysqli_connect_error() . PHP_EOL; //mostra o descritivo do erro
    exit; //parar a execução
}

if(!mysqli_select_db($con, "db_rest")){
    echo "<b>Erro</b>: Não foi possível selecionar o banco de dados." . PHP_EOL;
    echo "<br>";
    echo "<b>Debugging error:</b> " . mysqli_connect_error() . PHP_EOL; 
    exit;
}

mysqli_query($con, "SET NAMES utf8");

?>
