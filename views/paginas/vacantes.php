<main class="contenedor vacantes">
    <a href="/ofertas" class="btn-volver">Ver Ciudades</a>
    <h1>Ofertas Laborales en <?php echo $ciudad->nombre; ?></h1>

    <div class="grid-vacantes">
        <?php
        foreach($ofertas as $oferta){?>
        <div class="vacante">
            <img src="/images/<?php echo $oferta->imagen; ?>" alt="Vacante en <?php echo $ciudad->nombre; ?>"/>
            <p><span><?php echo $oferta->cargo; ?></span></p>
            <p>$<?php echo number_format($oferta->salario, 0, ',', '.'); ?></p>
            <a class="btn-vacante" href="vacante?id=<?php echo $oferta->id; ?>">Ver Oferta</a>
        </div>
        <?php
        }
        ?>
    </div>
</main>