<?php
    date_default_timezone_set("America/Recife");

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'cs2';

    $conn = mysqli_connect($host, $user, $pass, $db, 3306);

    if(mysqli_connect_errno())
        die("Conexão Falhou!");
?>