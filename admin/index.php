<!-- Código php  -->
<?php

    //AUTENTICACIÓN DE INICIO DE SESIÓN 
    session_start();

    $auth = $_SESSION['login'];

    // echo "<pre>";
    // var_dump($auth);
    // var_dump($_SESSION);
    // echo "</pre>";

    if (!$auth) {
        header('Location: ../');
    }

    //IMPORTAR LA CONEXION
    require '../includes/config/database.php'; 
    $db = conectarDB();


    // ESCRIBIR EL QUERY 
    $query = "SELECT * FROM propiedades";

    //CONSULTAR LA BASE DE DATOS 
    $resultadoConsulta = mysqli_query($db, $query);

    //Variable necesaria para saber si se insertó o no el anuncio de crear.php y en el index.php mostrar el mensaje 
        $resultado = $_GET['resultado'] ?? null;
        // echo "<pre>";
        // var_dump($resultado);
        // echo "<pre>";

        //Incluye un tamplate
        require '../includes/funciones.php';

        //INCLUIREMOS LINEAS DE CÓDIGO PARA ELIMINAR UNA PROPIEDAD 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id= filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {
                //Eliminar el archivo 
                $query = "SELECT imagen FROM propiedades WHERE idpropiedades = ${id}";

                $resultado = mysqli_query($db, $query);
                $propiedad = mysqli_fetch_assoc($resultado);

                // var_dump($propiedad['imagen']);
                unlink('../imagenes/'.$propiedad['imagen']);//con esto elimino la imagen del servidor

                //ELIIMINAR LA PROPIEDAD 
                $query = "DELETE FROM propiedades WHERE idpropiedades = ${id}";
                $resultado = mysqli_query($db, $query);

                if ($resultado) {
                    header('Location: ../admin/?resultado=3');
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
    <link rel="stylesheet" href="../build/css/app.css">

</head>
<body>
    <header class="header">

        <div class="contenedor contenido-header">
           <div class="barra">
               <a href="../index.php">
                    <img src="../build/img/logo.svg" alt="logotipo de vienes raicer">
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

    <main class="contenedor seccion">

        <h1>Administrador</h1>
        <?php if ($resultado == 1): ?>    
                <p class="alerta exito"> Anuncio creado correctamente</p>
        <?php elseif ($resultado == 2): ?>
            <p class="alerta exito"> Anuncio actualizado correctamente</p>
        <?php elseif ($resultado == 3): ?>
            <p class="alerta exito"> Anuncio eliminado correctamente</p>
        <?php endif; ?>

        <a href="propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody><!-- Mostar los datos consutados de la base de datos  -->
                
                <?php while ($propiedades = mysqli_fetch_assoc($resultadoConsulta)): ?>

                    <tr>
                        <td><?php echo $propiedades['idpropiedades'];  ?> </td>
                        <td><?php echo $propiedades['titulo']; ?></td>
                        <td>
                            <img src="../imagenes/<?php echo $propiedades['imagen']; ?>" class="imagen-tabla" alt="Imagen de anuncio">
                        </td>
                        <td> <?php echo "$".$propiedades['precio']; ?> </td>
                        <td>
                            <form action="" method="POST" class="w-100">
                                <input type="hidden" name="id" value="<?php echo $propiedades['idpropiedades'];?>">
                                <input type="submit" class="boton-rojo-block" value="Eliminar">   
                            </form>
                            <a href="propiedades/actualizar.php?id=<?php echo $propiedades['idpropiedades']; ?>" class="boton-amarillo-block">Actualizar</a>
                        </td>
                    </tr>
                <?php
                    endwhile; ?>
            </tbody>
        </table>        
                
    </main>

    <!-- CERRAR LA BASE DE DATOS (opcional) -->
     <?php  
        mysqli_close($db);
     ?>               
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
    <script src="../build/js/bundle.min.js"></script>
</body>
</html>