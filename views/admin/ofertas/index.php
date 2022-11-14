<div class="contenedor">
    <h1><?php echo $titulo; ?></h1>

    
    <div class="dashboard__total">
        <p><span>Total de Ofertas: </span><?php echo count($ofertas); ?></p>

        <div class="mensajes__filtros">
                <i class="fas fa-briefcase"></i>
                <p>Filtrar Ofertas por ciudad:</p>
                <form class="mensajes__leidos" method="POST" action="/admin/ofertas">        
                    <select name="filtro-ofertas" id="filtro-ofertas">
                        <option selected disabled>--selecciona &darr;</option>
                        <option value="">Todas</option>
                          
                        <?php foreach($lugares as $lugar): ?>
                            <option value="<?php echo $lugar->id; ?>"><?php echo $lugar->nombre; ?></option>
                        <?php endforeach; ?>

                    </select>
                </form>
        </div>
    </div>

    <a href="/admin/ofertas/crear" class="btn-crear">
        <i class="fa-solid fa-plus"></i>
        Crear Oferta
    </a>
    
    <h3 class="dashboard__subtitle--ofertas"><?php echo $subtitulo ?></h3>
    
    <?php
    if(!$ofertas){?>
        <p class="alerta alerta__error">No hay ofertas para mostrar</p>
    <?php } ?>

    <div class="oferta__grid">
        <?php
            foreach($ofertas as $oferta): ?>

            <div class="oferta__card">
                <img class="oferta__card__img" src="/images/<?php echo $oferta->imagen; ?>" alt="Imagen de la oferta">

                <h3 class="oferta__card__info"><?php echo $oferta->cargo; ?></h3>
                <p class="oferta__card__parrafo">$<?php echo number_format($oferta->salario, 0); ?></p>
                <p class="oferta__card__parrafo"><?php echo $oferta->ciudad; ?></p>                    
                
                <div class="oferta__card__acciones">
                    <a href="/admin/ofertas/actualizar?id=<?php echo $oferta->id; ?>" class="btn-actualizar">
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    <button id="eliminar-oferta" class="btn-eliminar--externo" value="<?php echo $oferta->id;?>">
                        <i class="fa-solid fa-trash-can no-click"></i>
                    </button>
                </div>
            </div>

            <?php endforeach; ?>
    </div>

</div>

<?php
    $script = "
    <script src='/build/js/filtrosSelect.js'></script>
    <script src='/build/js/dashboard.js'></script>
    ";
?>