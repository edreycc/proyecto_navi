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
            
            <?= form_open_multipart('tu_controlador/procesar_reserva', ['id' => 'serviciosForm']); ?>
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
                                        <input type="checkbox" class="servicio-checkbox" onclick="toggleServicio(this, '<?= $servicio->nombre; ?>', <?= $servicio->precio; ?>)" />
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
                        <input type="hidden" id="serviciosSelecionados" class="form-control" name="serviciosSelecionados" required>
                        
                        <li><strong>Total Precio:</strong> <span id="totalPrecio">BS0.00</span></li>
                        <input type="hidden" id="totalPrecio" class="form-control" name="totalPrecio" required>
                        88  
                        <li><strong>Total Servicios:</strong> <span id="totalServicios">0</span></li>
                        <input type="hidden" id="totalServicios" class="form-control" name="totalServicios" required>

                    </ul>
                    <!-- Botón para confirmar reserva -->
                    <button class="btn btn-primary btn-block " onclick="enviarReserva()">Confirmar Reserva</button>
                </div>
            </div>
        </div>
    </div>    
    <?= form_close(); ?>
</div>

<script>
    let serviciosSeleccionados = [];
    let totalPrecio = 0;

    // Función para agregar o quitar servicios seleccionados
    function toggleServicio(checkbox, nombreServicio, precioServicio) {
        if (checkbox.checked) {
            // Agregar servicio seleccionado
            serviciosSeleccionados.push({ nombre: nombreServicio, precio: precioServicio });
            totalPrecio += precioServicio;
        } else {
            // Quitar servicio seleccionado
            serviciosSeleccionados = serviciosSeleccionados.filter(servicio => servicio.nombre !== nombreServicio);
            totalPrecio -= precioServicio;
        }

        actualizarInterfaz();
    }

    // Función para actualizar la interfaz
    function actualizarInterfaz() {
        const listaServicios = document.getElementById("serviciosSeleccionados");
        const totalPrecioElement = document.getElementById("totalPrecio");
        const totalServiciosElement = document.getElementById("totalServicios");

        // Limpiar la lista de servicios seleccionados
        listaServicios.innerHTML = '';

        // Añadir los servicios seleccionados a la lista
        serviciosSeleccionados.forEach(servicio => {
            const li = document.createElement("li");
            li.textContent = `${servicio.nombre} - BS${servicio.precio}`;
            listaServicios.appendChild(li);
        });

        // Actualizar el total de servicios y precio
        totalPrecioElement.textContent = `BS${totalPrecio.toFixed(2)}`;
        totalServiciosElement.textContent = serviciosSeleccionados.length.toString();
    }

    // Función para enviar los datos al controlador
    function enviarReserva() {
        // Obtener la fecha de reserva seleccionada
        const fechaReserva = document.getElementById('fechaReservaInput').value;

        // Convertir los servicios seleccionados a JSON
        const servicios = JSON.stringify(serviciosSeleccionados);

        // Asignar los valores a los campos ocultos del formulario
        document.getElementById('fechaReserva').value = fechaReserva;
        document.getElementById('servicios').value = servicios;
        document.getElementById('totalPrecioInput').value = totalPrecio;

        // Enviar el formulario
        document.getElementById('serviciosForm').submit();
    }
</script>


<script src="<?php echo base_url(); ?>assets/js/servicios.js"></script>
