<?php
$dsn = "odbc:BookHub";  // Nombre del DSN configurado en ODBC
$user = "sa";
$password = "password";

try {
    $conn = new PDO($dsn, $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conexión exitosa";  // Puedes activar esto para probar la conexión
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>

