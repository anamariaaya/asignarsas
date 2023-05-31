<section class="contactenos contenedor">
    <h1><?php echo $titulo; ?></h1>
</section>

<section class="contenedor bottom">
    <p>Si tienes alguna pregunta, ¡No dudes en contactarnos! Nos encanta escuchar a nuestros empleados y queremos asegurarnos de resolver tus inquietudes.</p>
</section>

<section class="contenedor">
    <h2 class="border-bottom">Contacto Empleados</h2>
    <!-- <?php
        require_once __DIR__ . '/../templates/alertas.php';
    ?> -->

    <form id="enviar-mensaje" class="formulario form-empleados">
        <fieldset id="fieldset">
            <p>¿Cómo podemos resolver tus dudas?</p>
            
            <label for="name">Nombres
                <input type="text" placeholder="Nombres" id="nombresInput">
            </label>         
        
            <label for="apellidos">Apellidos
                <input type="text" placeholder="Apellidos" id="apellidosInput">
            </label>

            <label for="ciudad">Ciudad
                <input type="text" placeholder="Ciudad" id="ciudadInput">
            </label>

            <label for="correo">Correo
                <input type="email" placeholder="Correo electrónico" id="correoInput">
            </label>

            <label for="celular">Celular
                <input type="tel" placeholder="Celular" id="celularInput">
            </label>   

            <label for="mensaje">Mensaje</label>
            <textarea id="mensajeInput" placeholder ="Mensaje"></textarea>         

            <button type="submit" id="enviar" class="btn-enviar-empleado">Enviar</button>

            <!-- <button id="resetBtn" class="btn-alert">Limpiar formulario</button> -->
        </fieldset>
    </form>
</section>

<?php
    $script = "
    <script src='/build/js/apiContacto.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    ";
?>