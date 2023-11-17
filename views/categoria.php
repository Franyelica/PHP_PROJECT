<?php
require_once '../models/Categoria.php'; // Asegúrate de incluir el archivo donde está definida la clase Categoria

// Crear una instancia de la clase Categoria
$categoria = new Categoria(null, null, null, null);

// Verificar si se ha enviado el formulario de creación
if (isset($_POST['btnAgregarCategoria'])) {
    // Verificar si 'nombre' está definido en $_POST
    if (isset($_POST['nombre_categoria'])) {
        $nombre = $_POST['nombre_categoria'];
        $categoria->setNombre($nombre);
        $categoria->setFechaCreacion(date('Y-m-d H:i:s'));
        $categoria->setFechaModificacion(date('Y-m-d H:i:s'));
        $categoria->createCategoria();
    } else {
        // Manejar el caso donde 'nombre' no está definido
        mensaje("Error: La clave 'nombre' no está definida en \$_POST.");
    }
}

// Verificar si se ha enviado el formulario de actualización
if (isset($_POST['btnActualizar'])) {
    // Lógica para obtener el ID y otros datos del formulario
    $idCategoria = $_POST['idCategoriaActualizar']; // Cambiado a 'idCategoriaActualizar'
    $nombre = $_POST['nombre_actualizado'];
    $categoria->setNombre($nombre);
    $categoria->setFechaModificacion(date('Y-m-d H:i:s'));
    $categoria->updateCategoria($idCategoria);
}

// Verificar si se ha enviado el formulario de eliminación
if (isset($_POST['btnEliminar'])) {
    // Lógica para obtener el ID del formulario
    $idCategoriaEliminar = $_POST['idCategoriaEliminar'];

    // Utiliza el método deleteCategoria con el ID a eliminar
    $categoria->deleteCategoria($idCategoriaEliminar);
}

// Obtener todas las categorías
$categorias = $categoria->readCategorias();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMVL</title>
    <link rel="stylesheet" href="../../PHP_PROJECT/assets/categoria.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="icon" href="../../PHP_PROJECT/assets/img/REMM.jpg" type="image/png">
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    
</head>

<body>
    <!-----HEADER----->
    <?php require('../layout/header.php')?>
    <!----CUERPO---->
    <div class="seccion_1">
        <h2>Categoria</h2>
        <!-- Formulario para agregar una nueva categoría -->
        <form method="post" action="">
            <label for="nombre_categoria">Nombre:</label>
            <input type="text" name="nombre_categoria" id="input_categoria" required>
            <button type="submit" name="btnAgregarCategoria" id="btnAgregarCategoria">Agregar categoría</button>
        </form>

        <!-- Formulario para actualizar una categoría -->
        <form method="post" action="">
            <label for="categoriaActualizar">Selecciona la categoría a actualizar:</label>
            <select name="idCategoriaActualizar" id="categoriaActualizar">
                <?php foreach ($categorias as $categoria) : ?>
                    <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre_categoria']; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="nombreActualizar">Nuevo nombre:</label>
            <input type="text" name="nombre_actualizado" id="input_categoria"  required>
            <button type="submit" name="btnActualizar" id="btnActualizar">Actualizar categoría</button>
        </form>

        <!-- Formulario para eliminar una categoría -->
        <form method="post" action="">
            <label for="categoriaEliminar">Selecciona la categoría a eliminar:</label>
            <select name="idCategoriaEliminar" id="categoriaEliminar">
                <?php foreach ($categorias as $cat) : ?>
                    <option value="<?php echo $cat['id']; ?>"><?php echo $cat['nombre_categoria']; ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="btnEliminar" id="btnEliminar">Eliminar categoría</button>
        </form>
    </div>

    <!-- Formulario para actualizar una categoría 
    <form method="post" action="">
        <label for="categoriaActualizar">Selecciona la categoría a actualizar:</label>
        <select name="idCategoriaActualizar" id="categoriaActualizar">
            <?php /* foreach ($categorias as $categoria) : ?>
                <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre_categoria']; ?></option>
            <?php endforeach; */?>
        </select>
        <label for="nombreActualizar">Nuevo nombre:</label>
        <input type="text" name="nombre_actualizado" required>
        <button type="submit" name="btnActualizar" id="btnActualizar">Actualizar categoría</button>
    </form>-->

    <!-- Formulario para eliminar una categoría 
    <form method="post" action="">
        <label for="categoriaEliminar">Selecciona la categoría a eliminar:</label>
        <select name="idCategoriaEliminar" id="categoriaEliminar">
            <?php /*foreach ($categorias as $cat) : ?>
                <option value="<?php echo $cat['id']; ?>"><?php echo $cat['nombre_categoria']; ?></option>
            <?php endforeach; */?>
        </select>
        <button type="submit" name="btnEliminar" id="btnEliminar">Eliminar categoría</button>
    </form>-->

    <div class="seccion_2">
    <table id="tblInventario" class="tabla_inventario">
    <thead>
        <tr>
            <th>id</th>
            <th>Categoría</th>
            <th>Fecha de creación</th>
            <th>Última modificación</th>
        </tr>
    </thead>
    <tbody class="tblcategorias">
        <?php foreach ($categorias as $categoria) : ?>
            <tr>
                <td class="id_categoria"><?php echo $categoria['id']; ?></td>
                <td class="items_categoria"><?php echo $categoria['nombre_categoria']; ?></td>
                <td class="items_categoria"><?php echo $categoria['fecha_creacion']; ?></td>
                <td class="items_categoria"><?php echo $categoria['fecha_modificacion']; ?></td>
                <!-- Otras columnas... -->
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    </div>

    <!--<div class="seccion_3">
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
    </div>-->

    <!------FOOTER------>
    <?php require('../layout/footer.html')?>
</body>

</html>