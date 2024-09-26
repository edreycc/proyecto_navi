

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Productos</h6>
                        </div>


                        <div class="card-body">

                            <div class="table-responsive">

                              <a href="<?php echo base_url() ;?>index.php/productocontroller/agregarProducto" class="btn btn-success btn-sm" style="margin-bottom: 10px;">
                                <i class="fa fa-plus"></i>
                                Agregar producto
                              </a>

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>marca</th>
                                            <th>Proveedor</th>
                                            <th>Categoria</th>
                                            <th>Stock</th>
                                            <th>Precio</th>
                                            <!-- <th>Habilitar</th> -->
                                            <th>Modificar</th>
                                            <th>Eliminar</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Nombre</th>
                                            <th>marca</th>
                                            <th>Proveedor</th>
                                            <th>Categoria</th>
                                            <th>Stock</th>
                                            <th>Precio</th>
                                            
                                            <!-- <th>Habilitar</th> -->
                                            <th>Modificar</th>
                                            <th>Eliminar</th>
                                            
                                            
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php if (!empty($productos->result())): ?>
                                            <?php foreach ($productos->result() as $producto): ?>
                                                <tr>
                                                    <td><?= $producto->nombre; ?></td>
                                                    <td><?= $producto->marca; ?></td>
                                                    <td><?= $producto->prov_nombre; ?></td>
                                                    <td><?= $producto->cat_nombre; ?></td>
                                                    <td><?= $producto->stock; ?></td>
                                                    <td><?= $producto->precio; ?></td>
                                                    
                                                    
                                                    <!-- modificar -->
                                                    <td>              
                                                    <?php echo form_open_multipart(''); ?>
                                                    <input type="hidden" name="idusuario" value="<?php echo $producto->id_producto; ?>">
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

  
                                                    <!-- eliminar -->
                                                    <!-- <td>
                                                        
                                                    <?php echo form_open_multipart(); ?>
                                                    <input type="hidden" name="idusuario" value="<?php echo $usuario->id_usuario; ?>">
                                                    <button type="submit" name="buttony"  class="btn btn-warning btn-small-custom">
                                                    <i class="fa-solid fa-user-large-slash"></i>
                                                    </button>
                                                    <?php echo form_close(); ?>
                                                    </td> -->
                                                    
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
                    </div>

                </div>
                <!-- /.container-fluid -->
