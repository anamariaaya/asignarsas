<main class="contenedor">
    <h1><?php echo $titulo; ?></h1>

    <form id="enviar-mensaje" class="form-admin" method='POST'>
        <?php
            require_once __DIR__ . '/../templates/alertas.php';
        ?>        
        <h2>Solicitudes - Quejas - Reconocimientos</h2>

        <select name='tipo'>
            <option selected disabled>Seleccione una opción</option>
            <option value="solicitud">Solicitud</option>
            <option value="queja">Queja</option>
            <option value="reconocimiento">Reconocimiento</option>
        </select>

        <fieldset id="fieldset">
            <legend>Datos de quien genera esta SQR</legend>

            <label for="nombre">Nombres
                <input name="nombre" type="text" placeholder="Nombres" id="nombresSQR" value='<?php echo s($sqr->nombre)?>'>
            </label>

            <label for="apellido">Apellidos
                <input name="apellido" type="text" placeholder="Apellidos" id="apellidosSQR" value='<?php echo s($sqr->apellido)?>'>
            </label>

            <label for="doc_tipo">Tipo de documento</label>
            <select name="doc_tipo" id="doc-tipo">
                <option selected >Seleccione una opción</option>
                <option value="cedula" <?php if (isset($_POST['doc_tipo']) &&  $_POST['doc_tipo'] == 'cedula') { echo 'selected'; } ?> >Cédula</option>
                <option value="otro" <?php if (isset($_POST['doc_tipo']) &&  $_POST['doc_tipo'] == 'otro') { echo 'selected'; } ?>>Otro</option>
            </select>

            <label for="doc_id">Número de documento
                <input name="doc_id" type="text" placeholder="Número de documento" id="doc-id" value='<?php echo s($sqr->doc_id)?>'>
            </label>

            <legend>Datos de contacto</legend>

            <label for="email">Correo electrónico
                <input name="email" type="email" placeholder="Correo" id="emailSQR" value='<?php echo s($sqr->email)?>'>
            </label>

            <label for="telefono">Teléfono
                <input name="tel" type="tel" placeholder="Teléfono" id="telefonoSQR" value='<?php echo s($sqr->tel)?>'>
            </label>

            <label for="direccion">Dirección
                <input name="direccion" type="text" placeholder="Dirección" id="direccionSQR" value='<?php echo s($sqr->direccion)?>'>
            </label>

            <legend>Descripción del problema o situación</legend>

            <label for="lugar_hechos">Indique el lugar donde sucedieron los hechos:</label>
            <textarea name="lugar_hechos" id="lugarSQR" placeholder ="Lugar de los hechos" ><?php if (isset($_POST['lugar_hechos'])){ echo s($sqr->lugar_hechos); } ?></textarea>
            
            <label for="motivo">¿Qué le llevo a escribir esta queja, sugerencia, reconocimiento o situación para comité de convivencia?</label>
            <textarea name="motivo" id="motivoSQR" placeholder ="Motivo de la sugerencia, queja o reconocimiento" ><?php if (isset($_POST['motivo'])){ echo s($sqr->motivo); } ?></textarea>

            <label for="solicitud_hechos">Solicitud concreta ¿Qué sugiere para corregir y evitar inconvenientes a futuros de mejorar algún aspecto relacionado con la descripción de la situación que expuso anteriormente? O aportar pruebas para el comité de convivencia.</label>
            <textarea name="solicitud" id="solicitudSQR" placeholder ="Escriba la SQR" ><?php if (isset($_POST['solicitud'])){ echo s($sqr->solicitud); } ?></textarea>

            <input type="hidden" id="tipo_usuario" name="tipo_usuario" value="Empleado">
            <input type="hidden" id="fecha_rep" name="fecha_rep" value="<?php date_default_timezone_set("America/Bogota"); echo date('Y-m-d-H:i:s'); ?>">

            <button type="submit" id="enviar" class="btn-enviar-empleado">Enviar</button>
        </fieldset>
    </form>
</main>

<?php
 $script= '
    <script src="/build/js/sqrData.js"></script>
    ';
?>