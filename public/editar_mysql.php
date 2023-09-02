<?php
include('../includes/db.php');
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Consulta SQL para obtener los datos del registro por ID
        $sql_select = "SELECT * FROM empleados WHERE dpi = ?";
        $stmt_select = $pdo_mysql->prepare($sql_select);
        $stmt_select->execute([$id]);
        $row = $stmt_select->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            // Mostrar formulario prellenado con los datos actuales (excepto DPI)
            ?>
            <h2>Editar Registro</h2>
            <form action="editar_mysql.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="text" name="primer_nombre" placeholder="Primer Nombre" value="<?php echo $row['primer_nombre']; ?>">
                <input type="text" name="segundo_nombre" placeholder="Segundo Nombre" value="<?php echo $row['segundo_nombre']; ?>">
                <input type="text" name="primer_apellido" placeholder="Primer Apellido" value="<?php echo $row['primer_apellido']; ?>">
                <input type="text" name="segundo_apellido" placeholder="Segundo Apellido" value="<?php echo $row['segundo_apellido']; ?>">
                <input type="text" name="direccion_domiciliar" placeholder="Direccion Domiciliar" value="<?php echo $row['direccion_domiciliar']; ?>">
                <input type="text" name="telefono_casa" placeholder="Telefono de Casa" value="<?php echo $row['telefono_casa']; ?>">
                <input type="text" name="telefono_movil" placeholder="Telefono Movil" value="<?php echo $row['telefono_movil']; ?>">
                <input type="text" name="salario_base" placeholder="Salario Base" value="<?php echo $row['salario_base']; ?>">
                <input type="text" name="bonificacion" placeholder="Bonificacion" value="<?php echo $row['bonificacion']; ?>">
                <!-- Otros campos prellenados -->
                <input type="submit" name="actualizar" value="Actualizar">
            </form>
            <?php
        } else {
            echo "No se encontró el registro especificado.";
        }
    }
    if (isset($_POST['actualizar'])) {
        $id = $_POST['id'];
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
    
        // Consulta SQL de actualización en PostgreSQL
        $sql_update = "UPDATE empleados SET primer_nombre = ?, segundo_nombre = ?, primer_apellido = ?, segundo_apellido = ?, direccion_domiciliar = ?, telefono_casa = ?, telefono_movil = ?, salario_base = ?, bonificacion = ? WHERE dpi = ?";
    
        // Preparar y ejecutar la consulta de actualización
        $stmt_update = $pdo_mysql->prepare($sql_update);
        $stmt_update->execute([$primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $direccionDomiciliar, $telefonoCasa, $telefonoMovil, $salarioBase, $bonificacion, $id]);
        
        // Redireccionar después de la actualización
        header("Location: crud_mysql.php");
        exit();
    }
    ?>