<?php
    session_start();

    if(isset($_SESSION['email'])){
        echo "Logado";
    }else{
        echo "NaoLogado";
    }
?>