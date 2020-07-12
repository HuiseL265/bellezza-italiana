<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./libs/jquery-3.4.1.js"></script>
    <script>
    </script>
</head>
<body>
    
</body>
</html>

<?php
require('connect.php');
$teste = 1;

$mesas = mysqli_query($con,"SELECT * FROM `tb_mesas`");

while($mesaAtual = mysqli_fetch_array($mesas)){
    echo ""    
}


?>

