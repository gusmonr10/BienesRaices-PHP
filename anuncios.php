<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Anuncios</h1>

        <?php 
            $sec_anuncios = true;
            $sec_anuncio = true;
            $limite = 15;
            include 'includes/templates/anuncios.php'; 
        ?>

    </main>

<?php incluirTemplate('footer'); ?>