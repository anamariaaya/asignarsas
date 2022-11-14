<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">


        <a href="<?php
            sesionActiva($_SESSION['admin']);
        ?>" class="dashboard__enlace <?php pagina_actual('dashboard');?>">
            <i class="fas fa-home dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Inicio
            </span>
        </a>
        
        <a href="/admin/ofertas" class="dashboard__enlace <?php pagina_actual('ofertas');?>">
            <i class="fa-solid fa-briefcase dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Ofertas
            </span>
        </a>

        <a href="/admin/candidatos" class="dashboard__enlace <?php pagina_actual('candidatos');?>">
            <i class="fa-solid fa-user-tie dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Candidatos
            </span>
        </a>

        <a href="/admin/inbox" class="dashboard__enlace <?php pagina_actual('registrados');?>">
            <i class="fa-solid fa-comments dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Mensajes
            </span>
        </a>

        <a href="/admin/ciudades" class="dashboard__enlace <?php pagina_actual('ciudades');?>">
            <i class="fa-solid fa-location-dot dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Ciudades
            </span>
        </a>

        <?php
            if($_SESSION['admin'] === '2'){
                include_once __DIR__. '/superadmin-sidebar.php';
            }
        ?>

    </nav>
</aside>