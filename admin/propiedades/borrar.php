<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="../../build/css/app.css">

</head>
<body> -->
    <!-- <header class="header">

        <div class="contenedor contenido-header">
           <div class="barra">
               <a href="/">
                    <img src="../../build/img/logo.svg" alt="logotipo de vienes raicer">
                </a>

                <nav class="navegacion">
                    <a href="nosotros.php">Nosotros</a>
                    <a href="anuncios.php">Anuncios</a>
                    <a href="blog.php">Blog</a>
                    <a href="contacto.php">Contacto</a>
                </nav> 

            </div>
       
        </div>   
    </header> -->

    <!-- Llamado del template -->
    <?php 
        // require '../../includes/funciones.php';
        //El llamado de este template no me sirve porque estoy dos niveles inferir de la raíz del proyecto por tanto, 
        //debería devolverme dos veces (../../) y esto me daña las rutas de los otras páginas las cuales están en la 
        //raíz del proyecto y no será necesario volverse dos veces. Se debe buscar una solución por mientras una soluciones es 
        //crear otros haderCrud para usuarlo en el admin y el otro se usa normalmente. 
        require 'C:/laragon/www/bienesraices_php/includes/funciones.php';
        incluirTemplate('header', false);
    ?>

    <main class="contenedor">

        <h1>Borrar</h1>

    </main>

    <!-- Llamado al footer -->
    <?php 
        incluirTemplate('footer', false);
    ?>

    <!-- <footer class="footer">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.php">Nosotros</a>
                <a href="anuncios.php">Anuncios</a>
                <a href="blog.php">Blog</a>
                <a href="contacto.php">Contacto</a>
            </nav> 
        </div>
        <p class="copyright">Todos los derechos reservados 2021 &copy;</p>
    </footer> -->


    <!-- Llamados de scripts de javaScript -->
    <script src="../../build/js/bundle.min.js"></script>