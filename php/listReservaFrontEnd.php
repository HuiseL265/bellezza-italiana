<?php
    echo "
    <style>
    *{
        font-family:verdana;
    }
    .table td a{
        padding-top:6px;
    }
    .btn-erase img{
        width:15px;
    }

    .table-res table{
        border-spacing:10px;
        border-collapse:separate;
        border:1px;
        border-style:solid;
        border-color:#808080;
        margin:auto;
        width:auto;
        background-color: rgb(51, 51, 51);
        box-shadow: 0px 0px 5px rgba(196, 196, 196, 1);
        border-radius: 10px;
        box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
        overflow:hidden;
    }

    .table-res table tr:first-child {
    box-shadow: 0px 15px 15px 0px rgba(0, 0, 0, 0.1);
    }

    .table-res th {
    font-size: 12px;
    color: rgb(194, 146, 128);
    line-height: 1.5;

    background-color: transparent;
    }

    .table-res td {
    font-size: 14px;
    color: #ffffff;
    line-height: 2.0;
    text-align:center;
    overflow:hidden;
    justify-self:center;
    align-self:center;
    }

    .table-res tr {
    border-bottom: 1px solid black;
    margin-bottom:20px;
    
    }
    </style>
    ";
    require('connect.php');
    //session_start();
    

    $id = $_SESSION['codCliente'];
    //echo $id;
    $reservas = mysqli_query($con, "SELECT * FROM `tb_reserva` WHERE `codCliente` = $id");

    if(mysqli_num_rows($reservas) === 0){
        echo "<h4 style=color:white;>Você não solicitou nenhuma reserva ainda</h4>";
    }else{
        //criação dos identificados das colunas
        echo   "<div class='table-res'>
                <table>
                <tr>
                    <th>ID Reserva</th>
                    <th>Mesa</th>
                    <th>Adquirinte da mesa</th>
                    <th>Hora</th>
                    <th>Data</th>
                    <th>Status</th>                
                </tr>";
        
        //realiza a inserção de dados enquanto houver registros.
        while($reserva = mysqli_fetch_array($reservas)){
            echo "<tr>";
                echo "<td> $reserva[idReserva] </td>";                
                echo "<td> $reserva[IdMesa] </td>";
                echo "<td> $reserva[nomeCliente] </td>";
                echo "<td> $reserva[hora] </td>";
                echo "<td> $reserva[data] </td>";
                echo "<td> $reserva[status] </td>";    
                echo "<td>
                     <a class=btn-erase href=javascript:confirmar($reserva[idReserva])>
                         <img src=css/img/backend_img/erase.png>
                     </a>
                  </td>";
                echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    }
    

    ?>