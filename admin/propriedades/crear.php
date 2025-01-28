<?php
require '../../includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Crear</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <form action="" class="formulario">
        <fieldset>
            <legend>Informacion General</legend>

            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" placeholder="Titulo Propiedad">

            <label for="precio">Precio:</label>
            <input type="number" id="precio" placeholder="Precio Propiedad" min="1">

            <label for="imagen">Imagen:</label>
            <input type="file" id="precio" accept="image/jpeg, image/png">

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion"></textarea>
        </fieldset>

        <fieldset>
            <legend>Información Propriedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="Habitaciones" placeholder="Ej: 3" min="1">

            <label for="wc">Baños:</label>
            <input type="number" id="wc" placeholder="Ej: 1" min="0">

            <label for="garaje">Garaje:</label>
            <input type="number" id="garaje" placeholder="Ej: 1" min="0">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select>
                <option value="1">Ruan</option>
                <option value="2">Nicolas</option>
                <option value="3">Alex</option>
            </select>
        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>