<?php
    // Conectar a la base de datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";

        $titulo        = $_POST['titulo'];
        $precio        = $_POST['precio'];
        $descripcion   = $_POST['descripcion'];
        $habitaciones  = $_POST['habitaciones'];
        $wc            = $_POST['wc'];
        $estacionamiento = $_POST['estacionamiento'];
        $vendedorId    = $_POST['vendedorId'];

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

        $query = "INSERT INTO propriedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, imagen, vendedores_id)
                VALUES ('$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$imagen', '$vendedorId')";

        $resultado = mysqli_query($db, $query);
        if ($resultado) {
            echo "Registro insertado correctamente.";
        } else {
            echo "Error: " . mysqli_error($db);
        }
    }

    require '../../includes/funciones.php';
    incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Crear</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <form class="formulario" method="POST" action="crear.php" enctype="multipart/form-data">
        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Título Propiedad">

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" min="1">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion"></textarea>
        </fieldset>

        <fieldset>
            <legend>Información Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1">

            <label for="wc">Baños:</label>
            <input type="number" id="wc" name="wc" placeholder="Ej: 1" min="0">

            <label for="estacionamiento">Garaje:</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 1" min="0">
        </fieldset>

        <fieldset> 
            <legend>Vendedor</legend>
            <select name="vendedorId">
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
