<?php
require '../../includes/funciones.php';
$auth = estaAutenticado();
if(!$auth){
    header('Location: /'); 
}
// Mostrar errores para debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id) {
    header('Location: /admin'); 
    exit;
}

require '../../includes/config/database.php';
$db = conectarDB();

// Obtener datos de la propriedad
$consulta = "SELECT * FROM propriedades WHERE id = $id";
$resultado = mysqli_query($db, $consulta);
$propriedad = mysqli_fetch_assoc($resultado);

// Consultar para obtener los vendedores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

// Arreglo con mensajes de errores 
$errores = [];

$titulo        = $propriedad['titulo'];
$precio        = $propriedad['precio'];
$descripcion   = $propriedad['descripcion'];
$habitaciones  = $propriedad['habitaciones'];
$wc            = $propriedad['wc'];
$estacionamiento = $propriedad['estacionamiento'];
$vendedorId    = $propriedad['vendedores_id'];
$imagenPropriedad = $propriedad['imagen'];
$creado = date('Y-m-d');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $titulo        = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio        = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion   = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones  = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc            = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedorId    = mysqli_real_escape_string($db, $_POST['vendedor_id']);
    $creado = date('Y-m-d');

    $imagen = $_FILES['imagen'];

    // Validaciones
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

    $medida = 1000 * 1000;
    if ($imagen['size'] > $medida) {
        $errores[] = "La imagen es muy pesada";
    }

    if (empty($errores)) {

        $carpetaImagenes = '../../imagenes/';
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }

        if($imagen['name']) {
            $carpetaImagenes = '../../imagenes/';
            if (!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }
            // Eliminar la imagen previa
            unlink($carpetaImagenes . $propriedad['imagen']);
        } else {
            $nombreImagen = $propriedad['imagen'];
        }

        

        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
        

        // Actualización de datos
        $query = "UPDATE propriedades SET 
            titulo = '$titulo', 
            precio = '$precio', 
            imagen = '$nombreImagen',
            descripcion = '$descripcion', 
            habitaciones = '$habitaciones', 
            wc = '$wc', 
            estacionamiento = '$estacionamiento', 
            vendedores_id = '$vendedorId' 
            WHERE id = $id;";

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            header('Location: /admin?resultado=2');
            exit;
        } else {
            echo "Error al actualizar: " . mysqli_error($db);
        }
    }
}


incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Actualizar Propriedad</h1>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Título Propiedad" value="<?php echo $titulo; ?>">

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" min="1" value="<?php echo $precio; ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">

            <img src="/imagenes/<?php echo $imagenPropriedad ?>" class="imagen-small" alt="Imagen Propiedad">

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
            <select name="vendedor_id">
                <option value="" disabled selected>-- Seleccione --</option>
                <?php while ($row = mysqli_fetch_assoc($resultado)) : ?>
                    <option <?php echo $vendedorId == $row['id'] ? 'selected' : ''; ?> value="<?php echo $row['id']; ?>">
                        <?php echo $row['nombre'] . " " . $row['apellido']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>
