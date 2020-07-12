<?php
require('connect.php'); //necessita da connect para executar o input
extract($_POST); //extrai os dados da super variável

$np = 0;//contador nao preenchidos
$p = 0;//contador preenchidos
foreach($_POST as $value){
    if($value == ""){
        $np++;
    }else{
        $p++;
    }
}
echo "<br>"."Dados não preenchidos ". $np. "<br>";
echo "Dados preenchidos ". $p;

//verifica se o número de campos está preenchido corretamente, caso seja menor que o TOTAL
//de campos preenchidos, ele verifica se é o campo opcional 'telefone2'
if(($p >= 6 and $_POST['telefone2'] == "") or $p == 7){
    //senha e confirmar senha são idênticas?
    if($senha === $senha2){
        $senha = md5($senha);
            if(mysqli_query($con,
                "INSERT INTO `tb_clientes`(`cod`, `nome`, `email`,`cpf`, `telefone`, `telefone2`, `senha`)
                 VALUES (NULL, '$nome', '$email','$cpf', '$telefone', '$telefone2', '$senha');")){
                    echo "<br>Cadastro Realizado!";
                    header("location:../home");
            }
    }else{
        echo "<br>Senhas não correspondem.";
        header("location:../home?$erro=senha");
    }
}else{
    echo "<br>Número de campos obrigatórios não preenchidos";
}