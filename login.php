<?php
require 'includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <form action="formulario">
        <fieldset>
            <legend>Iniciar Sesión</legend>
            <label for="email">Email</label>
            <input type="email" id="email" placeholder="Tu Email" required>

            <label for="password">Contraseña</label>
            <input type="password" id="password" placeholder="Tu Contraseña" required>
        </fieldset>
        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>