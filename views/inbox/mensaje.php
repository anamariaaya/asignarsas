<main class="contenedor">

<div class="nav-mensaje">
    <a href="/inbox" class="btn-admin">Volver a los mensajes</a>
    <form method="POST" action="/inbox/mensaje">  
        <input type="hidden" name="id" value="<?php echo $contacto->id;?>">
        <input type="hidden" name="tipo" value="contacto">
        <input type="submit" class="btn-eliminar w-100" value="Eliminar mensaje">
    </form>
</div>

    <div class="body-mensaje">
        <p>Fecha: 
            <span>
                <?php echo $contacto->fecha;?>
            <span>
        </p>

        <p>Ciudad: 
            <span>
                <?php echo $contacto->ciudad;?>
            </span>
        </p>

        <p>Nombre: 
            <span>
                <?php echo $contacto->nombres.' '.$contacto->apellidos;?>
            </span>
        </p>

        <p>Celular: 
            <span>
                <?php echo $contacto->celular;?>
            </span>
        </p>

        <p>Correo: 
            <span>
                <?php echo $contacto->correo;?>
            </span>
        </p>

        <p>Mensaje: 
            <span>
                <?php echo $contacto->mensaje;?>
            </span>
        </p>
    </div>
</main>