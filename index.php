<?php

require_once __DIR__ . '/src/DNI.php'; // Importar la clase DNI

use App\DNI; // Usar el namespace de la clase DNI

// Inicializar variables
$dniConLetra = null;

// Comprobar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar entrada
    if (isset($_POST['dni']) && is_numeric($_POST['dni']) && strlen($_POST['dni']) == 8) {
        $numeroDNI = intval($_POST['dni']);
        $dni = new DNI($numeroDNI); // Instanciar la clase DNI
        $dniConLetra = $dni->getDNIConLetra();
    } else {
        $dniConLetra = "Por favor, introduce un número de DNI válido de 8 dígitos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular Letra del DNI</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f9;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"], button {
            padding: 10px;
            margin: 5px 0;
            font-size: 16px;
        }
        .result {
            margin-top: 10px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Calcular letra del DNI</h1>
    <form method="POST" action="">
        <label for="dni">Introduce tu DNI (sin letra):</label><br>
        <input type="text" id="dni" name="dni" maxlength="8" required><br>
        <button type="submit">Calcular</button>
    </form>

    <?php if ($dniConLetra !== null): ?>
        <div class="result">
            Resultado: <?= htmlspecialchars($dniConLetra); ?>
        </div>
    <?php endif; ?>
</body>
</html>