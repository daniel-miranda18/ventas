<?php require_once 'Views/Templates/header.php'; ?>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Categorías
            </div>
        </div>
        <div class="card-body">
            <button class="btn btn-success btn-sm" type="button" onclick="frmCategoria()"> <i class="fas fa-plus"></i> Nueva Categoría</button>
            <table class="table" id="tblCategorias">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre Categoría</th>
                        <th>Código SIN</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="modal fade" id="categoriaModal" tabindex="-1" aria-labelledby="categoriaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Nueva Categoría</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmCategoria">
                        <input type="hidden" id="id_categoria" name="id_categoria">
                        <div class="form-group">
                            <label for="nombre_categoria" class="col-form-label">Nombre Categoría:</label>
                            <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria">
                        </div>
                        <div class="form-group">
                            <label for="codigoProductoSin" class="col-form-label">Código SIN:</label>
                            <input type="number" class="form-control" id="codigoProductoSin" name="codigoProductoSin">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnAccion" onclick="registrarCategoria()">Guardar</button>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'Views/Templates/footer.php'; ?>