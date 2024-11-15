<?php
$host = 'localhost'; 
$user = 'root';      
$password = 'Contraseña-Segura1234';      
$basedatos = 'rober'; 

$conexion = mysqli_connect($host, $user, $password, $basedatos);

if (!$conexion) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}

$dni = $_POST['dni'];

if ($dni) {

    $consulta = "DELETE FROM clientes WHERE dni = '$dni'";

    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_affected_rows($conexion) > 0) {
        echo "<p>Cliente con DNI $dni eliminado correctamente.</p>";
        header("Location: menu.html");
    } else {
        echo "<p>No se encontró un cliente con el DNI proporcionado.</p>";
    }


}


mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Cliente</title>
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
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Borrar Cliente</h1>
    <form action="borrar_cliente.php" method="POST">
        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni">

        <button type="submit">Borrar Cliente</button>
    </form>
</body>
</html>