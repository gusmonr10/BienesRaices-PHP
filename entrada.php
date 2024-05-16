<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Consejos para tener una alberca en tu casa</h1>

        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp"/>
            <img src="build/img/destacada2.jpg" alt="Imagen entrada blog" loading="lazy"/>
        </picture>

        <p class="meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

        <div class="contenido-entrada">
            <p class="resumen-texto">
                Donec erat lectus, tincidunt non tempus quis, suscipit varius orci. Morbi sed enim id purus volutpat euismod. Morbi pulvinar tempus nibh, id sagittis augue blandit vitae. Duis tristique vehicula ligula, quis convallis felis interdum ac. Proin in nisi sed diam commodo gravida. Integer lacinia sapien elit, ac consequat lorem eleifend a. Quisque tincidunt vestibulum eros in dignissim. Praesent turpis erat, pellentesque at erat consequat, posuere venenatis massa. Sed in consectetur ligula. Vivamus sagittis vehicula est, ut ultricies dolor. Sed eget ipsum tortor. Vestibulum ut sapien fringilla, ultrices dolor ut, bibendum ipsum.
            </p>
    
            <p class="resumen-texto">
                Nulla facilisi. Duis at aliquet risus. Integer ornare nulla ac egestas scelerisque. Morbi venenatis, justo a varius iaculis, velit ex faucibus urna, ac iaculis quam lacus ultrices velit. Vestibulum vel mollis ligula. Fusce vehicula urna sed metus dapibus, ac laoreet libero egestas. Morbi mollis dui quis sodales fringilla. Aenean non molestie elit, at tempus nisi. Aenean pellentesque sem in urna accumsan, at tempor est sodales. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean nibh libero, venenatis nec leo sit amet, imperdiet efficitur arcu.
            </p>

            <a href="blog.php" class="boton-amarillo">Volver</a>
        </div>
    </main>

<?php incluirTemplate('footer'); ?>