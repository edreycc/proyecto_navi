<!-- Begin Page Content -->
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Usuarios</h6>
    </div>


    <div class="card-body">

         <a href="<?php echo base_url() ;?>index.php/dashboardcontroller/listar" class="btn btn-primary btn-sm btn-small-custom ">
         <i class="fa-solid fa-left-long"></i>       
        </a>  

        <div class="table-responsive">

             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>

                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Celular</th>
                        <th>Correo</th>
                        <th>Dirección</th>
                        <th>Habilitar</th>      
                    </tr>

                </thead>
                <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Celular</th>
                        <th>Correo</th>
                        <th>Dirección</th>
                        <th>Habilitar</th>

                        
                        
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
                                                    <?php echo form_open_multipart('dashboardcontroller/habilitarUsuarioBD'); ?>
                                                    <input type="hidden" name="idusuario" value="<?php echo $usuario->id_usuario; ?>">
                                                    <button type="submit" name="buttony"  class="btn btn-warning btn-small-custom">
                                                    <i class="fa-solid fa-user-plus"></i>
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
         
    </div>