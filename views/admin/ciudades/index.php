<div class="contenedor">
    <h1><?php echo $titulo; ?></h1>

    <?php
    //filtrar $ciudades por activa = 1  
    $ciudadesActivas = array_filter($ciudadesTotal, function($ciudad){
        return $ciudad->activa == 1;
    });
    ?>

    <div class="dashboard__total">
        <p><span>Total de ciudades activas: </span><?php
        //debugging($ciudades);
        echo count($ciudadesActivas); ?></p>

        <div class="mensajes__filtros">
            <i class="fas fa-briefcase"></i>
            <p>Filtrar ciudades por estado:</p>
            <form class="mensajes__leidos" method="POST" action="/admin/ofertas">        
                <select name="filtro-ciudad" id="filtro-ciudad">
                    <option selected disabled>--selecciona &darr;</option>
                    <option value="">Todas</option>
                    <option value="1">Activas</option>
                    <option value="0">Inactivas</option>
                </select>
            </form>
        </div>

        <div class="dashboard__buscar">
            <input class="dashboard__total__type-buscar" type="text" id="ciudad-search" placeholder="Buscar ciudad por nombre"/>
            <button id="btn-search" class="btn-buscar">
                <i class="fa-solid fa-search"></i>
            </button>
        </div>
    </div>

    <h3 class="dashboard__subtitle--ofertas"><?php echo $subtitulo ?></h3>
    <p>Puedes activar o desactivar las ciudades, según la disponibilidad de ofertas </p>

    <div class="grid__ciudades">
        <?php
            foreach($ciudades as $ciudad): ?>

            <div class="ciudades__card">
                <p class="ciudades__card__info"><?php echo $ciudad->nombre; ?></p>
                
                
                <div class="ciudades__acciones">
                    <input class="check-ciudad" type="checkbox" id="<?php echo $ciudad->id;?>" value="<?php echo $ciudad->activa; ?>" data-nombre="<?php echo $ciudad->nombre?>" <?php echo $ciudad->activa === '1' ? 'checked' : '';?>/>
                    <label for="<?php echo $ciudad->id;?>"></label>
                </div>
            </div>

            <?php endforeach; ?>
    </div>
</div>

<?php
    $script = "
    <script src='/build/js/filtrosSelect.js'></script>
    <script src='/build/js/apiActivarCiudad.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    ";
?>