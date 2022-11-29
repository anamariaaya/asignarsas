<main class="contenedor vacantes">
    <a href="/ofertas" class="btn-volver">Ver Ciudades</a>
    <h1><?php echo $titulo; ?><span id="ciudad-vacante"></span></h1>

    <div class="ofertas__buscar">
        <input class="ofertas__input" type="text" id="buscar-cargo" placeholder="Buscar Cargo"/>
        <!-- <label for="buscar-salario">Salario:</label>
        <input type="range" id="buscar-salario" min="0" max="20000000" step="50000" value="900000"> -->
    </div>

    <!--Si no existen vacantes en la ciudad, se muestra un aviso-->
    <div class="sin-vacantes"></div>

    <div class="grid-vacantes"> 
    </div>
</main>

<?php
    $script = "
    <script src='/build/js/apiOfertas.js'></script>
    ";
?>