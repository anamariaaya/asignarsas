<main class="main-content">
    <div class="enlaces-main">
        <h1 class="no-click">Ofertas Laborales</h1>
        <div class="enlaces">
            <a href="/ofertas">Ver ofertas</a>
        </div>
        <div class="blend-main">
            <picture>
                <source srcset="build/img/ofertas.webp" type="image/webp">
                <source srcset="build/img/ofertas.jpg" type="image/jpeg">
                <img src="/build/img/ofertas.png" alt="Ofertas Laborales" loading="lazy">
            </picture>   
        </div>     
    </div>

    <div class="enlaces-main">
        <h1 class="no-click">Soluciones Empresariales</h1>
        <div class="enlaces">
            <a href="/soluciones">Contactar</a>
            <a href="https://www.asignar.com.co/_admin/">Ingresar</a>
        </div>
        <div class="blend-main">
            <picture>
                <source srcset="build/img/soluciones.webp" type="image/webp">
                <source srcset="build/img/soluciones.jpg" type="image/jpeg">
                <img src="/build/img/soluciones.png" alt="Soluciones Empresariales" loading="lazy">
            </picture>   
        </div>     
    </div>    

    <div class="enlaces-main">
        <h1 class="no-click">Empleados</h1>
        <div class="enlaces">
            <a href="">Ingreso sólo para empleados</a>
        </div>
        <div class="blend-main">
            <picture>
                <source srcset="build/img/empleados.webp" type="image/webp">
                <source srcset="build/img/empleados.jpg" type="image/jpeg">
                <img src="/build/img/empleados.png" alt="Empleados" loading="lazy">
            </picture>   
        </div>     
    </div>
</main>

<section class="contenedor valor">
    <h2>Propuesta de Valor</h2>
    <div class="valores-section">
        <div class="valores">
            <img class="icono" src="/build/img/oportunidad.svg" alt="Oportunidad" loading="lazy"/>
            <p>Oportunidad</p>
        </div>
        <div class="valores">
            <img class="icono" src="/build/img/disposicion.svg" alt="Disposición de servicio" loading="lazy"/>
            <p>Disposición de servicio</p>
        </div>
        <div class="valores">
            <img class="icono" src="/build/img/acompañamiento.svg" alt="Acompañamiento continuo" loading="lazy"/>
            <p>Acompañamiento continuo</p>
        </div>
        <div class="valores">
            <img class="icono" src="/build/img/calidad.svg" alt="Calidad" loading="lazy"/>
            <p>Calidad</p>
        </div>
    </div>
</section>

<section class="contenedor vacantes-index">
    <h2>Ofertas Laborales</h2>
    <div class="grid-index-v"> 
        <?php
        foreach($ofertas as $oferta){?>
            <div class="vacante vacante-index">
                <img src="/images/<?php echo $oferta->imagen; ?>" alt="Vacante en <?php echo $ciudad->nombre; ?>" loading="lazy"/>
                <p><span><?php echo $oferta->cargo; ?></span></p>
                <p>$<?php echo number_format($oferta->salario, 0, ',', '.'); ?></p>
                <p>
                    <?php foreach($ciudades as $ciudad){?>
                    <?php echo $oferta->idCiudad === $ciudad->id ? '<span>Ubicación: '.$ciudad->nombre.'</span>': '';?>
                    <?php
                        }
                    ?>
                </p>  
                <a class="btn-vacante" href="vacante?id=<?php echo $oferta->id;?>">Ver Oferta</a>
            </div>
        <?php           
        }
        ?>
    </div>
    <a href="/ofertas" class="btn-ver-mas">Ver todas las ofertas</a>
</section>

<section class="contenedor valor-corporativo">
    <h2>Valores Corporativos</h2>
    <div class="corporativos-section">
        <div class="corporativos">
            <img class="icono" src="/build/img/servicio.svg" alt="Servicio" loading="lazy"/>
            <p>Servicio</p>
        </div>
        <div class="corporativos">
            <img class="icono" src="/build/img/responsabilidad.svg" alt="Responsabilidad" loading="lazy"/>
            <p>Responsabilidad</p>
        </div>
        <div class="corporativos">
            <img class="icono" src="/build/img/respeto.svg" alt="Respeto" loading="lazy"/>
            <p>Respeto</p>
        </div>
        <div class="corporativos">
            <img class="icono" src="/build/img/honestidad.svg" alt="Honestidad" loading="lazy"/>
            <p>Honestidad</p>
        </div>
        <div class="corporativos">
            <img class="icono" src="/build/img/liderazgo.svg" alt="Liderazgo" loading="lazy"/>
            <p>Liderazgo</p>
        </div>
    </div>

</section>

<section>
    <div class="segmentos">
        <div class="areas">
            <h2>Empleados Misionales</h2>
            <img src="/build/img/misionales.webp" alt="Empleados Misionales" loading="lazy"/>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus modi enim velit sed expedita ad qui repudiandae voluptate fuga ea. Unde, repellendus quaerat consequatur hic facilis praesentium recusandae temporibus ea!</p>
        </div>
        <div class="areas">
            <h2>Responsabilidad Social Empresarial</h2>
            <img src="/build/img/responsabilidadsocial.webp" alt="Responsabilidad Social Empresarial" loading="lazy"/>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus modi enim velit sed expedita ad qui repudiandae voluptate fuga ea. Unde, repellendus quaerat consequatur hic facilis praesentium recusandae temporibus ea! </p>
        </div>
        <div class="areas">
            <h2>Empleados Administrativos</h2>
            <img src="/build/img/administrativos.webp" alt="Empleados Administrativos" loading="lazy"/>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus modi enim velit sed expedita ad qui repudiandae voluptate fuga ea. Unde, repellendus quaerat consequatur hic facilis praesentium recusandae temporibus ea!</p>
        </div>
    </div>
