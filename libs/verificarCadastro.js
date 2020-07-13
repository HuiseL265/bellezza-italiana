
function validarSenhas(){
    let senha = document.getElementById("senha").value;
    let ConfirmarSenha = document.getElementById("senha2").value;

    //caso haja quantidade de caracteres insuficientes return FALSE
    if(senha == "" || senha.length <= 5){
        alert("Mínimo de 5 (cinco) caracteres no campo senha");
        document.getElementById("senha").focus();
        return false;
    }

    if(ConfirmarSenha == "" || ConfirmarSenha.length <= 5){
        alert("Mínimo de 5 (cinco) caracteres no campo Confirmar Senha");
        document.getElementById("senha2").focus();
        return false;
    }

    //ver se senhas são iguais
    if(senha === ConfirmarSenha) return true;
    else{ 
        alert("Senhas não correspondem");
        return false;
    }

}