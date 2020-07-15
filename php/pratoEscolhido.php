<?php
    require('connect.php');
    $comidas = mysqli_query($con,"Select * from `tb_pratos`");

    
    if (isset($_POST['prato'])) {
    $pratos =$_POST['prato'];
      foreach ($pratos as $key => $value) {
          

          if (count($pratos) == 1) {
            echo "Prato escolhido: ".$value."<br>";
          }else {
              echo "Pratos escolhidos: ".$value."<br>";
          }
      }
        
    }else {
        echo 'Nenhum prato escolhido';
    }
?>
