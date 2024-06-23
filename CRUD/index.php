<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/203ccaa2b3.js" crossorigin="anonymous"></script>
</head>

<body>

    <h1 class="text-center text-primary p-4">CRUD EN PHP</h1>

    <?php
    include "modelo/conexion.php";
    include "controlador/editar.php";
    include "controlador/eliminar.php"; // Incluir el controlador de eliminación
    ?>
    <div class="row col p4">

        <form action="" class="col-6 p-3" method="post">
            <div class="mb-3">
                <h3 class="text-center text-dark">Registro de productos</h3>
                <?php
                include "controlador/registro.php";
                ?>
                <label class="form-label">Categoria</label>
                <select class="form-select" aria-label="Default select example" name="txt-categoria">
                    <?php
                    $categoria = $conexion->query("SELECT * FROM categoria");
                    while ($datos = $categoria->fetch_object()) { ?>
                        <option value="<?= $datos->id_categoria ?>"><?= $datos->categoria ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="txt-nombre" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Precio</label>
                <input type="number" step="0.01" name="txt-precio" class="form-control">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary" name="txt-registrar" value="OK">Registrar</button>
            </div>
        </form>

        <table class="table col p-3">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $productos = $conexion->query("SELECT producto.*, categoria.categoria FROM producto INNER JOIN categoria ON producto.id_categoria = categoria.id_categoria");

                while ($datos = $productos->fetch_object()) { ?>
                    <tr>
                        <th><?= $datos->id_producto ?></th>
                        <td><?= $datos->categoria ?></td>
                        <td><?= $datos->nombre ?></td>
                        <td><?= $datos->precio ?></td>
                        <td>
                            <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarModal<?= $datos->id_producto ?>">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarModal<?= $datos->id_producto ?>">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <!-- Modal para editar -->
                    <div class="modal fade" id="editarModal<?= $datos->id_producto ?>" tabindex="-1" aria-labelledby="editarModalLabel<?= $datos->id_producto ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="editarModalLabel<?= $datos->id_producto ?>">Editar Producto</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" class="col-12" method="post">
                                        <input type="hidden" name="txt_id" value="<?= $datos->id_producto ?>">

                                        <div class="mb-3">
                                            <label class="form-label">Categoria</label>
                                            <select class="form-select" aria-label="Default select example" name="txt-categoria">
                                                <option selected>Seleccionar...</option>
                                                <?php
                                                $datos_categoria = $conexion->query("SELECT * FROM categoria");
                                                while ($datosEdit = $datos_categoria->fetch_object()) { ?>
                                                    <option <?= $datos->id_categoria == $datosEdit->id_categoria ? " selected" : "" ?> value="<?= $datosEdit->id_categoria ?>"><?= $datosEdit->categoria ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Nombre</label>
                                            <input type="text" name="txt-nombre" class="form-control" value="<?= $datos->nombre ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Precio</label>
                                            <input type="number" step="0.01" name="txt-precio" class="form-control" value="<?= $datos->precio ?>">
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary" name="btn-editar" value="OK">Editar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal para eliminar -->
                    <div class="modal fade" id="eliminarModal<?= $datos->id_producto ?>" tabindex="-1" aria-labelledby="eliminarModalLabel<?= $datos->id_producto ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="eliminarModalLabel<?= $datos->id_producto ?>">Eliminar Producto</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" class="col-12" method="post">
                                        <input type="hidden" name="txt_id" value="<?= $datos->id_producto ?>">
                                        <p>¿Estás seguro de que deseas eliminar este producto?</p>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-danger" name="btn-eliminar" value="OK">Eliminar</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>