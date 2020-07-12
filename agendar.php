<!DOCTYPE html>
<?php
session_start();
?>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8">
      <meta content="width=device-width, initial-scale=1.0" >
      <title>SOS Alimentos(Brasil)</title>
      <link rel="shortcut icon" type="image/png" href="css/img/logo/logo.ico">
      <link rel="stylesheet" href="css/agendar.css">
   </head>
   <body>
      <header id="header">
         <a href="#"><img src="css/img/logo/logo2.svg" alt="logo" height="80px"></a>

          <ul id="header-container">
             <li><a href="home.php"><h1>Home</h1></a></li>
             <li><a href=""><h1>Sobre</h1></a></li>
             <li><a href="#"><h1>Agende seu horário</h1></a></li>
             <form id="form-login" method="post" action="php/logar.act.php">
               <input type="email" name="email" placeholder="Login">
               <input type="password" name="senha" placeholder="Senha">
               <input type="submit" value="LOGAR">
             </form>
          </ul>
      </header>
   </body>
</html>