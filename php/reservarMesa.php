<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
</head>

<body>
    <form action="reservarMesa.act.php" method="post" >
        
        Mesa: <input type="text"  name="IdMesa"><br>
        Horário: <input type="time"  name="hora" min="09:00" max="18:00"><br>
        data: <input type="date" name="data"><br>
        
        <input type="submit" value="Enviar">
    </form>
</body>
</html>