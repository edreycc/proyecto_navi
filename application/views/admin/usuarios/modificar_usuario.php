<div class="container-fluid">

    <!-- Encabezado de la Página -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Modificar Usuario</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="users.php?do=Update">
                <input type="hidden" name="user_id" value="">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_first_name">Nombre</label>
                            <input type="text" class="form-control" value="" placeholder="Nombre" name="user_first_name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_last_name">Apellidos</label>
                            <input type="text" class="form-control" value="" placeholder="Apellidos" name="user_last_name" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_phone">Celular</label>
                            <input type="text" class="form-control" value="" placeholder="Celular" name="user_phone" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_email">Correo Electrónico</label>
                            <input type="email" class="form-control" value="" placeholder="Correo Electrónico" name="user_email" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_address">Dirección</label>
                            <input type="text" class="form-control" value="" placeholder="Dirección" name="user_address" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_login">Login</label>
                            <input type="text" class="form-control" value="" placeholder="Login" name="user_login" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_password">Contraseña</label>
                            <input type="password" class="form-control" placeholder="Contraseña" name="user_password">
                            <small class="form-text text-muted">Deja este campo vacío si no deseas cambiar la contraseña.</small>
                        </div>
                    </div>
                </div>

                <!-- BOTÓN DE ENVÍO -->

                <button type="submit" name="update_user" class="btn btn-primary">Actualizar Usuario</button>

            </form>

        </div>
    </div>
</div>
