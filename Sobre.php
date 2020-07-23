<!DOCTYPE html>
<?php
session_start();
?>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8">
	  <link rel="stylesheet" href="css/sobre.css">
	  <link rel="shortcut icon" type="image/png" href="css/img/logo/logoRest.png">
      <link rel="stylesheet" href="css/header.css">

      <script src="libs/jquery-3.4.1.js"></script>
      <script>
          $.ajax({
  				url: 'php/verificar_login.php',
  				success: function(data) {
               console.log(data);
               if(data == "Logado"){
                  $('#form-login').hide();
                  $('#usuario').show();
                  $('#reservar').show();
               }
               if(data == "NaoLogado"){
                  $('#usuario').hide();
                  $('#reservar').hide();
                  $('#form-login').show();
               }
            }
            });

        </script>
   </head>
   <body>

   <header id="header" style="display:flex;">
         <a href="#"><img src="css/img/logo/logoRest.png" alt="logo" height="80px"></a>

          <ul id="header-container" style="width:100%;display:flex;justify-content:space-between;">
             <li><a href="home.php"><h1>Home</h1></a></li>
             <li><a href="Sobre.php"><h1>Sobre</h1></a></li>
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
             <form id="form-login" method="post" action="php/logar.act.php" onsubmit="javascript:Logar()">
               <input type="email" id="emailLogin" name="email" placeholder="Login" required="required">
               <input type="password" id="senhaLogin" name="senha" placeholder="Senha" required="required">
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
      
      <!-- Meu codigo -->
      
      <div class="Topo">
      <img src="css/img/background/Menu_Sobre.jpg" title="sobre" height="35%" width="100%">
      	</div>
      <div class="PrimeiroTexto">
      	<p><i>Iniciamos nossos restaurantes no ano de 2000 no Brasil, inicialmente o restaurante se chamava "Local Pasta", onde vendíamos uma grande variedade de pizzas, por um valor a baixo da concorrência por ter uma parceria com uma empresa Italiana chamada de “Macarrone”. Anos depois começamos a crescer e por isso nos acrescentamos todos os tipos de comidas italianas no cardápio para saciar o apetite de nossos clientes e com isso mudamos nosso nome para “Taliatelle Italiane” para combinar mais com o nosso restaurante.</i></p>  
      	<p id="Visite"><i>Visite-nos e encante-se!</i></p>
      </div>
      <div class="LinhaDoTempo">
      	<h2> Linha do Tempo</h2>
      	<div class="LT2000">
      		<h1>2000</h1>
      		<p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      	<img src="css/img/background/img2000.jpg" alt="2000">
      	</div>
      	<div class="LT2010">
      		<h1>2010</h1>
      		<p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      	<img src="css/img/background/img2010.jpg" alt="2010">
      	</div>
      	<div class="LT2020">
      		<h1>2020</h1>
      		<p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      	<img src="css/img/background/img2020.png" alt="2020">
      	</div>
      </div>
      <div class="FundoBaixo">
       <p>&nbsp;</p>
      	<div class="Avaliacao">
      	<h1>Avaliação de Criticos</h1>
      		<div class="Avaliadores">
        	<table>
        		<td ><img class="FotoAvali" src="css/img/usuarioIcon/Jacan.jpg"></td>
        		<td ><h2>Érick Jacquin</h2><br><p>Avaliação de:<br>Comida: <img class="Estrelas" src="css/img/icon/4estrelas.png"><br><p>Local :<img class="Estrelas" src="css/img/icon/3estrelas.png"><br><p>Atendimento: <img class="Estrelas" src="css/img/icon/4estrelas.png"></p></td>
        		<tr>
        		<td><img class="FotoAvali" src="css/img/usuarioIcon/Fogaça.jpg"></td>
         		<td><h2>Henrique Fogaça</h2><br><p>Avaliação de: <br>Comida: <img class="Estrelas" src="css/img/icon/4estrelas.png"><br>Local :<img class="Estrelas" src="css/img/icon/4estrelas.png"><br>Atendimento: <img class="Estrelas" src="css/img/icon/4estrelas.png"></p></td>
        		<tr>
        		<td><img class="FotoAvali" src="css/img/usuarioIcon/Rodrigo-Oliveira.jpg"></td>
        		<td><h2>Rodrigo Oliveira</h2><br><p>Avaliação de:<br>Comida: <img class="Estrelas" src="css/img/icon/5estrelas.png"><br>Local :<img class="Estrelas" src="css/img/icon/3estrelas.png"><br>Atendimento: <img class="Estrelas" src="css/img/icon/5estrelas.png"></p></td>
        		<tr>
        		<td><img class="FotoAvali" src="css/img/usuarioIcon/Alex-Atala.jpg"></td>
         		<td><h2>Alex Atala</h2><br><p>Avaliação de:<br>Comida: <img class="Estrelas" src="css/img/icon/4estrelas.png"><br>Local :<img class="Estrelas" src="css/img/icon/4estrelas.png"><br>Atendimento: <img class="Estrelas" src="css/img/icon/5estrelas.png"></p></td>
        	</table>
        	</div>
      	</div>
	  </div>
	  
	  <?php require('Rodape.php');
	  ?>

   </body>
</html>