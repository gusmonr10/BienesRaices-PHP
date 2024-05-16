<?php
    require '../includes/funciones.php';
    $auth = autenticacion();

    if(!$auth) {
        header('Location: /');
    }

    require '../includes/config/database.php';
    $sesion = conectarBD();

    $consulta_sql = "SELECT p.*, v.nombre, v.apellido FROM propiedades p INNER JOIN vendedores v ON v.id = p.vendedorId;";
    $resultado_consulta = mysqli_query($sesion, $consulta_sql);

    $mensaje = $_GET["registro"] ?? null;
    
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $id_borrar = $_POST["id_borrar"];
        $validar_id = filter_var($id_borrar, FILTER_VALIDATE_INT);

        if($validar_id) {
            $query_eliminar_imagen = "SELECT imagen FROM propiedades WHERE id = $validar_id;";
            $resultado_consulta_imagen = mysqli_query($sesion, $query_eliminar_imagen);
            $propiedad_imagen = mysqli_fetch_assoc($resultado_consulta_imagen);
            unlink('../imagenes/' . $propiedad_imagen["imagen"]);

            $query_eliminar = "DELETE FROM propiedades WHERE id = $validar_id;";
            $resultado_consulta_eliminar = mysqli_query($sesion, $query_eliminar);

            if($resultado_consulta_eliminar) {
                header('Location: /admin?registro=3');
            }
        }
    }

    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de bienes raíces</h1>

        <?php if($mensaje === "1") { ?>
            <div class="alerta exito">
                <p>Propiedad creada correctamente</p>
            </div>
        <?php } else if($mensaje === "2") { ?>
            <div class="alerta exito">
                <p>Propiedad actualizada correctamente</p>
            </div>
        <?php } else if($mensaje === "3") { ?>
            <div class="alerta exito">
                <p>Propiedad eliminada correctamente</p>
            </div>
        <?php } ?>

        <div class="botones-admin">
            <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva</a>
            <a href="/" class="boton-amarillo">Ir a inicio</a>
        </div>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Vendedor(a)</th>
                    <th>Administrar</th>
                </tr>
            </thead>

            <tbody>
                <?php while($filas = mysqli_fetch_assoc($resultado_consulta)) { ?>
                    <tr>
                        <td><?php echo $filas["id"]; ?></td>
                        <td><?php echo $filas["titulo"]; ?></td>
                        <td><?php echo "$" . $filas["precio"]; ?></td>
                        <td><img src="/imagenes/<?php echo $filas["imagen"]; ?>" alt="Imagen propiedad" class="imagen-tabla"></td>
                        <td><?php echo $filas["nombre"] . " " . $filas["apellido"]; ?></td>
                        <td>
                            <a href="admin/propiedades/actualizar.php?id=<?php echo $filas["id"]; ?>" class="boton-verde-block boton-editar">Editar</a>

                            <form method="POST" class="w-100">
                                <input type="hidden" name="id_borrar" value="<?php echo $filas["id"]; ?>">
                                <input type="submit" value="Eliminar" class="boton-rojo-block boton-borrar">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>

<?php
    mysqli_close($sesion);
    incluirTemplate('footer'); 
?>