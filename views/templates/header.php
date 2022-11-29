<header class="header">
    <div class="contenido-header">
        <div class="barra contenedor">
            <a href="/">
                <img src="/build/img/logo.svg" loading="lazy" alt="logotipo Asignar">
            </a>

            <div class="mobile-menu">
                <i class="fa fa-bars btnMenu"></i>
            </div>

            <div class="derecha">
                <nav class="navegacion">
                    <a class="<?php echo isset($inicio) ? 'active' : ''; ?>" href="/">Inicio</a>

                    <a class="<?php pagina_actual('servicios'); ?>" href="/servicios">Servicios</a>

                    <a class="<?php pagina_actual('ofertas'); ?>" href="/ofertas">Ofertas Laborales</a>

                    <a class="<?php pagina_actual('nosotros'); ?>" href="/nosotros">Nosotros</a>

                    <div id="contacto" class="<?php pagina_actual('contacto'); pagina_actual('soluciones') ?> submenu-btn" >Contáctenos
                        <div class="submenu" id="menu-contacto">
                            <a href="/soluciones">&raquo; Empresas</a>
                            <a href="/contacto">&raquo; Empleados</a>
                        </div>
                    </div>

                    <div id="pqr" class="<?php pagina_actual('SQR'); ?> submenu-btn" >SQRs
                        <div class="submenu" id="menu-pqr">
                            <a href="/SQR-empresa">&raquo; SQR Empresas</a>
                            <a href="/SQR-empleado">&raquo; SQR Empleados</a>
                        </div>
                    </div>                    
                </nav>
            </div>
            <i class="fa fa-moon dark-mode-boton"></i>
        </div>
    </div>
</header>