<?php $row = $acta->fetch_assoc(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Acta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

<div class="card p-4">
    <h3>Editar Acta</h3>

    <form action="index.php?action=actualizar" method="POST">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">

        <input class="form-control mb-3" type="text" name="titulo" value="<?= $row['titulo'] ?>">
        <input class="form-control mb-3" type="date" name="fecha" value="<?= $row['fecha'] ?>">
        <textarea class="form-control mb-3" name="descripcion"><?= $row['descripcion'] ?></textarea>
        <input class="form-control mb-3" type="text" name="responsable" value="<?= $row['responsable'] ?>">
        <input class="form-control mb-3" type="text" name="estado" value="<?= $row['estado'] ?>">

        <button class="btn btn-success">Actualizar</button>
        <a href="index.php" class="btn btn-secondary">Volver</a>
    </form>
</div>

</body>
</html>