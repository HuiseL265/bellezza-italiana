<?php
session_start();
require('connect.php');
$email = $_POST['email'];
$senha = md5($_POST['senha']);


$query = mysqli_query($con,"SELECT * FROM `tb_clientes` where `email` = '$email'; " );


if($query->num_rows == 1){
    $query = mysqli_fetch_array($query);
    if($senha == $query['senha']){
        $_SESSION['email'] = $email;
        header("location:../home");
        exit();
    }else{
        $_SESSION['usuario_invalido']=true;
        header("location:../home");
        exit();
    }   
    
}else{
    $_SESSION['campo_vazio']=true;
    header("location:../home");
    exit();
}

?>