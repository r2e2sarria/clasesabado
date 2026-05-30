<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Actas SENA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .navbar { background-color: #39A900; }
        .navbar-brand { color: white; font-weight: bold; }
    </style>
</head>

<body>

<nav class="navbar">
    <div class="container">
        <span class="navbar-brand">🟢 Sistema de Actas SENA</span>
    </div>
</nav>

<div class="container mt-4">

    <div class="card p-4 mb-4">
        <h4>Listado de Actas</h4>

        <table class="table table-hover">
            <thead style="background:#39A900; color:white;">
                <tr>
                    <th>Título</th>
                    <th>Fecha</th>
                    <th>Responsable</th>
                    <th>PDF</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php while($row = $actas->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['titulo'] ?></td>
                    <td><?= $row['fecha'] ?></td>
                    <td><?= $row['responsable'] ?></td>

                    <td>
                        <?php if(!empty($row['archivo'])): ?>
                            <a href="ver_pdf.php?id=<?= $row['id'] ?>" target="_blank" class="btn btn-success btn-sm">
                                📄 Ver PDF
                            </a>
                        <?php else: ?>
                            <span class="text-danger">Sin PDF</span>
                        <?php endif; ?>
                    </td>

                    <td>
                        <a href="index.php?action=eliminar&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <div class="card p-4">
        <h4>Crear Acta</h4>

        <form action="index.php?action=crear" method="POST" enctype="multipart/form-data">

            <input class="form-control mb-3" type="text" name="titulo" placeholder="Título" required>
            <input class="form-control mb-3" type="date" name="fecha" required>

            <textarea class="form-control mb-3" name="descripcion" placeholder="Descripción"></textarea>

            <!-- SELECT RESPONSABLE -->
            <select class="form-control mb-3" name="responsable" required>
                <option value="">Seleccione responsable</option>
                <?php while($resp = $responsables->fetch_assoc()): ?>
                    <option value="<?= $resp['nombre'] ?>">
                        <?= $resp['nombre'] ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <!-- AGREGAR NUEVO -->
            <input class="form-control mb-2" type="text" id="nuevoResponsable" placeholder="Nuevo responsable">
            <button type="button" class="btn btn-secondary mb-3" onclick="agregarResponsable()">Agregar Responsable</button>

            <input class="form-control mb-3" type="text" name="estado" placeholder="Estado">

            <label>Subir PDF:</label>
            <input class="form-control mb-3" type="file" name="archivo" accept="application/pdf">

            <button class="btn btn-success">Guardar Acta</button>
        </form>
    </div>

</div>

<script>
function agregarResponsable() {
    let nombre = document.getElementById("nuevoResponsable").value;

    if(nombre == "") {
        alert("Escribe un nombre");
        return;
    }

    fetch("index.php?action=guardarResponsable", {
        method: "POST",
        headers: {"Content-Type": "application/x-www-form-urlencoded"},
        body: "nombre=" + nombre
    })
    .then(() => {
        alert("Responsable agregado");
        location.reload();
    });
}
</script>

</body>
</html>