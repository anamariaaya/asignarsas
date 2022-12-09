<main class="contenedor">
    <h1><?php echo $titulo; ?></h1>
    
    <form id="enviar-mensaje" class="form-admin" method='POST'>
        <h2>Solicitudes - Quejas - Reconocimientos</h2>

        <?php
            require_once __DIR__ . '/../templates/alertas.php';
        ?>

        <fieldset id="fieldset">          
            <select name='tipo'>
                <option selected disabled>Seleccione una opción</option>
                <option value="solicitud">Solicitud</option>
                <option value="queja">Queja</option>
                <option value="reconocimiento">Reconocimiento</option>
            </select>
            
        <legend>Datos de quien genera esta SQR</legend>
            <label for="nombre">Nombres
                <input name="nombre" type="text" placeholder="Nombres" id="nombresSQR" value='<?php echo s($sqr->nombre)?>'>
            </label>         
        
            <label for="apellido">Apellidos
                <input name="apellido" type="text" placeholder="Apellidos" id="apellidosSQR" value='<?php echo s($sqr->apellido)?>'>
            </label>

            <label for="doc_tipo">Tipo de documento</label>
            <select name="doc_tipo" id="doc-tipo">
                <option selected disabled>Seleccione una opción</option>
                <option value="cedula">Cédula</option>
                <option value="otro">Otro</option>
            </select>

            <label for="doc_id"  id="doc-id">Número de documento</label>
                <input name="doc_id" type="text" placeholder="Número de documento" value='<?php echo s($sqr->doc_id)?>'>

            <legend>Datos de contacto</legend>
            <label for="email">Correo electrónico
                <input name="email" type="email" placeholder="Correo" id="emailSQR">

            <label for="telefono">Teléfono
                <input name="tel" type="tel" placeholder="Teléfono" id="telefonoSQR">

            <label for="direccion">Dirección
                <input name="direccion" type="text" placeholder="Dirección" id="direccionSQR">

            <legend>Descripción del problema o situación</legend>

            <label for="lugar_hechos">Indique el lugar donde sucedieron los hechos:</label>
            <textarea name="lugar_hechos" id="lugarSQR" placeholder ="Lugar de los hechos"></textarea>
            
            <label for="motivo">¿Qué le llevo a escribir esta queja, sugerencia, reconocimiento o situación para comité de convivencia?</label>
            <textarea name="motivo" id="motivoSQR" placeholder ="Motivo de la sugerencia, reconocimiento o situación"></textarea>

            <label for="solicitud_hechos">Solicitud concreta ¿Qué sugiere para corregir y evitar inconvenientes a futuros de mejorar algún aspecto relacionado con la descripción de la situación que expuso anteriormente? O aportar pruebas para el comité de convivencia.</label>
            <textarea name="solicitud" id="solicitudSQR" placeholder ="Escriba la solicitud"></textarea>

            <input type="hidden" id="tipo_usuario" name="tipo_usuario" value="empresa">
            <input type="hidden" id="fecha_rep" name="fecha_rep" value="<?php echo date('Y-m-d'); ?>">


            <button type="submit" id="enviar" class="btn-enviar-empleado">Enviar</button>
        </fieldset>
    </form>
</main>

<?php
 $script= ' 
    <script src="/build/js/sqrData.js"></script>
    ';
?>