<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Servicios Temporales</title>

    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="/build/css/app.css"/>

    <script src="https://kit.fontawesome.com/39b0748f0d.js" crossorigin="anonymous"></script>

</head>
<body>
    <header class="header">
        <div class="contenido-header">
            <div class="barra contenedor">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="logotipo Asignar">
                </a>

                <div class="mobile-menu">
                    <i class="fa fa-bars btnMenu"></i>
                </div>

                <div class="derecha">
                    <nav class="navegacion">
                        <a class="<?php echo isset($inicio) ? 'active' : ''; ?>" href="/">Inicio</a>

                        <a class="<?php echo isset($servicios) ? 'active' : ''; ?>" href="/servicios">Servicios</a>

                        <a class="<?php echo isset($ofertas) ? 'active' : ''; ?>" href="/ofertas">Ofertas Laborales</a>

                        <a class="<?php echo isset($nosotros) ? 'active' : ''; ?>" href="/nosotros">Nosotros</a>

                        <a class="<?php echo isset($contacto) ? 'active' : ''; ?>" href="/contacto">Contáctenos</a>
                        <!-- <?php if($auth): ?>
                            <div class="submenu"><?php echo $_SESSION['nombre']; if (!$_SESSION['nombre']){
                                echo 'Usuario';
                            }
                            ;?>&ShortDownArrow;</a>
                            <div class="dropdown">
                                <a href="/admin/" class="admin">Admin</a>
                                <a href="/logout">Cerrar Sesión</a>                                
                            </div>
                        <?php endif; ?> -->
                        
                        <!-- <?php if(!$auth):?>
                            <a href="/login">Log in</a>
                        <?php endif; ?> -->
                    </nav>
                </div>
                <i class="fa fa-moon dark-mode-boton"></i>
            </div>
        </div>
    </header>

    <?php echo $contenido; ?>
    
    <footer class="footer">
        <div class="contenedor">
            <div class="footer-info">
                <div class="info">
                    <h3>Servicio a Nivel nacional</h3>
                    <div class="bloqueSedes">
                        <div class="sedes">
                            <p>Sede principal Medellín: </p>
                            <p>Carrera 48 # 10-45, Centro Comercial Monterrey</p>
                            <p>Oficina 805.</p>
                        </div>                        
                        <div class="sedes">
                            <p>Sede Rionegro:</p>
                            <p>Cra. 48 # 49-05</p>
                            <p>Oficina 508</p>
                        </div>
                        <div class="sedes">
                            <p>Sede Bogotá:</p>
                            <p>Carrera 19 # 44-27</p>
                            <p>Entrada vehicular: Carrera 20 # 44-40</p>
                            <p>Barrio Palermo.</p>
                        </div>
                    </div>
                </div>

                <div class="info">
                    <div class="politicas">
                        <a href="">
                            <img src="/build/img/logo-conexion.svg" alt="Logo Conexión Outsourcing">
                            <p>Conozca nuestra empresa filial aquí</p>
                        </a>
                        <a href="">
                            <p>Consulte nuestros términos, condiciones y políticas de privacidad</p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="info-contacto">
                <a href="tel:6043220310">Línea IP Nacional: (57) 604 322 03 10</a>
                <div class="redes">
                    <a href="">
                        <i class="fa fa-instagram"></i>
                    </a>
                    <a href="">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="">
                        <i class="fa fa-twitter"></i>
                    </a>
                </div>
            </div>
            <div class="scroll-up">
                <i class="fa fa-angle-up"></i>
            </div>
        </div>

        <a class="creator" href="https://www.buymeacoffee.com/AnaMariaAya" target="_blank"><p>Developed by <span>AnitaNashDev</span></p></a>
    </footer>

  <script type="text/javascript" src="/build/js/app.js"></script>
</body>
</html>