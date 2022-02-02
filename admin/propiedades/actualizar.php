<?php
    header("Content-Type: text/html;charset=utf-8");

    //AUTENTICACIÓN DE INICIO DE SESIÓN 
    session_start();

    $auth = $_SESSION['login'];

    if (!$auth) {
        header('Location: ./');
    }


    //validar que sea un id válido que he traido de la pantalla anterior 
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    // echo '<pre>';
    // var_dump($id);
    // echo '<pre>';

    if (!$id) {//si el id no es valido me devuelve 
        header('Location: ../../admin/');
    }

    //BASE DE DATOS
    require '../../includes/config/database.php';
    $db = conectarDB();

    //Obtener los datos de la propiedad 
    $consulta = "SELECT * FROM propiedades WHERE idpropiedades = ${id}";
    $resultado = mysqli_query($db, $consulta);
    $propiedad = mysqli_fetch_assoc($resultado);

    //CONSULTA PARA OBTENER LOS VENDEDORES DESDE LA BASE DE DATOS 
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    //Arreglo con mensaje de errores 
    $errores = [];

    $titulo = $propiedad['titulo'];
    $precio = $propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $wc = $propiedad['wc'];
    $estacionamiento = $propiedad['estacionamiento'];
    $vendedorId = $propiedad['vendedorId'];
    $imagenPropiedad= $propiedad['imagen'];
    

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        //para visualizar los archivos usamos 
        // echo "<pre>";
        // var_dump($_FILES);
        // echo "</pre>";

        //Para sanitizar los datos enviados a la base de datos usamos la funcion mysqli_real_escape_string()

        $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
        $precio = mysqli_real_escape_string($db, $_POST['precio']);
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
        $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
        $wc = mysqli_real_escape_string($db, $_POST['wc']);
        $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
        $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
        $creado = date('Y/m/d');
        // echo $creado;

        //Asignar files hacia una variable
        $imagen = $_FILES['imagen'];
        //echo "<pre>";
        //var_dump($imagen);
        //echo "</pre>";


        if (!$titulo) {
            $errores[] = 'Debes añadir un título';

        }
        if (!$precio) {
            $errores[] = 'El precio es obligatorio';
        }
        if (!$descripcion) {
            $errores[] = 'La descripción es obligatoria';
        }
        if (!$habitaciones) {
            $errores[] = 'El número de habitacines es obligatorio';
        }
        if (!$wc) {
            $errores[] = 'El de baños es obligatorio';
        }
        if (!$estacionamiento) {
            $errores[] = 'El número de estacionamiento es obligatorio';
        }
        if (!$vendedorId) {
            $errores[] = 'Debes elegir un vendedor';
        }
        //validar el tamaño de la imagen (1MB máximo en este caso)
        $medida = 1000 * 1000;//1MB

        if ($imagen['size'] == $medida) {
            $errores[] = 'La imagen es muy pesada';
        }


        //Revisar que el array de errores esté vacio 
        if (empty($errores)) {

            /**
             * SUBIDA DE ARCHIVOS 
             * crear carpeta 
             */
            $carpetaImagenes = '../../imagenes/';

            if (!is_dir($carpetaImagenes)) {//verifico que no exista la carpeta para crearla 
                mkdir($carpetaImagenes);
            }

            $nombreImagen = '';

            //compruebo si se sube otra imagen para borrar la que ya está y evitar que se llene el servidor
            if($imagen['name']){
                //Elimino la imagen previa 
                unlink($carpetaImagenes.$propiedad['imagen']);

                //Generar un nombre unico para las imagenes | evita que se sobreescriban las imagenes
                $nombreImagen = md5(uniqid(rand(),true)).".jpg";
            
                //SUBIR LA IMAGEN AL SERVIDOR 
                //NOTA: no es recomendable subir las imagenes a la base de datos, por eso la subimos al servidor, al proyecto
                move_uploaded_file($imagen['tmp_name'],$carpetaImagenes. $nombreImagen);
            
            }

        //INSERTAR EN LA BASE DE DATOS 
        $query = "UPDATE propiedades SET titulo='${titulo}', precio='${precio}',imagen = '${nombreImagen}', descripcion='${descripcion}',habitaciones=${habitaciones},
        wc=${wc}, estacionamiento=${estacionamiento}, vendedorId= ${vendedorId} WHERE idpropiedades= ${id}";

       //echo $query;
        
       $resultado = mysqli_query($db, $query);//inserción a la base de datos

       if ($resultado) {
            //Redireccionar al usuario
            header('Location: ../../admin/?resultado=2');//llevo al usuario a otro lado hacia atrás y esto es importante para que el usuario no meta datos duplicados
           //echo 'Insertado correctamente'; 
       }else{
           echo 'No se pudo hacer la insercion';
       }
        }

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="../../build/css/app.css">

</head>
<body>
    <header class="header">

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


    </header>

    <main class="contenedor">

        <h1>Actualizar propiedad</h1>

        <a href="../index.php" class="boton boton-verde">Volver</a>

        <!-- Muestro las validaciones en la página -->
       
        <?php foreach($errores as $error):?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach ?>

        
        <form action="" class="formulario" method="POST" enctype="multipart/form-data"><!--enctyoe necesario para cargar las imagenes-->

            <fieldset>
                <legend>Información general</legend>
                <label for="titulo">Título:</label>
                <input type="text" required name="titulo" id="titulo" placeholder="Título propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" required id="precio" name="precio" placeholder="Precio propiedad" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">
                <img src="../../imagenes/<?php echo $imagenPropiedad; ?>" alt="imagen anuncio" class="imagen-small">

                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion" name="descripcion" cols="30" rows="10"><?php echo $descripcion; ?></textarea>

            </fieldset>
            <fieldset>
                <legend>Información Propiedad</legend>

                <label for="habitaciones" >Habitaciones:</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones; ?>">    

                <label for="wc">Baños:</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo $wc; ?>">

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">

            </fieldset>
            <fieldset>
                <legend>Vendedor</legend>
                <select name="vendedor" id="vendedor">
                    <option value="">--Seleccione--</option>
                    <?php
                    while ($vendedor = mysqli_fetch_assoc($resultado)): ?>
                        <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id'];?>"><?php echo $vendedor['nombre']. " ". $vendedor['apellido']; ?> </option>
                    <?php endwhile ?>

                </select>
            </fieldset>
            <input type="submit" class="boton boton-verde" value="Actualizar">

        </form>

    </main>

    <footer class="footer">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.php">Nosotros</a>
                <a href="anuncios.php">Anuncios</a>
                <a href="blog.php">Blog</a>
                <a href="contacto.php">Contacto</a>
            </nav> 
        </div>
        <p class="copyright">Todos los derechos reservados 2021 &copy;</p>
    </footer>

    <!-- Llamados de scripts de javaScript -->
    <script src="../../build/js/bundle.min.js"></script>
</body>
</html>