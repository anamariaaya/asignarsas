<main class="contenedor">
    <h1><?php echo $titulo; ?></h1>
    <form id="enviar-mensaje" class="form-admin">
        <fieldset id="fieldset">
            <p>Solicitudes - Quejas - Reconocimientos</p>

            <select>
                <option selected disabled>Seleccione una opción</option>
                <option value="solicitud">Solicitud</option>
                <option value="queja">Queja</option>
                <option value="reconocimiento">Reconocimiento</option>
            </select>
            
        <legend>Datos de quien genera esta SQR</legend>
            <label for="name">Nombres
                <input type="text" placeholder="Nombres" id="nombresSQR">
            </label>         
        
            <label for="apellidos">Apellidos
                <input type="text" placeholder="Apellidos" id="apellidosSQR">
            </label>

            <label for="doc_tipo">Tipo de documento</label>
            <select name="doc_tipo">
                <option selected disabled>Seleccione una opción</option>
                <option value="cedula">Cédula</option>
                <option value="otro">Otro</option>
            </select>

            <label for="doc_id">Número de documento
                <input name="doc_id" type="text" placeholder="Número de documento" id="cedulaSQR">

            <legend>Datos de contacto</legend>
            <label for="email">Correo electrónico
                <input type="email" placeholder="Correo" id="emailSQR">

            <label for="telefono">Teléfono
                <input type="tel" placeholder="Teléfono" id="telefonoSQR">

            <label for="direccion">Dirección
                <input type="text" placeholder="Dirección" id="direccionSQR">

            <legend>Descripción del problema o situación</legend>

            <label for="lugar_hechos">Indique el lugar donde sucedieron los hechos:</label>
            <textarea id="lugarSQR" placeholder ="Lugar de los hechos"></textarea>
            
            <label for="motivo">¿Qué le llevo a escribir esta queja, sugerencia, reconocimiento o situación para comité de convivencia?</label>
            <textarea id="motivoSQR" placeholder ="Motivo de la sugerencia, reconocimiento o situación"></textarea>

            <label for="solicitud_hechos">Solicitud concreta ¿Qué sugiere para corregir y evitar inconvenientes a futuros de mejorar algún aspecto relacionado con la descripción de la situación que expuso anteriormente? O aportar pruebas para el comité de convivencia.</label>
            <textarea id="solicitudSQR" placeholder ="Escriba la solicitud"></textarea>

            <input type="hidden" id="tipo_usuario" name="tipo_usuario" value="empleado">
            <input type="hidden" id="fecha_rep" name="fecha_rep" value="<?php echo date('Y-m-d-H:i:s'); ?>">


            <button type="submit" id="enviar" class="btn-enviar-empleado">Enviar</button>
        </fieldset>
    </form>
</main>