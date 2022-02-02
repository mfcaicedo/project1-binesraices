<?php 
     require 'includes/funciones.php';
     incluirTemplate('header');
?>

    <main class="contenedor">

        <h1>Conoce más sobre nosotros</h1>
        <div class="contenedor contenido">
            <div class="imagen-nosotros">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img src="build/img/nosotros.jpg" alt="imagen de nosotros" loading="lazy">
                </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>
                    25 años de experiencia
                </blockquote>
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
        </div>

    </main>
    <section class="contenedor">

        <h1>Más sobre nosotros</h1>
    
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="icono de seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magni delectus dicta
                    ipsa excepturi minima blanditiis, deleniti repudiandae consequatur libero 
                    deserunt cupiditate fuga odit odio possimus perspiciatis consectetur quasi. Nam, voluptates.</p>
            </div>
    
            <div class="icono">
                <img src="build/img/icono2.svg" alt="icono de precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magni delectus dicta
                    ipsa excepturi minima blanditiis, deleniti repudiandae consequatur libero 
                    deserunt cupiditate fuga odit odio possimus perspiciatis consectetur quasi. Nam, voluptates.</p>
            </div>
    
            <div class="icono">
                <img src="build/img/icono3.svg" alt="icono de Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magni delectus dicta
                    ipsa excepturi minima blanditiis, deleniti repudiandae consequatur libero 
                    deserunt cupiditate fuga odit odio possimus perspiciatis consectetur quasi. Nam, voluptates.</p>
            </div>
        </div>
    </section>

 <!-- Llamado al footer -->
 <?php 
    incluirTemplate('footer');
    ?> 