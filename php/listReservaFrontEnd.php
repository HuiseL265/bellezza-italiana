<?php
    require('connect.php');
    session_start();

    $id = $_SESSION['codCliente'];
    //echo $id;
    $reservas = mysqli_query($con, "SELECT * FROM `tb_reserva` WHERE `codCliente` = $id ");
    
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
                    <a href=alterar.php?cod=$reserva[codCliente]>
                        <img src=../css/img/backend_img/edit.png>
                    </a>
                 </td>";
            echo "<td>
                 <a href=javascript:confirmar($reserva[codCliente])>
                     <img src=../css/img/backend_img/erase.png>
                 </a>
              </td>";
            echo "</tr>";
    }
    echo "</table>";
    echo "</div>";

    ?>