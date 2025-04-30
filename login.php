<?php
require 'includes/config/database.php';
$db = conectarDB();
// Autenticar el usuario

$errores = [];
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    echo "<pre>";
    var_dump ($_POST);
    echo "</pre>";

    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(!$email){
        $errores[] = "El email es obligatorio o no es válido";
    }
    if(!$password){
        $errores[] = "La contraseña es obligatoria";
    }
}

// Incluye el header
require 'includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php
        foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach?>

    <form method="POST" class="formulario">
        <fieldset>
            <legend>Iniciar Sesión</legend>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Tu Email" required>

            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" placeholder="Tu Contraseña" required>
        </fieldset>
        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>