<?php
    require('connect.php');
    $comidas = mysqli_query($con,"Select * from `tb_pratos`");

    
    if (isset($_POST['prato'])) {
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
    }
?>