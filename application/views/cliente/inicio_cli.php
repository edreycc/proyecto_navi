<link rel="stylesheet" href="<?php echo base_url();?>assets/css/card.css">

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Servicios</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <?php if (!empty($servicios->result())): ?>
            <?php foreach ($servicios->result() as $servicio): ?>
                <div class="col-md-3 mb-4"> 
                <a href="<?= site_url('DashboardControllerUser/reservar/' . $servicio->id_servicio); ?>" class="card-link">
                        <div class="card text-center border-0 shadow rounded-0 p-4" style="max-width: 22rem;">
                            <div class="icon">
                                <i class="fa-solid fa-scissors"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?= $servicio->nombre; ?></h5>
                                <p class="card-text"><?= $servicio->descripcion; ?></p>
                                <p class="precio fw-bold">BS<?= $servicio->precio; ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No se encontraron servicios.</p>
        <?php endif; ?>
    </div>
</div>

