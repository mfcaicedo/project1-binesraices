<?php 
    require 'includes/funciones.php';

    incluirTemplate('header');
?>

    <main class="contenedor">

        <h2>Casas y Depas en ventas</h2>

        <?php 
            $limite=20;//se pasa automaticamente | numero máximo de anuncios que se pueden mostrar
            include 'includes/templates/anuncios.php';
        ?>

    </main>

   <!-- Llamado al footer -->
   <?php 
        include 'includes/templates/footer.php';
    ?> 

