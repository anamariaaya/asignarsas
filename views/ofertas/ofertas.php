<section class="vertabla" id="tabla-ofertas">
    <h2>Ofertas Laborales</h2>
    <a href="/ofertas/crear" class="btn-admin">Nueva Oferta Laboral</a>

    <!--Tabla para listar las vacantes-->
    <table class="admin">
        <thead>
            <th>Ciudad</th>
            <th>Cargo</th>
            <th>Salario</th>
            <th>Vencimiento</th>
            <th>Imagen</th>
            <th>Acciones</th>

        </thead>

        <tbody> <!--Mostrar los resultados-->
            <?php foreach( $ofertas as $oferta): ?>
            <tr>
                <td>
                    <?php foreach($ciudades as $ciudad){?>
                        <?php echo $oferta->idCiudad === $ciudad->id ? $ciudad->nombre : null;?>
                    <?php
                        }
                    ?>
                </td>

                <td> <?php echo $oferta->cargo; ?> </td>
                <td> <?php echo $oferta->salario; ?> </td>
                <td> <?php echo $oferta->vencimiento; ?> </td>
                <td><img class="imagen-tabla" src="/images/<?php echo $oferta->imagen;?>" loading="lazy"></td>    

                <td>
                    <!--Eliminar la vacante-->
                    <form method="POST" class="w-100" action="/ofertas/eliminar">
                        <input type="hidden" name="id" value="<?php echo $oferta->id;?> ">
                        <input type="hidden" name="tipo" value="oferta">
                        <input type="submit" class="btn-eliminar w-100" value="Eliminar">
                    </form>

                    <a class="btn-actualizar" href="/ofertas/actualizar?id=<?php echo $oferta->id; ?>">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</section>