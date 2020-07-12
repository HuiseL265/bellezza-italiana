<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Registro</title>

<?php
require('connect.php');
$cod = $_GET['cod'];
$usuariosAlt = mysqli_query($con, "SELECT * FROM `tb_clientes` WHERE `cod` = '$cod'");
$clienteAlt = mysqli_fetch_array($usuariosAlt);
?>

<style>
*{
    font-family:verdana;
}
.items{
    margin:auto;
    width:320px;
    min-height:340px;
    border-radius:10px;
    box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
}
    .items table{
        margin:auto;
    }

tr td:first-child{
    font-size:14px;
    text-align:right;
    font-weight: bold;
}

input{
    border-color:#808080;
    border-radius:5px;
    height:20px;
    line-height:1.5;
    text-align:center;
}

a{
    float:left;
    color: #808080;
    font-weight: bold;
    text-decoration:none;
    margin:auto;

}
    a:hover{
        text-decoration: underline;
    }

#confirm{
    color:white;
    background: rgb(6, 141, 58);

    width:120px;
    height:30px;

    border-radius:6px;

    font-size:14px;
    font-weight: bold;
    
    display:flex;   
    align-items: center;
    justify-content: center;

    box-shadow:0px 8px 16px rgba(6, 141, 58, 0.16);

    margin:auto;
}

    #confirm:hover{
        background-color: #22d15d;
        text-decoration:none;
        cursor: pointer;
    }
    
</style>
</head>
<body>
<form action="alterar.act.php" method="post">
    <div class="items">
    <table>
        <tr>
            <th></th>
            <th></th>
        </tr>
            <tr>
                <td>Código</td>
                <td style="text-align: center;">
                    <input type="text" name="cod" value="<?php echo $clienteAlt['codRes']?>" hidden="hidden" >
                    <?php echo $clienteAlt['codRes']?>
                </td>
            </tr>
            <tr>
                <td>Nome</td>
                <td><input type="text" name="nome" value="<?php echo $clienteAlt['nome']?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $clienteAlt['email']?>"></td>
            </tr>
            <tr>
                <td>CPF</td>
                <td><input type="text" maxlength="9" name="cpfResponsavel" value="<?php echo $clienteAlt['cpfResponsavel']?>"></td>
            </tr>
            <tr>
                <td>Telefone</td>
                <td><input type="text" maxlength="11" name="telefone" value="<?php echo $clienteAlt['telefone']?>"></td>
            </tr>
            <tr>
                <td>Telefone(2)</td>
                <td><input type="text" maxlength="11" name="telefone2" value="<?php echo $clienteAlt['telefone2']?>"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" id="confirm">Confirmar</button>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <a id="back" href="listarRestaurantes.php"><p>Voltar</p></a>
                </td>
            </tr>
    </table>
    </div>
</form>
</body>
</html>