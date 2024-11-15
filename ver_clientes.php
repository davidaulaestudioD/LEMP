<?php
$host = 'localhost'; 
$user = 'root';      
$password = 'Contraseña-Segura1234';      
$basedatos = 'rober'; 

$conexion = mysqli_connect($host, $user, $password, $basedatos);

if (!$conexion) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}

$consulta = "SELECT * FROM clientes";

$resultado_consulta = mysqli_query($conexion, $consulta);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
            padding: 15px;
            text-align: center;
        }
        .card img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .card .info {
            margin-top: 10px;
            text-align: left;
        }
        .card .info p {
            margin: 5px 0;
            font-size: 14px;
        }
        .card .info p span {
            font-weight: bold;
        }
        .no-clientes {
            text-align: center;
            font-size: 18px;
            color: #555;
        }
    </style>
</head>
<body>
    <h1>Lista de Clientes</h1>
    <div class="card-container">
        <?php if (mysqli_num_rows($resultado_consulta) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($resultado_consulta)): ?>
                <div class="card">
                    <?php if (!empty($row['foto'])): ?>
                        <img src="<?php echo htmlspecialchars($row['foto']); ?>" alt="Foto de <?php echo htmlspecialchars($row['nombre']); ?>">
                    <?php else: ?>
                        <img src="placeholder.jpg" alt="Sin foto">
                    <?php endif; ?>
                    <div class="info">
                        <p><span>DNI:</span> <?php echo htmlspecialchars($row['dni']); ?></p>
                        <p><span>Nombre:</span> <?php echo htmlspecialchars($row['nombre']); ?></p>
                        <p><span>Apellido 1:</span> <?php echo htmlspecialchars($row['apellido1']); ?></p>
                        <p><span>Apellido 2:</span> <?php echo htmlspecialchars($row['apellido2']); ?></p>
                        <p><span>Teléfono:</span> <?php echo htmlspecialchars($row['telefono']); ?></p>
                        <p><span>Dirección:</span> <?php echo htmlspecialchars($row['direccion']); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="no-clientes">No hay clientes registrados.</p>
        <?php endif; ?>
    </div>

    <?php
    // Cerrar la conexión
    mysqli_close($conexion);
    ?>
</body>
</html>
