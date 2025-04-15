<?php

// Importar la conexión a la base de datos
require '../includes/config/database.php';
$db = conectarDB();

// Escribir el Query
$query = "SELECT * FROM propriedades";

// Consultar la base de datos
$resultadoConsulta = mysqli_query($db, $query);

// Muestra mensajes condicional
$resultado = $_GET['resultado'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if ($id) {
        // Eliminar el archivo
        $query = "SELECT imagen FROM propriedades WHERE id = $id";
        $resultado = mysqli_query($db, $query);
        $propriedad = mysqli_fetch_assoc($resultado);
        unlink('../imagenes/' . $propriedad['imagen']);

        // Eliminar la propriedad
        $query = "DELETE FROM propriedades WHERE id = $id";
        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            header('Location: /admin?resultado=3');
        }
    }
}

// Incluye template
require '../includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>
    <?php if ($resultado == '1') : ?>
        <p class="alerta success">Propriedad Creada Correctamente</p>
    <?php elseif ($resultado == '2') : ?>
        <p class="alerta success">Propriedad Actualizada Correctamente</p>
    <?php elseif ($resultado == '3') : ?>
        <p class="alerta success">Propriedad Eliminada Correctamente</p>
    <?php endif; ?>

    <a href="/admin/propriedades/crear.php" class="boton boton-verde">Nueva Propriedad</a>

    <table class="propriedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> <!-- Mostrar los resultados -->
            <?php while ($propriedades = mysqli_fetch_assoc($resultadoConsulta)) : ?>
                <tr>
                    <td><?php echo $propriedades['id']; ?></td>
                    <td><?php echo $propriedades['titulo']; ?></td>
                    <td><img src="../imagenes/<?php echo $propriedades['imagen']; ?>" class="imagen-tabla"></td>
                    <td><?php echo $propriedades['precio']; ?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propriedades['id']; ?>">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/admin/propriedades/actualizar.php?id=<?php echo $propriedades['id']; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>

<?php
// Cierra la conexión a la base de datos
mysqli_close($db);
incluirTemplate('footer');
?>