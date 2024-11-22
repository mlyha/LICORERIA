<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<title>LICORERIA DE CASTANEDA Y TANORI</title>
</head>
<body background="img/fondo.jpg">
<h1>LICORERIA</h1>
<h2>REGISTRO DE PRODUCTOS</h2>
<form action="" method="POST">
    <label for="">Codigo:</label>
    <input type="text" name="codigo"> <br>
    <label for="">Nombre:</label>
    <input type="text" name="nombre"> <br>
    <label for="">Precio:</label>
    <input type="text" name="precio"> <br>
    <label for="">Cantidad:</label>
    <input type="text" name="cantidad"> <br><br>
    <input type="submit" name="insertar" value="INSERTAR"> 
    <input type="submit" name="mostrar" value="VER"> 
    <input type="submit" name="actualizar" value="ACTUALIZAR"> 
    <input type="submit" name="eliminar" value="ELIMINAR">
</form>
 
<table>
    <tr>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Cantidad</th>
    </tr>
<?php

$conexion = new mysqli('LOCALHOST', 'root', '', 'licoreria');

// Asegurarse de que las variables están definidas
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '';
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$precio = isset($_POST['precio']) ? $_POST['precio'] : '';
$cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : '';

if (isset($_POST['insertar'])) {
    $insertar = "INSERT INTO productos (nombre, precio, cantidad) VALUES ('$nombre', '$precio', '$cantidad')";
    $sql = mysqli_query($conexion, $insertar);
}

if (isset($_POST['mostrar'])) {
    $mostrar = "SELECT * FROM productos";
    $sql = mysqli_query($conexion, $mostrar);
    while ($ver = mysqli_fetch_array($sql)) {
        echo "<tr><td>";
        echo $ver['codigo'];
        echo "</td><td>";
        echo $ver['nombre'];
        echo "</td><td>";
        echo $ver['precio'];
        echo "</td><td>";
        echo $ver['cantidad'];
        echo "</td></tr>";
    }
}

if (isset($_POST['actualizar'])) {
    $actualizar = "UPDATE productos SET nombre='$nombre', precio='$precio', cantidad='$cantidad' WHERE codigo='$codigo'";
    $sql = mysqli_query($conexion, $actualizar);
}

if (isset($_POST['eliminar'])) {
    $eliminar = "DELETE FROM productos WHERE codigo='$codigo'";
    $sql = mysqli_query($conexion, $eliminar);
}

?>
</table>

</body>
</html>
