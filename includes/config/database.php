<?php
header("Content-Type: text/html;charset=utf-8");

function conectarDB(): mysqli{
    $db = mysqli_connect('localhost','root','root','bienes_raices');
    $db->set_charset('utf8');

    if (!$db) {
        echo 'No se Conectó a la base de datos';
        exit;
    }

    return $db;
}