<main class="contenedor">
    <h1><?php echo $titulo; ?></h1>
    <form id="enviar-mensaje" class="formulario form-empleados">
        <fieldset id="fieldset">
            <p>Solicitudes - Quejas - Reconocimientos</p>
            
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
</main>