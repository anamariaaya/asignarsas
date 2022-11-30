<h1>Prueba</h1>

<ul>
    <?php
        foreach($ciudades as $ciudad){
            echo "<li>$ciudad->id</li>";
            echo "<li>$ciudad->nombre</li>";
            echo "<li>$ciudad->activa</li>";
        }
    ?>

</ul>