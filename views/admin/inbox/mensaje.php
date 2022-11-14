<div class="contenedor">
    <div class="nav-mensaje">
        <a href="/admin/inbox" class="btn-volver">Volver a los mensajes</a>
    </div>

    <h2><?php echo $contacto->estado === '1' ? 'Mensaje Leído' : 'Mensaje Nuevo'?> </h2>

    <div class="body-mensaje <?php echo $contacto->estado === '1' ? 'leido' : ''?> ">

        <button id="eliminar-mensaje" class="btn-eliminar--interno" value="<?php echo $contacto->id;?>">
            <i class="fa-solid fa-trash-can no-click"></i>
        </button>

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
</div>

<?php
    $script = "
    <script src='/build/js/filtrosInbox.js'></script>
    <script src='/build/js/dashboard.js'></script>
    ";
?>