<?php
$api_url = "http://localhost:8080/authors";

// Realizar la solicitud GET a la API
$response = file_get_contents($api_url);

if ($response === FALSE) {
    die("Error al conectar con la API");
}

$authors = json_decode($response, true);

if ($authors === NULL) {
    die("Error al decodificar la respuesta JSON");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Autores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2 class="text-center">Lista de Autores</h2>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Fecha de Nacimiento</th>
        <th>Activo</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (!empty($authors)) {
        foreach ($authors as $author) {
            echo "<tr>
                    <td>{$author['id']}</td>
                    <td>{$author['name']}</td>
                    <td>{$author['surname']}</td>
                    <td>" . date("d/m/Y", strtotime($author['birthdate'])) . "</td>
                    <td>" . ($author['active'] ? 'Sí' : 'No') . "</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='6' class='text-center'>No hay autores registrados</td></tr>";
    }
    ?>
    </tbody>
</table>

<a href="list_books.php" class="btn btn-primary">Ver Libros</a>

</body>
</html>
