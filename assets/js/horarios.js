
 // Evento para mostrar la fecha y hora seleccionada automáticamente
 document.getElementById('selectedDate').addEventListener('change', function() {
    const selectedDate = this.value; // Obtener la fecha seleccionada
    document.getElementById('displayDate').textContent = selectedDate; // Mostrar la fecha seleccionada
    updateFinalDateHour(); // Actualizar la fecha y hora final
});

document.querySelectorAll('.select-hour').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault(); // Prevenir la acción por defecto del botón
        const selectedHour = this.getAttribute('data-time'); // Obtener la hora seleccionada
        document.getElementById('selected_hour').textContent = selectedHour; // Mostrar la hora seleccionada
        updateFinalDateHour(); // Actualizar la fecha y hora final
    });
});

function updateFinalDateHour() {
    const selectedDate = document.getElementById('displayDate').textContent; // Obtener la fecha seleccionada
    const selectedHour = document.getElementById('selected_hour').textContent; // Obtener la hora seleccionada
    if (selectedDate && selectedHour) {
        document.getElementById('finalDateHour').textContent = `${selectedDate} - ${selectedHour}`; // Mostrar la fecha y hora final
    }
}