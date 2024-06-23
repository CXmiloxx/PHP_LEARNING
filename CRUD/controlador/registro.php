<?php
    if(!empty($_POST['txt-registrar'])){
        $categoria = $_POST['txt-categoria'];
        $nombre = $_POST['txt-nombre'];
        $precio = $_POST['txt-precio'];

        if(!empty($_POST['txt-categoria']) and !empty ($_POST['txt-nombre']) and !empty($_POST['txt-precio'])){
            $registrar = $conexion->query("insert into producto(id_categoria,nombre,precio) values ('$categoria','$nombre', '$precio')");
                if($registrar){
                    echo "<div>Producto registrado correctamente.</div>";
                }else{
                    echo "<div>Error al registrar el producto.</div>";
                }
        }else{
            echo "<div>Debes llenar todos los campos.</div>";
        }
?>

        <script>
            window.history.replaceState(null,null,window.location.pathname);
        </script>
        <?php
    }
