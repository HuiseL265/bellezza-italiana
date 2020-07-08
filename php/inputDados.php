<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
</head>

<body>
    <form action="incluir.act.php" method="post" >
        Nome: <input type="text"  name="nome"><br>
        Email: <input type="text" name="email"><br>
        <br>
        CEP: <input type="text" maxlength="8" name="cep"><br>
        Rua: <input type="text" name="rua"> 
        Nº: <input type="text" maxlength="10" name="num"><br>
        <br>
        CNPJ: <input type="text" maxlength="14" name="cnpj"><br>
        CPF(responsável): <input type="text" maxlength="11" name="cpf"><br>
        <br>
        Telefone: <input type="num" maxlength="11" name="telefone"><br>
        Telefone2: <input type="num" maxlength="11" name="telefone2"><br>
        <br>
        Senha: <input type="password" name="senha"><br>
        Confirme sua senha: <input type="password" name="senha2"><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>

<?php

/*
NOME
EMAIL

CEP | RUA | Nº

CNPJ | CPF

TELEFONE
TELEFONE2 (OPCIONAL)

*/

?>