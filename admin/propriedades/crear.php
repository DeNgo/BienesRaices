<?php

require '../../includes/config/database.php';
$db = conectarDB();

// Consultar para obtener los vendedores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

// Arreglo com mensajes de errores 
$errores = [];

$titulo        = "";
$precio        = "";
$descripcion   = "";
$habitaciones  = "";
$wc            = "";
$estacionamiento = "";
$vendedorId    = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $titulo        = $_POST['titulo'];
    $precio        = $_POST['precio'];
    $descripcion   = $_POST['descripcion'];
    $habitaciones  = $_POST['habitaciones'];
    $wc            = $_POST['wc'];
    $estacionamiento = $_POST['estacionamiento'];
    $vendedorId    = $_POST['vendedorId'];

    if (!$titulo) {
        $errores[] = "Debes añadir un título";
    }
    if (!$precio) {
        $errores[] = "Debes añadir un Precio";
    }
    if (!$descripcion) {
        $errores[] = "Debes añadir una descripción";
    }
    if (!$habitaciones) {
        $errores[] = "Debes añadir las habitaciones";
    }
    if (!$wc) {
        $errores[] = "Debes añadir el numero de baños";
    }
    if (!$estacionamiento) {
        $errores[] = "Debes añadir el numero de estacionamientos";
    }
    if (!$vendedorId) {
        $errores[] = "Elige un vendedor";
    }


    $imagen = '';
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $carpetaImagenes = '../../imagenes/';

        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes, 0755, true);
        }

        $nombreImagen = $_FILES['imagen']['name'];
        $tmpImagen    = $_FILES['imagen']['tmp_name'];
        $imagenDestino = $carpetaImagenes . $nombreImagen;

        if (move_uploaded_file($tmpImagen, $imagenDestino)) {
            $imagen = $nombreImagen;
        }
    }
    if (empty($errores)) {
        $query = "INSERT INTO propriedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, imagen, vendedores_id)
                VALUES ('$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$imagen', '$vendedorId')";

        $resultado = mysqli_query($db, $query);
        if ($resultado) {
            echo "Registro insertado correctamente.";
        } else {
            echo "Error: " . mysqli_error($db);
        }
    }
}



require '../../includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Crear</h1>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>


    <a href="/admin" class="boton boton-verde">Volver</a>

    <form class="formulario" method="POST" action="crear.php" enctype="multipart/form-data">
        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Título Propiedad" value="<?php echo $titulo; ?>">

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" min="1" value="<?php echo $precio; ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Información Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" value="<?php echo $habitaciones; ?>">

            <label for="wc">Baños:</label>
            <input type="number" id="wc" name="wc" placeholder="Ej: 1" min="0" value="<?php echo $wc; ?>">

            <label for="estacionamiento">Garaje:</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 1" min="0" value="<?php echo $estacionamiento; ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedorId">
                <option value="" disabled selected>-- Seleccione --</option>
                <?php while($row = mysqli_fetch_assoc($resultado)) : ?>
                    <option <?php echo $vendedorId === $row['id'] ? 'selected' : ''; ?> value="<?php echo $row['id']; ?>"><?php echo $row['nombre'] . " " . $row['apellido']; ?></option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>