<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Servicios</h6>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <a href="<?php echo base_url(); ?>index.php/serviciocontroller/agregar" class="btn btn-success btn-sm" style="margin-bottom: 10px;">
                    <i class="fa fa-plus"></i>
                    Agregar servicio
                </a>

                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            
                            <th>Precio</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                           
                            <th>Precio</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php if (!empty($servicios->result())): ?>
                            <?php foreach ($servicios->result() as $servicio): ?>
                                <tr>
                                    <td><?= $servicio->nombre; ?></td>
                                    <td><?= $servicio->descripcion; ?></td> 
                                    <td><?= $servicio->precio; ?></td>

                                    <!-- Modificar -->
                                    <td class="text-center">
                                        <?php echo form_open_multipart('serviciocontroller/modificarServicio'); ?>
                                        <input type="hidden" name="idservicio" value="<?php echo $servicio->id_servicio; ?>">
                                        <button type="submit" name="buttony" class="btn btn-primary btn-small-custom" style="margin-bottom: 10px;"> 
                                            <i class="fa-solid fa-pen"></i> 
                                        </button>
                                        <?php echo form_close(); ?>
                                    </td>

                                    <td class="text-center">
                                        <?php echo form_open_multipart('serviciocontroller/eliminarServicioBD', ['id' => 'deleteForm']); ?>
                                        <input type="hidden" name="idservicio" value="<?php echo $servicio->id_servicio; ?>">
                                        <button type="button" class="btn btn-danger btn-small-custom" data-toggle="modal" data-target="#confirmModal">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        <?php echo form_close(); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6">No se encontraron servicios.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Modal de Confirmación -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirmación de Eliminación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar este servicio?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Eliminar</button>
            </div>
        </div>
    </div>
</div>
