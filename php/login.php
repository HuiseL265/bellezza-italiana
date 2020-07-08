<!DOCTYPE html>
<?php
session_start();
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="logar.act.php" method="post" >
        Email: <input type="email" name="email"><br>
        Senha: <input type="password" name="senha"><br>

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

        <input type="submit" value="Entrar">
    </form>
</body>
</html>