<?php require_once 'Views/Templates/header.php'; ?>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Medidas
            </div>
        </div>
        <div class="card-body">
            <button class="btn btn-success btn-sm" type="button" onclick="frmMedida()"> <i class="fas fa-plus"></i> Nueva Medida</button>
            <table class="table" id="tblMedidas">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>U. Medida</th>
                        <th>Abreviatura</th>
                        <th>Medida SIN</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="modal fade" id="medidaModal" tabindex="-1" aria-labelledby="medidaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Nueva Medida</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmMedida">
                        <input type="hidden" id="id_medida" name="id_medida">
                        <div class="form-group">
                            <label for="descripcion_medida" class="col-form-label">Unidad de Medida:</label>
                            <input type="text" class="form-control" id="descripcion_medida" name="descripcion_medida">
                        </div>
                        <div class="form-group">
                            <label for="descripcion_corta" class="col-form-label">Abreviatura:</label>
                            <input type="text" class="form-control" id="descripcion_corta" name="descripcion_corta" maxlength="5">
                        </div>
                        <div class="form-group">
                            <label for="codigoMedidaSin" class="col-form-label">Código Medida SIN:</label>
                            <input type="number" class="form-control" id="codigoMedidaSin" name="codigoMedidaSin">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnAccion" onclick="registrarMedida()">Guardar</button>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'Views/Templates/footer.php'; ?>