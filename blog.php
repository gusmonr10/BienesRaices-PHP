<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Nuestro blog</h1>

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

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog3.webp" type="image/webp"/>
                    <img class="imagen-entrada" src="build/img/blog3.jpg" alt="Imagen entrada blog" loading="lazy"/>
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guía para la decoración de interiores</h4>
                </a>

                <p class="meta">Escrito el: <span>22/10/2021</span> por: <span>Admin</span></p>
                    
                <p class="texto">
                    Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio.
                </p>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog4.webp" type="image/webp"/>
                    <img class="imagen-entrada" src="build/img/blog4.jpg" alt="Imagen entrada blog" loading="lazy"/>
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Paleta de colores para tu habitación</h4>
                </a>

                <p class="meta">Escrito el: <span>23/10/2021</span> por: <span>Admin</span></p>
                    
                <p class="texto">
                    Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio.
                </p>
            </div>
        </article>
    </main>

<?php incluirTemplate('footer'); ?>