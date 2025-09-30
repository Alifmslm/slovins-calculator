<?php
    $databaseHost = 'localhost';
    $databaseName = 'slovins_db';
    $databaseUsername = 'root';
    $databasePassword = '12345678';

    $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

    if($mysqli->connect_error) {
        echo'Connection Failed: ' . $mysqli->connect_error;
    } else {
        echo'Berhasil Tersambung dengan DB';
    }
?>