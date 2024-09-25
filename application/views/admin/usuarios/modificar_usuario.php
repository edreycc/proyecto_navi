<div class="container-fluid">

    <!-- Encabezado de la Página -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            
        <a href="<?php echo base_url() ;?>index.php/dashboardcontroller/listar" class="btn btn-primary btn-sm" style="margin-bottom: 10px;">
         <i class="fa-solid fa-left-long"></i>               
        </a> 

            <h6 class="m-0 font-weight-bold text-primary">Modificar Usuario</h6>
        </div>
        <div class="card-body">
            
        <?php
        echo form_open_multipart('dashboardcontroller/modificarUsuarioBD');
        ?>
            <input type="hidden" name="idusuario" value="<?php echo $infousuario->id_usuario; ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_first_name">Nombre</label>
                            <input type="text" class="form-control" value="<?php echo $infousuario->nombre; ?>" placeholder="Nombre" name="nombre" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_last_name">Apellidos</label>
                            <input type="text" class="form-control" value="<?php echo $infousuario->apellidos; ?>" placeholder="Apellidos" name="apellidos" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_phone">Celular</label>
                            <input type="text" class="form-control" value="<?php echo $infousuario->celular; ?>" placeholder="Celular" name="celular" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_email">Correo Electrónico</label>
                            <input type="email" class="form-control" value="<?php echo $infousuario->correo; ?>" placeholder="Correo Electrónico" name="correo" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_address">Dirección</label>
                            <input type="text" class="form-control" value="<?php echo $infousuario->direccion; ?>" placeholder="Dirección" name="direccion" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_login">Login</label>
                            <input type="text" class="form-control" value="<?php echo $infousuario->login; ?>" placeholder="Login" name="login" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_password">Contraseña</label>
                            <input type="password" class="form-control" placeholder="Contraseña" name="password">
                            <small class="form-text text-muted">Deja este campo vacío si no deseas cambiar la contraseña.</small>
                        </div>
                    </div>
                </div>

                <button type="submit" name="update_user" class="btn btn-primary">Actualizar Usuario</button>

            <?php
            form_close();
            ?> 
        </div>
    </div>
</div>

