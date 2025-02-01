<?php
$api_url = "http://localhost:8080/books";


$response = file_get_contents($api_url);

if ($response === FALSE) {
    die("Error connecting to API");
}

$books = json_decode($response, true);

if ($books === NULL) {
    die("Error decoding JSON response");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2 class="text-center">Book List</h2>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Genre</th>
        <th>Publisher</th>
        <th>Publisher date</th>
        <th>Active</th>
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
        echo "<tr><td colspan='7' class='text-center'>No books registered</td></tr>";
    }
    ?>
    </tbody>
</table>

<a href="list_authors.php" class="btn btn-primary">View Authors</a>
<br>
<br>
</body>

<form action="index.php" method="get">
    <button type="submit">Back</button>

</form>
</html>



