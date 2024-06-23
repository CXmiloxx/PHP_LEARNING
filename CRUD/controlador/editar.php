<?php
if (!empty($_POST['btn-editar'])) {
    $categoria = $_POST['txt-categoria'];
    $nombre = $_POST['txt-nombre'];
    $precio = $_POST['txt-precio'];
    $id = $_POST['txt_id'];

    if (!empty($categoria) && !empty($nombre) && !empty($precio)) {
        $editar = $conexion->query("UPDATE producto SET id_categoria = '$categoria', nombre = '$nombre', precio = '$precio' WHERE id_producto = '$id'");
        if ($editar) {
            echo "<div>Producto editado correctamente</div>";
        } else {
            echo "<div>Error al editar</div>";
        }
    } else {
        echo "<div>Faltan datos</div>";
    }
    ?>
    <script>
        window.history.replaceState(null, null, window.location.pathname);
    </script>
    <?php
}
?>
