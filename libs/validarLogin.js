function validarLogin(erro){
    switch(erro){
        case "usuario_invalido":
            alert("Email e/ou senha inválidos");
            console.log(erro);
            break;
    }
}