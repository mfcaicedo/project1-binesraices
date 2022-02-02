<?php
      //código php para hacer dinamico los datos de la entrada 
      //recupero el id del anuncio 
      $id = $_GET['id'];
      $id = filter_var($id, FILTER_VALIDATE_INT);

      if (!$id) {//validación si el id es correcto (formato)
          header('Location: anuncios.php');
      }

      //IMPORTO CONEXIÓN A LA BASE DE DATOS 
      require 'includes/config/database.php';
      $db = conectarDB();

      //Consulta 
      $query = "SELECT * FROM propiedades WHERE idpropiedades = ${id}";
      $resultado = mysqli_query($db, $query);
      //validación que el id exista en algun registro de la base de datos 
      if (!$resultado->num_rows) {
          header('Lacation: anuncios.php');
      }

      $propiedad = mysqli_fetch_assoc($resultado);// con esto accedo a los valores filtrados

?>
<?php 

    require 'includes/funciones.php';
    incluirTemplate('header');

?>

    <main class="contenedor seccion contenido-centrado">

        <h1><?php echo $propiedad['titulo']; ?> </h1>

            <img src="imagenes/<?php echo $propiedad['imagen']; ?>" alt="imagen de la propiedad">

        <div class="resumen-propiedad">
            <p class="precio"><?php echo "$".$propiedad['precio']; ?> </p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                    <p><?php echo $propiedad['wc']; ?> </p>
                </li>
                <li>
                    <img src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy">
                    <p><?php echo $propiedad['estacionamiento']; ?> </p>
                </li>
                <li>
                    <img src="build/img/icono_dormitorio.svg" alt="icono habitaciones" loading="lazy">
                    <p><?php echo $propiedad['habitaciones']; ?> </p>
                </li>
            </ul>
            <p>
                <?php echo $propiedad['descripcion']; ?>
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
