<main class="contenedor">
    <h1>Mensajes Asignar SAS</h1>

    <?php
        if($resultado){
            $mensaje = mostrarNotificacion( intval($resultado));
            if($mensaje){ ?>
                <p class="alerta exito"><?php echo s($mensaje)  ?></p>        
           <?php }  
        }
    ?>

<div class="mensajes">
    <?php foreach($contactos as $contacto): ?>
        <div class="grid-inbox" data-status="<?php echo $contacto->estado;?>">
             <div class="msg">
                <?php echo substr($contacto->fecha, 0, 10);?>
            </div>
            <div class="msg">
                <?php echo $contacto->estado == 0 ? 'No leído' : 'Leído';?>
            </div>
            <div class="msg">
                <?php echo $contacto->ciudad;?>
            </div>
            <div class="msg">
                <?php echo $contacto->nombres.' '.$contacto->apellidos;?>
            </div>
            <div class="msg">
                <a class="btn-admin" href="/inbox/mensaje?id=<?php echo $contacto->id;?>">Leer</a>                
            </div>
        </div>        
    <?php endforeach ?>
</div>

</main>