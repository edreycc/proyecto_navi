<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pruebas de Reserva</title>
</head>
<body>

    <h1>Prueba de Reserva</h1>

    <!-- Mostrar los mensajes de error si existen -->
    <?php if ($this->session->userdata('error')): ?>
        <div class="alert alert-danger">
            <?php echo $this->session->userdata('error'); ?>
        </div>
        
    <?php endif; ?>

    <!-- Formulario de prueba -->
    <form action="<?php echo base_url('cliente/procesarReserva'); ?>" method="post">
        <label for="fechaReserva">Fecha de Reserva:</label>
        <input type="date" id="fechaReserva" name="fechaReserva">
        <br><br>
        <button type="submit">Enviar</button>
    </form>

</body>
</html>
