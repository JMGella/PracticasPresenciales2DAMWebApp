<?php
$api_url = "http://localhost:8080/books";

// Realizar la solicitud GET a la API
$response = file_get_contents($api_url);

if ($response === FALSE) {
    die("Error al conectar con la API");
}

$books = json_decode($response, true);

if ($books === NULL) {
    die("Error al decodificar la respuesta JSON");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2 class="text-center">Lista de Libros</h2>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Género</th>
        <th>Editorial</th>
        <th>Fecha de Publicación</th>
        <th>Activo</th>
    </tr>
    </thead>
    <tbody>
    <?php

    if (!empty($books)) {
        foreach ($books as $book) {
            echo "<tr>
                            <td>{$book['id']}</td>
                            <td>{$book['title']}</td>
                            <td>{$book['genre']}</td>
                            <td>{$book['publisher']}</td>
                            <td>" . date("d/m/Y", strtotime($book['publicationDate'])) . "</td>
                            <td>" . ($book['active'] ? 'Sí' : 'No') . "</td>
                          </tr>";
        }
    } else {
        echo "<tr><td colspan='7' class='text-center'>No hay libros registrados</td></tr>";
    }
    ?>
    </tbody>
</table>

<a href="list_authors.php" class="btn btn-primary">Ver Autores</a>

</body>
</html>

<?php

?>

