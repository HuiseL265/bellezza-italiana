<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários</title>
</head>
<style>
    *{
        font-family:verdana;
    }
    td a{
        padding-top:6px;
    }
    img{
        width:15px;
    }

    .table-res table{
        border-spacing:5px;
        border-collapse:separate;
        margin:auto;
        width:auto;
        background-color: white;
        box-shadow: 0px 0px 5px rgba(196, 196, 196, 1);
        border-radius: 10px;
        box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
        overflow:hidden;
    }

    .table-res table tr:first-child {
    box-shadow: 0px 15px 15px 0px rgba(0, 0, 0, 0.1);
    }

    .table-res th {
    font-size: 16px;
    color: rgb(6, 141, 58);
    line-height: 1.5;

    background-color: transparent;
    }

    .table-res td {
    font-size: 14px;
    color: #808080;
    line-height: 2.0;
    text-align:center;
    overflow:hidden;
    }

    .table-res tr {
    border-bottom: 1px solid black;
    margin-bottom:20px;
    }

</style>
<body>
    <?php
    require('connect.php');
    
    $clientes = mysqli_query($con, "SELECT * FROM `tb_clientes`");
    
    //criação dos identificados das colunas
    echo   "<div class='table-res'>
            <table>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Telefone(2)</th>                
            </tr>";
    
    //realiza a inserção de dados enquanto houver registros.
    while($cliente = mysqli_fetch_array($clientes)){
        echo "<tr>";
            echo "<td> $cliente[cod] </td>";                
            echo "<td> $cliente[nome] </td>";
            echo "<td> $cliente[email] </td>";
            echo "<td> $cliente[cpf] </td>";
            echo "<td> $cliente[telefone] </td>";
            echo "<td> $cliente[telefone2] </td>";    
            echo "<td>
                    <a href=alterar.php?cod=$cliente[cod]>
                        <img src=img/edit.png>
                    </a>
                 </td>";
            echo "</tr>";
    }
    echo "</table>";
    echo "</div>";

    /*possível confirmação para saber se os dados foram alterados...
    if(isset($att)){
        $att = $_GET['att']; 
        if($att == true){           
        }
    };*/
    ?>
</body>
</html>