<h1><?php echo $titulo; ?></h1>

<?php
    if($_SESSION['admin'] === '2'): ?>
        <p> Soy el Súper Admin </p>
    <?php else: ?>
        <p> Soy el admin normal y corriente </p>
    <?php endif;
?>



   
