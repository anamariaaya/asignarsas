<main class="contenedor">
    <h1>Actualizar Ciudad</h1>

    <a href="/adminweb" class="btn-admin">Volver al admin</a>

    <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
    <?php endforeach; ?>

    <form class="form-admin" method="POST" enctype="multipart/form-data">
    
        <?php include __DIR__.'/form.php'?>

        <input type="submit" value="Actualizar Ciudad" class="btn-admin">

    </form>
</main>