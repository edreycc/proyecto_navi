<link rel="stylesheet" href="<?php echo base_url();?>assets/css/horario.css"> 

<div class="container-fluid">
    <!-- Encabezado de la Página -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="" class="btn btn-primary btn-sm" style="margin-bottom: 10px;">
                <i class="fa-solid fa-left-long"></i> Atras
            </a>
            <h6 class="m-0 font-weight-bold text-primary">Reservar</h6>
        </div>
        <div class="card-body">
            <?php echo form_open_multipart('dashboardcontrolleruser/elegirFecha'); ?>
            <div class="row">
                <!-- Sección para seleccionar horarios -->
                <div class="col-md-8">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Selecciona un Horario</h6>
                        </div>
                        <div class="card-body">
                            <p class="mt-3 font-weight-bold">Hora seleccionada: 
                                <span id="selected_hour" class="text-success"></span>
                                <input type="hidden" id="selectedHour" name="selectedHour">
                            </p>
                            <table class="table table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Horarios Disponibles</th>
                                        <th class="text-center">Seleccionar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Listado de Horarios -->
                                    <?php 
                                    $horarios = [
                                        "09:00 - 09:35", 
                                        "09:35 - 10:10", 
                                        "10:10 - 10:45", 
                                        "10:45 - 11:20", 
                                        "11:20 - 11:55", 
                                        "11:55 - 12:30", 
                                        "12:30 - 13:05", 
                                        "13:05 - 13:40", 
                                        "13:40 - 14:15", 
                                        "14:15 - 14:50", 
                                        "14:50 - 15:25", 
                                        "15:25 - 16:00", 
                                        "16:00 - 16:35", 
                                        "16:35 - 17:10", 
                                        "17:10 - 17:45", 
                                        "17:45 - 18:20", 
                                        "18:20 - 18:55", 
                                        "18:55 - 19:30", 
                                        "19:30 - 20:05", 
                                        "20:05 - 20:40"
                                    ];                                    
                                    foreach($horarios as $horario): ?>
                                    <tr class="selectable" data-time="<?php echo $horario; ?>">
                                        <td><?php echo $horario; ?></td>
                                        <td class="text-center">
                                            <button class="btn btn-success select-hour" data-time="<?php echo $horario; ?>">Elegir</button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Sección para seleccionar fecha y detalles de la reserva -->
                <div class="col-md-4">
                    <div class="row">
                        <!-- Card para seleccionar fecha -->
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Selecciona una Fecha</h6>
                                </div>
                                <div class="card-body text-center">
                                    <form id="dateForm">
                                        <div class="mb-3">
                                            <label for="selectedDate" class="form-label">Fecha:</label>
                                            <input type="date" id="selectedDate" class="form-control" name="selectedDate" required>

                                        </div>
                                    </form>
                                    <p class="mt-3">Fecha seleccionada: <span id="displayDate" class="text-success"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Card para detalles de la reserva -->
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Detalles de la Reserva</h6>
                                </div>
                                <div class="card-body">
                                    
                                    <p>Fecha y Hora de la Reserva: <span id="finalDateHour" class="text-success"></span></p>
                                    <button class="btn btn-primary btn-block">Continuar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php form_close(); ?>
        </div>
    </div>
</div>



<!-- Código JavaScript Inline para manejo de fecha y horario -->
<script>
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
        document.getElementById('selectedHour').value = selectedHour; // Establecer la hora seleccionada en el campo oculto
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

</script>
