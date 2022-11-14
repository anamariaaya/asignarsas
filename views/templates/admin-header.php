<header class="dashboard__header">
    <div class="dashboard__header-grid">
        <div class="dashboard__saludo">
            <a href="/">
                <img class="dashboard__logo" src="/build/img/logo.svg" loading="lazy" alt="logotipo Asignar">
            </a>

            <h3 class="dashboard__titulo">Hola, <?php echo $_SESSION['nombre']; ?></h3>
        </div>

        <nav class="dashboard__nav">           
            <form class="dashboard__form" action="/logout" method="POST">
                <input class="dashboard__submit--logout" type="submit" value="Cerrar Sesión"/>
            </form>
        </nav>
        <i class="fa fa-moon dark-mode-boton"></i>
    </div>
</header>