<main class="contenedor vacantes">
    <a href="/ofertas" class="btn-volver">Ver Ciudades</a>
    <h1><?php echo $titulo; ?><span id="ciudad-vacante"></span></h1>

    <div class="ofertas__buscar">
        <input class="ofertas__input" type="text" id="buscar-cargo" placeholder="Buscar Cargo"/>
        <div class="ofertas__salario">            
            <p class="ofertas__value">Salarios desde: <span id="salario_min">$0</span></p>
            <input class="ofertas__range" type="range" id="buscar-salario" min="0" max="6000000" step="50000" value="0" oninput="salario_min.innerText = currency(this.value)">
        </div>
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