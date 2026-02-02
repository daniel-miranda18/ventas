<?php require_once 'Views/Templates/header.php'; ?>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Dashboard
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nick</th>
                        <th>Nombre</th>
                        <th>Caja</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['usuarios'] as $u) { ?>
                    <tr>
                        <td><?= $u['id_usuario'] ?></td>
                        <td><?= $u['nick'] ?></td>
                        <td><?= $u['nombre'] ?></td>
                        <td><?= $u['id_caja'] ?></td>
                        <td><?= $u['usuario_estado'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php require_once 'Views/Templates/footer.php'; ?>
                    