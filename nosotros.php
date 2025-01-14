<?php
include 'includes/templates/header.php';
?>

<main class="contenedor seccion">
    <h1>Conoce sobre Nosotros</h1>

    <div class="contenido-nosotros">
        <div class="imagen">
            <picture>
                <source srcset="build/img/nosotros.webp" type="image/webp">
                <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros">
            </picture>
        </div>
        <div class="texto-nosotros">
            <blockquote>25 años de esperiencia</blockquote>
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
    </div>
</main>

<section class="contenedor seccion">
    <h1>Más sobre nosotros</h1>
    <div class="iconos-nosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
            <h3>Seguridad</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minima, maxime asperiores doloremque a
                distinctio tempore aspernatur ea autem delectus nulla eum, omnis dolorem vero nisi porro recusandae
                eos neque et.
            </p>
        </div>
        <div class="icono">
            <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
            <h3>Precio</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minima, maxime asperiores doloremque a
                distinctio tempore aspernatur ea autem delectus nulla eum, omnis dolorem vero nisi porro recusandae
                eos neque et.
            </p>
        </div>
        <div class="icono">
            <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
            <h3>Tiempo</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minima, maxime asperiores doloremque a
                distinctio tempore aspernatur ea autem delectus nulla eum, omnis dolorem vero nisi porro recusandae
                eos neque et.
            </p>
        </div>
    </div>
</section>

<?php
include 'includes/templates/footer.php';
?>