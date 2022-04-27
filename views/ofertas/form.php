<fieldset>
    <legend>Información General</legend>

    <!--Ciudad de la vacante-->
    <label>Ciudad</label>
    <select name="oferta[idCiudad]" id="ciudad">
        <option value="">--Elije Ciudad</option>
        <?php foreach($ciudades as $ciudad){?>
            
            <option
                <?php echo $oferta->idCiudad === $ciudad->id ? 'selected' : '';?>
                value="<?php echo s($ciudad->id);?>"> <?php echo s($ciudad->nombre);?>
            </option>
        <?php
        }
        ?>
    </select>

    <!--Cargo-->
    <label for="cargo">Cargo:</label>
    <input
        type="text"
        id="cargo"
        name="oferta[cargo]"
        placeholder="Título oferta"
        value="<?php echo s($oferta->cargo);?>">
    
    <!--Imagen-->
    <label for="imagen">Imagen:</label>
    <input
        type="file"
        id="imagen"
        name="oferta[imagen]"
        accept="image/jpeg, image/png">
                
    <?php if($oferta->imagen){ ?>
        <img src="/images/<?php echo $oferta->imagen ?>" class="imagen-small">
    <?php } ?>

    <!--Salario-->
    <label for="salario">Salario:</label>
    <input
        type="number"
        id="salario"
        name="oferta[salario]"
        placeholder="salario oferta"
        value="<?php echo s($oferta->salario);?>">

    <!--Horario de trabajo-->
    <label for="horario">Horario:</label>
    <input
        type="text"
        id="horario"
        name="oferta[horario]"
        placeholder="Título oferta"
        value="<?php echo s($oferta->horario);?>">

    <!--Descripción vacante-->
    <label for="descripcion">Descripción de la oferta:</label>
    <textarea id="descripcion" name="oferta[descripcion]"><?php echo s($oferta->descripcion);?></textarea>

    <!--Correo de quien recibe-->
    <label for="correo">Correo de quien recibe postulaciones:</label>
    <input
        type="email"
        id="correo"
        name="oferta[correo]"
        placeholder="correo oferta"
        value="<?php echo s($oferta->correo);?>">

    <!--Fecha de cierre de vacante-->
    <label for="vencimiento">Fecha de cierre de la vacante:</label>
    <input
        type="date"
        id="vencimiento"
        name="oferta[vencimiento]"
        placeholder="vencimiento oferta"
        value="<?php echo s($oferta->vencimiento);?>">
</fieldset>
