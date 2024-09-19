<link rel="stylesheet" href="<?php echo base_url();?>assets/css/login.css">


<script src="<?php echo base_url('bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>




<body class="bg-dark">
    <div class="row g-0">
        <div class="col-lg-7">
            <div class="logo-tipo">
                <!-- <img src="<?php echo base_url('adminlte/dist/img/logotipo-navi.jpeg'); ?>" alt="" class="logo">            -->
            </div>
        </div>
        <div class="col-lg-5">
            <br><br>
            <div class="px-lg5 py-lg-4 p-4">
                <h3 class="font-weight-bold mb-4">Ingreso de usuarios</h3>

                <?php
                echo form_open_multipart("usuarios/validarusuario");
                ?>
                <div class="mb-3">


                    <label for="" class="form-label">Escribi login</label>
                    <input type="text" class="form-control" name="correo" id="" aria-describedby="helpId"
                        placeholder="login">

                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Escribi password</label>
                    <input type="password" class="form-control" name="password" id="" aria-describedby="helpId"
                        placeholder="password">
                </div>
                <!-- </form> -->
                <!-- <input type="text" class="form-control" name="login" placeholder="Escribe login" required>
                    <input type="password" class="form-control" name="password" placeholder="Escribe password" required> -->

                <button type="submit" class="btn btn-success">Ingresar</button>
                <?php
                echo form_close();
                ?>
                <a href="<?php echo base_url(); ?>index.php/usuarios/registro">
                    <button type="button" class="btn btn-warning">Registrar</button>
                </a>


            </div>
            <br>
        </div>
    </div>
</body>