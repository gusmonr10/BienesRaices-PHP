<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce sobre nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp"/>
                    <img class="imagen-nosotros" src="build/img/nosotros.jpg" alt="Imagen sobre nosotros" loading="lazy"/>
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>25 años de experiencia.</blockquote>

                <p>
                    Donec erat lectus, tincidunt non tempus quis, suscipit varius orci. Morbi sed enim id purus volutpat euismod. Morbi pulvinar tempus nibh, id sagittis augue blandit vitae. Duis tristique vehicula ligula, quis convallis felis interdum ac. Proin in nisi sed diam commodo gravida. Integer lacinia sapien elit, ac consequat lorem eleifend a. Quisque tincidunt vestibulum eros in dignissim. Praesent turpis erat, pellentesque at erat consequat, posuere venenatis massa. Sed in consectetur ligula. Vivamus sagittis vehicula est, ut ultricies dolor. Sed eget ipsum tortor. Vestibulum ut sapien fringilla, ultrices dolor ut, bibendum ipsum.
                </p>

                <p>
                    Nulla facilisi. Duis at aliquet risus. Integer ornare nulla ac egestas scelerisque. Morbi venenatis, justo a varius iaculis, velit ex faucibus urna, ac iaculis quam lacus ultrices velit. Vestibulum vel mollis ligula. Fusce vehicula urna sed metus dapibus, ac laoreet libero egestas. Morbi mollis dui quis sodales fringilla. Aenean non molestie elit, at tempus nisi. Aenean pellentesque sem in urna accumsan, at tempor est sodales. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean nibh libero, venenatis nec leo sit amet, imperdiet efficitur arcu.
                </p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion-iconos-nos">
        <h2>Más sobre nosotros</h2>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy"/>
                <h3>Seguirdad</h3>
                <p>
                    Laudantium, libero praesentium saepe possimus obcaecati, officia dicta hic cupiditate minus doloribus beatae temporibus? Libero, non. Eaque mollitia molestias aspernatur corrupti dolorum?
                </p>
            </div>

            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy"/>
                <h3>Precio</h3>
                <p>
                    Laudantium, libero praesentium saepe possimus obcaecati, officia dicta hic cupiditate minus doloribus beatae temporibus? Libero, non. Eaque mollitia molestias aspernatur corrupti dolorum?
                </p>
            </div>

            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy"/>
                <h3>A tiempo</h3>
                <p>
                    Laudantium, libero praesentium saepe possimus obcaecati, officia dicta hic cupiditate minus doloribus beatae temporibus? Libero, non. Eaque mollitia molestias aspernatur corrupti dolorum?
                </p>
            </div>
        </div>
    </section>

<?php incluirTemplate('footer'); ?>