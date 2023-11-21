<?php



require __DIR__ . '/../../vendor/autoload.php';
$config = require __DIR__ . '/../../config.php';


use Cloudinary\Cloudinary;

$cloudinary = new Cloudinary([
    'cloud' => [
        'cloud_name' => $config['CLOUDINARY_CLOUD_NAME'],
        'api_key' => $config['CLOUDINARY_API_KEY'],
        'api_secret' => $config['CLOUDINARY_API_SECRET']
    ]
]);


$conn = new mysqli('localhost', 'root', '', 'miTienda');

// consulta
$resultado = $conn->query("SELECT * FROM productos");

if ($resultado->num_rows > 0) {
    echo "<div class='container mt-3' style='background-color: #f5f5f5;'>"; // Fondo gris claro para el contenedor
    echo "<div class='row'>";

    $contador = 0; // Contador para tarjetas por fila

    while ($producto = $resultado->fetch_assoc()) {
        // Inicia una nueva fila después de cada cuatro tarjetas
        if ($contador > 0 && $contador % 4 == 0) {
            echo "</div><div class='row'>"; // Cierra la fila anterior y comienza una nueva
        }

        // Tarjeta individual
        echo "<div class='col-md-3 mb-4'>"; // Utiliza col-md-3 para tener 4 tarjetas por fila
        echo "<div class='card h-100'>"; // Fondo gris claro para la tarjeta
        echo "<img class='card-img-top' src='" . $producto['imagen'] . "' alt='Imagen del producto'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . $producto['nombre'] . "</h5>";
        echo "<p class='card-text'>" . $producto['descripcion'] . "</p>";
        echo "<p class='card-text'>Precio: $" . $producto['precio'] . "</p>";
        echo "<p class='card-text'>Stock: " . $producto['stock'] . "</p>";
        echo "</div>"; // Cierra card-body
        echo "</div>"; // Cierra card
        echo "</div>"; // Cierra col-md-3

        $contador++;
    }

    echo "</div>"; // Cierra la última fila
    echo "</div>"; // Cierra el contenedor
} else {
    echo "No hay productos disponibles.";
}


$conn->close();
?>
