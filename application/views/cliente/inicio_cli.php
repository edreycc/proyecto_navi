<link rel="stylesheet" href="<?php echo base_url();?>assets/css/servicios.css">

<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <!-- Lista de Servicios -->
        <div class="col-md-8">
            <div class="servicio-card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> Lista de Servicios </h6>
                </div>
            </div>
            
            <?= form_open_multipart('reservacontroller/procesarReserva', ['id' => 'serviciosForm']); ?>
            <div class="servicio-list">
                <div class="row">
                    <?php if (!empty($servicios->result())): ?>
                        <?php foreach ($servicios->result() as $servicio): ?>
                            <div class="col-12 mb-3">
                                <div class="card shadow mb-4">
                                    <div class="d-flex justify-content-between align-items-center p-3 border rounded servicio-item" style="cursor: pointer;">
                                        <div class="me-auto">
                                            <label class="servicio-nombre"><?= $servicio->nombre; ?></label>
                                            <p class="m-0 servicio-descripcion"><?= $servicio->descripcion; ?></p>
                                            <p class="servicio-precio fw-bold">BS<?= $servicio->precio; ?></p>
                                        </div>
                                        <!-- Checkbox para seleccionar servicio -->
                                        <input type="checkbox" class="servicio-checkbox" 
                                        name="serviciosSeleccionados[]"  
                                        value="<?= $servicio->id_servicio; ?>" 
                                        onclick="toggleServicio(this, '<?= $servicio->nombre; ?>', <?= $servicio->precio; ?>, <?= $servicio->id_servicio; ?>)" />
                                        
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No se encontraron servicios.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Panel de Reserva -->
        <div class="col-md-4">
            <div class="card shadow mb-4"> <!-- Card para detalles de reserva -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detalles de la Reserva</h6>
                </div>
                <div class="card-body">
                    <p class="card-text">Detalles de la reserva:</p>
                    <ul class="list-unstyled">
                    <li>
                        <strong>Fecha y Hora de la Reserva:</strong>
                        <?php if (isset($fechaReserva)): ?>
                            <?= htmlspecialchars($fechaReserva); ?>
                            <input type="hidden" id="inputFechaReserva" name="fechaReserva" value="<?= htmlspecialchars($fechaReserva); ?>" />
                        <?php else: ?>
                            <p>No se ha establecido una fecha de reserva.</p>
                            <input type="hidden" id="inputFechaReserva" name="fechaReserva" value="" />
                        <?php endif; ?>
                    </li>

                    <li><strong>Servicios seleccionados:</strong> <ul id="serviciosSeleccionados"></ul></li>
                    <input type="hidden" id="servicios" class="form-control" name="serviciosSeleccionados" required>
                        
                        
                        <li><strong>Total Precio:</strong> <span id="totalPrecio">BS0.00</span></li>

                        <input type="hidden" id="totalPrecioInput" class="form-control" name="totalPrecio" required>

                        <li><strong>Total Servicios:</strong> <span id="totalServicios">0</span></li>
                        <input type="hidden" id="totalServiciosInput" class="form-control" name="totalServicios" required>

                    </ul>
                    <!-- Botón para confirmar reserva -->
                    <button class="btn btn-primary btn-block " onclick="enviarReserva()">Confirmar Reserva</button>
                </div>
                <!-- Campos ocultos corregidos -->


            </div>
        </div>
    </div>    
    <?= form_close(); ?>
</div>

<script>
    let serviciosSeleccionados = [];
    let totalPrecio = 0;

    
    function toggleServicio(checkbox, nombreServicio, precioServicio, idServicio) {
    if (checkbox.checked) {
        
        serviciosSeleccionados.push({ id_servicio: idServicio, nombre: nombreServicio, precio: precioServicio });
        totalPrecio += precioServicio;
    } else {
       
        serviciosSeleccionados = serviciosSeleccionados.filter(servicio => servicio.nombre !== nombreServicio);
        totalPrecio -= precioServicio;
    }

    actualizarInterfaz();
}


    
    function actualizarInterfaz() {
        const listaServicios = document.getElementById("serviciosSeleccionados");
        const totalPrecioElement = document.getElementById("totalPrecio");
        const totalServiciosElement = document.getElementById("totalServicios");

       
        listaServicios.innerHTML = '';

        
        serviciosSeleccionados.forEach(servicio => {
            const li = document.createElement("li");
            li.textContent = `${servicio.nombre} - BS${servicio.precio}`;
            listaServicios.appendChild(li);
        });

        
        totalPrecioElement.textContent = `BS${totalPrecio.toFixed(2)}`;
        totalServiciosElement.textContent = serviciosSeleccionados.length.toString();
    }

    function enviarReserva() {
        
        const fechaReserva = document.getElementById('inputFechaReserva').value;

        // Convertir los servicios seleccionados a JSON
        const servicios = JSON.stringify(serviciosSeleccionados);

       
        document.getElementById('inputFechaReserva').value = fechaReserva;
        document.getElementById('servicios').value = servicios;
        document.getElementById('totalPrecioInput').value = totalPrecio.toFixed(2);
        document.getElementById('totalServiciosInput').value = serviciosSeleccionados.length.toString();

      
        document.getElementById('serviciosForm').submit();
    }

</script>


<script src="<?php echo base_url(); ?>assets/js/servicios.js"></script>
