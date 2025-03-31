<?php

$resultado = $_GET['resultado'] ?? null;
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

        <tbody>
            <tr>
                <td>1</td>
                <td>Casa en la Playa</td>
                <td><img src="../imagenes/36a36158f1eec067e8925f1c908d511a.jpg" class="imagen-tabla"></td>
                <td>120000€</td>
                <td>
                    <a href="#" class="boton-rojo-block">Eliminar</a>
                    <a href="#" class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
        </tbody>
    </table>
</main>

<?php
incluirTemplate('footer');
?>