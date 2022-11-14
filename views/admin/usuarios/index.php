<div class="contenedor">
    <h2><?php echo $titulo; ?></h2>

    <div class="dashboard__total">
        <p><span>Total de Usuarios: </span><?php echo count($usuarios); ?></p>

        <div class="mensajes__filtros">
            <i class="fas fa-briefcase"></i>
            <p>Filtrar Usuarios por tipo:</p>
            <form class="mensajes__leidos" method="POST" action="/admin/ofertas">        
                <select name="filtro-usuario" id="filtro-usuario">
                    <option selected disabled>--selecciona &darr;</option>
                    <option value="">Todas</option>
                    <option value="1">Admin</option>
                    <option value="2">SúperAdmin</option>
                </select>
            </form>
        </div>

        <div class="dashboard__buscar">
            <input class="dashboard__total__type-buscar" type="text" id="usuario-search" placeholder="Buscar usuario por nombre o correo"/>
            <button id="btn-search" class="btn-buscar">
                <i class="fa-solid fa-search"></i>
            </button>
        </div>
    </div>

    <a href="/admin/usuarios/crear" class="btn-crear">
        <i class="fa-solid fa-plus"></i>
        Nuevo Usuario
    </a>
    <h3 class="dashboard__subtitle--ofertas"><?php echo $subtitulo ?></h3>

    <div class="usuarios">
        <?php foreach( $usuarios as $usuario): ?>
            <div class="usuarios__flex">
                <div class="usuarios__grid">
                    <div class="usuarios__info"><?php echo $usuario->nombre. ' ' . $usuario->apellido ?></div>
                    <div class="usuarios__info"><?php echo $usuario->email ?></div>
                    <div class="usuarios__info"><?php echo $usuario->admin === '2' ? 'SuperAdmin' : 'Admin' ?></div>
                </div>

                <button id="eliminar-usuario" class="btn-eliminar btn-eliminar--usuario" value="<?php echo $usuario->id;?>">
                    <i class="fa-solid fa-trash-can no-click"></i>
                </button>
            </div>
        <?php endforeach ?>
    </div>
    

    <!--Tabla para listar las vacantes-->
</div>

<?php
    $script = "
    <script src='/build/js/filtrosSelect.js'></script>
    <script src='/build/js/dashboard.js'></script>

    ";
?>