<?php
session_start();
    require('connect.php');
    
    $cliente = $_SESSION['codCliente'];

    $comidas = mysqli_query($con,"Select * from `tb_pratos`");

    $reservas = mysqli_query($con, "SELECT `idReserva` FROM `tb_reserva` WHERE `codCliente` = $cliente AND `status` = 'Pendente'");
    $reservas = mysqli_fetch_array($reservas);
    

    if(!isset($_SESSION['email'])){
      header('location:../cardapio?success=noLogin');
    }

    else if (!isset($reservas)) {
      $msg=4;
      header('location:../agendar?msg='.$msg);
    }

     else if (isset($_POST['prato'])) {
      $prato =$_POST['prato'];

      foreach ($prato as $key => $value) {
           mysqli_query($con,"INSERT INTO `tb_pratopedido`(`idReserva`, `idComida`) VALUES ($reservas[idReserva],$value)");
        }
        header('location:../cardapio?success=true');
    }
    else {
      header('location:../cardapio?success=Null');
    }

    
   /*if (isset($_POST['prato'])) {
    $pratos =$_POST['prato'];

    if(count($pratos) == 1){
      echo "<h3>Prato esolhido:</h3>";
    }else{
      echo "<h3>Pratos escolhidos:</h3>";
    }
      foreach ($pratos as $key => $value) {
          

          if (count($pratos) == 1) {
            echo $value."<br>";
          }else {
              echo $value."<br>";
          }
      }
        
    }else {
        echo 'Nenhum prato escolhido';
    }*/
?>