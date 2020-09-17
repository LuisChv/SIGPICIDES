// RESALTAR LAS FILAS AL PASAR EL MOUSE
function ResaltarFila(id_fila) {
    document.getElementById(id_fila).style.backgroundColor = '#9c9c9c';
}
// RESTABLECER EL FONDO DE LAS FILAS AL QUITAR EL FOCO
function RestablecerFila(id_fila, color) {
    document.getElementById(id_fila).style.backgroundColor = color;
}
// CONVERTIR LAS FILAS EN LINKS
function CrearEnlace(url) {
    location.href=url;
}
//añadir permiso al usuario
function añadirPermiso(valor){
    document.getElementById("añadirPermiso"+valor).submit();
}
function eliminarPermiso(valor){
    document.getElementById("eliminarPermiso"+valor).submit();   
}
//editar indicador vista OAI
function editarIndicador(id_indicador, descripcion){
    $('#editarIndicador').submit();
}
//Dentro de aquí se pueden cargar funciones que necesitan que el html se carguen primero
$(document).ready(function(){//lo que este dentro de aquí se cargara hasta que la pagina este totalmente cargada
    $('#selector1').change(function () {
        $('#selector2').show();
        $('#prepend').show();
        $('#selector2').val("");
        var idFiltro = $(this).val();
        if (idFiltro !="") {
            $("#selector2 > option").each(function () {
                if ($(this).hasClass(idFiltro)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
    });
    //otra funcion
});