<main class="contenedor admin">
    <h1>Administrador Web Asignar SAS</h1>
    <!-- <h2>Hola, <?php echo $_SESSION['nombre']?>.</h2> -->

    <!-- Agregamos un mensaje de éxito al crear la oferta-->
    <?php
        if($resultado){
            $mensaje = mostrarNotificacion( intval($resultado));
            if($mensaje){ ?>
                <p class="alerta exito"><?php echo s($mensaje)  ?></p>        
           <?php }  
        }
    ?>

    <div class="admin-nav">
        <nav>
            <div class="iconos admin-icon tab-verde" id="ofertas">
                <i class="fa fa-solid fa-briefcase no-click"></i>
                <p class="no-click">Ofertas Laborales</p>
            </div>
            <div class="iconos admin-icon" id="ciudades">
                <i class="fa fa-solid fa-tree-city no-click"></i>
                <p class="no-click">Ciudades</p>
            </div>
            <div class="iconos admin-icon" id="usuarios">
                <i class="fa fa-solid fa-user-gear"></i>
                <p class="no-click">Usuarios</p>
            </div>
        </nav>
    </div>

    <?php
    $vistas = ['ofertas', 'ciudades', 'usuarios'];

    foreach($vistas as $vista){
        include __DIR__."/../$vista/$vista.php";
    }?>

</main>