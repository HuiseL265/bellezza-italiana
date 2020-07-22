<?php
session_start();
    require('connect.php');
    
    $comidas = mysqli_query($con,"Select * from `tb_pratos`");

    if(!isset($_SESSION['email'])){
      header('location:../cardapio?success=noLogin');
    }

    else if (isset($_POST['prato'])) {
      $prato =$_POST['prato'];

      foreach ($prato as $key => $value) {
                                                                                      //Número para teste
           mysqli_query($con,"INSERT INTO `tb_pratopedido`(`idReserva`, `idComida`) VALUES (4,$value)");
        }
        header('location:../cardapio?success=true');
    }else {
      echo 'Nenhum prato escolhido';
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