<?php
require 'includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Guía para la decoración de tu hogar</h1>

    <picture>
        <source srcset="build/img/destacada2.webp" type="image/webp">
        <source srcset="build/img/destacada2.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada2.jpg" alt="imagen de la propriedad">
    </picture>
    <p class="informacion-meta">Escrito el: <span>25/11/2024</span> por: <span>Admin</span></p>
    <div class="resumen-propriedad">


        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos mollitia sed esse enim. Nemo,
            voluptatum natus. Iste ex eveniet hic repellat tempora beatae porro! Neque nam repellat
            necessitatibus accusamus saepe.
            Necessitatibus dolorum molestiae ipsam a ullam consequuntur, corporis explicabo? Perferendis,
            impedit quo! Facere molestiae labore doloribus, maxime dolorum animi aliquam doloremque fugiat
            debitis amet? Dolorem quas provident vel eligendi amet.
        </p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum provident quasi modi omnis et
            adipisci libero incidunt voluptates delectus temporibus, nulla, voluptate molestiae dignissimos quod
            deleniti assumenda dicta iusto hic.</p>
    </div>
</main>

<section class="contenedor seccion">

</section>

<?php
include 'includes/templates/footer.php';
?>