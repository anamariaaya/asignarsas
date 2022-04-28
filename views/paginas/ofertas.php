<main class="contenedor ofertas">
    <h1>Ofertas Laborales</h1>

    <div class="ofertas-nav">
        <nav>
        <?php
        foreach($ciudades as $ciudad){ ;?>      
        
            <a href="/vacantes?id=<?php echo $ciudad->id?>">
                <div class="iconos ofertas-icon">
                    <i class="fa fa-solid fa-briefcase no-click"></i>
                    <p class="no-click">
                        <?php echo $ciudad->nombre; ?>
                    </p>
                </div>
            </a>

        <?php
        }
        ?>
        </nav>
    </div>

</main>