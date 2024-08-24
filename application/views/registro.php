<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Usuarios</title>
    <!-- Vincula los estilos de Bootstrap -->

    <link rel="stylesheet" href="<?php echo base_url('adminlte/dist/css/login.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('adminlte/dist/css/login.css'); ?>">

</head>


<body class="bg-dark">
    <div class="row g-0">
        <div class="col-lg-7">
            <div class="logo-tipo">
                <!-- <img src="<?php echo base_url('adminlte/dist/img/logotipo-navi.jpeg'); ?>" alt="" class="logo">            -->
            </div>
        </div>
        <div class="col-lg-5">
            <br>
            <div class="px-lg5 py-lg-4 p-4">
                <h4 class="font-weight-bold mb-4">Registro de usuarios</h4>


                <form action="<?= site_url('usuarios/registroUsuarioDB') ?>" method="post">
                    <div class="mb-2">
                        <div class="row">
                            <div class="col-lg-5">
                                <label for="" class="form-label"> Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="" aria-describedby="helpId"
                                    placeholder="nombre">

                            </div>
                            <div class="col-lg-5">
                                <label for="" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos" id="" aria-describedby="helpId"
                                    placeholder="apellidos">

                            </div>
                        </div>
                    </div>

                    <div class="mb-2">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="" class="form-label">Correo</label>
                                <input type="email" class="form-control" name="correo" id="" aria-describedby="helpId"
                                    placeholder="correo">

                            </div>
                            <div class="col-lg-4">
                                <label for="" class="form-label">Nro.Celular</label>
                                <input type="text" class="form-control" name="celular" id="" aria-describedby="helpId"
                                    placeholder="celular">

                            </div>

                        </div>
                    </div>

                    <div class="mb-2">
                        <div class="row">
                            <div class="col-lg-5">

                                <label for="" class="form-label">Dirección</label>
                                <input type="text" class="form-control" name="direccion" id="" aria-describedby="helpId"
                                    placeholder="direccion">
                            </div>
                            <div class="col-lg-5">

                                <label for="" class="form-label">Login</label>
                                <input type="text" class="form-control" name="login" id="" aria-describedby="helpId"
                                    placeholder="login">
                            </div>
                        </div>
                    </div>

                    <div class="mb-2">
                        <div class="row">
                            <div class="col-lg-10">

                                <label for="" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id=""
                                    aria-describedby="helpId" placeholder="password">
                            </div>

                        </div>
                    </div>
                    <input class="btn btn-warning" type="submit" value="Registrar">
                </form>
                <br>

                <!-- <a href="<?php echo base_url(); ?>index.php/usuarios/registro">
                    <button type="button" class="btn btn-warning">Registrar</button>
                </a>
                <a href="<?php echo base_url(); ?>index.php/usuarios/">
                    <button type="submit" class="btn btn-success">Volver</button>
                </a> -->
            </div>
            <br>
        </div>
    </div>
</body>




<!-- Vincula los scripts de Bootstrap -->

<script src="<?php echo base_url('bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>