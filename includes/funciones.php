<?php

require 'app.php';

function incluirTemplate(string $template, bool $inicio = false){
    include TEMPLATES_URL."/${template}.php";
}

function estaAutenticado(): bool{
    session_start();

    $auth = $_SESSION['login'];

    if ($auth) {
        return true;
    }
    return false; 
    
}