<section id="tabla-ciudades">
    <h2>Ciudades</h2>
    <p>Puede crear una ciudad que no esté en el sistema si hay una nueva vacante en ese lugar </p>
    <a href="/ciudades/crear" class="btn-admin">Agregar Ciudad</a>

    <!--Tabla para listar las vacantes-->
    <table class="admin">
        <thead>
            <th>Ciudad</th>
            <th>Acciones</th>

        </thead>

        <tbody> <!--Mostrar los resultados-->
            <?php foreach( $ciudades as $ciudad): ?>
            <tr>               

                <td> <?php echo $ciudad->nombre; ?> </td>

                <td>
                    <!--Eliminar la vacante-->
                    <form method="POST" class="w-100" action="/ciudades/eliminar">
                        <input type="hidden" name="id" value="<?php echo $ciudad->id;?> ">
                        <input type="hidden" name="tipo" value="ciudad">
                        <input type="submit" class="btn-eliminar w-100" value="Eliminar">
                    </form>

                    <a class="btn-actualizar" href="/ciudades/actualizar?id=<?php echo $ciudad->id; ?>">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</section>