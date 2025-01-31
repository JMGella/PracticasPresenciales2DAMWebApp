<?php
require_once "includes/db.php"; // Conexión a la base de datos
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5 text-center">

<h1>📚 Bienvenido a BookHub</h1>
<p>Gestión de libros y autores</p>

<div class="d-flex justify-content-center gap-3 mt-4">
    <a href="views/list_books.php" class="btn btn-primary">📖 Ver Libros</a>
    <a href="views/list_authors.php" class="btn btn-secondary">👤 Ver Autores</a>
</div>

</body>
</html>

