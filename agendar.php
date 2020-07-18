<!DOCTYPE html>
<?php
session_start();
?>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8">
      <meta content="width=device-width, initial-scale=1.0" >
      <title>Agende seu Horário</title>
      <link rel="shortcut icon" type="image/png" href="css/img/logo/logoRest.png">
      <link rel="stylesheet" href="css/agendar.css">
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
               }
               if(data == "NaoLogado"){
                  $('#usuario').hide();
                  $('#form-login').show();
               }
            }
            });

            function escolherMesa(numMesa){
               $.ajax({
                  url: 'php/verificarMesa.php',
               success: function(data) {
                  alert(data);
               }
               });
               
               $("#mesaSelecionada").html(numMesa);
            }

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
             <div class="login">

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
                <form id="form-login" method="post" action="php/logar.act.php">
                  <input type="email" name="email" placeholder="Login">
                  <input type="password" name="senha" placeholder="Senha">
                  <input type="submit" value="LOGAR">
                </form>

             </div>
          </ul>
      </header>

      <div id="container-menu">
         <form action="" method="post">

            <table> <!-- Tabela das mesas -->
               <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
               </tr>
               <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td class="cadeira"></td>
                  <td class="cadeira"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
               </tr>
               <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td class="mesaDisponivel" colspan="2">
                     <a href="javascript:escolherMesa(1)" class="btn-mesa">Mesa 1</a>
                  </td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
               </tr>
               <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td class="cadeira"></td>
                  <td class="cadeira"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
               </tr>
               <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
               </tr>
               <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
               </tr>
               <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
               </tr>
               <tr> <!-- Mesa 2 e 3 estão nesta linha -->
                  <td></td>
                  <td class="cadeira"></td>
                  <td class="mesaDisponivel">
                     <a class="btn-mesa" onclick="escolherMesa(2)">Mesa 2</a>
                  </td>
                  <td class="cadeira"></td>
                  <td></td>
                  <td></td>
                  <td class="cadeira"></td>
                  <td class="mesaDisponivel">
                     <a class="btn-mesa" onclick="escolherMesa(3)">Mesa 3</a>
                  </td>
                  <td class="cadeira"></td>
                  <td></td>
               </tr>
               <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
               </tr>
               <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
               </tr>
            </table>
   
            <div class="legendaMenu">

               <div id="legendaTitle">Legendas</div>
               <div>
                  <div id="square" class="mesaDisponivel"></div>
                  <p>Disponivel</p>
               </div>
               <div>
                  <div id="square" class="mesaOcupada"></div>
                  <p>Ocupado</p>
               </div>
               <div id="Data">

               </div>
               <div id="Hora">
                  <select name="selectHora" id="selectHora">
                     <option value="none"></option>
                     <option value="09:00">09:00</option>
                     <option value="volvo">Volvo</option>
                     <option value="volvo">Volvo</option>
                  </select>
               </div>
               <div id="mesaSelecionada-panel">
                  <h3>Mesa Selecionada</h3>
                  <p id="mesaSelecionada">None</p>
               </div>
               <div></div>
            </div>

         </form>
      </div>

   </body>
</html>