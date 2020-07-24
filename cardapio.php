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

               var url = window.location.href;
               var msgCardapio = url.split('=')[1];

               if(msgCardapio == "noLogin"){
                  alert('É preciso estar logado para fazer o pedido')
                  
               }else if(msgCardapio == "true"){
                  alert('Pedido realizado');
               }else if(msgCardapio == "Null" ){
                  alert('Nenhum prato selecionado')
               }

               $('article').mousedown(function(f){
                  selecionado = $(this).hasClass("selectedPlate");
                  console.log(selecionado);
                  if(selecionado == true){
                     $(this).removeClass();
                  }else{
                     $(this).addClass("selectedPlate");
                  }
                  console.log(this);
               });
                 /* $('article img').click(function(f){
                   parente = $(this).parent().parent();
                   $(parente).toggleClass("selectedPlate");
               });*/

            })
      </script>
   </head>

   <body>
      <header id="header">
         <a href="#"><img src="css/img/logo/logoRest.png" alt="logo" height="80px"></a>

          <ul id="header-container">
             <li><a href="home.php"><h1>Home</h1></a></li>
             <li><a href="sobre.php"><h1>Sobre</h1></a></li>
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
                        <a href="perfil.php">
                            <img src="./css/img/usuarioIcon/user1.png" alt="userIcon">
                         </a>
                      </div>
                   </div>
                </div>
             
             <!--não logado-->
             <form id="form-login" method="post" action="php/logar.act.php">
               <input type="email" name="email" placeholder="Login" required="required">
               <input type="password" name="senha" placeholder="Senha" required="required">
               <button>LOGAR</button>
               </ul>

               <?php
                if(isset($_SESSION['usuario_invalido'])){          
               ?>
               <script>
                  alert("Email e/ou senha invalidos");
                  location.reload();
               </script>
               <?php
                    };
                    unset($_SESSION['usuario_invalido']);
               ?>

               <?php
                    if(isset($_SESSION['campo_vazio'])){
               ?>
               <script>
                  alert("Preencha todos os campos");
                  location.reload();
               </script>

               <?php
                    };
                    unset($_SESSION['campo_vazio']);
               ?>
             </form>
      </header>

         <div class="pratos">
            <form action="php/pratoEscolhido.php" method="post">
                

                  <?php
                  require('php/connect.php');

                  $pratos = mysqli_query($con, "Select * from `tb_pratos`");
                  while ($prato = mysqli_fetch_array($pratos)) {
                     echo "<article>
                           <label for='$prato[idComida]'>
                              <h1>$prato[comida]</h1>
                              
                              <img src='css/img/cardapio/pratos/$prato[comida].jpg' alt='$prato[comida]'>
                           
                              <input type='checkbox' hidden='hidden' id='$prato[idComida]' name='prato[]' value='$prato[idComida]'>
                             
                              <div class=descricaoPrato>
                                 <h4>Descrição</h4>
                                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                              </div>

                              </label>
                        </article>";
                  }   
                  ?>  
                
         </div>       
               
               <div class="pedido">
                <input type="submit" value="Enviar Pedido">
               </div>
            </form>
         
     
      <?php require('Rodape.php');
      ?>
   </body>
</html>