<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMVL</title>
    <link rel="stylesheet" href="../../PHP_PROJECT/assets/inventario.css">
</head>

<body>
    <!-----HEADER----->
    <?php require('../layout/header.html')?>
    <!----CUERPO---->
    <div class="seccion_1">
        <h2>Inventario</h2>
        <div class="btn_create">
            <a href="">
                <button type="button" id="btnCrearCategoria">Crear nueva categoria</button>
            </a>

            <a href="">
                <button type="button" id="btnAgregarCategoria" >Agregar articulo</button>
            </a>

        </div>
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
        </table>
    </div>

    <div class="seccion_3">
        <div class="col-md-3">
            <br />
            <button type="button" id="btnInsertar">INSERTAR</button>
        </div>
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
    <!--<form method="post" action="agregar_producto.php">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion"></textarea>

        <label for="precio">Precio:</label>
        <input type="number" step="0.01" name="precio" required>

        <label for="stock">Stock:</label>
        <input type="number" name="stock" required>

        <button type="submit">Agregar Producto</button>
    </form>-->

    <!------FOOTER------>
    <?php require('../layout/footer.html')?>
</body>

</html>