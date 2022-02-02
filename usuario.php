<?php 

//IMPORTAR LA CONEXIÓN 
require 'includes/config/database.php';
$db = conectarDB();

//CREAR UN EMAIL Y UN PASSWORD 
$email = "correo@correo.com";
$password = "123456";
//el password lo hashar para que sea seguro y para no poder mirar password de los usuarios 
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

//var_dump($passwordHash);

//Query para crear el usuario 
$query = " INSERT INTO usuarios (email, password) VALUES ('${email}','${passwordHash}');";

//echo $query; 
// Agregarlo a la base de datos 
mysqli_query($db, $query);