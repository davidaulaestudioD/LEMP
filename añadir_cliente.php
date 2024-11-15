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

if($dni && $nombre && $apellido1 && $apellido2 && $telefono && $direccion && $foto){
    $consulta = "INSERT INTO clientes (dni, nombre, apellido1, apellido2, telefono, direccion, foto) VALUES ('$dni', '$nombre', '$apellido1', '$apellido2', '$telefono', '$direccion', '$foto')";
    $resultado_consulta = mysqli_query($conexion, $consulta);

    if ($resultado_consulta) {
        echo "<p>Cliente añadido con éxito.</p>";
        header("Location: menu.html");
    } else {
        echo "<p>Error al añadir cliente: " . mysqli_error($conexion) . "</p>";
    }

}


mysqli_close($conexion);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Cliente</title>
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
    <h1>Añadir Nuevo Cliente</h1>
    <form action="añadir_cliente.php" method="POST">
        <label for="dni">DNI:</label>
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

        <button type="submit">Añadir Cliente</button>
    </form>
</body>
</html>
