<?php

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'db_multi';

    $connection = mysqli_connect($host, $user, $pass, $dbname) or die(mysqli_error());

    session_start();
?>