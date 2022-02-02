<?php

    session_start();

    //vamos a cerrar la sesión 
    $_SESSION = [];

    header('Location: ./');
