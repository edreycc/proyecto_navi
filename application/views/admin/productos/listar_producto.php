

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Productos</h6>
                        </div>


                        <div class="card-body">

                            <div class="table-responsive">

                                
                                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Celular</th>
                                            <th>Correo</th>
                                            <th>Dirección</th>
                                            <th>Modificar</th>
                                            <!-- <th>Habilitar</th> -->
                                            <th>Deshabilitar</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Celular</th>
                                            <th>Correo</th>
                                            <th>Dirección</th>
                                            <th>Modificar</th>
                                            <!-- <th>Habilitar</th> -->
                                            <th>Deshabilitar</th>
                                            
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php if (!empty($usuarios)): ?>
                                            <?php foreach ($usuarios->result() as $usuario): ?>
                                                <tr>
                                                    <td><?= $usuario->nombre; ?></td>
                                                    <td><?= $usuario->apellidos; ?></td>
                                                    <td><?= $usuario->celular; ?></td>
                                                    <td><?= $usuario->correo; ?></td>
                                                    <td><?= $usuario->direccion; ?></td>
                                                    
                                                    <!-- modificar -->
                                                    <td>              
                                                    <?php echo form_open_multipart('dashboardcontroller/modificarUsuario'); ?>
                                                    <input type="hidden" name="idusuario" value="<?php echo $usuario->id_usuario; ?>">
                                                    <button type="submit" name="buttony" class="btn btn-primary btn-small-custom" style="margin-bottom: 10px;"> 
                                                        <i class="fa-solid fa-pen"></i> 
                                                    </button>
                                                    <?php echo form_close(); ?>
                                                    </td>


                                                    <!-- <td>
                                                    <?php echo form_open_multipart(); ?>
                                                    <input type="hidden" name="idusuario" value="<?php echo $usuario->id_usuario; ?>">
                                                    <button type="submit" name="buttony" class="btn btn-success">
                                                    <i class="fa-solid fa-user-plus"></i>
                                                    </button>
                                                    <?php echo form_close(); ?>
                                                    </td> -->

  
                                                    <!-- deshablitar -->
                                                    <td>
                                                        
                                                    <?php echo form_open_multipart('dashboardcontroller/deshabilitarUsuarioBD'); ?>
                                                    <input type="hidden" name="idusuario" value="<?php echo $usuario->id_usuario; ?>">
                                                    <button type="submit" name="buttony"  class="btn btn-warning btn-small-custom">
                                                    <i class="fa-solid fa-user-large-slash"></i>
                                                    </button>
                                                    <?php echo form_close(); ?>
                                                    </td>
                                                    
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="8">No se encontraron usuarios.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>

                                    
                                </table>

                            </div>
                            <a href="<?php echo base_url() ;?>index.php/dashboardcontroller/deshabilitarUsuario " class="btn btn-primary btn-sm" style="margin-bottom: 10px;">
                                <i class="fa-solid fa-minus"></i>
                                    usuarios deshabilitados
                            </a>   
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
