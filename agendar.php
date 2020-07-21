<!DOCTYPE html>
<?php
session_start();
require('php/calendarphp/getvar.php');
?>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8">
      <meta content="width=device-width, initial-scale=1.0" >
      <title>Agende seu Horário</title>
      <link rel="shortcut icon" type="image/png" href="css/img/logo/logoRest.png">
      <link rel="stylesheet" href="css/agendar.css">
      <link rel="stylesheet" href="css/header.css">

      <link rel="stylesheet" type="text/css" href="css/calendar.css">
      <script type="text/javascript" src="libs/jquery.min.js"></script>
      <script type="text/javascript" src="libs/agendar.js"></script>

      <script src="libs/jquery-3.4.1.js"></script>
      <script>

         $(document).ready(function() {
            $('#confirmarReserva-panel button').hide();
            $('#mesaSelecionada-panel h3').hide();
            $('#mesaSelecionada-panel p').hide();
            $('#Hora p, #selectHora').hide();
         });

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
               if(hora != "none"){
                  $("#mesaSelecionada").html(numMesa);
                  $('#confirmarReserva-panel button').fadeIn('300');
               }               
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
                </ul>
             </div>
          
      </header>

      <div id="container-menu">
         <form action="" method="post">

            <table class="table-mesas"> <!-- Tabela das mesas -->
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
                     <a href="javascript:escolherMesa(1)" class="btn-mesa" id="Mesa1">Mesa 1</a>
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
                     <a class="btn-mesa" onclick="escolherMesa(2)" id="Mesa2">Mesa 2</a>
                  </td>
                  <td class="cadeira"></td>
                  <td></td>
                  <td></td>
                  <td class="cadeira"></td>
                  <td class="mesaDisponivel">
                     <a class="btn-mesa" onclick="escolherMesa(3)" id="Mesa3">Mesa 3</a>
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

               <!--<div id="legendaTitle">Legendas</div>-->
               <div>
                  <div id="square" class="mesaDisponivel"></div>
                  <p>Disponivel</p>
               </div>
               <div>
                  <div id="square" style="background-color:#bb5a5a"></div>
                  <p>Ocupado</p>
               </div>
               <div id="Data">

                  <table style="border:2px solid transparent;" class="cal"> <!--calendario bugado -->
                     <tr style="background-color:#464343;">

                     <td><a class="back"><</a></td>
                     <td colspan="5" style="text-align:center;color:white;">
                     <?php echo "<span class=MYdiv id=".$month."/".$Year."/".$numDays.">".$day." / ".$monthName." / ".$Year."</span>"; 
                        echo "<div class='daysel' style='display:none;' id=".$day."></div>";
                     ?>
                     </td>
                     <td><a class="next">></a></td>

                     </tr>
                     <?php 
                     echo "<div class='viewtype' id=".$viewtype." style='display:none;'></div>";

                     if ($viewtype=="month") {
                     require 'php/calendarphp/month.php'; 
                     }
                     if ($viewtype=="day") {
                     require 'php/calendarphp/day.php'; 
                     }

                     ?>
                  </table>
               </div>

               <div id="Hora"> <!-- Hora -->
                  <p>Horários disponíveis</p>
                  <select name="selectHora" id="selectHora">
                     <option value="none"></option>                                    
                  </select>
               </div>
               <div id="mesaSelecionada-panel"> <!-- Mesa Selecionada PANEL -->
                  <h3>Mesa selecionada</h3>
                  <p id="mesaSelecionada">Nenhuma mesa selecionada</p>
               </div>
               <div id="confirmarReserva-panel"> <!-- Confirmação da Reserva -->
                  <button type="submit">Confirmar Reserva</button>
               </div>
            </div>

         </form>
      </div>

   </body>
</html>