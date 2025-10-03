<?php
    $databaseHost = 'localhost';
    $databaseName = 'slovins_db';
    $databaseUsername = 'root';
    $databasePassword = '12345678';

    $connection_db = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

    if($connection_db->connect_error) {
        echo'Connection Failed: ' . $connection_db->connect_error;
    }
?>