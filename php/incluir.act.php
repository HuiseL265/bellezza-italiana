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
if(($p >= 10 and $_POST['telefone2'] == "") or $p == 11){
    //senha e confirmar senha são idênticas?
    if($senha === $senha2){
        $senha = md5($senha);
            if(mysqli_query($con,
                "INSERT INTO `tb_restaurante`(`codRes`, `nome`, `email`, `cep`, `rua`, `num`, `cpfResponsavel`, `cnpj`, `telefone`, `telefone2`, `senha`)
                 VALUES (NULL, '$nome', '$email', '$cep', '$rua', '$num', '$cpf', '$cnpj', '$telefone', '$telefone2', '$senha');")){
                    echo "<br>Cadastro Realizado!";
                    header("location:../home");
            }
    }else{
        echo "<br>Senhas não correspondem.";
    }
}else{
    echo "<br>Número de campos obrigatórios não preenchidos";
}