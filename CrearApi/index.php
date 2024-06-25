<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "api";
    $port = 3306;
    $conexion = new mysqli($host, $user, $pass, $db, $port);

    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    header("Content-Type: application/json");
    $metodo = $_SERVER['REQUEST_METHOD'];

    $path = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';

    $buscarId = explode("/", $path);
    $id = ($path !== '/') ? end($buscarId) : null;
    switch ($metodo) {
        case 'GET':
            consultar($conexion,$id);
            break;
        case 'POST':
            insertar($conexion);
            break;
        case 'PUT':
            actualizar($id, $conexion);
            break;
        case 'DELETE':
            eliminar($id, $conexion);
            break;
        default:
            echo json_encode(array("mensaje" => "Método no soportado"));
    }

    function consultar($conexion,$id) {

        $sql =($id == null)? "SELECT * FROM usuarios" : "SELECT * FROM usuarios where id = $id" ;
        $resultado = $conexion->query($sql);
        $datos = array();
        if ($resultado) {
            while ($fila = $resultado->fetch_assoc()) {
                $datos[] = $fila;
            }
        }
        echo json_encode($datos);
    }

    function insertar($conexion) {
        $dato = json_decode(file_get_contents('php://input'), true);

        $nombre = $dato['nombre'];

        $sql = "INSERT INTO usuarios (nombre) VALUES ('$nombre')";

        $resultado = $conexion->query($sql);

        if ($resultado) {
            echo json_encode(array("mensaje" => "Inserción exitosa"));
        } else {
            echo json_encode(array("mensaje" => "Error al insertar"));
        }
    }

    function actualizar($id, $conexion) {
        if ($id) {
            $dato = json_decode(file_get_contents('php://input'), true);
            $nombre = $dato['nombre'];
            $sql = "UPDATE usuarios SET nombre = '$nombre' WHERE id = $id";
            $resultado = $conexion->query($sql);
            if ($resultado) {
                echo json_encode(array("mensaje" => "Actualización exitosa"));
            } else {
                echo json_encode(array("mensaje" => "Error al actualizar"));
            }
        } else {
            echo json_encode(array("mensaje" => "ID no proporcionado"));
        }
    }

    function eliminar($id, $conexion) {
        if ($id) {
            $sql = "DELETE FROM usuarios WHERE id = $id";
            $resultado = $conexion->query($sql);
            if ($resultado) {
                echo json_encode(array("mensaje" => "Eliminación exitosa"));
            } else {
                echo json_encode(array("mensaje" => "Error al eliminar"));
            }
        } else {
            echo json_encode(array("mensaje" => "ID no proporcionado"));
        }
    }
?>
