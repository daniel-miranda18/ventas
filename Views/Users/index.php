<?php require_once 'Views/Templates/header.php'; ?>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Usuarios
            </div>
        </div>
        <div class="card-body">
            <button class="btn btn-success btn-sm" type="button" onclick="frmUsuario()"> <i class="fas fa-plus"></i> Nuevo Usuario</button>
            <table class="table" id="tblUsuarios">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nick</th>
                        <th>Nombre</th>
                        <th>Caja</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="modal fade" id="usuarioModal" tabindex="-1" aria-labelledby="usuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Nuevo Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmUsuario">
                        <input type="hidden" id="id_usuario" name="id_usuario">
                        <div class="form-group">
                            <label for="nick" class="col-form-label">Nick:</label>
                            <input type="text" class="form-control" id="nick" name="nick">
                        </div>
                        <div class="form-group">
                            <label for="nombre" class="col-form-label">Nombre Completo:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <div class="form-group" id="div_clave">
                            <label for="clave" class="col-form-label">Contraseña:</label>
                            <input type="password" class="form-control" id="clave" name="clave">
                        </div>
                        <div class="form-group" id="div_confirmar">
                            <label for="confirmar" class="col-form-label">Confirmar contraseña:</label>
                            <input type="password" class="form-control" id="confirmar" name="confirmar">
                        </div>
                        <div class="form-group">    
                            <label for="id_caja" class="col-form-label">Caja:</label>
                            <select name="id_caja" id="id_caja" class="form-control">
                                <?php foreach ($data['caja'] as $c) { ?>
                                    <option value="<?= $c['id_caja'] ?>"><?= $c['nombre_caja'] ?></option>
                                <?php } ?>  
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnAccion" onclick="registrar()">Guardar</button>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'Views/Templates/footer.php'; ?>