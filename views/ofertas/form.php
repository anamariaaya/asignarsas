<fieldset>
    <legend>-Información de la Oferta-</legend>

    <!--Ciudad de la vacante-->
    <label>Ciudad de la Vacante</label>
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
    <label for="cargo">Cargo de la vacante:</label>
    <input
        type="text"
        id="cargo"
        name="oferta[cargo]"
        placeholder="Ejemplo: Meseros"
        value="<?php echo s($oferta->cargo);?>">
    
    <!--Imagen-->
    <label for="imagen">Imagen de la vacante:</label>
    <input
        type="file"
        id="imagen"
        name="oferta[imagen]"
        accept="image/jpeg, image/png">
                
    <?php if($oferta->imagen){ ?>
        <img src="/images/<?php echo $oferta->imagen ?>" class="imagen-small">
    <?php } ?>

    <!--Salario-->
    <label for="salario">Salario: <span>(Sólo números. No usar símbolos $, puntos o comas)</span></label>
    <input
        type="number"
        id="salario"
        name="oferta[salario]"
        placeholder="Ejemplo: 1000000"
        value="<?php echo s($oferta->salario);?>">

    <!--Horario de trabajo-->
    <label for="horario">Horario Laboral:</label>
    <input
        type="text"
        id="horario"
        name="oferta[horario]"
        placeholder="Ejemplo: Lunes a viernes de 8am a 5pm"
        value="<?php echo s($oferta->horario);?>">

    <!--Descripción vacante-->
    <label for="descripcion">Descripción de la oferta: <span>(Máximo 350 caracteres)</span></label>
    <textarea placeholder="Ejemplo: Requisitos: un año de experiencia en el cargo, técnico en mesa y bar." id="descripcion" name="oferta[descripcion]"><?php echo s($oferta->descripcion);?></textarea>

    <!--Correo de quien recibe-->
    <label for="correo">Correo de quien recibe postulaciones:</label>
    <input
        type="email"
        id="correo"
        name="oferta[correo]"
        placeholder="Ejemplo: seleccion1@asignar.com.co"
        value="<?php echo s($oferta->correo);?>">

    <!--Fecha de cierre de vacante-->
    <label for="vencimiento">Fecha de cierre de la vacante: <span>(Último día en que recibirán hojas de vida para este cargo)</span></label>
    <input
        type="date"
        id="vencimiento"
        name="oferta[vencimiento]"
        placeholder="vencimiento oferta"
        value="<?php echo s($oferta->vencimiento);?>">
</fieldset>
