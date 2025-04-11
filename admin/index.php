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

// Incluye template
require '../includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>
    <?php if ($resultado == '1') : ?>
        <p class="alerta success">Propriedad Creada Correctamente</p>
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
                        <a href="#" class="boton-rojo-block">Eliminar</a>
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