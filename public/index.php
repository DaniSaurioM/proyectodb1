<!DOCTYPE html>
<html>
<head>
    <title>Selección de Base de Datos</title>
</head>
<body>
    <h1>Selecciona la Base de Datos</h1>
    <form action="procesar.php" method="post">
        <input type="radio" name="db" value="postgres"> PostgreSQL
        <input type="radio" name="db" value="mysql"> MySQL
        <input type="submit" value="Seleccionar">
    </form>
</body>
</html>
