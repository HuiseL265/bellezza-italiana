<!DOCTYPE html>
<?php
session_start();
?>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8">
      <meta content="width=device-width, initial-scale=1.0" >
      <title>SOS Alimentos(Brasil)</title>

      <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;700&display=swap" rel="stylesheet">
      <link rel="shortcut icon" type="image/png" href="css/img/logo/logoItaliana.svg">
      <link rel="stylesheet" type="text/css" href="css/cardapio.css">
      <link rel="stylesheet" href="css/header.css">

      <script src="libs/jquery-3.4.1.js"></script>
      <script src="libs/verificarCadastro.js"></script>

      <script>
            $.ajax({
  				url: 'php/verificar_login.php',
  				success: function(data) {
               console.log(data);
               if(data == "Logado"){
                  $('#form-login').hide();
                  $('#usuario').show();
               }
               if(data == "NaoLogado"){
                  $('#usuario').hide();
                  $('#form-login').show();
               }
            }
            });

            $(document).ready(function(e){
               $('label').click(function(f){
                  $(this).toggleClass("borda");
                  console.log(this);
               })
            })
      </script>
   </head>

   <body>
      <header id="header">
         <a href="#"><img src="css/img/logo/logoRest.png" alt="logo" height="80px"></a>

          <ul id="header-container">
             <li><a href="home.php"><h1>Home</h1></a></li>
             <li><a href=""><h1>Sobre</h1></a></li>
             <li><a href="cardapio.php"><h1>Cardápio</h1></a></li>
             <li><a href="agendar.php"><h1>Agende seu horário</h1></a></li>

             <!--logado-->
             <div id="usuario">
                   <div id="info-usuario">
                      <p id="nome"><?php echo $_SESSION['nomeUsuario'] ?></p>
                      <div class="sair"><a href="php/sair.php">Sair</a></div>
                      
                   </div>
                   <div id="container-foto">
                      <div id="fotoUsuario">
                         <img src="./css/img/usuarioIcon/user1.png" alt="userIcon">
                      </div>
                   </div>
                </div>
             
             <!--não logado-->
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
            <form action="php/pratoEscolhido.php" method="post">
                <div class="pratos">
        
                    <article>
                        <h1>Título</h1>
                        <label for="p1">
                        <img src="php/img/pratos/taco.jpg" width="300px" height="200px" alt="">
                        </label>
                        <input type="checkbox" id="p1" name="prato[]" value="taco">
                        <h3>Descrição comida</h3>
                     </article>
                     
                     <article>
                        <h1>Título</h1>
                        <label for="p2">
                        <img src="php/img/pratos/sushi.jpg" width="300px" height="200px" alt="">
                        </label>
                        <input type="checkbox" id="p2" name="prato[]" value="sushi">
                        <h3>Descrição comida</h3>
                    </article>
                    
                </div>
        
                <input type="submit" value="Enviar Pedido">
            </form>
         
      </div>
   </body>
</html>