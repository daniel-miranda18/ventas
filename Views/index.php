<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
</head>
<body>
    <h1>Vista 1 Usuarios</h1>

    <?php if(!empty($usuarios)){ ?>
        <?php foreach($usuarios as $u){ ?>
            <?= $u['nick'] ?><br>
        <?php } ?>
    <?php }else{ ?>
        No hay usuarios
    <?php } ?>
</body>
</html>
