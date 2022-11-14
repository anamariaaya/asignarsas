<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">


        <a href="<?php
            sesionActiva($_SESSION['admin']);
        ?>" class="dashboard__enlace <?php pagina_actual('candidatos');?>">
            <i class="fas fa-home dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Inicio
            </span>
        </a>

        <a href="" class="dashboard__enlace <?php pagina_actual('datos-personales');?>">
            <i class="fa-solid fa-user-tie dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Datos personales
            </span>
        </a>
        
        <a href="" class="dashboard__enlace <?php pagina_actual('experiencia');?>">
            <i class="fa-solid fa-briefcase dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Experiencia Laboral
            </span>
        </a>

        <a href="" class="dashboard__enlace <?php pagina_actual('educacion');?>">
            <i class="fa-solid fa-user-graduate dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Educación
            </span>
        </a>
    </nav>
</aside>