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
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia illo tempore amet, id eos minus dolore voluptate aperiam veniam unde cum recusandae temporibus dolorum, non sit sint rerum? Architecto, ea?
                Quaerat ad suscipit, ratione dolorum dolores quae ullam molestiae voluptas perspiciatis saepe architecto consequatur! Voluptates beatae tenetur libero iusto iure odit quibusdam, expedita quisquam magnam obcaecati nam cum voluptatibus molestiae!</p>
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

    <form class="formulario" method="POST" action="/soluciones">  
        <fieldset class="no-border">
            <div class="form-campos">
                <label for="company">Nombre de la empresa
                    <input type="text" placeholder="Nombre de la empresa" id="company" name="contacto[empresa]" required>
                </label>
            

                <label for="tel">Teléfono PBX o celular
                    <input type="tel" placeholder="Teléfono PBX o celular" id="tel" name="contacto[telefono]" required>
                </label>
            </div>

            <div class="form-campos">
                <label for="nit">NIT
                    <input type="text" placeholder="NIT de la empresa" id="nit" name="contacto[nit]" required>
                </label>
            

                <label for="email">Correo
                    <input type="email" placeholder="Correo electrónico" id="email" name="contacto[email]" required>
                </label>
            </div>

            <div class="form-campos">
                <label for="name">Nombre de Contacto
                    <input type="text" placeholder="Nombre de Contacto" id="name" name="contacto[nombre]" required>
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

            <label for="message">Descríbanos aquí su solicitud</label>
            <textarea id="message" name="contacto[mensaje]" placeholder ="Descríbanos aquí su solicitud" required></textarea>         
        </fieldset>

        <input type="submit" value="Enviar" class="btn-enviar">
    </form>
</section>