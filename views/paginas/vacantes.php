<main class="contenedor vacantes">
    <a href="/ofertas" class="btn-volver">Ver Ciudades</a>
    <h1>Ofertas Laborales en <span><?php echo $ciudad->nombre;?></span></h1>

    <!--Si no existen vacantes en la ciudad, se muestra un aviso-->
    <?php
    if(empty($ofertas)){?>
       <div class="sin-ofertas">
        <i class="fa-solid fa-warning"></i>
        <p>En este momento no hay vacantes en <span><?php echo $ciudad->nombre; ?></span>. Revisa más adelante.</p>
       </div>
    <?php
    }
    ?>

    <div class="grid-vacantes"> 
        <?php
        foreach($ofertas as $oferta){?>
            <div class="vacante">
                <img src="/images/<?php echo $oferta->imagen; ?>" alt="Vacante en <?php echo $ciudad->nombre; ?>"/>
                <p><span><?php echo $oferta->cargo; ?></span></p>
                <p>$<?php echo number_format($oferta->salario, 0, ',', '.'); ?></p>
                <a class="btn-vacante" href="vacante?id=<?php echo $oferta->id;?>">Ver Oferta</a>
            </div>
        <?php           
        }
        ?>
    </div>
</main>