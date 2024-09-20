

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url() ;?>index.php/dashboardcontroller ">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url() ;?>index.php/dashboardcontroller ">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
           
                <a class="nav-link collapsed" href="<?php echo base_url() ;?>index.php/dashboardcontroller/listar "  
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="far fa-address-card"></i>
                    <span>Clientes</span>
                </a>
                <?php echo form_close(); ?>   
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#"  
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa-brands fa-product-hunt"></i>
                    <span>Productos</span>
                </a>
               
            </li>

            

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" 
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fa-solid fa-house-laptop"></i>
                    <span>Servicos</span>
                </a>
               
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Ventas</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Resportes</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    
                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">hola <?php echo $this->session->userdata('nombre');?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Usuarios</h6>
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
                                                    <button type="submit" name="buttony" class="btn btn-primary" style="margin-bottom: 10px;"> 
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
                                                    <?php echo form_open_multipart(); ?>
                                                    <input type="hidden" name="idusuario" value="<?php echo $usuario->id_usuario; ?>">
                                                    <button type="submit" name="buttony" class="btn btn-warning" style="margin-bottom: 10px;">
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

            </div>
            <!-- End of Main Content -->

            

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

  



</body>

</html>