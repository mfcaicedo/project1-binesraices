<?php 
    require 'includes/funciones.php';

    $inicio = true;//se crea la variable y se pasa automaticamente al header
    incluirTemplate('header',$inicio);
    
?>

    <main class="contenedor">

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

    </main>

    <section class="seccion contenedor">

        <h2>Casas y Departamentos en ventas</h2>

        <?php 
            $limite=3;//se pasa automaticamente
            include 'includes/templates/anuncios.php';
        ?>

        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver todas</a>
        </div>

    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
        <a href="contacto.php" class="boton-amarillo">Contactanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro blog</h3>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img src="build/img/blog1.jpg" alt="texto entrada blog" loading="lazy">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

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
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img src="build/img/blog2.jpg" alt="texto entrada blog" loading="lazy">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guia para la decoración de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

                        <p>
                           Maximiza el espacio en tu hogar con esta guia, aprenda a combinar muebles y 
                           colores para darle vida a tu espacio
                        </p>
                    </a>
                </div>
            </article>

        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atensión y la casa que me ofrecieron 
                    cumple con todas mis espectativas
                </blockquote>
                <p>Milthon Caicedo</p>
            </div>
        </section>

    </div>

    <!-- Llamado al footer -->
    <?php 
        incluirTemplate('footer');
    ?>    
