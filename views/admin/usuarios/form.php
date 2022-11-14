<fieldset>
    <legend>Registro de usuario administrador</legend>

    <label for="admin">Tipo de usuario</label>
    <select name="admin" id="admin">
        <option value="">-- Selecciona --</option>
        <option value="1">Admin</option>
        <option value="2">SuperAdmin</option>
    </select>

    <label for="nombre">Nombre:</label>
    <input
        type="text"
        id="nombre"
        name="nombre"
        placeholder="Nombre"
        value="<?php echo s($usuario->nombre);?>">
    
    <label for="apellido">Apellido:</label>
    <input
        type="text"
        id="apellido"
        name="apellido"
        placeholder="Apellido"
        value="<?php echo s($usuario->apellido);?>">
    
    <label for="email">email:</label>
    <input
        type="email"
        id="email"
        name="email"
        placeholder="Email"
        value="<?php echo s($usuario->email);?>">

    <label for="password">Contraseña:</label>
    <input type="password" name="password" placeholder="Tu password" id="password">

    <div class="password">
        <input type="checkbox" id="passview">
        <label>Ver Contraseña</label>
    </div>

</fieldset>