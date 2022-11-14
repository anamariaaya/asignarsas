<main class="contenedor vacantes">
    <a href="/ofertas" class="btn-volver">Ver Ciudades</a>
    <h1><?php echo $titulo; ?><span id="ciudad-vacante"></span></h1>

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