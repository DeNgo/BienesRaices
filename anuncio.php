<?php 
    include 'includes/templates/header.php';
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta frente al bosque</h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="imagen de la propriedad">
        </picture>

        <div class="resumen-propriedad">
            <p class="precio">3.000.000€</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitacion">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono WC">
                    <p>4</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono garaje">
                    <p>3</p>
                </li>
            </ul>

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

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.php">Nosotros</a>
                <a href="anuncios.php">Anuncios</a>
                <a href="blog.php">Blog</a>
                <a href="contacto.php">Contacto</a>
            </nav>
            <p class="copyright">Todos los derechos reservados 2024&copy;</p>
        </div>
    </footer>
    <script src="build/js/bundle.min.js"></script>
</body>

</html>