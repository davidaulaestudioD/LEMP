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
$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$foto = $_POST['foto'];

if ($nombre) {
    $consulta = "UPDATE clientes SET nombre = '$nombre' WHERE dni = '$dni'";
    mysqli_query($conexion, $consulta);
}

if ($apellido1) {
    $consulta = "UPDATE clientes SET apellido1 = '$apellido1' WHERE dni = '$dni'";
    mysqli_query($conexion, $consulta);
}

if ($apellido2) {
    $consulta = "UPDATE clientes SET apellido2 = '$apellido2' WHERE dni = '$dni'";
    mysqli_query($conexion, $consulta);
}

if ($telefono) {
    $consulta = "UPDATE clientes SET telefono = '$telefono' WHERE dni = '$dni'";
    mysqli_query($conexion, $consulta);
}

if ($direccion) {
    $consulta = "UPDATE clientes SET direccion = '$direccion' WHERE dni = '$dni'";
    mysqli_query($conexion, $consulta);
}

if ($foto) {
    $consulta = "UPDATE clientes SET foto = '$foto' WHERE dni = '$dni'";
    mysqli_query($conexion, $consulta);
}

if (mysqli_affected_rows($conexion) > 0) {
    echo "<p>Los datos del cliente con DNI $dni fueron actualizados correctamente.</p>";
    header("Location: menu.html");
} else {
    echo "<p>No fue posible hacer los cambios</p>";
}


mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar cliente</title>
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
        input[type="text"], input[type="file"], input[type="tel"] {
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
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Añade los campos a modificar</h1>
    <form action="modificar_cliente.php" method="POST">
        <label for="dni">DNI del cliente que se quiere modificar:</label>
        <input type="text" id="dni" name="dni">

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">

        <label for="apellido1">Primer Apellido:</label>
        <input type="text" id="apellido1" name="apellido1">

        <label for="apellido2">Segundo Apellido:</label>
        <input type="text" id="apellido2" name="apellido2">

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono">

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion">

        <label for="foto">Foto:</label>
        <input type="text" id="foto" name="foto">

        <button type="submit">Modificar Campos</button>
    </form>
</body>
</html>