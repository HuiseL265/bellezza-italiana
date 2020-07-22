<!DOCTYPE html>
<?php
session_start();
?>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8">
      <meta content="width=device-width, initial-scale=1.0" >
      <title>SOS Alimentos(Brasil)</title>
      <link rel="shortcut icon" type="image/png" href="css/img/logo/logoRest.png">
      <link rel="stylesheet" href="css/home.css">
      <link rel="stylesheet" href="css/header.css">

      <script src="libs/jquery-3.4.1.js"></script>
      <script>
          $.ajax({
  				url: 'php/verificar_login.php',
  				success: function(data) {
               console.log(data);
               if(data == "Logado"){
                  $('#registrar').hide();
                  $('#form-login').hide();
                  $('#usuario').show();
                  $('#reservar').show();
               }
               if(data == "NaoLogado"){
                  $('#usuario').hide();
                  $('#reservar').hide();
                  $('#form-login').show();
                  $('#registrar').show();   
               }
            }
            });

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
                         <img src="./css/img/usuarioIcon/user1.png" alt="userIcon">
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
         <div id="info">
            <img src="css/img/background/restaurante-italiano.jpg" alt="SOS alimentos">
            <p style="color:white;">Venha experimentar a Bellezza Italiana, um dos melhores restaurantes italianos de São Paulo</p>
         </div>
         <div id="registrar">
            <form action="php/incluir.act.php" method="post" onsubmit="return validarSenhas()">
               <div class="items">
               <table>
                    <tr>
                        <td colspan="2" style="border-bottom:2px groove white;"
                        ><h2>Cadastro</h2></td>
                    </tr>
                       <tr>
                           <td><labeL for="nome">Nome</labeL></td>
                           <td><input type="text" id="nome" name="nome" required="required"></td>
                       </tr>
                       <tr>
                           <td><labeL for="email">Email</labeL></td>
                           <td><input type="email" id="email" name="email" required="required"></td>
                       </tr>
                       <tr>
                           <td><labeL for="cpf">CPF</labeL></td>
                           <td><input type="text" maxlength="11" id="cpf" name="cpf" required="required"></td>
                       </tr>
                       <tr>
                           <td><labeL for="telefone">Telefone</labeL></td>
                           <td><input type="text" maxlength="11" id="telefone" name="telefone" required="required"></td>
                       </tr>
                       <tr>
                           <td><labeL for="telefone2">Telefone(2)</labeL></td>
                           <td><input type="text" maxlength="11" id="telefone2" name="telefone2"></td>
                       </tr>
                       <tr>
                           <td><labeL for="senha">Senha</labeL></td>
                           <td><input type="password" name="senha"  id="senha" required="required"></td>
                       </tr>
                       <tr>
                           <td><labeL for="senha2">Confirme Senha</labeL></td>
                           <td><input type="password" name="senha2" id="senha2" required="required"></td>
                       </tr>
                       <tr>
                           <td colspan="2">
                               <button type="submit" id="confirm">REGISTRAR</button>
                           </td>
                       </tr>
               </table>
               </div>
           </form>
         </div>

      <div id="reservar">
      <h1 style="color:white; font-size:27.5px;">VEJA NOSSO CARDÁPIO E AGENDE SUA MESA</h1>
      <img src="" alt="">
      <a href="cardapio.php"><button>CARDÁPIO</button></a>
      <a href="agendar.php"><button>AGENDAR</button></a>
      </div>

      </div>

      <div id="rodape">

      <H1 style="color:black;">LOCALIZAÇÃO</H1>
      <div id="mapa">
      <div id="endereco">
      <p>Av. de Berna 3, 1050-062 Lisboa, Portugal</p>
      <div id="botao"><a href="https://www.google.com/maps/dir//38.7410367,-9.1474807/@38.741037,-9.147481,16z?hl=pt-BR"><button type="submit" id="confirm">ROTAS</button></a></div>
      </div>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3111.9878575023963!2d-9.149669384387172!3d38.741040863749966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd19339e13a1ba03%3A0x6f4663fc6ffafec2!2sTagliatelle!5e0!3m2!1spt-BR!2sbr!4v1595032900258!5m2!1spt-BR!2sbr" width="500" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
      
      </div>
   </body>
</html>