<?php
require('connect.php');
extract($_POST);

mysqli_query($con, "UPDATE `tb_clientes` SET `nome`='$nome',`email`='$email',`cpf`='$cpf',`telefone`='$telefone',`telefone2`='$telefone2' WHERE `codCliente` = '$cod'");
header('location:listarUsuarios.php');
?>