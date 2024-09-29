<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Botón Atrás -->
    <a href="<?php echo base_url(); ?>index.php/serviciocontroller/listar" class="btn btn-secondary" style="margin-bottom: 10px;">
        <i class="fa-solid fa-left-long"></i>
        Atrás
    </a>

    <!-- Formulario para Agregar Servicio -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Agregar Servicio</h6>
        </div>

        <div class="card-body">
            <?php echo form_open_multipart('serviciocontroller/agregarServicioBD'); ?>

            <div class="form-group">
                <label for="nombre">Nombre del Servicio</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
            </div>

            <button type="submit" class="btn btn-primary">Agregar Servicio</button>
            <?php echo form_close(); ?>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
