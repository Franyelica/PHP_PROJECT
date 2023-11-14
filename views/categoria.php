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
    <script src="Scripts/Combos.js"></script>
    <script src="Scripts/Tablas.js"></script>
    <!--Scripts propios de la página-->
    <script src="Scripts/Inventario.js"></script>
</head>

<body>
    <!-----HEADER----->
    <?php require('../layout/header.html')?>
    <!----CUERPO---->
    <div class="seccion_1">
        <h2>Categoria</h2>
        <div class="btn_create">
            <a href="categoria.html">
                <button type="button" id="btnCrearCategoria">Crear nueva categoria</button>
            </a>
            <form method="POST" action="agregar_producto.php">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" required>
            </form>
        </div>
    </div>


    <div class="seccion_2">
        <table id="tblInventario" class="tabla_inventario">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Fecha de creación</th>
                    <th>Última modificación</th>
                </tr>
            </thead>
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