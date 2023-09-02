<!DOCTYPE html>
<html>
<head>
    <title> PostgreSQL</title>
</head>
<body>
    <h1>PostgreSQL</h1>
    
    <!-- Formulario de inserción -->
    <h2>Crear Registro</h2>
    <form action="crud_pg.php" method="post">
        <input type="text" name="dpi" placeholder="DPI">
        <input type="text" name="primer_nombre" placeholder="Primer Nombre">
        <input type="text" name="segundo_nombre" placeholder="Segundo Nombre">
        <input type="text" name="primer_apellido" placeholder="Primer Apellido">
        <input type="text" name="segundo_apellido" placeholder="Segundo Apellido">
        <input type="text" name="direccion_domiciliar" placeholder="Direccion Domiciliar">
        <input type="text" name="telefono_casa" placeholder="Telefono de Casa">
        <input type="text" name="telefono_movil" placeholder="Telefono Movil">
        <input type="text" name="salario_base" placeholder="Salario Base">
        <input type="text" name="bonificacion" placeholder="Bonificacion">
        <!-- Otros campos para inserción -->
        <input type="submit" name="crear" value="Crear">
    </form>

    <!-- Lista de registros -->
    <h2>Lista de Registros</h2>
    <table border="1">
        <thead>
            <tr>
                <th>DPI</th>
                <th>Primer Nombre</th>
                <th>Segundo Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Direccion Domiciliar</th>
                <th>Telefono Casa</th>
                <th>Telefono Movil</th>
                <th>Salario Base</th>
                <th>Bonificacion</th>
                <!-- Otros encabezados de columna -->
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Conexión a la base de datos PostgreSQL
            include('../includes/db.php'); // Ajusta la ruta según la ubicación real de db.php

            // Consulta SELECT para obtener registros de PostgreSQL
            $sql = "SELECT * FROM empleados";

            // Ejecutar la consulta y mostrar resultados en la tabla HTML
            foreach ($pdo_pg->query($sql) as $row) {
                echo "<tr>";
                echo "<td>{$row['dpi']}</td>";
                echo "<td>{$row['primer_nombre']}</td>";
                echo "<td>{$row['segundo_nombre']}</td>";
                echo "<td>{$row['primer_apellido']}</td>";
                echo "<td>{$row['segundo_apellido']}</td>";
                echo "<td>{$row['direccion_domiciliar']}</td>";
                echo "<td>{$row['telefono_casa']}</td>";
                echo "<td>{$row['telefono_movil']}</td>";
                echo "<td>{$row['salario_base']}</td>";
                echo "<td>{$row['bonificacion']}</td>";

                // Otros campos...
                echo "<td><a href='editar_pg.php?id={$row['dpi']}'>Editar</a> | <a href='borrar_pg.php?id={$row['dpi']}'>Borrar</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Script para procesar la inserción -->
    <?php
    if (isset($_POST['crear'])) {
        $dpi = $_POST['dpi'];
        $primerNombre = $_POST['primer_nombre'];
        $segundoNombre = $_POST['segundo_nombre'];
        $primerApellido = $_POST['primer_apellido'];
        $segundoApellido = $_POST['segundo_apellido'];
        $direccionDomiciliar = $_POST['direccion_domiciliar'];
        $telefonoCasa = $_POST['telefono_casa'];
        $telefonoMovil = $_POST['telefono_movil'];
        $salarioBase = $_POST['salario_base'];
        $bonificacion = $_POST['bonificacion'];

        // Otros campos...

        // Consulta SQL de inserción en PostgreSQL
        $sql_insert = "INSERT INTO empleados (dpi, primer_nombre,segundo_nombre,primer_apellido,segundo_apellido,direccion_domiciliar,telefono_casa,telefono_movil,salario_base,bonificacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Preparar y ejecutar la consulta
        $stmt_insert = $pdo_pg->prepare($sql_insert);
        $stmt_insert->execute([$dpi, $primerNombre,$segundoNombre,$primerApellido,$segundoApellido,$direccionDomiciliar,$telefonoCasa,$telefonoMovil,$salarioBase,$bonificacion]);
        
        // Redireccionar para evitar inserciones duplicadas en recarga de página
        header("Location: crud_pg.php");
        exit();
    }
    ?>
</body>
</html>
