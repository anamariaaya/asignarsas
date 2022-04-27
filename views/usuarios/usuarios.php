<section id="tabla-usuarios">
    <h2>Usuarios</h2>
    <a href="/usuarios/crear" class="btn-admin">Nuevo Usuario</a>

    <!--Tabla para listar las vacantes-->
    <table class="admin">
        <thead>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Acciones</th>

        </thead>

        <tbody> <!--Mostrar los resultados-->
            <?php foreach( $usuarios as $usuario): ?>
            <tr>
                
                <td> <?php echo $oferta->nombre; ?> </td>
                <td> <?php echo $oferta->correo; ?> </td>
               
                <td>
                    <!--Eliminar la vacante-->
                    <form method="POST" class="w-100" action="/usuarios/eliminar">
                        <input type="hidden" name="id" value="<?php echo $usuario->id;?> ">
                        <input type="hidden" name="tipo" value="usuario">
                        <input type="submit" class="btn-eliminar w-100" value="Eliminar">
                    </form>

                    <a class="btn-actualizar" href="/usuarios/actualizar?id=<?php echo $usuario->id; ?>">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</section>