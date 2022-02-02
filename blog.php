<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">

        <h1>Nuestro blog</h1>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img src="build/img/blog2.jpg" alt="texto entrada blog" loading="lazy">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p>Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

                    <p>
                        Consejos para construir una terraza en el techo de tu casa en
                         los mejores materiales y ahorrando dinero
                    </p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog3.webp" type="image/webp">
                    <source srcset="build/img/blog3.jpg" type="image/jpeg">
                    <img src="build/img/blog3.jpg" alt="texto entrada blog" loading="lazy">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guia para la decoración de tu hogar</h4>
                    <p>Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

                    <p>
                       Maximiza el espacio en tu hogar con esta guia, aprenda a combinar muebles y 
                       colores para darle vida a tu espacio
                    </p>
                </a>
            </div>
        </article>

    </main>

 <!-- Llamado al footer -->
 <?php 
       incluirTemplate('footer');
    ?> 
