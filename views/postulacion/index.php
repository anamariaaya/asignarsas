<main class="contenedor">
    <h1 id="postular-cargo"></h1>
    <h3><?php echo $subtitulo ?></h3>

    <form class="form-admin" id="form-postulacion" enctype="multipart/form-data">

    <fieldset id="fieldset">
        <label for="identificacion">Identificación:</label>
        <input
            type="text"
            id="identificacion"
            name="identificacion"
            placeholder="identificacion"
            >

        <label for="nombre">Nombre:</label>
        <input
            type="text"
            id="nombre-candidato"
            name="nombre"
            placeholder="Nombre"
            >
        
        <label for="apellido">Apellido:</label>
        <input
            type="text"
            id="apellido-candidato"
            name="apellido"
            placeholder="Apellido"
            >

        <label for="edad">Edad:</label>
        <input
            type="number"
            min="18"
            max="99"
            id="edad-candidato"
            name="edad"
            placeholder="edad"
            >

        <label for="telefono">Teléfono:</label>
        <input
            type="tel"
            id="telefono-candidato"
            name="telefono"
            placeholder="telefono"
            >
        
        <label for="email">email:</label>
        <input
            type="email"
            id="email-candidato"
            name="email"
            placeholder="Email"
            >

        <label for="ciudad">Ciudad:</label>
        <input
            type="text"
            id="ciudad-candidato"
            name="ciudad"
            placeholder="ciudad"
            >

        <label for="hdv">Hoja de vida:</label>
        <input
            type="file"
            id="hdv"
            name="hdv"
            accept="application/pdf"
            >

        <!-- <input type="hidden" name="idOferta" value="<?php echo $idOferta; ?>">
        <input type="hidden" name="idCiudad" value="<?php echo $idCiudad; ?>">
        <input type="hidden" name="fechaRec" value="<?php echo date('Y-m-d H:i'); ?>">
        <input type="hidden" name="accion" value="postular"> -->

        <button type="submit" id="btn-postular" class="btn-admin btn-disabled">Postularse</button>
    </fieldset>
    </form>
</main>


<?php
    $script = "
    <script src='/build/js/apiOfertas.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    ";
?>