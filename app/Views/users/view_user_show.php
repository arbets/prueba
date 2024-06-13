<div class="row row-cols-2 row-cols-md-2 mb-2 justify-content-center">
    <div class="col">
        <div class="card">
            <div class="card-header text-center">
                <h4 class="my-0 fw-normal">Detalles del Usuario</h4>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $usuario['nombre'] . " " . $usuario['apellido_paterno'] . " " . $usuario['apellido_materno']; ?></h5>

                <p class="card-text">
                    <strong>Correo electrónico:</strong> <?php echo $usuario['correo']; ?><br>
                    <strong>Teléfono:</strong> <?php  echo $usuario['telefono']; ?><br>
                    <strong>Tipo de usuario:</strong> <?php  echo $usuario['tipo_usuario']; ?><br>
                    <strong>Estatus:</strong> <span class="badge badge-<?php echo ($usuario['estatus'] == 'Activo') ? 'success' : 'danger' ?>"><?php echo $usuario['estatus']; ?></span>
                </p>

                <h6 class="card-subtitle mb-2">Dirección</h6>
                <p class="card-text">
                    <?php  echo $usuario['codigo_postal'] . ", " . $usuario['colonia']; ?><br>
                    <?php  echo $usuario['municipio'] . ", " . $usuario['estado']; ?>
                </p>
            </div>
        </div>
        <div class="card">
            <br><a href="<?php echo base_url(); ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Inicio
            </a>
        </div>
    </div>
</div>