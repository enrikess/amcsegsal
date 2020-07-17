$(document).ready(function () {

});

var EliminarRegistro = (id, fecha, descripcion) => {
  Swal.fire({
    title: '<strong>Eliminar Registro</strong>',
    icon: 'info',
    html:
    `
    <form method="POST" action="${config.route}/segsal/${id}">
    Fecha: ${fecha}</br>
    Descripción: ${descripcion}</br>
    </br>
    <input type="hidden" name="_method" value="delete" />
    <input type="hidden" name="_token" value="${config.token}">
    <input class="swal2-confirm swal2-styled" type="submit" value="Eliminar" />
    </form>`,
    showCloseButton: false,
    showCancelButton: false,
    showConfirmButton: false,
    focusConfirm: false
  })
}
