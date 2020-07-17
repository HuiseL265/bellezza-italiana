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
      <link rel="stylesheet" href="css/home.css">

      <script src="libs/jquery-3.4.1.js"></script>
      <script src="libs/verificarCadastro.js"></script>
   </head>
   <body>
      <header id="header">
         <a href="#"><img src="css/img/logo/logo2.svg" alt="logo" height="80px"></a>

          <ul id="header-container">
             <li><a href="home.php"><h1>Home</h1></a></li>
             <li><a href=""><h1>Sobre</h1></a></li>
             <li><a href="cardapio.php"><h1>Cardápio</h1></a></li>
             <li><a href="agendar.html"><h1>Agende seu horário</h1></a></li>
             
             <form id="form-login" method="post" action="php/logar.act.php">
               <input type="email" name="email" placeholder="Login" required="required">
               <input type="password" name="senha" placeholder="Senha" required="required">
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
            <img src="css/img/the-rock-alimenta-namorada 1.svg" alt="SOS alimentos" height="400px">
            <p>TEXTO GENERICO SOBRE SITE DE DOAÇÃO DE ALIMENTOS KKKJ</p>
         </div>
         <div id="registrar">
            <form action="php/incluir.act.php" method="post" onsubmit="return validarSenhas()">
               <div class="items">
               <table>
                    <tr>
                        <td colspan="2"><h2>Cadastro</h2></td>
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
      </div>
   </body>
</html>