</section>

<section>
    <div class="carrusel">
        <h2>Confían en Nosotros</h2>

        <div class="slide fade">
            <h3>Hotelería y Club</h3>
            <img class="hotel" src="/build/img/estelar.webp" alt="Logo Hoteles Estelar" loading="lazy">
            <img class="hotel" src="/build/img/exe.webp" alt="Logo Hoteles Exe Bacatá" loading="lazy">
            <img class="hotel" src="/build/img/colsubsidio.webp" alt="Logo Hoteles y club colsubsidio" loading="lazy">
            <img class="hotel" src="/build/img/nutibara.webp" alt="Logo Hotel Nutibara" loading="lazy">
            <img class="hotel" src="/build/img/clickclack.webp" alt="Logo Click Clack Hotel" loading="lazy">
            <img class="hotel" src="/build/img/courtyard.webp" alt="Logo Hotel Courtyard by Marriott" loading="lazy">
            <img class="hotel" src="/build/img/diez.webp" alt="Logo Hotel Diez" loading="lazy">
            <img class="hotel" src="/build/img/country.webp" alt="Logo Country Club" loading="lazy">
            <img class="hotel" src="/build/img/dann.webp" alt="Logo Hoteles Dann" loading="lazy">
            <img class="hotel" src="/build/img/atton.png" alt="Logo Hoteles Atton">
            <img class="hotel" src="/build/img/nh.webp" alt="Logo Hoteles Nh" loading="lazy">
            <img class="hotel" src="/build/img/union.webp" alt="Logo Club Unión Medellín" loading="lazy">
            <img class="hotel" src="/build/img/jw.webp" alt="Logo Hotel JW Marriott" loading="lazy">
            <img class="hotel" src="/build/img/marriott.webp" alt="Logo Hoteles Marriott" loading="lazy">
            <img class="hotel" src="/build/img/hyatt.webp" alt="Logo Hotel Grand Hyatt" loading="lazy">
            <img class="hotel" src="/build/img/movich.webp" alt="Logo Hotel Movich" loading="lazy">


            <ul class="circles">
                    <li class="hotelfondo"></li>
                    <li class="hotelfondo"></li>
                    <li class="hotelfondo"></li>
                    <li class="hotelfondo"></li>
                    <li class="hotelfondo"></li>
            </ul>
        </div>

        <div class="slide fade">
            <h3>Alimentos y Bebidas</h3>
            <img class="ayb" src="/build/img/westernwings.webp" alt="Logo Western Wings" loading="lazy">
            <img class="ayb" src="/build/img/mimos.webp" alt="Logo Mimos" loading="lazy">
            <img class="ayb" src="/build/img/dante.webp" alt="Logo Dante" loading="lazy">
            <img class="ayb" src="/build/img/cantina.webp" alt="Logo Cantina La 15" loading="lazy">
            <img class="ayb" src="/build/img/storia.webp" alt="Logo Storia D'amore" loading="lazy">
            <img class="ayb" src="/build/img/creta.webp" alt="Logo creta" loading="lazy">
            <img class="ayb" src="/build/img/deriva.webp" alt="Logo Deriva" loading="lazy">

            <ul class="circles">
                    <li class="aybfondo"></li>
                    <li class="aybfondo"></li>
                    <li class="aybfondo"></li>
                    <li class="aybfondo"></li>
                    <li class="aybfondo"></li>
            </ul>
        </div>

        <div class="slide fade">
            <h3>Manufuctura, Call Center y Otros Sectores</h3>
            <img class="otros" src="/build/img/superpack.webp" alt="Logo Superpack" loading="lazy">
            <img class="otros" src="/build/img/ppg.webp" alt="Logo PPG" loading="lazy">
            <img class="otros" src="/build/img/medicox.webp" alt="Logo Medicox" loading="lazy">
            <img class="otros" src="/build/img/hrmd.webp" alt="Logo HRMD" loading="lazy">
            <img class="otros" src="/build/img/frutafresca.webp" alt="Logo Fruta Fresca" loading="lazy">
            <img class="otros" src="/build/img/jsmd.webp" alt="Logo JSMD Management" loading="lazy">


            <ul class="circles">
                    <li class="otrosfondo"></li>
                    <li class="otrosfondo"></li>
                    <li class="otrosfondo"></li>
                    <li class="otrosfondo"></li>
                    <li class="otrosfondo"></li>
            </ul>
        </div>

        <a class="prev" onclick="plusSlides(-1)">
            <i class="fa fa-beat-fade fa-angle-left"></i>
        </a>
        <a class="next" onclick="plusSlides(1)">
            <i class="fa fa-beat-fade fa-angle-right"></i>
        </a>

    </div>

    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span> 
        <span class="dot" onclick="currentSlide(2)"></span> 
        <span class="dot" onclick="currentSlide(3)"></span> 
    </div>

    <a class="btn-contacto" href="/soluciones">Contáctanos</a>
</section>