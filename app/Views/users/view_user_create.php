<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-5">Alta de Usuarios</h1>
    <?php if (isset($errors) && is_array($errors)) { ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error) { ?>
                <?php echo $error; ?></br>
            <?php } ?>
        </div>
    <?php } ?>
</div>
<div class="row justify-content-center">
    <form action="<?php echo base_url(); ?><?php echo (isset($id_usuario) ? "usuarios/actualizar/$id_usuario" : "usuarios/guardar") ?>" method="post">
        <div class="col">
            <div class="form-row">
                <h4 class="my-0 fw-normal">Información del usuario</h4><br><br>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required value="<?php echo isset($usuario['nombre']) ? $usuario['nombre'] : ""; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="apellido_paterno">Apellido Paterno</label>
                    <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" required value="<?php echo isset($usuario['apellido_paterno']) ? $usuario['apellido_paterno'] : ""; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="apellido_materno">Apellido Materno</label>
                    <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" required value="<?php echo isset($usuario['apellido_materno']) ? $usuario['apellido_materno'] : ""; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="sexo">Sexo</label>
                    <select class="form-control" id="sexo" name="sexo" required>
                        <option value=""></option>
                        <option value="Femenino"  <?php echo isset($usuario['sexo']) ? ($usuario['sexo'] == "Femenino" ?  "selected" : "") : ""; ?>>Femenino</option>
                        <option value="Masculino" <?php echo isset($usuario['sexo']) ? ($usuario['sexo'] == "Masculino" ?  "selected" : "") : ""; ?>>Masculino</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="correo">Correo Electrónico</label>
                    <input type="mail" class="form-control" id="correo" name="correo" required value="<?php echo isset($usuario['correo']) ? $usuario['correo'] : ""; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono" required value="<?php echo isset($usuario['telefono']) ? $usuario['telefono'] : ""; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="tipo_usuario">Tipo de Usuario</label>
                    <select class="form-control" id="tipo_usuario" name="tipo_usuario" required>
                        <option value=""></option>
                        <?php foreach($tiposUsuario as $tipo){ var_dump($tipo)?>
                            <option value="<?php echo $tipo['id']; ?>" <?php echo isset($usuario['id_tipo_usuario']) ? ($usuario['id_tipo_usuario'] == $tipo['id'] ?  "selected" : "") : ""; ?>><?php echo $tipo['tipo']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="form-row">
                <h4 class="my-0 fw-normal">Dirección</h4><br><br>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="codigo_postal">Código Postal</label>
                    <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" required value="<?php echo isset($usuario['codigo_postal']) ? $usuario['codigo_postal'] : ""; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="colonia">Colonia</label>
                    <select  class="form-control" id="colonia" name="colonia" required>
                        <?php if(isset($usuario['colonia'])){ ?>
                            <option value="<?php echo $usuario['colonia']; ?>"><?php echo $usuario['colonia']; ?></option>
                        <?php }else{ ?>
                            <option value="">Selecciona una colonia</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="municipio">Delegación/Municipio</label>
                    <select  class="form-control" id="municipio" name="municipio" required>
                        <?php if(isset($usuario['municipio'])){ ?>
                            <option value="<?php echo $usuario['municipio']; ?>"><?php echo $usuario['municipio']; ?></option>
                        <?php }else{ ?>
                            <option value="">Selecciona un municipio</option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="estado">Estado</label>
                    <select  class="form-control" id="estado" name="estado" required>
                        <?php if(isset($usuario['estado'])){ ?>
                            <option value="<?php echo $usuario['estado']; ?>"><?php echo $usuario['estado']; ?></option>
                        <?php }else{ ?>
                            <option value="">Selecciona un estado</option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col">
            <button type="submit" class="btn btn-lg btn-primary">Guardar</button>
        </div>
    </form>
</div>

<script src="<?php echo base_url('assets/js/script.js') ?>"></script>