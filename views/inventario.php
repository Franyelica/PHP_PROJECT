    <?php
    require_once '../models/Inventario.php';
    require_once '../models/Categoria.php';

    // Crear instancias de las clases Inventario y Categoria
    $inventario = new Inventario(null, null, null, null, null, null);
    $categoria = new Categoria(null, null, null, null);

    // Obtener todos los registros de categorías
    $categorias = $categoria->readCategorias();
    $registrosInventario = $inventario->readInventario();

    // Verificar si se envió el formulario de agregar producto
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnAgregarProducto'])) {
        // Verificar si 'nombre', 'idCategoriaActualizar' y 'cantidad' están definidos en $_POST
        if (isset($_POST['nombre'], $_POST['idCategoriaActualizar'], $_POST['cantidad'])) {
            $nombre = $_POST['nombre'];
            $categoriaID = $_POST['idCategoriaActualizar'];
            $cantidad = $_POST['cantidad'];

            // Crear una instancia de Categoria con el ID seleccionado
            $selectedCategoriaID = $_POST['idCategoriaActualizar'];
            $selectedCategoria = new Categoria($selectedCategoriaID, null, null, null);

            // Crear una instancia de Inventario con los datos recogidos
            $inventario = new Inventario(
                null,
                $nombre,
                $cantidad,
                $selectedCategoria, // Pasar la instancia de Categoria
                date('Y-m-d H:i:s'),
                date('Y-m-d H:i:s')
            );

            // Agregar el producto al inventario
            $inventario->createInventario();

            // Redireccionar o mostrar un mensaje de éxito
            header('Location: inventario.php');
            exit();
        } else {
            // Manejar el caso donde alguna clave no está definida
            mensaje("Error: Algunas claves no están definidas en \$_POST.");
        }
    }

    // Verificar si se envió el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Actualización de inventario
        if (isset($_POST['btnActualizar'])) {
            // Obtener datos del formulario
            $idActualizar = $_POST['idActualizar'];
            $nombreActualizar = $_POST['nombreActualizar'];
            $categoriaIDActualizar = $_POST['idCategoriaActualizar'];
            $cantidadActualizar = $_POST['cantidadActualizar'];

            // Crear instancia de Inventario
            $inventarioActualizar = new Inventario(
                $idActualizar,
                $nombreActualizar,
                $cantidadActualizar,
                new Categoria($categoriaIDActualizar, null, null, null),
                null,
                null
            );

            // Actualizar el producto en el inventario
            $inventarioActualizar->updateInventario(
                $idActualizar,
                $nombreActualizar,
                $categoriaIDActualizar,
                $cantidadActualizar
            );
        }

        // Otras acciones como agregar, eliminar, etc.

        // Verificar si se envió el formulario de eliminación
    if (isset($_POST['btnEliminar'])) {
        $id = $_POST['id'];

        // Llamar al método de eliminación
        $inventario->deleteInventario($id);

        // Recargar la página o redirigir a otra página según tu flujo de trabajo
        header('Location: inventario.php');
        exit();
    }


        // Redireccionar o mostrar mensajes según sea necesario
        header('Location: inventario.php');
        exit();
    }

    ?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMVL</title>
    <link rel="stylesheet" href="../../PHP_PROJECT/assets/inventario.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="icon" href="../../PHP_PROJECT/assets/img/REMM.jpg" type="image/png">
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        function confirmarEliminacion(id) {
            return confirm("¿Estás seguro de que deseas eliminar el producto con ID " + id + "?");
        }
    </script>
</head>

    <body>
        <!-----HEADER----->
        <?php require('../layout/header.html')?>
        <!----CUERPO---->
        <div class="seccion_1">
            <h2>Inventario</h2>
            <div class="btn_create">
                <a href="categoria.php">
                    <button type="button" id="btnCrearCategoria">Crear nueva categoria</button>
                </a>
                <form method="post" action="">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" required>

                    <select name="idCategoriaActualizar" id="categoriaActualizar">
                        <?php foreach ($categorias as $categoria) : ?>
                            <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre_categoria']; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <label for="cantidad">Cantidad:</label>
                    <input type="number" name="cantidad" required>

                    <a href="inventario.php">
                    <button type="submit" name="btnAgregarProducto">Agregar artículo</button>
                    </a>
                </form>
            </div>
        </div>
        <div class="seccion_1">
            <!-- Formulario para actualizar un producto -->
        <form method="post" action="">
            <label for="idActualizar">Selecciona el producto a actualizar:</label>
            <select name="idActualizar" id="idActualizar">
                <?php foreach ($registrosInventario as $registro) : ?>
                    <option value="<?php echo $registro['id']; ?>"><?php echo $registro['nombre']; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="nombreActualizar">Nuevo nombre:</label>
            <input type="text" name="nombreActualizar" required>

            <label for="idCategoriaActualizar">Nueva categoría:</label>
            <select name="idCategoriaActualizar" id="idCategoriaActualizar">
                <?php foreach ($categorias as $categoria) : ?>
                    <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre_categoria']; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="cantidadActualizar">Nueva cantidad:</label>
            <input type="number" name="cantidadActualizar" required>

            <button type="submit" name="btnActualizar">Actualizar producto</button>
        </form>
        </div>


        <div class="seccion_2">
            <table id="tblInventario" class="tabla_inventario">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Cantidad</th>
                        <th>Fecha de creación</th>
                        <th>Última modificación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($registrosInventario as $registro) : ?>
                        <tr>
                            <td><?php echo $registro['nombre']; ?></td>
                            <td><?php echo $inventario->getCategoriaNombre($registro['categoria_id']); ?></td>
                            <td><?php echo $registro['cantidad']; ?></td>
                            <td><?php echo $registro['fecha_creacion']; ?></td>
                            <td><?php echo $registro['fecha_modificacion']; ?></td>
                            <td>
                            <form method="post" action="">
                                <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">
                                <button type="submit" name="btnEliminar" onclick="return confirmarEliminacion(<?php echo $registro['id']; ?>)">Eliminar</button>
                            </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="seccion_3">
            <div class="col-md-3">
                <br />
                <button type="button" id="btnActualizar">ACTUALIZAR</button>
            </div>
            <div class="col-md-3">
                <br />
                <button type="button" id="btnEliminar">ELIMINAR</button>
            </div>
            <div class="col-md-3">
                <br />
                <button type="button" id="btnConsultar">CONSULTAR</button>
            </div>
        </div>

        <!------FOOTER------>
        <?php require('../layout/footer.html')?>
    </body>

    </html>