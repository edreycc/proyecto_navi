<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Botón Atrás -->
    <a href="<?php echo base_url(); ?>index.php/serviciocontroller/listar" class="btn btn-secondary" style="margin-bottom: 10px;">
        <i class="fa-solid fa-left-long"></i>
        Atrás
    </a>

    <!-- Formulario para Modificar Servicio -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Modificar Servicio</h6>
        </div>

        <div class="card-body">
            <?php echo form_open_multipart('serviciocontroller/modificarServicioBD'); ?>

            <input type="hidden" name="id_servicio" value="<?= $servicio->id_servicio; ?>">

            <div class="form-group">
                <label for="nombre">Nombre del Servicio</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $servicio->nombre; ?>" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?= $servicio->descripcion; ?></textarea>
            </div>

            <div class="form-group">
                <label for="duracion">Duración (minutos)</label>
                <input type="number" class="form-control" id="duracion" name="duracion" value="<?= $servicio->duracion; ?>" required>
            </div>

            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" value="<?= $servicio->precio; ?>" step="0.01" required>
            </div>

            <button type="submit" class="btn btn-primary">Modificar Servicio</button>
            <?php echo form_close(); ?>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
