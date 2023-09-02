<?php
// Datos de conexión a PostgreSQL
$host_pg = "localhost";
$port_pg = "5433"; // Puerto personalizado
$dbname_pg = "persona";
$username_pg = "postgres";
$password_pg = "mySql123";

// Datos de conexión a MySQL
$host_mysql = "localhost";
$dbname_mysql = "persona";
$username_mysql = "root";
$password_mysql = "mySql123";

try {
    // Conexión a PostgreSQL
    $pdo_pg = new PDO("pgsql:host=$host_pg;port=$port_pg;dbname=$dbname_pg", $username_pg, $password_pg);


    // Conexión a MySQL
    $pdo_mysql = new PDO("mysql:host=$host_mysql;dbname=$dbname_mysql", $username_mysql, $password_mysql);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
