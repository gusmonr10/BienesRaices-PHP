<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp"/>
            <img src="build/img/destacada3.jpg" alt="Imagen contacto" loading="lazy"/>
        </picture>

        <h2>Llene el formulario de contacto</h2>

        <form class="formulario">
            <fieldset>
                <legend>Información personal</legend>

                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" placeholder="Nombre y apellido">

                <label for="correo">Correo:</label>
                <input type="email" id="correo" placeholder="Correo electrónico">

                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" placeholder="Número telefónico">

                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" placeholder="Añade un comentario o mensaje"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <label for="opciones">Vende o compra:</label>
                <select id="opciones">
                    <option value="" selected disabled>-- Seleccionar --</option>
                    <option value="Venta">Venta</option>
                    <option value="Compra">Compra</option>
                </select>

                <label for="presupuesto">Precio o presupuesto:</label>
                <input type="number" id="presupuesto" placeholder="$" min="100000">
            </fieldset>

            <fieldset>
                <legend>Datos de contacto</legend>

                <p class="primero">¿Cómo deseas ser contactado?</p>
                
                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input name="contacto" type="radio" id="contactar-telefono" value="telefono">

                    <label for="contactar-email">Correo</label>
                    <input name="contacto" type="radio" id="contactar-email" value="correo">
                </div>

                <p>Si eligió teléfono, elija la fecha y hora para contactarse con usted</p>

                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha">

                <label for="hora">Hora:</label>
                <input type="time" id="hora" min="09:00" max="18:00">
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>

<?php incluirTemplate('footer'); ?>