<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookhub";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT books.id, books.title, books.genre, books.publisher, books.publicationDate, books.active, 
               authors.name AS author_name, authors.surname AS author_surname 
        FROM books
        INNER JOIN authors ON books.author_id = authors.id";
$result = $conn->query($sql);
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
        <th>Autor</th>
        <th>Activo</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['title']}</td>
                            <td>{$row['genre']}</td>
                            <td>{$row['publisher']}</td>
                            <td>" . date("d/m/Y", strtotime($row['publicationDate'])) . "</td>
                            <td>{$row['author_name']} {$row['author_surname']}</td>
                            <td>" . ($row['active'] ? 'Sí' : 'No') . "</td>
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
$conn->close();
?>

