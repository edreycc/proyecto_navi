// Script para manejar la selección del horario
document.querySelectorAll('.select-hour').forEach(button => {
    button.addEventListener('click', function(event) {
        // Prevenir la recarga de la página
        event.preventDefault();

        // Remover la selección previa si existe
        document.querySelectorAll('.selectable').forEach(row => row.classList.remove('table-success'));

        // Agregar clase de seleccionado al horario clicado
        this.closest('tr').classList.add('table-success');

        // Mostrar la hora seleccionada en el párrafo
        const selectedTime = this.getAttribute('data-time');
        document.getElementById('selected_hour').textContent = selectedTime;

        // Habilitar el botón de reserva
        document.getElementById('reserve_btn').disabled = false;
    });
});

// Script para manejar la acción de reserva
document.getElementById('reserve_btn').addEventListener('click', function() {
    const selectedTime = document.getElementById('selected_hour').textContent;

    if (selectedTime) {
        // Aquí puedes agregar la lógica de la reserva, como enviar los datos a un servidor
        alert('Reservaste el horario: ' + selectedTime);
    } else {
        alert('Por favor selecciona un horario antes de reservar.');
    }
});