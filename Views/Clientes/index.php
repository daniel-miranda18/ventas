<?php require_once 'Views/Templates/header.php'; ?>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Clientes
            </div>
        </div>
        <div class="card-body">
            <button class="btn btn-success btn-sm" type="button" onclick="frmCliente()"> <i class="fas fa-plus"></i> Nuevo Cliente</button>
            <table class="table" id="tblClientes">
                <thead>
                    <tr>
                        <th>Razón Social</th>
                        <th>Tipo Doc.</th>
                        <th>CI/NIT</th>
                        <th>Complemento</th>
                        <th>Correo electrónico</th>
                        <th>Estado</th>
                        <th>Accione</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="modal fade" id="clienteModal" tabindex="-1" aria-labelledby="clienteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Nuevo Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmCliente">
                        <input type="hidden" id="id_cliente" name="id_cliente">
                        <div class="form-group">
                            <label for="razon_social" class="col-form-label">Razón Social:</label>
                            <input type="text" class="form-control" id="razon_social" name="razon_social">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="documentoid" class="col-form-label">CI/NIT:</label>
                                    <input type="text" class="form-control" id="documentoid" name="documentoid">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="complementoid" class="col-form-label">Complemento:</label>
                                    <input type="text" class="form-control" id="complementoid" name="complementoid">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tipo_documento" class="col-form-label">Tipo de Documento:</label>
                            <select class="form-control" id="tipo_documento" name="tipo_documento">
                                <option value="">Seleccionar...</option>
                                <option value="1">CI - Cédula de Identidad</option>
                                <option value="0">NIT - Número de Identificación Tributaria</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cliente_email" class="col-form-label">Email de Cliente:</label>
                            <input type="email" class="form-control" id="cliente_email" name="cliente_email">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnAccion" onclick="registrarCliente()">Guardar</button>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'Views/Templates/footer.php'; ?>