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

                    <div id="pqr" class="<?php pagina_actual('PQR'); ?> submenu-btn" >PQRs
                        <div class="submenu" id="menu-pqr">
                            <a href="/PQR-empresa">&raquo; PQR Empresas</a>
                            <a href="/PQR-empleado">&raquo; PQR Empleados</a>
                        </div>
                    </div>

                    <?php if (isset($_SESSION['id'])) : ?>
                        <a href="<?php
                        sesionActiva($_SESSION['admin']);
                        ?>">Volver al admin</a>
                    <?php else : ?>
                        <a class="<?php pagina_actual('login'); ?>" href="/login">Login</a>
                    <?php endif; ?>
                    
                </nav>
            </div>
            <i class="fa fa-moon dark-mode-boton"></i>
        </div>
    </div>
</header>