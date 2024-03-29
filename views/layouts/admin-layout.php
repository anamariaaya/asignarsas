<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Servicios Temporales - <?php echo $titulo ?></title>

    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="/build/css/app.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="dashboard">
    
    <?php 
        include_once __DIR__ .'/../templates/admin-header.php';
    ?>
    <div class="dashboard__grid">
        <?php
            include_once __DIR__ .'/../templates/admin-sidebar.php';  
        ?>

        <main class="dashboard__contenido">
            <?php 
                echo $contenido; 
            ?> 
        </main>
    </div>

    <?php
        echo $script ?? '';
    ?>

  <script type="text/javascript" src="/build/js/app.js"></script>
</body>
</html>