<?php
require('connect.php');

$clienteID = $_GET['codigo'];

mysqli_query($con, "DELETE * FROM `tb_clientes` WHERE `cod` = $clienteID");

?>