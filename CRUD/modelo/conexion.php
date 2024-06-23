<?php
    $conexion = new mysqli("localhost", "root", "", "php_crud", 3306);

    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    $conexion->set_charset("utf8");

    // Aquí puedes agregar el resto de tu código para trabajar con la base de datos

    // Cierra la conexión al finalizar
?>
