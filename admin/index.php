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
</main>

<?php
incluirTemplate('footer');
?>