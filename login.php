<?php
    require 'includes/config/database.php';
    $sesion = conectarBD();

    $alerta_errores = [];

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $correo = mysqli_real_escape_string($sesion, filter_var($_POST["correo"], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($sesion, $_POST["password"]);

        if(!$correo) {
            $alerta_errores[] = "El correo es obligatorio o no es válido";
        }

        if(!$password) {
            $alerta_errores[] = "La contraseña es obligatosia";
        }

        if(empty($alerta_errores)) {
            $query_sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
            $resultado_query = mysqli_query($sesion, $query_sql);

            if($resultado_query->num_rows) {
                $usuario = mysqli_fetch_assoc($resultado_query);
                $auth = password_verify($password, $usuario["password"]);

                if($auth) {
                    session_start();
                    $_SESSION["usuario"] = $usuario["correo"];
                    $_SESSION["login"] = true;
                    header('Location: /admin');

                } else {
                    $alerta_errores[] = "Contraseña incorrecta";
                }

            } else {
                $alerta_errores[] = "Este usuario no existe";
            }
        }
    }

    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Iniciar sesión</h1>

        <?php foreach($alerta_errores as $alerta_error) { ?>
            <div class="alerta error w-80">
                <?php echo $alerta_error; ?>
            </div>
        <?php } ?>

        <form method="POST" class="formulario w-80">
            <fieldset>
                <legend>Información de inicio de sesión</legend>

                <label for="correo">Correo:</label>
                <input type="email" id="correo" name="correo" placeholder="Correo electrónico" required>

                <label for="contraseña">Contraseña:</label>
                <input type="password" id="contraseña" name="password" placeholder="Contraseña" required>
            </fieldset>

            <input type="submit" value="Ingresar" class="boton boton-verde">
        </form>
    </main>

<?php 
    mysqli_close($sesion);
    incluirTemplate('footer'); 
?>