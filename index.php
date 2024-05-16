<?php
    require 'includes/funciones.php';
    incluirTemplate('header', $inicio = true);
?>

    <main class="contenedor seccion">
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
    </main>

    <section class="contenedor seccion">
        <h2>Casas y departamentos en venta</h2>

        <?php 
            $limite = 3;
            $pagina_principal = true;
            $logueado = $_SESSION["login"] ?? false;
            include 'includes/templates/anuncios.php'; 
        ?>

        <div class="botones-sesion">
            <a href="anuncios.php" class="boton-verde">Ver todas</a>

            <?php if($logueado) { ?>
                <a href="/admin" class="boton-amarillo">Administrar</a>
            <?php } ?>
        </div>
    </section>

    <section class="imagen-contacto">
        <div class="contenedor contenido-flex">
            <h2>Encuentra la casa de tus sueños</h2>
            <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad.</p>
            <a href="contacto.php" class="boton-amarillo">Contáctanos</a>
        </div>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp"/>
                        <img class="imagen-entrada" src="build/img/blog1.jpg" alt="Imagen entrada blog" loading="lazy"/>
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                    </a>

                    <p class="meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                    
                    <p class="texto">
                        Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero.
                    </p>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp"/>
                        <img class="imagen-entrada" src="build/img/blog2.jpg" alt="Imagen entrada blog" loading="lazy"/>
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guía para la decoración de tu hogar</h4>
                    </a>

                    <p class="meta">Escrito el: <span>21/10/2021</span> por: <span>Admin</span></p>
                    
                    <p class="texto">
                        Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio.
                    </p>
                </div>
            </article>
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>

            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>

                <p>- Natalia Mendez.</p>
            </div>
        </section>
    </div>

<?php incluirTemplate('footer'); ?>