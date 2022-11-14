<main class="contenedor">
    <div class="grid-corporativo">
        <div class="div-corporativo">
            <img src="/build/img/soluciones.png" alt="Soluciones Empresariales" loading="lazy">
        </div>
        <div class="info-corporativo">
            <div class="div-info">
                <i class="fa fa-gear"></i>
            </div>
            <div class="div-info">
                <h1>Soluciones Empresariales</h1>
                <p>Somos la solución que necesita su empresa frente a las necesidades de gestión humana y servicios temporales. </p>
                <a href="/servicios" class="btn-enviar">Conozca nuestros Servicios</a>
                <a href="/brochure" class="btn-ver">Conozca nuestro Brochure</a>
            </div>       
        </div>
    </div>
</main>

<section class="interes">
    <h2>Si está interesado en nuestros servicios, por favor diligencie el siguiente formulario y nos pondremos en contacto</h2>
</section>

<section class="contacto contenedor">
        <?php
            if($mensaje){ ?>
            <p class="alerta exito">
                <?php echo $mensaje; ?>
            </p>
        <?php }?>

    <form id="form-cliente" class="formulario" method="POST" action="/soluciones">  
        <fieldset class="no-border" id="fieldset-empresa">
            <div class="form-campos">
                <label for="empresa">Nombre de la empresa
                    <input type="text" placeholder="Nombre de la empresa" id="empresa" name="contacto[empresa]" required>
                </label>
            

                <label for="tel-empresa">Teléfono PBX o celular
                    <input type="tel" placeholder="Teléfono PBX o celular" id="tel-empresa" name="contacto[telefono]" required>
                </label>
            </div>

            <div class="form-campos">
                <label for="nit">NIT
                    <input type="text" placeholder="NIT de la empresa" id="nit" name="contacto[nit]" required>
                </label>
            

                <label for="email-empresa">Correo
                    <input type="email" placeholder="Correo electrónico" id="email-empresa" name="contacto[email]" required>
                </label>
            </div>

            <div class="form-campos">
                <label for="nombre-contacto">Nombre de Contacto
                    <input type="text" placeholder="Nombre de Contacto" id="nombre-contacto" name="contacto[nombre]" required>
                </label>
                <label for="cargo">Cargo
                    <input type="text" placeholder="Cargo" id="cargo" name="contacto[cargo]" required>
                </label>
            </div>

            <div class="form-campos">
                <label for="direccion">Dirección de la empresa
                    <input type="text" placeholder="Dirección de la empresa" id="direccion" name="contacto[direccion]" required>
                </label>

                <label for="ciudad">Ciudad
                    <input type="text" placeholder="Ciudad" id="ciudad" name="contacto[ciudad]" required>
                </label>
            </div>

            <label for="mensaje-empresa">Descríbanos aquí su solicitud</label>
            <textarea id="mensaje-empresa" name="contacto[mensaje]" placeholder ="Descríbanos aquí su solicitud" required></textarea>         
        </fieldset>

        <input id="enviar-empresa" type="submit" value="Enviar" class="btn-enviar">
    </form>
</section>

<?php
    $script = "
    <script src='/build/js/validarFormCliente.js'></script>
    ";
?>