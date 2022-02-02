<?php
    //Importar la conexión con la base de datos 
    require 'includes/config/database.php';
    $db = conectarDB();

    // consultar 
    $query = "SELECT * FROM propiedades LIMIT ${limite}";//limito para que solo se vean 3

    // obtenes los resultados 
    $resultado = mysqli_query($db, $query);


?>

<div class="contenedor-anuncios">
        <?php while($propiedad = mysqli_fetch_assoc($resultado)):  ?>
            <div class="anuncio">
               
                <img src="imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio" loading="lazy">
            

                <div class="contenido-anuncio">
                    <h3><?php echo $propiedad['titulo']; ?></h3>
                    <p><?php echo $propiedad['descripcion']; ?></p>
                    <p class="precio"><?php echo "$".$propiedad['precio']; ?></p>

                    <ul class="iconos-caracteristicas">
                        <li>
                            <img src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                            <p><?php echo $propiedad['wc']; ?></p>
                        </li>
                        <li>
                            <img src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy">
                            <p><?php echo $propiedad['estacionamiento']; ?></p>
                        </li>
                        <li>
                            <img src="build/img/icono_dormitorio.svg" alt="icono habitaciones" loading="lazy">
                            <p><?php echo $propiedad['habitaciones']; ?></p>
                        </li>
                    </ul>

                    <a href="anuncio.php?id=<?php echo $propiedad['idpropiedades']; ?>" class="boton-amarillo-block">
                        Ver propiedad
                    </a>


                </div><!--contenido anuncio-->
            </div><!-- anuncio-->
        <?php endwhile; ?>    

        </div><!--contenedor anuncios-->
    <?php
        //CERRAR LA CONEXIÓN 
        mysqli_close($db);
    ?>