document.getElementById('submitBtn').addEventListener('click', function() {
    const selectedDate = document.getElementById('selectedDate').value;
    if (selectedDate) {
        document.getElementById('displayDate').textContent = selectedDate; // Mostrar la fecha seleccionada
    } else {
        
    }
});