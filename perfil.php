<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['email'])) {
   header('location:home.php');
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>

    <link rel="shortcut icon" type="image/png" href="css/img/logo/logoRest.png">
      <link rel="stylesheet" href="css/header.css">
      <link rel="stylesheet" href="css/perfil.css">
      <link rel=stylesheet href="css/Rodape.css">

      <script type="text/javascript" src="libs/jquery.min.js"></script>

<script>

$(document).ready(function (){

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

});

//confirmar exclusão da reservar...
function confirmar(codigo){
		opcao = confirm("Deseja realmente cancelar esta reserva?");	
	if(opcao == true){
		$.ajax({
  				url: 'php/excluirReserva.php?codigo='+codigo,
  				success: function(data) {
                    alert(data);
                    location.reload();
  		        }
	    });
	}	
}

//retirar prato...
function retirarPrato(idPedido){
		opcao = confirm("Deseja realmente retirar este prato?");	
	if(opcao == true){
		$.ajax({
  				url: 'php/excluirPedido.php?idPedido='+idPedido,
  				success: function(data) {
                    alert(data);
                    location.reload();
  		        }
	    });
	}	
}
</script>
</head>
<body>

    <header id="header" style="display:flex;">
        <a href="#"><img src="css/img/logo/logoRest.png" alt="logo" height="80px"></a>

         <ul id="header-container" style="width:100%;">
            
            <li><a href="home.php"><h1>Home</h1></a></li>
            <li><a href="sobre.php"><h1>Sobre</h1></a></li>
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
               
            </div>
        </ul>
         
     </header>


     <div class="container">
         <div id="perfilUsuario">
             <div id="fotoPerfil">
               <img src="./css/img/usuarioIcon/user1.png" alt="userIcon">
             </div>
             <p id="emailUsuario"><?php echo $_SESSION['email']?></p>
             <p id="nomeUsuario"><?php echo $_SESSION['nomeUsuario']?></p>   
         </div>

         <div id="reserva-container">
            <div id="reservaUsuario">
               <?php include('php/listReservaFrontEnd.php') ?>
            </div>
            <div id="pratosEscolhidos">
               <h3>*Pratos Escolhidos*</h3>
               <?php include('php/listPratosFrontEnd.php') ?>
            </div>
         </div>
     </div>

     <?php require('Rodape.php');
     ?>
    
</body>
</html>