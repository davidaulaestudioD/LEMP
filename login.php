<?php
$host = 'localhost'; 
$user = 'root';      
$password = 'Contraseña-Segura1234';      
$basedatos = 'rober'; 

$conexion = mysqli_connect($host, $user, $password, $basedatos);

if (!$conexion) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $contraseña = $_POST['password'];
}else {
    echo "Rellena los dos campos";
    exit;
}

$consulta = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$contraseña'";

$resultado_consulta = mysqli_query($conexion, $consulta);

if ($resultado_consulta && mysqli_num_rows($resultado_consulta) > 0) {
        
    header("Location: menu.html");
    exit;
}else {
    echo "Usuario o contraseña incorrectos.";
    header("Location: index.html");
}

mysqli_close($conexion);
?>
