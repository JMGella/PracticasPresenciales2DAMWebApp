<?php
$url = "http://localhost:8080/authors";

// Iniciar cURL
$ch = curl_init($url);

// Configurar opciones
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Para obtener la respuesta como string
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json" // Especificar el tipo de contenido
]);

// Ejecutar la petición y obtener la respuesta
$response = curl_exec($ch);

// Verificar errores
if (curl_errno($ch)) {
    echo "Error en la petición: " . curl_error($ch);
}

// Cerrar conexión
curl_close($ch);

// Decodificar JSON
$data = json_decode($response, true);

// Mostrar la respuesta
echo "<pre>";
print_r($data);
echo "</pre>";
?>

