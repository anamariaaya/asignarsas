<main class="contenedor top">
    <a href="vacantes?id=<?php echo $oferta->idCiudad;?>" class="btn-volver">Volver a las vacantes</a>

    <h1><?php echo $oferta->cargo;?></h1>

    <div class="info-oferta" style="background-image: url('/images/<?php echo $oferta->imagen;?>');">
        <div class="info">
            <img src="/images/<?php echo $oferta->imagen; ?>" alt="Vacante $oferta->cargo" loading="lazy"/>        
            <h3>
                <?php foreach($ciudades as $ciudad){?>
                <?php echo $oferta->idCiudad === $ciudad->id ? '<span>Ubicación: '.$ciudad->nombre.'</span>': '';?>
                <?php
                    }
                ?>
            </h3>  
        </div>
        <div class="info">
            <p><span>Salario:</span> $<?php echo number_format($oferta->salario, 0, ',', '.'); ?></p>
            <p><span>Descripción:</span> <?php echo $oferta->descripcion;?></p>
            <p><span>Horario:</span> <?php echo $oferta->horario;?></p>
            <p><span>Envía tu hoja de vida a:</span> <?php echo $oferta->correo;?></p>
            <p><a href="<?php echo 'https://wa.me/+57'.$oferta->whatsapp;?>" target=_blank><span class="whats">O escríbenos por WhatsApp dando click aquí</span> </a></p>
            <p><span>Esta vacante está disponible hasta el:</span> <?php echo $oferta->vencimiento;?></p>
        </div>     
        
    </div>
</main>