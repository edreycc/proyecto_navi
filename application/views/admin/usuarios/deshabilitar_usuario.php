<!-- Begin Page Content -->
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Usuarios</h6>
    </div>


    <div class="card-body">
         <a href="<?php echo base_url() ;?>index.php/dashboardcontroller/listar" class="btn btn-primary btn-sm" style="margin-bottom: 10px;">
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
                   
                </tbody>

                
            </table>

        </div>
         
    </div>