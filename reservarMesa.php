<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
</head>

<!-- Página feita apenas para testes de input de 
registro enquanto a aba de agendar não é concluída. -->

<body>
    <form action="php/reservarMesa.act.php" method="post" >
        
        Mesa: <input type="text"  name="IdMesa" required="required"><br>
        Horário: <input type="time"  name="hora" min="08:00" max="17:00" required="required"><br>
        data: <input type="date" name="data" required="required"><br>
        
        <input type="submit" value="Enviar">
    </form>
</body>
</html>