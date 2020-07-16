<!DOCTYPE html>
<?php
session_start();
?>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8">
      <meta content="width=device-width, initial-scale=1.0" >
      <title>SOS Alimentos(Brasil)</title>
      <link rel="shortcut icon" type="image/png" href="/css/img/logo/logo.ico">
      <link rel="stylesheet" type="text/css" href="/css/cardapio.css">

      <script src="/libs/jquery-3.4.1.js"></script>
      <script src="/libs/verificarCadastro.js"></script>
   </head>
   <body>
      <header id="header">
         <a href="#"><img src="/css/img/logo/logo2.svg" alt="logo" height="80px"></a>

          <ul id="header-container">
             <li><a href="/home.php"><h1>Home</h1></a></li>
             <li><a href=""><h1>Sobre</h1></a></li>
             <li><a href="cardapio.php"><h1>Cardápio</h1></a></li>
             <li><a href="/agendar.html"><h1>Agende seu horário</h1></a></li>
             
             <form id="form-login" method="post" action="logar.act.php">
               <input type="email" name="email" placeholder="Login" required="required">
               <input type="password" name="senha" placeholder="Senha" required="required">
               <input type="submit" value="LOGAR">
               </ul>

               <?php
                if(isset($_SESSION['usuario_invalido'])){
               ?>
                <p>Email e/ou senha invalidos</p>
               <?php
                    };
                    unset($_SESSION['usuario_invalido']);
               ?>

               <?php
                    if(isset($_SESSION['campo_vazio'])){
               ?>
                <p>Preencha todos os campos</p>

               <?php
                    };
                    unset($_SESSION['campo_vazio']);
               ?>
             </form>
      </header>
      <div id="central">
            <form action="pratoEscolhido.php" method="post">
                <div class="pratos">
        
                    <label for="p1">
                     <img src="img/pratos/taco.jpg" width="300px" height="200px" alt="">
                     <input type="checkbox" id="p1" name="prato[]" value="taco">
                     </label>
                     <label for="p2">
                     <img src="img/pratos/sushi.jpg" width="300px" height="200px" alt="">
                     <input type="checkbox" id="p2" name="prato[]" value="sushi">
                    </label>
                    
                </div>
        
                <input type="submit" value="Enviar Pedido">
            </form>
         
      </div>
   </body>
</html>