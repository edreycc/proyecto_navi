
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="container-fluid">

    <!-- Encabezado de la Página -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="" class="btn btn-primary btn-sm" style="margin-bottom: 10px;">
                <i class="fa-solid fa-left-long"></i> 
                Atras              
            </a> 
            <h6 class="m-0 font-weight-bold text-primary">Reservar</h6>
        </div>
        <div class="card-body">
            
        <?php
        echo form_open_multipart('');
        ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="container mt-5">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Selecciona una Fecha</h6>
                                        </div>
                                        <div class="card-body text-center">
                                            <!-- Calendario simple con input de tipo date -->
                                            <form id="dateForm">
                                                <div class="mb-3">
                                                    <label for="selectedDate" class="form-label">Fecha:</label>
                                                    <input type="date" id="selectedDate" class="form-control" required>
                                                </div>
                                                <button type="submit" class="btn btn-success">Enviar Fecha</button>
                                            </form>
                                            <p class="mt-3">Fecha seleccionada: <span id="displayDate" class="text-success"></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                </div>

                <div class="col-md-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Selecciona un Horario</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Horarios Disponibles</th>
                                        <th class="text-center">Seleccionar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="selectable" data-time="09:00 AM - 10:00 AM">
                                        <td>09:00 AM - 10:00 AM</td>
                                        <td class="text-center"><button class="btn btn-success select-hour" data-time="09:00 AM - 10:00 AM">Elegir</button></td>
                                    </tr>
                                    <tr class="selectable" data-time="10:00 AM - 11:00 AM">
                                        <td>10:00 AM - 11:00 AM</td>
                                        <td class="text-center"><button class="btn btn-success select-hour" data-time="10:00 AM - 11:00 AM">Elegir</button></td>
                                    </tr>
                                    <tr class="selectable" data-time="11:00 AM - 12:00 PM">
                                        <td>11:00 AM - 12:00 PM</td>
                                        <td class="text-center"><button class="btn btn-success select-hour" data-time="11:00 AM - 12:00 PM">Elegir</button></td>
                                    </tr>
                                    <tr class="selectable" data-time="12:00 PM - 01:00 PM">
                                        <td>12:00 PM - 01:00 PM</td>
                                        <td class="text-center"><button class="btn btn-success select-hour" data-time="12:00 PM - 01:00 PM">Elegir</button></td>
                                    </tr>
                                    <tr class="selectable" data-time="01:00 PM - 02:00 PM">
                                        <td>01:00 PM - 02:00 PM</td>
                                        <td class="text-center"><button class="btn btn-success select-hour" data-time="01:00 PM - 02:00 PM">Elegir</button></td>
                                    </tr>
                                    <tr class="selectable" data-time="02:00 PM - 03:00 PM">
                                        <td>02:00 PM - 03:00 PM</td>
                                        <td class="text-center"><button class="btn btn-success select-hour" data-time="02:00 PM - 03:00 PM">Elegir</button></td>
                                    </tr>
                                    <tr class="selectable" data-time="03:00 PM - 04:00 PM">
                                        <td>03:00 PM - 04:00 PM</td>
                                        <td class="text-center"><button class="btn btn-success select-hour" data-time="03:00 PM - 04:00 PM">Elegir</button></td>
                                    </tr>
                                    <tr class="selectable" data-time="04:00 PM - 05:00 PM">
                                        <td>04:00 PM - 05:00 PM</td>
                                        <td class="text-center"><button class="btn btn-success select-hour" data-time="04:00 PM - 05:00 PM">Elegir</button></td>
                                    </tr>
                                    <tr class="selectable" data-time="05:00 PM - 06:00 PM">
                                        <td>05:00 PM - 06:00 PM</td>
                                        <td class="text-center"><button class="btn btn-success select-hour" data-time="05:00 PM - 06:00 PM">Elegir</button></td>
                                    </tr>
                                    <tr class="selectable" data-time="06:00 PM - 07:00 PM">
                                        <td>06:00 PM - 07:00 PM</td>
                                        <td class="text-center"><button class="btn btn-success select-hour" data-time="06:00 PM - 07:00 PM">Elegir</button></td>
                                    </tr>
                                    <tr class="selectable" data-time="07:00 PM - 08:00 PM">
                                        <td>07:00 PM - 08:00 PM</td>
                                        <td class="text-center"><button class="btn btn-success select-hour" data-time="07:00 PM - 08:00 PM">Elegir</button></td>
                                    </tr>
                                </tbody>
                            </table>

                            <p class="mt-3 font-weight-bold">Hora seleccionada: <span id="selected_hour" class="text-success"></span></p>

                        </div>
                    </div>
                </div>
                   
            </div>

            <button type="submit" name="add_product" class="btn btn-primary">Guardar</button>

        <?php
        form_close();
        ?> 
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    // Inicializar el calendario
    $("#inline_cal").datepicker({
        onSelect: function(dateText) {
            // Mostrar la fecha seleccionada
            $("#selected_date").text(dateText);
            
            // Aquí puedes agregar la lógica para saber que se ha seleccionado una fecha
            console.log("Fecha seleccionada: " + dateText);
        }
    });
});
</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>