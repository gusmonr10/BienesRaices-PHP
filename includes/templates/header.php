<?php
    if(!isset($_SESSION)) {
        session_start();
    }

    $logueado = $_SESSION["login"] ?? false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Bienes Raíces</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <header class="header <?php echo ($inicio) ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img class="logo" src="/build/img/logo.svg" alt="Logotipo Bienes Raices" loading="lazy"/>
                </a>
                
                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="Icono menú hamburguesa">
                </div>

                <div class="derecha">
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>

                        <?php if(!$logueado) { ?>
                            <a href="login.php">Iniciar sesión</a>
                        <?php } else if($logueado) { ?>
                            <a href="cerrar-sesion.php">Cerrar sesión</a>
                        <?php } ?>
                    </nav>

                    <img class="dark-mode" src="/build/img/dark-mode.svg" alt="Icono modo oscuro" loading="lazy">
                </div>
            </div>

            <?php echo ($inicio) ? '<h1>Venta de casas y departamentos exclusivos de lujo</h1>' : ''; ?>
        </div>
    </header>