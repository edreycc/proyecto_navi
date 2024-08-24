<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Ejemplo</title>
    <!-- Vincula tu archivo CSS aquí -->
    <link rel="stylesheet" href="<?php echo base_url('adminlte/dist/css/dashboard.css'); ?>">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="sidebar">
        <h2>Mi Dashboard</h2>
        <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Usuarios</a></li>
            <li><a href="#">Configuración</a></li>
            <li><a href="#">Reportes</a></li>
            <li><a href="#">Salir</a></li>
        </ul>
    </div>

    <div class="main-content">
        <header>
            <h1>Bienvenido, Admin</h1>
            <!-- Aquí puedes agregar iconos de notificaciones, perfil, etc. -->
        </header>

        <section class="content">
            <div class="card">
                <h3>Tarjeta 1</h3>
                <p>Contenido de la tarjeta 1.</p>
            </div>
            <div class="card">
                <h3>Tarjeta 2</h3>
                <p>Contenido de la tarjeta 2.</p>
            </div>
            <div class="card">
                <h3>Tarjeta 3</h3>
                <p>Contenido de la tarjeta 3.</p>
            </div>
            <!-- Agrega más tarjetas o secciones según sea necesario -->
        </section>
    </div>
</body>
</html>



