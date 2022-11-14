<main class="contenedor">
    <h1>Crear Usuario</h1>

    <a href="/admin/usuarios" class="btn-admin">Volver al admin</a>

    <?php
        require_once __DIR__ . '/../../templates/alertas.php';
    ?>

    <form class="form-admin" method="POST" enctype="multipart/form-data">
    
        <?php include __DIR__.'/form.php'?>

        <input type="submit" value="Crear Usuario" class="btn-admin">

    </form>
</main>