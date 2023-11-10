//Creamos una variable de tipo DataTable, con la tabla tblProductos
var oTabla = $("#tblInventario").DataTable();

jQuery(function () {
    //Registrar los botones para responder al evento click
    $("#btnInsertar").on("click", function () {
        EjecutarComandos("POST");
    });
    $("#btnActualizar").on("click", function () {
        EjecutarComandos("PUT");
    });
    $("#btnEliminar").on("click", function () {
        EjecutarComandos("DELETE");
    });
    $("#btnConsultar").on("click", function () {
        Consultar();
    });
    //Invoca la función para llenar el combo
    LlenarComboCategorias();
    LlenarTablaProductos();
});

async function LlenarTablaProductos() {
    LlenarTablasXServicio("http://localhost/PHP_PROJECT/Controllers/InventarioController.php", "#tblInventario");
}
async function LlenarComboCategorias() {
    LlenarComboXServicios("http://localhost/PHP_PROJECT/Controllers/CategoriaController.php", "#cboCategoria");
}

