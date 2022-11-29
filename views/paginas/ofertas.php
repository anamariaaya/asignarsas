<main class="contenedor ofertas">
    <h1><?php echo $titulo; ?></h1>

    <div class="ofertas__buscar">
        <input class="ofertas__input" type="text" id="buscar-ciudad" placeholder="Buscar ciudad"/>
    </div>
                

    <div id='ciudades' class="ofertas-nav">
        
    </div>

</main>

<?php
    $script = "
    <script src='/build/js/apiOfertas.js'></script>
    ";
?>