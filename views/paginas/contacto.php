<?php
use Model\Contactos;
?>
<section class="contactenos contenedor">
    <h1>Contáctenos</h1>
</section>

<section class="contenedor bottom">
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis facere ipsam ea placeat? Dignissimos sint dolore placeat eum ut laborum veniam vero atque, repellat reprehenderit qui expedita beatae ad perferendis?</p>
    <a class="btn-contacto" href="/soluciones">Si eres empresa da click aquí</a>
</section>

<section class="contenedor">
    <h2 class="border-bottom">Contacto Empleados</h2>
    <?php
        if($mensaje){ ?>
        <p class="alerta exito">
            <?php echo $mensaje; 
            $contacto = new Contactos;?>
        </p>
    <?php }?>

    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario form-empleados" method="POST" action="/contacto">
        <fieldset>
            <p>¿Cómo podemos resolver tus dudas?</p>
            
            <label for="name">Nombres
                <input type="text" placeholder="Nombres" id="name" name="contacto[nombres]" value="<?php echo s($contacto->nombres);?>">
            </label>         
        
            <label for="apellidos">Apellidos
                <input type="text" placeholder="Apellidos" id="apellidos" name="contacto[apellidos]"  value="<?php echo s($contacto->apellidos);?>">
            </label>

            <label for="ciudad">Ciudad
                <input type="text" placeholder="Ciudad" id="ciudad" name="contacto[ciudad]"  value="<?php echo s($contacto->ciudad);?>">
            </label>

            <label for="email">Correo
                <input type="email" placeholder="Correo electrónico" id="email" name="contacto[correo]"  value="<?php echo s($contacto->correo);?>">
            </label>

            <label for="tel">Celular
                <input type="tel" placeholder="Celular" id="tel" name="contacto[celular]"  value="<?php echo s($contacto->celular);?>">
            </label>   

            <label for="message">Mensaje</label>
            <textarea id="message" name="contacto[mensaje]" placeholder ="Mensaje"  value="<?php echo s($contacto->mensaje);?>"></textarea>         

            <input type="submit" value="Enviar" class="btn-enviar-empleado">
        </fieldset>
    </form>
</section>
