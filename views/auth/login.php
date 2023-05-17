<main class="contenedor">
    <h1><?php echo $titulo; ?></h1>

    <?php
        require_once __DIR__ . '/../templates/alertas.php';
    ?>

    <form class="form-auth" method="POST" action="/login">
        <fieldset>
            <legend><?php echo $titulo; ?></legend>

            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Tu Email" id="email">

            <label for="password">Contraseña</label>
            <input type="password" name="password" placeholder="Tu Contraseña" id="password">

            <div class="password">
                <input type="checkbox" id="passview">
                <label>Ver Contraseña</label>
            </div>
        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="btn-form">
    </form>

    <!-- <a href="/registro" class="btn-auth">¿No te has registrado? Crear Cuenta</a> -->
</main>