<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <h1>Lista de Usuarios</h1>
            <?php if (isset($mensaje)) { ?>
                <div class="alert alert-success">
                    <?php echo $mensaje; ?></br>
                </div>
            <?php } ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Tipo de Usuario</th>
                        <th>Estatus</th>
                        <th>Acciones</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario){ ?>
                        <tr>
                            <td><?php echo $usuario['id']; ?></td>
                            <td><?php echo $usuario['nombre']; ?></td>
                            <td><?php echo $usuario['apellido_paterno'] . " " . $usuario['apellido_materno']; ?></td>
                            <td><?php echo $usuario['correo']; ?></td>
                            <td><?php echo $usuario['telefono']; ?></td>
                            <td><?php echo $usuario['tipo_usuario']; ?></td>
                            <td><?php echo $usuario['estatus']; ?></td>
                            <td>
                                <a href="<?= base_url('usuarios/mostrar/' . $usuario['id']) ?>" class="btn btn-info btn-sm" title="Ver">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="<?= base_url('usuarios/editar/' . $usuario['id']) ?>" class="btn btn-warning btn-sm 
                                    <?php if ($usuario['estatus'] != 'Activo'){ ?>disabled<?php } ?>"  title="Editar">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a href="<?= base_url('usuarios/desactivar/' . $usuario['id']) ?>" class="btn btn-danger btn-sm 
                                    <?php if ($usuario['estatus'] != 'Activo'){ ?>disabled<?php } ?>" title="Desactivar">
                                    <i class="fas fa-user-slash"></i>
                                </a>
                            </td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="<?php echo base_url(); ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Regresar
            </a>
        </div>
    </div>
</div>
