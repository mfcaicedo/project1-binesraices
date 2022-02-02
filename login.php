<?php

    //CONEXIÓN A LA BASE DE DATOS 
    require 'includes/config/database.php';
    $db = conectarDB();
    //Autenticar el usuario 

    //Errores 
    $errores = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        $email = mysqli_real_escape_string($db,filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));//VALIDACION PARA EMAIL 
        $password = mysqli_real_escape_string($db, $_POST['password']);// 
        
        if (!$email) {
            $errores[] = 'El imail es obligatorio o no es válido';

        }
        if (!$password) {
            $errores[] = 'El password no es válido';
        }
        if (empty($errores)) {
            
            //Revisar si el usuario existe 
            $query = "SELECT * FROM usuarios WHERE email = '${email}'";
            $resultado = mysqli_query($db, $query);

            if ($resultado -> num_rows) {//num_rows me sirve para saber si existe algun resgistro en la tabla
                # Revisar si el password es correcto 
                $usuario = mysqli_fetch_assoc($resultado);

                //Verificar si el password es correcto o no; 
                $auth = password_verify($password, $usuario['password']);

                if ($auth) {
                    //El usuario está autent$icado 
                    
                    session_start();//mantiene la sesión activa del usuario
                    
                    //Llenar el arrelgo de la sesión 
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;
                    header('Location: admin/');
                    //va a mantener iniciada la sesión hasta que queremos o expire la sesión 


                    echo "<pre>";
                    var_dump($_SESSION);
                    echo "</pre>";
            
                }else{
                    $errores[] = 'El password es incorrecto';
                   
                }

            }else{
                $errores[] = 'El usuario no existe ';
            }


            // echo "<pre>";
            // var_dump($query);
            // echo "</pre>";
        }
        

    }

    //Icluye el header 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar sesión</h1>

        <?php foreach ($errores as $error): ?>
                <div class="alerta error">
                    <?php echo $error; ?>
                </div>

        <?php endforeach; ?>

        <form action="" class="formulario" method="POST" >

            <fieldset>
                    <legend>Email y Password</legend>

                    <label for="email">E_mail: </label>
                    <input type="email" name="email" placeholder="Tu E_mail" id="email" required>

                    <label for="password">Password: </label>
                    <input type="password" name="password" placeholder="Tu Password" id="password" required>

                </fieldset>

                <input type="submit" value="Iniciar Sesión" class="boton boton-amarillo">
        </form>

    </main>

    <?php
        incluirTemplate('footer');
    ?>