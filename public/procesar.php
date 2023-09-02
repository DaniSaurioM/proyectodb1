<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["db"])) {
    $selectedDB = $_POST["db"];

    if ($selectedDB == "postgres") {
        // Redireccionar a la página CRUD para PostgreSQL
        header("Location: crud_pg.php");
        exit();
    } elseif ($selectedDB == "mysql") {
        // Redireccionar a la página CRUD para MySQL
        header("Location: crud_mysql.php");
        exit();
    } else {
        echo "Selecciona una base de datos válida.";
    }
} else {
    echo "Debes seleccionar una base de datos.";
}
?>
