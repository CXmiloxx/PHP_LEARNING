<?php
    if(!empty($_POST['btn-eliminar'])){

    $id_producto = $_POST['txt_id'];

    if(!empty($id_producto)){
        $eliminar = $conexion->query("delete from producto where id_producto = '$id_producto' ");
        if($eliminar){
            echo "<div>Eliminado con exito</div>";
        }else{
            echo "<div>No se pudo eliminar</div>";
        }

    }
    ?>
    <script>
        window.history.replaceState(null,null,window.location.pathname);
    </script>
    <?php

    }
?>