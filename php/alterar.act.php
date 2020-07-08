<?php
require('connect.php');
extract($_POST);

mysqli_query($con, "UPDATE `tb_restaurante` SET `nome`='$nome',`email`='$email',`cep`='$cep',`rua`='$rua',`num`='$num',`cpfResponsavel`='$cpfResponsavel',`cnpj`='$cnpj',`telefone`='$telefone',`telefone2`='$telefone2' WHERE `codRes` = '$cod'");
header('location:listarRestaurantes.php');
?>