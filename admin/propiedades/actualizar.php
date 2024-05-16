<?php
    require '../../includes/funciones.php';
    $auth = autenticacion();

    if(!$auth) {
        header('Location: /');
    }

    $obtener_id = $_GET["id"];
    $validar_id = filter_var($obtener_id, FILTER_VALIDATE_INT);

    if(!$validar_id) {
        header("Location: /admin");
    }

    require '../../includes/config/database.php';
    $sesion = conectarBD();

    $consulta_sql_propie = "SELECT * FROM propiedades WHERE id = $validar_id";
    $resultado_consulta_propie = mysqli_query($sesion, $consulta_sql_propie);
    $propiedad = mysqli_fetch_assoc($resultado_consulta_propie);

    $consulta_sql = "SELECT * FROM vendedores;";
    $resultado_consulta = mysqli_query($sesion, $consulta_sql);

    $alerta_errores = [];

    $titulo = $propiedad["titulo"];
    $precio = $propiedad["precio"];
    $imagen_propiedad = $propiedad["imagen"];
    $descripcion = $propiedad["descripcion"];
    $habitaciones = $propiedad["habitaciones"];
    $wc = $propiedad["wc"];
    $estacionamiento = $propiedad["estacionamiento"];
    $creacion = $propiedad["creacion"];
    $vendedorId = $propiedad["vendedorId"];

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $titulo = mysqli_real_escape_string($sesion, $_POST["titulo"]);
        $precio = mysqli_real_escape_string($sesion, $_POST["precio"]);
        $imagen = $_FILES["imagen"];
        $descripcion = mysqli_real_escape_string($sesion, $_POST["descripcion"]);
        $habitaciones = mysqli_real_escape_string($sesion, $_POST["habitaciones"]);
        $wc = mysqli_real_escape_string($sesion, $_POST["wc"]);
        $estacionamiento = mysqli_real_escape_string($sesion, $_POST["estacionamiento"]);
        $creacion = mysqli_real_escape_string($sesion, $_POST["creacion"]);
        $vendedorId = mysqli_real_escape_string($sesion, $_POST["vendedor"]);

        if(!$titulo) {
            $alerta_errores[] = "Debes añadir un título para la propiedad";
        }

        if(!$precio) {
            $alerta_errores[] = "Colocar un precio es obligatorio";
        }

        $conversor = 1000 * 1000;

        if($imagen["size"] > $conversor) {
            $alerta_errores[] = "La imagen es muy pesada";
        }

        if(!$descripcion) {
            $alerta_errores[] = "Colocar una descripción para la propiedad es obligatorio";
        } else if(strlen($descripcion) < 50) {
            $alerta_errores[] = "La descripción debe contener un mínimo de 50 caracteres";
        }

        if(!$habitaciones) {
            $alerta_errores[] = "Colocar un número de habitaciones es obligatorio";
        }

        if(!$wc) {
            $alerta_errores[] = "Colocar un número de baños es obligatorio";
        }

        if(!$estacionamiento) {
            $alerta_errores[] = "Colocar un número de lugares de estacionamiento es obligatorio";
        }

        if(!$creacion) {
            $alerta_errores[] = "Debes ingresar la fecha de publicación de esta propiedad";
        }

        if(!$vendedorId) {
            $alerta_errores[] = "Debes elegir un vendedor(a)";
        }

        if(empty($alerta_errores)) {
            $carpeta_imagenes = "../../imagenes";

            if(!is_dir($carpeta_imagenes)) {
                mkdir($carpeta_imagenes);
            }

            $nombreImagen = "";

            if($imagen["name"]) {
                unlink($carpeta_imagenes . "/" . $propiedad["imagen"]);
                $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
                move_uploaded_file($imagen["tmp_name"], $carpeta_imagenes . "/" . $nombreImagen);
            } else {
                $nombreImagen = $propiedad["imagen"];
            }

            $query_sql = "UPDATE propiedades SET titulo = '$titulo', precio = $precio, imagen = '$nombreImagen', descripcion = '$descripcion', habitaciones = $habitaciones, wc = $wc, estacionamiento = $estacionamiento, creacion = '$creacion', vendedorId = $vendedorId WHERE id = $validar_id;";

            $insertar = mysqli_query($sesion, $query_sql);
    
            if($insertar) {
                header('Location: /admin?registro=2');
            }
        }
    }

    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Actualizar propiedad</h1>

        <?php foreach($alerta_errores as $alerta_error) { ?>
            <div class="alerta error">
                <?php echo $alerta_error; ?>
            </div>
        <?php } ?>

        <form method="POST" enctype="multipart/form-data" class="formulario">
            <fieldset>
                <legend>Información general</legend>

                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Título de la propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Ej. $100,000" min="120000" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">
                <img src="/imagenes/<?php echo $imagen_propiedad; ?>" alt="Imagen de la propiedad" class="imagen-actualizar"/>

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" placeholder="Añade un poco de información acerca de la propiedad"><?php echo $descripcion; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información de la propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej. 2" min="2" value="<?php echo $habitaciones; ?>">

                <label for="wc">Baños:</label>
                <input type="number" id="wc" name="wc" placeholder="Ej. 3" min="2" value="<?php echo $wc; ?>">

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej. 2" min="2" value="<?php echo $estacionamiento; ?>">
            </fieldset>

            <fieldset>
                <legend>Acerca de</legend>

                <label for="creacion">Fecha de creación:</label>
                <input type="date" id="creacion" name="creacion" value="<?php echo $creacion; ?>">

                <label for="vendedor">Vendedor(a):</label>
                <select name="vendedor" id="vendedor">
                    <option value="">-- Seleccionar --</option>
                    <?php while($fila = mysqli_fetch_assoc($resultado_consulta)) { ?>
                        <option <?php echo ($vendedorId === $fila['id']) ? 'selected' : ''; ?> value="<?php echo $fila['id']; ?>">
                            <?php echo $fila['nombre'] . " " . $fila['apellido']; ?>
                        </option>
                    <?php } ?>
                </select>
            </fieldset>

            <div class="formulario-botones">
                <input type="submit" value="Actualizar" class="boton boton-verde">
                <a href="/admin" class="boton boton-amarillo volver">Volver</a>
            </div>
        </form>
    </main>

<?php
    mysqli_close($sesion);
    
    incluirTemplate('footer');     
?>