<?php
    $id = $_GET["id"];
    $Validar_id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$Validar_id) {
        header("Location: /");
    }
    
    require 'includes/config/database.php';
    $sesion = conectarBD();

    $query_sql = "SELECT * FROM propiedades WHERE id = $Validar_id;";
    $resultado_query = mysqli_query($sesion, $query_sql);

    if($resultado_query->num_rows === 0){
        header("Location: /");
    }

    $propiedad = mysqli_fetch_assoc($resultado_query);

    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad["titulo"]; ?></h1>

        <img src="imagenes/<?php echo $propiedad["imagen"]; ?>" alt="Imagen de la propiedad" loading="lazy"/>

        <div class="resumen-propiedad">
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
        </div>

        <div class="contenido-entrada">
            <h3>Descripción:</h3>
            <p class="resumen-texto"><?php echo $propiedad["descripcion"]; ?></p>
            <a href="anuncios.php" class="boton-amarillo">Volver</a>
        </div>
    </main>

<?php 
    mysqli_close($sesion);
    incluirTemplate('footer'); 
?>