<?php
    echo "
    <style>
    .btn-erase_prato img{
        width:20px;
    }
    .table-pratos{
        display:flex;
        justify-content:stretch;
        width:90%;
        height:70%;
        overflow:scroll;
        border:transparent;
    }

    .table-pratos table{
        /*border-color:#808080;*/
        width:120px;
        height:160px;
        margin-right:40px;
        border-radius: 5px;
        box-shadow: 0px 0px 10px 0px rgb(27, 27, 27);
        border-color:transparent;
    }

    .table-pratos table tr:first-child {
    box-shadow: 0px 15px 15px 0px rgba(0, 0, 0, 0.1);
    }

    .table-pratos th {
    font-size: 14px;
    color: white;
    text-shadow:0px 0px 1px white;
    line-height:20px;

    background-color: transparent;
    }

    .table-pratos td {
    width:150px;
    font-family:verdana;
    font-size: 14px;
    color: #ffffff;
    line-height: 2.0;
    text-align:center;
    overflow:hidden;
    justify-self:center;
    align-self:center;
    }

    .table-pratos tr {
    margin-bottom:20px;    
    }
    .table-pratos tr:first-child {
        height:45px;          
    }
        .table-pratos table tr:nth-child(2){
            border-bottom:1px solid white;
        }

        .imgPrato{
            width:100%;
            height:70px;
        }
    </style>
    ";
    require('connect.php');
    //session_start();
    

    $id = $_SESSION['codCliente'];
    //echo $id;
    $reservas = mysqli_query($con, "SELECT * FROM `tb_reserva` WHERE `codCliente` = $id AND `status` = 'Pendente'");

    if(mysqli_num_rows($reservas) === 0){
        echo "<h4 style=color:white;text-align:center;>Nenhum prato escolhido para esta reserva.</h4>";
    }else{

        //criação dos identificados das colunas
        
                
        echo   "<div class='table-pratos'>";
        //realiza a inserção de dados enquanto houver registros.
            $reserva = mysqli_fetch_array($reservas);
            $idReserva = $reserva['idReserva'];
            $pratos = mysqli_query($con, "SELECT * FROM `tb_pratos` INNER JOIN `tb_pratopedido` ON `tb_pratos`.`idComida` = `tb_pratopedido`.`idComida` WHERE `tb_pratopedido`.`idReserva` = $idReserva");
            while($pratoEscolhido = mysqli_fetch_array($pratos)){
                echo "<table>";
                echo "<tr>                
                        <th>
                            <h4>
                            <i>$pratoEscolhido[comida]</i>
                            </h4>
                        </th>             
                    </tr>";
                echo "<tr>";
                echo "<td><img class=imgPrato src='css/img/cardapio/pratos/$pratoEscolhido[comida].jpg' alt=''></td>";
                echo "</tr>";
                /*
                echo "<tr>";
                echo "<td><p>Descrição comida</p></td>";
                echo "</tr>";
                */
                echo "<tr>
                      <td>
                         <a class=btn-erase_prato href=javascript:retirarPrato($pratoEscolhido[idPedido])>
                             <img src=css/img/backend_img/erase-gray.png>
                         </a>
                      </td>";
                echo "</tr>";
                    
            }

        }
        echo "</table>";
        echo "</div>";

    ?>