<?php
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id) {
    header('Location: /');
}

// Importar la conexion
require 'includes/config/database.php';
$db = conectarDB();

// Consultar
$query = "SELECT * FROM propriedades WHERE id = $id";
$resultado = mysqli_query($db, $query);

if(!$resultado->num_rows) {
    header('Location: /');
}

$propiedad = mysqli_fetch_assoc($resultado);


require 'includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1><?php echo $propiedad['titulo'] ?></h1>

        <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen'] ?>" alt="imagen de la propriedad">

    <div class="resumen-propriedad">
        <p class="precio"><?php echo $propiedad['precio'] ?> €</p>
        <ul class="iconos-caracteristicas">
            <li>
                <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitacion">
                <p><?php echo $propiedad['habitaciones']?></p>
            </li>
            <li>
                <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono WC">
                <p><?php echo $propiedad['wc'] ?></p>
            </li>
            <li>
                <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono garaje">
                <p><?php echo $propiedad['estacionamiento'] ?></p>
            </li>
        </ul>

        <p><?php echo $propiedad['descripcion'] ?></p>
    </div>
</main>

<section class="contenedor seccion">

</section>

<?php
incluirTemplate('footer');
?>