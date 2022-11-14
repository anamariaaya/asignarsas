<div class="contenedor">
    <h1><?php echo $titulo; ?></h1>

    <a href="/admin/ofertas" class="btn-volver">Volver a las ofertas</a>

    <?php foreach($alertas as $alerta): ?>
            <div class="alerta alerta_error">
                <?php echo $alerta; ?>
            </div>
    <?php endforeach; ?>

    <form class="form-admin" method="POST" enctype="multipart/form-data">
    
        <?php include __DIR__.'/form.php'?>

        <input type="submit" value="Actualizar Oferta" class="btn-admin">

    </form>
</div>