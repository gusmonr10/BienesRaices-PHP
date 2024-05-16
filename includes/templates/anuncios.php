<?php
    require 'includes/config/database.php';
    $sesion = conectarBD();

    $query_sql = "SELECT * FROM propiedades LIMIT $limite;";
    $resultado_query = mysqli_query($sesion, $query_sql);
?>

<div class="contenedor-anuncios <?php echo (isset($sec_anuncios)) ? 'sec-anuncios' : ''; ?>">
    <?php while($propiedad = mysqli_fetch_assoc($resultado_query)) { ?>
        <div class="anuncio <?php echo (isset($pagina_principal)) ? 'anuncio-index' : ''; ?><?php echo (isset($sec_anuncio)) ? 'sec-anuncios' : ''; ?>">
            <img src="imagenes/<?php echo $propiedad["imagen"]; ?>" alt="Imagen de la propiedad" loading="lazy"/>
    
            <div class="contenido-anuncio">
                <h3><?php echo $propiedad["titulo"]; ?></h3>
                <p class="informacion"><?php echo $propiedad["descripcion"]; ?></p>
                <p class="precio"><?php echo "$" . $propiedad["precio"]; ?></p>
    
                <ul class="iconos-caracteristicas">
                    <li>
                        <img src="build/img/icono_wc.svg" alt="Icono baño" loading="lazy"/>
                        <p><?php echo $propiedad["wc"]; ?></p>
                    </li>
    
                    <li>
                        <img src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento" loading="lazy"/>
                        <p><?php echo $propiedad["estacionamiento"]; ?></p>
                    </li>
    
                    <li>
                        <img src="build/img/icono_dormitorio.svg" alt="Icono habitaciones" loading="lazy"/>
                        <p><?php echo $propiedad["habitaciones"]; ?></p>
                    </li>
                </ul>
    
                <a href="anuncio.php?id=<?php echo $propiedad["id"]; ?>" class="boton-amarillo-block">Ver propiedad</a>
            </div>
        </div>
    <?php } ?>
</div>

<?php mysqli_close($sesion); ?>