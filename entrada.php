<?php 
     require 'includes/funciones.php';
     incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">

        <h1>Guia para la decoración de tu hogar</h1>

        <picture>
            <source  srcset="build/img/destacada2.webp" type="image/webp" >
            <source  srcset="build/img/destacada2.jpg" type="image/jpeg" >
            <img src="build/img/destacada2.jpg" alt="imagen de la propiedad">
        </picture>
        <p class="informacion-meta">Escrito por: <span>20/10/2021</span> por: <span>Admin</span></p>

        <div class="resumen-propiedad">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Expedita veritatis velit saepe mollitia neque non reprehenderit
                nobis iure deserunt unde at atque delectus, facere eveniet, qui sit,
                enim illo. Molestias lore. Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Expedita veritatis velit saepe mollitia neque non reprehenderit
                nobis iure deserunt unde at atque delectus, facere eveniet, qui sit,
                enim illo. Molestias lore.
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Expedita veritatis velit saepe mollitia neque non reprehenderit
                nobis iure deserunt unde at atque delectus, facere eveniet, qui sit,
                enim illo. Molestias lore
            </p>

        </div>

    </main>

  <!-- Llamado al footer -->
  <?php 
        incluirTemplate('footer');
    ?> 
