<div class="contenedor">
    <h1><?php echo $titulo; ?></h1>

    <?php

        foreach($contactos as $contacto){
            //crear un array con todos los mensajes no leidos cuyo estado es 0
            $mensajesNoLeidos = array_filter($mensajes, function($mensaje){
                return $mensaje->estado === '0';
            });            
        }
 
        if($resultado){
            $mensaje = mostrarNotificacion( intval($resultado));
            if($mensaje){ ?>
                <p class="alerta exito"><?php echo s($mensaje)  ?></p>        
           <?php }  
        }
    ?>

    <div class="dashboard__total">
        <p><span>Total de mensajes: </span><?php echo count($mensajes); ?></p>
        <?php       
            if($mensajesNoLeidos){ ?>
            <p><span>Mensajes sin leer: </span><?php echo count($mensajesNoLeidos) ?></p>
        <?php }
        ?>
        <div class="mensajes__filtros">
                <i class="fas fa-envelope"></i>
                <p>Filtrar mensajes:</p>
                <form class="mensajes__leidos" method="POST" action="/admin/inbox">        
                    <select name="filtro-leidos" id="filtro-leidos">
                        <option selected disabled>--selecciona &darr;</option>
                        <option value="">Todos</option>
                        <option value="1">Leidos</option>
                        <option value="0">No leidos</option>
                    </select>
                </form>
        </div>
    </div>

    <div class="mensajes">
        <h3 class="dashboard__subtitle"><?php echo $subtitulo; ?></h3>
        <?php foreach($contactos as $contacto): ?>
            <div class="mensajes__flex">
                <a class="mensajes__abrir" href="/admin/mensaje?id=<?php echo $contacto->id;?>">
                    <div class="grid-inbox" data-status="<?php echo $contacto->estado;?>">
                        <div class="msg">
                            <?php echo substr($contacto->fecha, 0, 10);?>
                        </div>
                        <div class="msg">
                            <?php echo $contacto->nombres.' '.$contacto->apellidos;?>
                        </div>
                        <div class="msg">
                            <?php echo $contacto->ciudad;?>
                        </div>
                        
                        <div class="msg">
                            <?php echo $contacto->estado == 0 ? 'No leído' : 'Leído';?>
                        </div>
                    </div>
                </a>
                
                <button id="eliminar-mensaje" class="btn-eliminar" value="<?php echo $contacto->id;?>">
                    <i class="fa-solid fa-trash-can no-click"></i>
                </button>
            </div>
            
        <?php endforeach ?>
    </div>

</div>

<?php
    $script = "
    <script src='/build/js/filtrosSelect.js'></script>
    <script src='/build/js/dashboard.js'></script>
    ";
?>