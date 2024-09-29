$(document).ready(function() {
    // Espera 3 segundos y oculta los mensajes
    setTimeout(function() {
        $('.alert').fadeOut();
    }, 2000);
});



function confirmarEliminacion(form) {
    if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
        form.submit(); // Si el usuario acepta, se envía el formulario
    }
}


let deleteForm; // Variable para almacenar el formulario a eliminar

$('#confirmDeleteBtn').click(function() {
    if (deleteForm) {
        deleteForm.submit(); // Si hay un formulario almacenado, se envía
    }
    $('#confirmModal').modal('hide'); // Cerrar el modal
});

// Asignar el formulario al botón de eliminar
$('button[data-toggle="modal"]').click(function() {
    deleteForm = $(this).closest('form'); // Guardar el formulario actual
});