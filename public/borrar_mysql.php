<?php
 include('../includes/db.php');
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Consulta SQL de borrado en PostgreSQL
        $sql_delete = "DELETE FROM empleados WHERE dpi = ?";

        // Preparar y ejecutar la consulta de borrado
        $stmt_delete = $pdo_mysql->prepare($sql_delete);
        $stmt_delete->execute([$id]);

        // Redireccionar después del borrado
        header("Location: crud_mysql.php");
        exit();
    }
    ?>
